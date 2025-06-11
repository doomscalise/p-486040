
import { useState, useEffect } from 'react';
import { BlogArticle, BlogCategory } from '@/types/blog';
import { supabase } from '@/integrations/supabase/client';

export const useBlog = () => {
  const [articles, setArticles] = useState<BlogArticle[]>([]);
  const [categories, setCategories] = useState<BlogCategory[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    loadData();
  }, []);

  const loadData = async () => {
    try {
      setLoading(true);
      
      // Carica le categorie
      const { data: categoriesData, error: categoriesError } = await supabase
        .from('blog_categories')
        .select('*')
        .order('name');

      if (categoriesError) throw categoriesError;

      // Carica gli articoli pubblicati con le categorie
      const { data: articlesData, error: articlesError } = await supabase
        .from('blog_articles')
        .select(`
          *,
          blog_categories!inner(name, slug, color)
        `)
        .eq('published', true)
        .order('created_at', { ascending: false });

      if (articlesError) throw articlesError;

      // Trasforma i dati per il formato atteso
      const transformedArticles: BlogArticle[] = articlesData.map(article => ({
        id: article.id,
        title: article.title,
        slug: article.slug,
        excerpt: article.excerpt,
        content: article.content,
        author: article.author,
        date: new Date(article.created_at).toLocaleDateString('it-IT', {
          day: 'numeric',
          month: 'short',
          year: 'numeric'
        }),
        readTime: article.read_time || '5 min',
        category: article.blog_categories.name,
        image: article.image || 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        published: article.published,
        featured: article.featured,
        tags: article.tags || [],
        views: article.views || 0,
        created_at: article.created_at,
        updated_at: article.updated_at
      }));

      const transformedCategories: BlogCategory[] = categoriesData.map(category => ({
        id: category.id,
        name: category.name,
        slug: category.slug,
        description: category.description || '',
        color: category.color || 'gambla-yellow'
      }));

      setArticles(transformedArticles);
      setCategories(transformedCategories);
    } catch (err) {
      console.error('Errore nel caricamento dei dati:', err);
      setError('Errore nel caricamento degli articoli');
    } finally {
      setLoading(false);
    }
  };

  const getFeaturedArticles = () => articles.filter(article => article.featured);
  
  const getArticlesByCategory = (categorySlug: string) => 
    articles.filter(article => 
      categories.find(cat => cat.name === article.category)?.slug === categorySlug
    );
  
  const getArticleBySlug = (slug: string) => 
    articles.find(article => article.slug === slug);

  const incrementViews = async (articleId: string) => {
    try {
      const { error } = await supabase.rpc('increment_article_views', {
        article_id: articleId
      });

      if (error) {
        console.error('Errore nell\'incremento delle visualizzazioni:', error);
        return;
      }

      // Aggiorna lo stato locale
      setArticles(prev => prev.map(article => 
        article.id === articleId 
          ? { ...article, views: article.views + 1 }
          : article
      ));
    } catch (err) {
      console.error('Errore nell\'incremento delle visualizzazioni:', err);
    }
  };

  return {
    articles,
    categories,
    loading,
    error,
    getFeaturedArticles,
    getArticlesByCategory,
    getArticleBySlug,
    incrementViews,
    refreshData: loadData
  };
};
