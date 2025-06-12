
-- Schema MySQL per GAMBLA
-- Equivalente alle tabelle Supabase esistenti

-- Creazione database
CREATE DATABASE IF NOT EXISTS gambla_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gambla_db;

-- Tabella categorie blog
CREATE TABLE blog_categories (
    id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    color VARCHAR(50) DEFAULT 'gambla-yellow',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabella articoli blog
CREATE TABLE blog_articles (
    id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
    title VARCHAR(500) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    author VARCHAR(255) NOT NULL,
    category_id VARCHAR(36),
    image TEXT,
    published BOOLEAN DEFAULT FALSE,
    featured BOOLEAN DEFAULT FALSE,
    tags JSON DEFAULT ('[]'),
    views INT DEFAULT 0,
    read_time VARCHAR(20) DEFAULT '5 min',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL
);

-- Tabella iscrizioni newsletter
CREATE TABLE newsletter_subscriptions (
    id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    active BOOLEAN DEFAULT TRUE,
    source VARCHAR(50) DEFAULT 'website'
);

-- Inserimento categorie di default
INSERT INTO blog_categories (id, name, slug, description, color) VALUES
(UUID(), 'Fantacalcio', 'fantacalcio', 'Guide e consigli per il fantacalcio', 'gambla-yellow'),
(UUID(), 'Mercato', 'mercato', 'News e analisi del mercato', 'gambla-orange'),
(UUID(), 'Tattiche', 'tattiche', 'Strategie e formazioni', 'gambla-magenta'),
(UUID(), 'Serie A', 'serie-a', 'Notizie dalla Serie A', 'gambla-yellow'),
(UUID(), 'News', 'news', 'Ultime notizie sportive', 'gambla-orange');

-- Inserimento articoli di esempio
INSERT INTO blog_articles (id, title, slug, excerpt, content, author, category_id, image, published, featured, tags) VALUES
(UUID(), 'Guida completa al fantacalcio 2024/25', 'guida-fantacalcio-2024-25', 'Tutto quello che devi sapere per dominare la tua lega', 'Contenuto completo dell''articolo con strategie avanzate...', 'Marco Rossi', 
 (SELECT id FROM blog_categories WHERE slug = 'fantacalcio' LIMIT 1), 
 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 
 TRUE, TRUE, JSON_ARRAY('fantacalcio', 'guida', 'Serie A')),

(UUID(), 'I migliori acquisti di gennaio', 'acquisti-gennaio-fantacalcio', 'Analisi del mercato invernale e consigli per i tuoi investimenti', 'Analisi dettagliata dei giocatori più promettenti...', 'Luca Bianchi',
 (SELECT id FROM blog_categories WHERE slug = 'mercato' LIMIT 1),
 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
 TRUE, FALSE, JSON_ARRAY('mercato', 'gennaio', 'consigli')),

(UUID(), 'Analisi tattica: la formazione perfetta', 'analisi-tattica-formazione-perfetta', 'Strategie avanzate per massimizzare i punti ogni giornata', 'Guida completa alle formazioni più efficaci...', 'Andrea Verdi',
 (SELECT id FROM blog_categories WHERE slug = 'tattiche' LIMIT 1),
 'https://images.unsplash.com/photo-1543326727-cf6c39e8f84c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
 TRUE, TRUE, JSON_ARRAY('tattiche', 'formazione', 'strategia'));

-- Indici per performance
CREATE INDEX idx_blog_articles_published ON blog_articles(published);
CREATE INDEX idx_blog_articles_featured ON blog_articles(featured);
CREATE INDEX idx_blog_articles_category ON blog_articles(category_id);
CREATE INDEX idx_blog_articles_slug ON blog_articles(slug);
CREATE INDEX idx_blog_categories_slug ON blog_categories(slug);
CREATE INDEX idx_newsletter_email ON newsletter_subscriptions(email);
