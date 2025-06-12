
import axios from 'axios';
import { apiConfig, enableLogging } from '@/config/database';

// Client API centralizzato con retry logic
const apiClient = axios.create({
  baseURL: apiConfig.baseURL,
  timeout: apiConfig.timeout,
  headers: {
    'Content-Type': 'application/json',
  },
});

// Interceptor per retry automatico
apiClient.interceptors.response.use(
  (response) => response,
  async (error) => {
    const config = error.config;
    
    // Log errori solo in development
    if (enableLogging) {
      console.error('API Error:', error.response?.data || error.message);
    }
    
    // Retry logic per errori di rete
    if (!config._retry && config._retryCount < apiConfig.retryAttempts) {
      config._retry = true;
      config._retryCount = (config._retryCount || 0) + 1;
      
      // Attesa progressiva tra i retry
      const delay = Math.pow(2, config._retryCount) * 1000;
      await new Promise(resolve => setTimeout(resolve, delay));
      
      return apiClient(config);
    }
    
    return Promise.reject(error);
  }
);

// Interceptor per aggiungere token di autenticazione (se necessario in futuro)
apiClient.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('auth_token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => Promise.reject(error)
);

export default apiClient;
