
import React, { useState } from 'react';
import { Mail, CheckCircle, Loader } from 'lucide-react';
import { toast } from '@/components/ui/use-toast';
import { useAnalytics } from '@/components/Analytics';

interface NewsletterSignupProps {
  variant?: 'inline' | 'popup' | 'footer';
  className?: string;
}

const NewsletterSignup = ({ variant = 'inline', className = '' }: NewsletterSignupProps) => {
  const [email, setEmail] = useState('');
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [isSubscribed, setIsSubscribed] = useState(false);
  const { trackNewsletterSignup } = useAnalytics();

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    
    if (!email) {
      toast({
        title: "Email richiesta",
        description: "Inserisci la tua email per iscriverti alla newsletter",
        variant: "destructive",
      });
      return;
    }

    setIsSubmitting(true);

    try {
      // Simula chiamata API - da sostituire con Supabase
      await new Promise(resolve => setTimeout(resolve, 1500));
      
      // Track conversion
      trackNewsletterSignup(email);
      
      setIsSubscribed(true);
      toast({
        title: "Iscrizione completata!",
        description: "Riceverai le nostre migliori notizie sportive direttamente nella tua casella email.",
      });

      setEmail('');
    } catch (error) {
      toast({
        title: "Errore nell'iscrizione",
        description: "Si è verificato un errore. Riprova più tardi.",
        variant: "destructive",
      });
    } finally {
      setIsSubmitting(false);
    }
  };

  if (isSubscribed) {
    return (
      <div className={`flex items-center justify-center p-6 bg-green-50 rounded-lg ${className}`}>
        <CheckCircle className="w-6 h-6 text-green-500 mr-3" />
        <div>
          <p className="text-green-800 font-semibold">Iscrizione completata!</p>
          <p className="text-green-600 text-sm">Controlla la tua email per confermare l'iscrizione.</p>
        </div>
      </div>
    );
  }

  const getContent = () => {
    switch (variant) {
      case 'popup':
        return {
          title: "Non perdere nessuna notizia!",
          description: "Iscriviti alla newsletter di GAMBLA per ricevere news esclusive, pronostici e consigli per il fantacalcio.",
          buttonText: "Iscriviti Gratis"
        };
      case 'footer':
        return {
          title: "Newsletter GAMBLA",
          description: "Le migliori notizie sportive nella tua casella email",
          buttonText: "Iscriviti"
        };
      default:
        return {
          title: "Resta sempre aggiornato",
          description: "Ricevi news esclusive, analisi e consigli per il fantacalcio",
          buttonText: "Iscriviti alla Newsletter"
        };
    }
  };

  const content = getContent();

  return (
    <div className={`bg-gray-900/50 border border-gray-800 rounded-2xl p-6 ${className}`}>
      <div className="text-center mb-6">
        <div className="w-16 h-16 bg-gambla-gradient rounded-full flex items-center justify-center mx-auto mb-4">
          <Mail className="w-8 h-8 text-white" />
        </div>
        <h3 className="text-2xl font-display font-bold text-white mb-2">
          {content.title}
        </h3>
        <p className="text-gray-300">
          {content.description}
        </p>
      </div>

      <form onSubmit={handleSubmit} className="space-y-4">
        <div>
          <input
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            placeholder="La tua email..."
            className="w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:border-gambla-magenta focus:outline-none transition-colors"
            disabled={isSubmitting}
          />
        </div>

        <div className="bg-gambla-gradient p-1 rounded-xl">
          <button
            type="submit"
            disabled={isSubmitting}
            className="w-full bg-gambla-dark text-white font-bold py-3 rounded-xl hover:bg-gray-900 transition-colors disabled:opacity-50 flex items-center justify-center"
          >
            {isSubmitting ? (
              <>
                <Loader className="w-5 h-5 mr-2 animate-spin" />
                Iscrizione in corso...
              </>
            ) : (
              content.buttonText
            )}
          </button>
        </div>

        <p className="text-gray-400 text-xs text-center">
          Iscrivendoti accetti la nostra privacy policy. Potrai disiscriverti in qualsiasi momento.
        </p>
      </form>
    </div>
  );
};

export default NewsletterSignup;
