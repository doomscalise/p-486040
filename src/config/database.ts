
// Configurazione per il frontend - usa import.meta.env invece di process.env
export const dbConfig = {
  host: import.meta.env.VITE_DB_HOST || 'localhost',
  user: import.meta.env.VITE_DB_USER || '',
  password: import.meta.env.VITE_DB_PASSWORD || '',
  database: import.meta.env.VITE_DB_NAME || 'gambla_db',
  port: parseInt(import.meta.env.VITE_DB_PORT || '3306'),
  ssl: import.meta.env.VITE_DB_SSL === 'true' ? {
    rejectUnauthorized: false
  } : false
};

// URL base per le API - aggiornato per produzione
export const apiConfig = {
  baseURL: import.meta.env.VITE_API_URL || 'https://gambla.it/api',
  timeout: 15000, // Aumentato timeout per hosting condiviso
  retryAttempts: 3
};

// Configurazione per ambienti diversi
export const isProduction = import.meta.env.PROD;
export const isDevelopment = import.meta.env.DEV;

// Log solo in development
export const enableLogging = isDevelopment;
