
import { useEffect } from 'react';
import { useLocation } from 'react-router-dom';

interface AnalyticsEvent {
  event: string;
  category: string;
  action: string;
  label?: string;
  value?: number;
}

declare global {
  interface Window {
    gtag: (command: string, ...args: any[]) => void;
    fbq: (command: string, ...args: any[]) => void;
  }
}

const Analytics = () => {
  const location = useLocation();

  useEffect(() => {
    // Google Analytics
    const GA_TRACKING_ID = 'G-XXXXXXXXXX'; // Da sostituire con ID reale
    
    // Carica Google Analytics
    const loadGoogleAnalytics = () => {
      const script1 = document.createElement('script');
      script1.async = true;
      script1.src = `https://www.googletagmanager.com/gtag/js?id=${GA_TRACKING_ID}`;
      document.head.appendChild(script1);

      const script2 = document.createElement('script');
      script2.innerHTML = `
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '${GA_TRACKING_ID}', {
          page_title: document.title,
          page_location: window.location.href,
        });
      `;
      document.head.appendChild(script2);
    };

    // Meta Pixel (Facebook)
    const loadMetaPixel = () => {
      const PIXEL_ID = 'XXXXXXXXXXXXXXXXX'; // Da sostituire con ID reale
      
      const script = document.createElement('script');
      script.innerHTML = `
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '${PIXEL_ID}');
        fbq('track', 'PageView');
      `;
      document.head.appendChild(script);
    };

    loadGoogleAnalytics();
    loadMetaPixel();
  }, []);

  // Track page views
  useEffect(() => {
    if (typeof window.gtag !== 'undefined') {
      window.gtag('config', 'G-XXXXXXXXXX', {
        page_path: location.pathname + location.search,
      });
    }

    if (typeof window.fbq !== 'undefined') {
      window.fbq('track', 'PageView');
    }
  }, [location]);

  return null;
};

// Hook per tracking eventi personalizzati
export const useAnalytics = () => {
  const trackEvent = ({ event, category, action, label, value }: AnalyticsEvent) => {
    // Google Analytics
    if (typeof window.gtag !== 'undefined') {
      window.gtag('event', action, {
        event_category: category,
        event_label: label,
        value: value,
      });
    }

    // Meta Pixel
    if (typeof window.fbq !== 'undefined') {
      window.fbq('track', event, {
        category,
        action,
        label,
        value
      });
    }

    console.log('Analytics Event:', { event, category, action, label, value });
  };

  const trackFantacalcioInterest = () => {
    trackEvent({
      event: 'FantacalcioInterest',
      category: 'Engagement',
      action: 'fantagambla_click',
      label: 'Homepage CTA'
    });
  };

  const trackNewsletterSignup = (email: string) => {
    trackEvent({
      event: 'Lead',
      category: 'Conversion',
      action: 'newsletter_signup',
      label: email
    });
  };

  const trackPreRegistration = () => {
    trackEvent({
      event: 'Lead',
      category: 'Conversion',
      action: 'pre_registration',
      label: 'Fantagambla Pre-Registration'
    });
  };

  return {
    trackEvent,
    trackFantacalcioInterest,
    trackNewsletterSignup,
    trackPreRegistration
  };
};

export default Analytics;
