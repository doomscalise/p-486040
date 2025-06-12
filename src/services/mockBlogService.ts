
import { BlogArticle, BlogCategory } from '@/types/blog';

// Dati mock temporanei per il test
const mockCategories: BlogCategory[] = [
  {
    id: '1',
    name: 'Fantacalcio',
    slug: 'fantacalcio',
    description: 'Guide e consigli per il fantacalcio',
    color: 'gambla-yellow'
  },
  {
    id: '2',
    name: 'Mercato',
    slug: 'mercato',
    description: 'News e analisi del mercato',
    color: 'gambla-orange'
  },
  {
    id: '3',
    name: 'Serie A',
    slug: 'serie-a',
    description: 'Notizie dalla Serie A',
    color: 'gambla-magenta'
  }
];

const mockArticles: BlogArticle[] = [
  {
    id: '1',
    title: 'Guida completa al fantacalcio 2024/25',
    slug: 'guida-fantacalcio-2024-25',
    excerpt: 'Tutto quello che devi sapere per dominare la tua lega',
    content: 'Contenuto completo dell\'articolo...',
    author: 'Marco Rossi',
    date: '15 Gen 2024',
    readTime: '8 min',
    category: 'Fantacalcio',
    image: 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    published: true,
    featured: true,
    tags: ['fantacalcio', 'guida', 'Serie A'],
    views: 1250,
    created_at: '2024-01-15T10:00:00Z',
    updated_at: '2024-01-15T10:00:00Z'
  },
  {
    id: '2',
    title: 'I migliori acquisti di gennaio',
    slug: 'acquisti-gennaio-fantacalcio',
    excerpt: 'Analisi del mercato invernale e consigli per i tuoi investimenti',
    content: 'Analisi dettagliata dei giocatori più promettenti...',
    author: 'Luca Bianchi',
    date: '12 Gen 2024',
    readTime: '6 min',
    category: 'Mercato',
    image: 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    published: true,
    featured: false,
    tags: ['mercato', 'gennaio', 'consigli'],
    views: 890,
    created_at: '2024-01-12T15:30:00Z',
    updated_at: '2024-01-12T15:30:00Z'
  },
  {
    id: '3',
    title: 'Analisi tattica: la formazione perfetta',
    slug: 'analisi-tattica-formazione-perfetta',
    excerpt: 'Strategie avanzate per massimizzare i punti ogni giornata',
    content: 'Guida completa alle formazioni più efficaci...',
    author: 'Andrea Verdi',
    date: '10 Gen 2024',
    readTime: '7 min',
    category: 'Serie A',
    image: 'https://images.unsplash.com/photo-1543326727-cf6c39e8f84c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    published: true,
    featured: true,
    tags: ['tattiche', 'formazione', 'strategia'],
    views: 2100,
    created_at: '2024-01-10T09:15:00Z',
    updated_at: '2024-01-10T09:15:00Z'
  }
];

export const mockBlogService = {
  async getCategories(): Promise<BlogCategory[]> {
    return new Promise(resolve => {
      setTimeout(() => resolve(mockCategories), 500);
    });
  },

  async getArticles(): Promise<BlogArticle[]> {
    return new Promise(resolve => {
      setTimeout(() => resolve(mockArticles), 500);
    });
  },

  async getFeaturedArticles(): Promise<BlogArticle[]> {
    return new Promise(resolve => {
      setTimeout(() => resolve(mockArticles.filter(a => a.featured)), 500);
    });
  },

  async getArticlesByCategory(categorySlug: string): Promise<BlogArticle[]> {
    return new Promise(resolve => {
      const category = mockCategories.find(c => c.slug === categorySlug);
      const filteredArticles = mockArticles.filter(a => a.category === category?.name);
      setTimeout(() => resolve(filteredArticles), 500);
    });
  },

  async getArticleBySlug(slug: string): Promise<BlogArticle | null> {
    return new Promise(resolve => {
      const article = mockArticles.find(a => a.slug === slug);
      setTimeout(() => resolve(article || null), 500);
    });
  },

  async incrementViews(articleId: string): Promise<void> {
    return new Promise(resolve => {
      setTimeout(() => resolve(), 200);
    });
  }
};
