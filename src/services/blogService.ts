
import apiClient from './apiClient';
import { BlogArticle, BlogCategory } from '@/types/blog';

export const blogService = {
  // Ottieni tutte le categorie
  async getCategories(): Promise<BlogCategory[]> {
    const response = await apiClient.get('/blog/categories');
    return response.data;
  },

  // Ottieni tutti gli articoli pubblicati
  async getArticles(): Promise<BlogArticle[]> {
    const response = await apiClient.get('/blog/articles');
    return response.data;
  },

  // Ottieni articoli in evidenza
  async getFeaturedArticles(): Promise<BlogArticle[]> {
    const response = await apiClient.get('/blog/articles/featured');
    return response.data;
  },

  // Ottieni articoli per categoria
  async getArticlesByCategory(categorySlug: string): Promise<BlogArticle[]> {
    const response = await apiClient.get(`/blog/articles/category/${categorySlug}`);
    return response.data;
  },

  // Ottieni articolo per slug
  async getArticleBySlug(slug: string): Promise<BlogArticle | null> {
    try {
      const response = await apiClient.get(`/blog/articles/slug/${slug}`);
      return response.data;
    } catch (error) {
      return null;
    }
  },

  // Incrementa visualizzazioni
  async incrementViews(articleId: string): Promise<void> {
    await apiClient.post(`/blog/articles/${articleId}/view`);
  }
};
