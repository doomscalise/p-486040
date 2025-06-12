
import apiClient from './apiClient';

export interface NewsletterSubscription {
  email: string;
  source?: string;
}

export const newsletterService = {
  // Iscrizione alla newsletter
  async subscribe(data: NewsletterSubscription): Promise<{ success: boolean; message: string }> {
    try {
      const response = await apiClient.post('/newsletter/subscribe', data);
      return response.data;
    } catch (error: any) {
      throw new Error(error.response?.data?.message || 'Errore durante l\'iscrizione');
    }
  },

  // Verifica se email è già iscritta
  async checkSubscription(email: string): Promise<boolean> {
    try {
      const response = await apiClient.get(`/newsletter/check/${email}`);
      return response.data.subscribed;
    } catch (error) {
      return false;
    }
  }
};
