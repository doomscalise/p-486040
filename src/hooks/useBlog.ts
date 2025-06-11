
import { useState, useEffect } from 'react';
import { BlogArticle, BlogCategory } from '@/types/blog';

// Dati mock per ora - verranno sostituiti con Supabase
const mockArticles: BlogArticle[] = [
  {
    id: '1',
    title: 'Guida completa al fantacalcio 2024/25',
    excerpt: 'Tutto quello che devi sapere per dominare la tua lega',
    content: 'Contenuto completo dell\'articolo...',
    author: 'Marco Rossi',
    date: '15 Dic 2024',
    readTime: '8 min',
    category: 'Fantacalcio',
    image: 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    slug: 'guida-fantacalcio-2024-25',
    published: true,
    featured: true,
    tags: ['fantacalcio', 'guida', 'Serie A'],
    views: 1250,
    created_at: '2024-12-15T10:00:00Z',
    updated_at: '2024-12-15T10:00:00Z'
  },
  {
    id: '2',
    title: 'I migliori acquisti di gennaio per il tuo fantacalcio',
    excerpt: 'Analisi del mercato invernale e consigli per i tuoi investimenti',
    content: 'Contenuto completo dell\'articolo...',
    author: 'Luca Bianchi',
    date: '12 Dic 2024',
    readTime: '6 min',
    category: 'Mercato',
    image: 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    slug: 'acquisti-gennaio-fantacalcio',
    published: true,
    featured: false,
    tags: ['mercato', 'gennaio', 'consigli'],
    views: 890,
    created_at: '2024-12-12T14:30:00Z',
    updated_at: '2024-12-12T14:30:00Z'
  },
  {
    id: '3',
    title: 'Analisi tattica: come schierare la formazione perfetta',
    excerpt: 'Strategie avanzate per massimizzare i punti ogni giornata',
    content: 'Contenuto completo dell\'articolo...',
    author: 'Andrea Verdi',
    date: '10 Dic 2024',
    readTime: '10 min',
    category: 'Tattiche',
    image: 'https://images.unsplash.com/photo-1543326727-cf6c39e8f84c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    slug: 'analisi-tattica-formazione-perfetta',
    published: true,
    featured: true,
    tags: ['tattiche', 'formazione', 'strategia'],
    views: 1100,
    created_at: '2024-12-10T09:15:00Z',
    updated_at: '2024-12-10T09:15:00Z'
  }
];

const mockCategories: BlogCategory[] = [
  { id: '1', name: 'Fantacalcio', slug: 'fantacalcio', description: 'Guide e consigli per il fantacalcio', color: 'gambla-yellow' },
  { id: '2', name: 'Mercato', slug: 'mercato', description: 'News e analisi del mercato', color: 'gambla-orange' },
  { id: '3', name: 'Tattiche', slug: 'tattiche', description: 'Strategie e formazioni', color: 'gambla-magenta' },
  { id: '4', name: 'Serie A', slug: 'serie-a', description: 'News dalla Serie A', color: 'gambla-yellow' }
];

export const useBlog = () => {
  const [articles, setArticles] = useState<BlogArticle[]>([]);
  const [categories, setCategories] = useState<BlogCategory[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    // Simula caricamento da database
    const loadData = async () => {
      try {
        setLoading(true);
        // Simula delay API
        await new Promise(resolve => setTimeout(resolve, 500));
        setArticles(mockArticles);
        setCategories(mockCategories);
      } catch (err) {
        setError('Errore nel caricamento degli articoli');
      } finally {
        setLoading(false);
      }
    };

    loadData();
  }, []);

  const getFeaturedArticles = () => articles.filter(article => article.featured && article.published);
  
  const getArticlesByCategory = (categorySlug: string) => 
    articles.filter(article => article.category.toLowerCase() === categorySlug && article.published);
  
  const getArticleBySlug = (slug: string) => 
    articles.find(article => article.slug === slug && article.published);

  const incrementViews = (articleId: string) => {
    setArticles(prev => prev.map(article => 
      article.id === articleId 
        ? { ...article, views: article.views + 1 }
        : article
    ));
  };

  return {
    articles: articles.filter(article => article.published),
    categories,
    loading,
    error,
    getFeaturedArticles,
    getArticlesByCategory,
    getArticleBySlug,
    incrementViews
  };
};
