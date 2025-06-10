
import React, { useState, useEffect } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { Trophy, Users, Calendar, Mail, User } from "lucide-react";
import { toast } from "@/hooks/use-toast";

const Fantagambla = () => {
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [timeLeft, setTimeLeft] = useState({
    days: 30,
    hours: 0,
    minutes: 0,
    seconds: 0
  });

  useEffect(() => {
    const timer = setInterval(() => {
      setTimeLeft(prev => {
        if (prev.seconds > 0) {
          return { ...prev, seconds: prev.seconds - 1 };
        } else if (prev.minutes > 0) {
          return { ...prev, minutes: prev.minutes - 1, seconds: 59 };
        } else if (prev.hours > 0) {
          return { ...prev, hours: prev.hours - 1, minutes: 59, seconds: 59 };
        } else if (prev.days > 0) {
          return { ...prev, days: prev.days - 1, hours: 23, minutes: 59, seconds: 59 };
        }
        return prev;
      });
    }, 1000);

    return () => clearInterval(timer);
  }, []);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!email || !name) {
      toast({
        title: "Compila tutti i campi",
        description: "Nome ed email sono obbligatori per la pre-registrazione",
        variant: "destructive"
      });
      return;
    }

    setIsSubmitting(true);

    setTimeout(() => {
      toast({
        title: "Pre-registrazione completata!",
        description: "Ti contatteremo non appena Fantagambla sarà disponibile."
      });
      setEmail("");
      setName("");
      setIsSubmitting(false);
    }, 1000);
  };

  return (
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section 
          className="py-20 relative overflow-hidden"
          style={{
            backgroundImage: 'linear-gradient(rgba(42, 9, 68, 0.8), rgba(10, 29, 55, 0.8)), url("https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80")',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundAttachment: 'fixed'
          }}
        >
          <div className="container px-4 sm:px-6 lg:px-8 text-center">
            <div className="max-w-4xl mx-auto">
              <h1 className="section-title mb-6">
                Fantasy Challenge: La Tua <span className="text-gambla-yellow">Squadra</span>, 
                la Tua <span className="text-gambla-orange">Gloria!</span>
              </h1>
              
              <p className="section-subtitle mx-auto mb-12">
                Costruisci la tua squadra ideale, sfida amici e competi per il titolo di campione. 
                Iscriviti ora per essere tra i primi a giocare quando lanceremo Fantagambla!
              </p>

              {/* Countdown */}
              <div className="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto mb-12">
                {[
                  { label: "Giorni", value: timeLeft.days },
                  { label: "Ore", value: timeLeft.hours },
                  { label: "Minuti", value: timeLeft.minutes },
                  { label: "Secondi", value: timeLeft.seconds }
                ].map((item, index) => (
                  <div key={index} className="bg-gray-800/50 backdrop-blur-sm rounded-xl p-4 border border-gray-700">
                    <div className="text-3xl md:text-4xl font-bold text-gambla-orange mb-2">
                      {item.value.toString().padStart(2, '0')}
                    </div>
                    <div className="text-gray-400 text-sm uppercase tracking-wide">
                      {item.label}
                    </div>
                  </div>
                ))}
              </div>

              <div className="text-lg text-gambla-yellow font-semibold mb-8">
                Disponibile tra {timeLeft.days} giorni
              </div>
            </div>
          </div>
        </section>

        {/* Features Section */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
              <div className="gambla-card text-center">
                <div className="w-16 h-16 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Trophy className="w-8 h-8 text-gambla-orange" />
                </div>
                <h3 className="text-xl font-display font-semibold text-white mb-3">
                  Competizioni Epiche
                </h3>
                <p className="text-gray-400">
                  Partecipa a leghe private e pubbliche, scala le classifiche e vinci premi esclusivi.
                </p>
              </div>

              <div className="gambla-card text-center">
                <div className="w-16 h-16 bg-gambla-pink/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Users className="w-8 h-8 text-gambla-pink" />
                </div>
                <h3 className="text-xl font-display font-semibold text-white mb-3">
                  Community Attiva
                </h3>
                <p className="text-gray-400">
                  Connettiti con altri fantallenatori, condividi strategie e analizza le performance.
                </p>
              </div>

              <div className="gambla-card text-center">
                <div className="w-16 h-16 bg-gambla-yellow/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Calendar className="w-8 h-8 text-gambla-yellow" />
                </div>
                <h3 className="text-xl font-display font-semibold text-white mb-3">
                  Aggiornamenti Real-time
                </h3>
                <p className="text-gray-400">
                  Statistiche live, formazioni ufficiali e notifiche istantanee sui tuoi giocatori.
                </p>
              </div>
            </div>

            {/* Pre-registration Form */}
            <div className="max-w-2xl mx-auto bg-gray-800/30 backdrop-blur-sm rounded-2xl p-8 border border-gray-700">
              <div className="text-center mb-8">
                <h2 className="text-3xl font-display font-bold text-white mb-4">
                  Pre-Registrati Ora
                </h2>
                <p className="text-gray-400">
                  Sii tra i primi a scoprire Fantagambla e ricevi accesso anticipato!
                </p>
              </div>

              <form onSubmit={handleSubmit} className="space-y-6">
                <div className="relative">
                  <User className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                  <input
                    type="text"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    placeholder="Il tuo nome"
                    className="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-gray-700 rounded-full text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300"
                    required
                  />
                </div>

                <div className="relative">
                  <Mail className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                  <input
                    type="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    placeholder="La tua email"
                    className="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-gray-700 rounded-full text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300"
                    required
                  />
                </div>

                <button
                  type="submit"
                  disabled={isSubmitting}
                  className="w-full gambla-btn-primary disabled:opacity-50 disabled:cursor-not-allowed"
                >
                  {isSubmitting ? "Pre-Registrazione in corso..." : "Pre-Registrati Ora"}
                </button>
              </form>

              <div className="text-center mt-8">
                <p className="text-gray-400">
                  Segui gli aggiornamenti su{" "}
                  <a 
                    href="https://instagram.com/gambla_it" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    className="text-gambla-pink hover:text-gambla-yellow transition-colors duration-300 font-semibold"
                  >
                    @gambla_it
                  </a>{" "}
                  e preparati a dominare!
                </p>
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Fantagambla;
