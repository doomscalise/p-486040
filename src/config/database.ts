
// Configurazione per il frontend - usa import.meta.env invece di process.env
export const dbConfig = {
  host: import.meta.env.VITE_DB_HOST || 'localhost',
  user: import.meta.env.VITE_DB_USER || 'root',
  password: import.meta.env.VITE_DB_PASSWORD || '',
  database: import.meta.env.VITE_DB_NAME || 'gambla_db',
  port: parseInt(import.meta.env.VITE_DB_PORT || '3306'),
  ssl: import.meta.env.VITE_DB_SSL === 'true' ? {
    rejectUnauthorized: false
  } : false
};

// URL base per le API
export const apiConfig = {
  baseURL: import.meta.env.VITE_API_URL || 'http://localhost:3001/api',
  timeout: 10000
};
