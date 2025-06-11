
import { useEffect } from 'react';

interface SEOHeadProps {
  title?: string;
  description?: string;
  keywords?: string;
  image?: string;
  url?: string;
  type?: string;
}

const SEOHead = ({ 
  title = "GAMBLA.it - Accendi la Tua Passione Sportiva",
  description = "Il portale sportivo #1 in Italia. Notizie live, fantacalcio, discussioni accese e contenuti esclusivi. Unisciti alla community più dinamica d'Italia.",
  keywords = "fantacalcio, calcio, serie a, sport, notizie sportive, community, pronostici, statistiche",
  image = "/new-og-image.png",
  url = "https://gambla.it",
  type = "website"
}: SEOHeadProps) => {
  
  useEffect(() => {
    // Aggiorna il titolo
    document.title = title;
    
    // Funzione helper per aggiornare o creare meta tag
    const updateMetaTag = (property: string, content: string, isProperty = false) => {
      const selector = isProperty ? `meta[property="${property}"]` : `meta[name="${property}"]`;
      let tag = document.querySelector(selector) as HTMLMetaElement;
      
      if (!tag) {
        tag = document.createElement('meta');
        if (isProperty) {
          tag.setAttribute('property', property);
        } else {
          tag.setAttribute('name', property);
        }
        document.head.appendChild(tag);
      }
      
      tag.setAttribute('content', content);
    };

    // Meta tag SEO base
    updateMetaTag('description', description);
    updateMetaTag('keywords', keywords);
    updateMetaTag('author', 'GAMBLA.it Team');
    updateMetaTag('robots', 'index, follow');
    updateMetaTag('viewport', 'width=device-width, initial-scale=1.0');

    // Open Graph (Facebook, LinkedIn, etc.)
    updateMetaTag('og:title', title, true);
    updateMetaTag('og:description', description, true);
    updateMetaTag('og:image', image, true);
    updateMetaTag('og:url', url, true);
    updateMetaTag('og:type', type, true);
    updateMetaTag('og:site_name', 'GAMBLA.it', true);
    updateMetaTag('og:locale', 'it_IT', true);

    // Twitter Card
    updateMetaTag('twitter:card', 'summary_large_image');
    updateMetaTag('twitter:title', title);
    updateMetaTag('twitter:description', description);
    updateMetaTag('twitter:image', image);
    updateMetaTag('twitter:site', '@gambla_it');

    // Meta tag aggiuntivi per il business
    updateMetaTag('theme-color', '#FF6B35');
    updateMetaTag('apple-mobile-web-app-capable', 'yes');
    updateMetaTag('apple-mobile-web-app-status-bar-style', 'black-translucent');

  }, [title, description, keywords, image, url, type]);

  return null;
};

export default SEOHead;
