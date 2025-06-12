
// Configurazione connessione MySQL per Hostinger
export const dbConfig = {
  host: process.env.REACT_APP_DB_HOST || 'localhost',
  user: process.env.REACT_APP_DB_USER || 'root',
  password: process.env.REACT_APP_DB_PASSWORD || '',
  database: process.env.REACT_APP_DB_NAME || 'gambla_db',
  port: parseInt(process.env.REACT_APP_DB_PORT || '3306'),
  ssl: process.env.REACT_APP_DB_SSL === 'true' ? {
    rejectUnauthorized: false
  } : false
};

// URL base per le API
export const apiConfig = {
  baseURL: process.env.REACT_APP_API_URL || 'http://localhost:3001/api',
  timeout: 10000
};
