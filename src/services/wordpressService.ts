
import apiClient from './apiClient';
import { BlogArticle, BlogCategory } from '@/types/blog';

// Configurazione WordPress API
const WP_API_BASE = 'https://gambla.it/blog-admin/wp-json/wp/v2';

// Tipi WordPress
interface WPPost {
  id: number;
  title: { rendered: string };
  excerpt: { rendered: string };
  content: { rendered: string };
  slug: string;
  date: string;
  modified: string;
  author: number;
  categories: number[];
  featured_media: number;
  meta: {
    read_time?: string;
  };
  _embedded?: {
    author: Array<{ name: string }>;
    'wp:featuredmedia': Array<{ source_url: string }>;
    'wp:term': Array<Array<{ name: string; slug: string }>>;
  };
}

interface WPCategory {
  id: number;
  name: string;
  slug: string;
  description: string;
}

export const wordpressService = {
  // Ottieni tutti gli articoli
  async getArticles(): Promise<BlogArticle[]> {
    try {
      const response = await fetch(`${WP_API_BASE}/posts?_embed&status=publish&per_page=100`);
      const posts: WPPost[] = await response.json();
      
      return posts.map(this.transformPost);
    } catch (error) {
      console.error('Errore nel recupero articoli WordPress:', error);
      throw error;
    }
  },

  // Ottieni articoli in evidenza
  async getFeaturedArticles(): Promise<BlogArticle[]> {
    try {
      const response = await fetch(`${WP_API_BASE}/posts?_embed&status=publish&sticky=true&per_page=10`);
      const posts: WPPost[] = await response.json();
      
      return posts.map(this.transformPost);
    } catch (error) {
      console.error('Errore nel recupero articoli in evidenza:', error);
      return [];
    }
  },

  // Ottieni articolo per slug
  async getArticleBySlug(slug: string): Promise<BlogArticle | null> {
    try {
      const response = await fetch(`${WP_API_BASE}/posts?_embed&slug=${slug}&status=publish`);
      const posts: WPPost[] = await response.json();
      
      if (posts.length === 0) return null;
      
      return this.transformPost(posts[0]);
    } catch (error) {
      console.error('Errore nel recupero articolo:', error);
      return null;
    }
  },

  // Ottieni categorie
  async getCategories(): Promise<BlogCategory[]> {
    try {
      const response = await fetch(`${WP_API_BASE}/categories?per_page=100`);
      const categories: WPCategory[] = await response.json();
      
      return categories.map(cat => ({
        id: cat.id.toString(),
        name: cat.name,
        slug: cat.slug,
        description: cat.description,
        color: 'gambla-yellow' // Default, puoi personalizzare
      }));
    } catch (error) {
      console.error('Errore nel recupero categorie:', error);
      return [];
    }
  },

  // Ottieni articoli per categoria
  async getArticlesByCategory(categorySlug: string): Promise<BlogArticle[]> {
    try {
      const categoriesResponse = await fetch(`${WP_API_BASE}/categories?slug=${categorySlug}`);
      const categories: WPCategory[] = await categoriesResponse.json();
      
      if (categories.length === 0) return [];
      
      const categoryId = categories[0].id;
      const response = await fetch(`${WP_API_BASE}/posts?_embed&categories=${categoryId}&status=publish&per_page=100`);
      const posts: WPPost[] = await response.json();
      
      return posts.map(this.transformPost);
    } catch (error) {
      console.error('Errore nel recupero articoli per categoria:', error);
      return [];
    }
  },

  // Trasforma post WordPress in formato BlogArticle
  transformPost(post: WPPost): BlogArticle {
    const author = post._embedded?.author?.[0]?.name || 'GAMBLA Team';
    const featuredImage = post._embedded?.['wp:featuredmedia']?.[0]?.source_url || 
                         'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
    const categories = post._embedded?.['wp:term']?.[0] || [];
    const category = categories[0]?.name || 'News';
    
    return {
      id: post.id.toString(),
      title: post.title.rendered.replace(/<[^>]*>/g, ''), // Rimuovi HTML
      slug: post.slug,
      excerpt: post.excerpt.rendered.replace(/<[^>]*>/g, '').trim(),
      content: post.content.rendered,
      author,
      date: new Date(post.date).toLocaleDateString('it-IT', {
        day: 'numeric',
        month: 'short',
        year: 'numeric'
      }),
      readTime: post.meta?.read_time || '5 min',
      category,
      image: featuredImage,
      published: true,
      featured: false, // WordPress usa "sticky" posts
      tags: [], // Puoi aggiungere support per tags se necessario
      views: 0, // WordPress non traccia views di default
      created_at: post.date,
      updated_at: post.modified
    };
  },

  // Incrementa visualizzazioni (placeholder per compatibilità)
  async incrementViews(articleId: string): Promise<void> {
    // WordPress non supporta views di default
    // Potresti installare un plugin come WP-PostViews
    console.log(`Incrementing views for article ${articleId}`);
  }
};
