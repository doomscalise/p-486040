
import React, { useState, useEffect } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { Trophy, Users, Calendar, Mail, User, ArrowRight, Play, Star } from "lucide-react";
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
    <div className="min-h-screen bg-black">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="min-h-screen bg-black relative overflow-hidden">
          {/* Grid pattern background */}
          <div className="absolute inset-0 opacity-10">
            <div className="absolute inset-0" style={{
              backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
              backgroundSize: '50px 50px'
            }}></div>
          </div>

          {/* Floating elements */}
          <div className="absolute top-20 right-20 w-32 h-32 bg-gambla-magenta/20 rounded-full blur-xl animate-float"></div>
          <div className="absolute bottom-40 left-20 w-40 h-40 bg-gambla-orange/20 rounded-full blur-xl animate-float" style={{ animationDelay: '2s' }}></div>
          <div className="absolute top-60 left-1/4 w-24 h-24 bg-gambla-yellow/20 rounded-full blur-xl animate-float" style={{ animationDelay: '4s' }}></div>

          <div className="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="grid lg:grid-cols-2 gap-12 items-center min-h-screen">
              {/* Left side - Content */}
              <div className="space-y-8">
                <div className="space-y-6">
                  <div className="inline-block px-4 py-2 bg-gambla-gradient rounded-full text-white text-sm font-semibold animate-pulse-slow">
                    🏆 Fantasy Challenge in Arrivo!
                  </div>
                  
                  <h1 className="text-4xl md:text-6xl lg:text-7xl font-display font-bold text-white leading-tight">
                    Fantasy Challenge:{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      La Tua Squadra
                    </span>
                    , la Tua{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      Gloria!
                    </span>
                  </h1>
                  
                  <p className="text-xl text-gray-300 leading-relaxed max-w-2xl">
                    Costruisci la tua squadra ideale, sfida amici e competi per il titolo di campione. 
                    Iscriviti ora per essere tra i primi a giocare!
                  </p>
                </div>

                {/* Countdown */}
                <div className="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl">
                  {[
                    { label: "Giorni", value: timeLeft.days },
                    { label: "Ore", value: timeLeft.hours },
                    { label: "Minuti", value: timeLeft.minutes },
                    { label: "Secondi", value: timeLeft.seconds }
                  ].map((item, index) => (
                    <div key={index} className="bg-gradient-to-br from-gray-900 to-gray-800 rounded-xl p-4 border border-gray-700 hover:border-gambla-magenta/50 transition-all duration-300 hover:transform hover:scale-105">
                      <div className="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">
                        {item.value.toString().padStart(2, '0')}
                      </div>
                      <div className="text-gray-400 text-sm uppercase tracking-wide">
                        {item.label}
                      </div>
                    </div>
                  ))}
                </div>

                <div className="flex flex-col sm:flex-row gap-4">
                  <button className="gambla-btn-primary flex items-center justify-center group">
                    Pre-Registrati Ora
                    <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
                  </button>
                  
                  <button className="flex items-center justify-center px-6 py-3 text-white border-2 border-gray-600 rounded-full hover:border-white transition-colors">
                    <Play className="mr-2 w-5 h-5" />
                    Anteprima Demo
                  </button>
                </div>

                {/* Stats */}
                <div className="grid grid-cols-3 gap-6 pt-8">
                  <div className="text-center">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient">1000+</div>
                    <div className="text-gray-400 text-sm">Pre-Registrati</div>
                  </div>
                  <div className="text-center">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient">24/7</div>
                    <div className="text-gray-400 text-sm">Live Updates</div>
                  </div>
                  <div className="text-center">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient">∞</div>
                    <div className="text-gray-400 text-sm">Divertimento</div>
                  </div>
                </div>
              </div>

              {/* Right side - Interactive Preview */}
              <div className="relative">
                <div className="relative z-10">
                  <div className="bg-gambla-gradient p-8 rounded-3xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <div className="bg-black p-6 rounded-2xl">
                      <h3 className="text-white font-bold text-xl mb-4 flex items-center">
                        <Trophy className="mr-2 w-6 h-6 text-gambla-yellow" />
                        Fantasy Preview
                      </h3>
                      <div className="space-y-3">
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white flex items-center">
                            <Star className="mr-2 w-4 h-4 text-gambla-yellow" />
                            Il Tuo Team
                          </span>
                          <span className="text-gambla-orange font-bold">1° Posto</span>
                        </div>
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white">Lega Amici</span>
                          <span className="text-gambla-magenta font-bold">ATTIVA</span>
                        </div>
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white">Prossima Giornata</span>
                          <span className="text-gray-400">Dom 15:00</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Features Section */}
        <section className="py-16 bg-black relative">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="text-center mb-16">
              <h2 className="text-3xl md:text-5xl font-display font-bold text-white mb-6">
                Perché Scegliere{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Fantagambla?
                </span>
              </h2>
              <p className="text-xl text-gray-300 max-w-3xl mx-auto">
                Un'esperienza fantasy completamente nuova che ti farà vivere il calcio come mai prima
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
              <div className="gambla-card text-center group">
                <div className="w-20 h-20 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                  <Trophy className="w-10 h-10 text-gambla-orange" />
                </div>
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Competizioni Epiche
                </h3>
                <p className="text-gray-400 leading-relaxed">
                  Partecipa a leghe private e pubbliche, scala le classifiche e vinci premi esclusivi.
                </p>
              </div>

              <div className="gambla-card text-center group">
                <div className="w-20 h-20 bg-gambla-magenta/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                  <Users className="w-10 h-10 text-gambla-magenta" />
                </div>
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Community Attiva
                </h3>
                <p className="text-gray-400 leading-relaxed">
                  Connettiti con altri fantallenatori, condividi strategie e analizza le performance.
                </p>
              </div>

              <div className="gambla-card text-center group">
                <div className="w-20 h-20 bg-gambla-yellow/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                  <Calendar className="w-10 h-10 text-gambla-yellow" />
                </div>
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Aggiornamenti Real-time
                </h3>
                <p className="text-gray-400 leading-relaxed">
                  Statistiche live, formazioni ufficiali e notifiche istantanee sui tuoi giocatori.
                </p>
              </div>
            </div>

            {/* Pre-registration Form */}
            <div className="max-w-2xl mx-auto bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-8 border border-gray-700 relative overflow-hidden">
              <div className="absolute top-0 right-0 w-32 h-32 bg-gambla-gradient opacity-10 rounded-full blur-xl"></div>
              
              <div className="text-center mb-8 relative z-10">
                <h2 className="text-3xl font-display font-bold text-white mb-4">
                  Pre-Registrati Ora
                </h2>
                <p className="text-gray-400">
                  Sii tra i primi a scoprire Fantagambla e ricevi accesso anticipato!
                </p>
              </div>

              <form onSubmit={handleSubmit} className="space-y-6 relative z-10">
                <div className="relative">
                  <User className="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                  <input
                    type="text"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    placeholder="Il tuo nome"
                    className="w-full pl-12 pr-4 py-4 bg-gray-800/70 border border-gray-600 rounded-full text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300 hover:bg-gray-700/70"
                    required
                  />
                </div>

                <div className="relative">
                  <Mail className="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                  <input
                    type="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    placeholder="La tua email"
                    className="w-full pl-12 pr-4 py-4 bg-gray-800/70 border border-gray-600 rounded-full text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300 hover:bg-gray-700/70"
                    required
                  />
                </div>

                <button
                  type="submit"
                  disabled={isSubmitting}
                  className="w-full gambla-btn-primary disabled:opacity-50 disabled:cursor-not-allowed text-lg py-4"
                >
                  {isSubmitting ? "Pre-Registrazione in corso..." : "Pre-Registrati Ora"}
                </button>
              </form>

              <div className="text-center mt-8 relative z-10">
                <p className="text-gray-400">
                  Segui gli aggiornamenti su{" "}
                  <a 
                    href="https://www.instagram.com/gambla.it?igsh=MWJxOTQxcmt5b3p6Mg==" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    className="text-gambla-magenta hover:text-gambla-yellow transition-colors duration-300 font-semibold"
                  >
                    @gambla.it
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
