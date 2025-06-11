
-- Creazione tabella per le categorie del blog
CREATE TABLE public.blog_categories (
  id UUID NOT NULL DEFAULT gen_random_uuid() PRIMARY KEY,
  name TEXT NOT NULL,
  slug TEXT NOT NULL UNIQUE,
  description TEXT,
  color TEXT DEFAULT 'gambla-yellow',
  created_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT now()
);

-- Creazione tabella per gli articoli del blog
CREATE TABLE public.blog_articles (
  id UUID NOT NULL DEFAULT gen_random_uuid() PRIMARY KEY,
  title TEXT NOT NULL,
  slug TEXT NOT NULL UNIQUE,
  excerpt TEXT NOT NULL,
  content TEXT NOT NULL,
  author TEXT NOT NULL,
  category_id UUID REFERENCES public.blog_categories(id),
  image TEXT,
  published BOOLEAN DEFAULT false,
  featured BOOLEAN DEFAULT false,
  tags TEXT[] DEFAULT '{}',
  views INTEGER DEFAULT 0,
  read_time TEXT DEFAULT '5 min',
  created_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT now(),
  updated_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT now()
);

-- Creazione tabella per le iscrizioni alla newsletter
CREATE TABLE public.newsletter_subscriptions (
  id UUID NOT NULL DEFAULT gen_random_uuid() PRIMARY KEY,
  email TEXT NOT NULL UNIQUE,
  subscribed_at TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT now(),
  active BOOLEAN DEFAULT true,
  source TEXT DEFAULT 'website'
);

-- Inserimento delle categorie di default
INSERT INTO public.blog_categories (name, slug, description, color) VALUES
('Fantacalcio', 'fantacalcio', 'Guide e consigli per il fantacalcio', 'gambla-yellow'),
('Mercato', 'mercato', 'News e analisi del mercato', 'gambla-orange'),
('Tattiche', 'tattiche', 'Strategie e formazioni', 'gambla-magenta'),
('Serie A', 'serie-a', 'Notizie dalla Serie A', 'gambla-yellow'),
('News', 'news', 'Ultime notizie sportive', 'gambla-orange');

-- Inserimento di alcuni articoli di esempio
INSERT INTO public.blog_articles (title, slug, excerpt, content, author, category_id, image, published, featured, tags) VALUES
('Guida completa al fantacalcio 2024/25', 'guida-fantacalcio-2024-25', 'Tutto quello che devi sapere per dominare la tua lega', 'Contenuto completo dell''articolo con strategie avanzate...', 'Marco Rossi', (SELECT id FROM public.blog_categories WHERE slug = 'fantacalcio'), 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', true, true, ARRAY['fantacalcio', 'guida', 'Serie A']),
('I migliori acquisti di gennaio', 'acquisti-gennaio-fantacalcio', 'Analisi del mercato invernale e consigli per i tuoi investimenti', 'Analisi dettagliata dei giocatori più promettenti...', 'Luca Bianchi', (SELECT id FROM public.blog_categories WHERE slug = 'mercato'), 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', true, false, ARRAY['mercato', 'gennaio', 'consigli']),
('Analisi tattica: la formazione perfetta', 'analisi-tattica-formazione-perfetta', 'Strategie avanzate per massimizzare i punti ogni giornata', 'Guida completa alle formazioni più efficaci...', 'Andrea Verdi', (SELECT id FROM public.blog_categories WHERE slug = 'tattiche'), 'https://images.unsplash.com/photo-1543326727-cf6c39e8f84c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', true, true, ARRAY['tattiche', 'formazione', 'strategia']);

-- Abilita Row Level Security (RLS) per le tabelle
ALTER TABLE public.blog_articles ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.blog_categories ENABLE ROW LEVEL SECURITY;
ALTER TABLE public.newsletter_subscriptions ENABLE ROW LEVEL SECURITY;

-- Policy per permettere a tutti di leggere gli articoli pubblicati
CREATE POLICY "Tutti possono leggere articoli pubblicati" 
  ON public.blog_articles 
  FOR SELECT 
  USING (published = true);

-- Policy per permettere a tutti di leggere le categorie
CREATE POLICY "Tutti possono leggere le categorie" 
  ON public.blog_categories 
  FOR SELECT 
  USING (true);

-- Policy per permettere inserimenti nella newsletter
CREATE POLICY "Tutti possono iscriversi alla newsletter" 
  ON public.newsletter_subscriptions 
  FOR INSERT 
  WITH CHECK (true);
