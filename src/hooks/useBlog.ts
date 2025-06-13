
import { useState, useEffect } from 'react';
import { BlogArticle, BlogCategory } from '@/types/blog';
import { wordpressService } from '@/services/wordpressService';
import { mockBlogService } from '@/services/mockBlogService';

// Flag per scegliere tra WordPress e mock data
const USE_WORDPRESS = true; // Cambia in false per usare i dati mock

export const useBlog = () => {
  const [articles, setArticles] = useState<BlogArticle[]>([]);
  const [categories, setCategories] = useState<BlogCategory[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const blogService = USE_WORDPRESS ? wordpressService : mockBlogService;

  useEffect(() => {
    const fetchData = async () => {
      try {
        setLoading(true);
        setError(null);
        
        const [articlesData, categoriesData] = await Promise.all([
          blogService.getArticles(),
          blogService.getCategories()
        ]);
        
        setArticles(articlesData);
        setCategories(categoriesData);
      } catch (err) {
        console.error('Errore nel caricamento dei dati del blog:', err);
        setError('Impossibile caricare i contenuti del blog');
        
        // Fallback ai dati mock in caso di errore
        if (USE_WORDPRESS) {
          try {
            const [mockArticles, mockCategories] = await Promise.all([
              mockBlogService.getArticles(),
              mockBlogService.getCategories()
            ]);
            setArticles(mockArticles);
            setCategories(mockCategories);
            setError('Utilizzando dati di fallback');
          } catch (mockError) {
            console.error('Errore anche con i dati mock:', mockError);
          }
        }
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  const getFeaturedArticles = () => {
    return articles.filter(article => article.featured);
  };

  const getArticlesByCategory = (categorySlug: string) => {
    return articles.filter(article => {
      const category = categories.find(cat => cat.slug === categorySlug);
      return category && article.category === category.name;
    });
  };

  const getArticleBySlug = async (slug: string): Promise<BlogArticle | null> => {
    try {
      return await blogService.getArticleBySlug(slug);
    } catch (err) {
      console.error('Errore nel recupero articolo:', err);
      return null;
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
    incrementViews: blogService.incrementViews
  };
};
