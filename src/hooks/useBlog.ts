
import { useState, useEffect } from 'react';
import { BlogArticle, BlogCategory } from '@/types/blog';
import { blogService } from '@/services/blogService';

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
      setError(null);
      
      // Carica categorie e articoli in parallelo
      const [categoriesData, articlesData] = await Promise.all([
        blogService.getCategories(),
        blogService.getArticles()
      ]);

      setCategories(categoriesData);
      setArticles(articlesData);
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
      await blogService.incrementViews(articleId);
      
      // Aggiorna lo stato locale
      setArticles(prev => prev.map(article => 
        article.id === articleId 
          ? { ...article, views: (article.views || 0) + 1 }
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
