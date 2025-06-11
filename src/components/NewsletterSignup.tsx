
import React, { useState } from "react";
import { Mail, Check } from "lucide-react";

interface NewsletterSignupProps {
  variant?: "inline" | "modal";
}

const NewsletterSignup = ({ variant = "inline" }: NewsletterSignupProps) => {
  const [email, setEmail] = useState("");
  const [isSubscribed, setIsSubscribed] = useState(false);
  const [isLoading, setIsLoading] = useState(false);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!email) return;

    setIsLoading(true);
    
    // Simula chiamata API
    setTimeout(() => {
      setIsSubscribed(true);
      setIsLoading(false);
      setEmail("");
    }, 1500);
  };

  if (isSubscribed) {
    return (
      <div className="text-center py-8">
        <div className="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-full mb-4">
          <Check className="w-8 h-8 text-white" />
        </div>
        <h3 className="text-2xl font-display font-bold text-white mb-2">
          Benvenuto nella famiglia GAMBLA! 🎉
        </h3>
        <p className="text-gray-300">
          Riceverai le nostre migliori notizie sportive direttamente nella tua inbox.
        </p>
      </div>
    );
  }

  return (
    <div className={`${variant === "inline" ? "animate-on-scroll" : ""}`}>
      <div className="text-center mb-8">
        <div className="inline-block px-6 py-3 bg-gambla-gradient/20 rounded-full text-gambla-yellow text-sm font-semibold mb-6">
          📧 Newsletter Esclusiva
        </div>
        
        <h2 className="text-3xl md:text-4xl font-display font-bold text-white mb-4">
          Non Perdere{" "}
          <span className="text-transparent bg-clip-text bg-gambla-gradient">
            Nessuna Notizia
          </span>
        </h2>
        
        <p className="text-lg text-gray-300 max-w-xl mx-auto">
          Iscriviti alla nostra newsletter e ricevi aggiornamenti esclusivi, 
          pronostici premium e le ultime dal mondo del fantacalcio.
        </p>
      </div>

      <form onSubmit={handleSubmit} className="max-w-md mx-auto">
        <div className="flex flex-col sm:flex-row gap-3">
          <div className="flex-1 relative">
            <Mail className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
            <input
              type="email"
              placeholder="La tua email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              className="w-full pl-10 pr-4 py-3 bg-white/10 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-magenta focus:border-transparent transition-all duration-300"
              required
            />
          </div>
          <button
            type="submit"
            disabled={isLoading}
            className="gambla-btn-primary whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed"
          >
            {isLoading ? (
              <div className="flex items-center space-x-2">
                <div className="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                <span>Iscrizione...</span>
              </div>
            ) : (
              "Iscriviti Gratis"
            )}
          </button>
        </div>
        
        <p className="text-xs text-gray-400 mt-3 text-center">
          🔒 I tuoi dati sono al sicuro. Niente spam, solo contenuti di qualità.
        </p>
      </form>

      {/* Benefits */}
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        {[
          { icon: "⚡", title: "News Istantanee", desc: "Aggiornamenti in tempo reale" },
          { icon: "🏆", title: "Pronostici Premium", desc: "Analisi esclusive dei match" },
          { icon: "🎯", title: "Tips Fantacalcio", desc: "Consigli per vincere le leghe" }
        ].map((benefit, index) => (
          <div 
            key={index}
            className="text-center p-4 bg-white/5 rounded-lg border border-gray-700 hover:border-gambla-magenta/50 transition-colors duration-300"
          >
            <div className="text-2xl mb-2">{benefit.icon}</div>
            <h4 className="text-white font-semibold mb-1">{benefit.title}</h4>
            <p className="text-gray-400 text-sm">{benefit.desc}</p>
          </div>
        ))}
      </div>
    </div>
  );
};

export default NewsletterSignup;
