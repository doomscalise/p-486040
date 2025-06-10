
import React from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { Heart, Target, Users, Zap, Star, Trophy, Gamepad2 } from "lucide-react";

const ChiSiamo = () => {
  return (
    <div className="min-h-screen bg-black">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section with enhanced design */}
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
                    ⚡ La Nostra Storia
                  </div>
                  
                  <h1 className="text-4xl md:text-6xl lg:text-7xl font-display font-bold text-white leading-tight">
                    Chi Siamo:{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      La Tua Community
                    </span>{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      Sportiva
                    </span>
                  </h1>
                  
                  <p className="text-xl text-gray-300 leading-relaxed max-w-2xl">
                    Gambla.it nasce dalla passione per lo sport, unendo tifosi in una community globale. 
                    La nostra missione? Portare l'emozione sportiva a ogni clic!
                  </p>
                </div>

                {/* Stats */}
                <div className="grid grid-cols-3 gap-6 pt-8">
                  <div className="text-center">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient">10K+</div>
                    <div className="text-gray-400 text-sm">Utenti Attivi</div>
                  </div>
                  <div className="text-center">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient">500+</div>
                    <div className="text-gray-400 text-sm">Articoli</div>
                  </div>
                  <div className="text-center">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient">24/7</div>
                    <div className="text-gray-400 text-sm">Supporto</div>
                  </div>
                </div>

                <div className="flex flex-col sm:flex-row gap-4">
                  <button className="gambla-btn-primary flex items-center justify-center group">
                    Unisciti a Noi
                    <Users className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
                  </button>
                  
                  <button className="flex items-center justify-center px-6 py-3 text-white border-2 border-gray-600 rounded-full hover:border-white transition-colors">
                    <Star className="mr-2 w-5 h-5" />
                    La Nostra Missione
                  </button>
                </div>
              </div>

              {/* Right side - Interactive Preview */}
              <div className="relative">
                <div className="relative z-10">
                  <div className="bg-gambla-gradient p-8 rounded-3xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <div className="bg-black p-6 rounded-2xl">
                      <h3 className="text-white font-bold text-xl mb-4 flex items-center">
                        <Trophy className="mr-2 w-6 h-6 text-gambla-yellow" />
                        I Nostri Valori
                      </h3>
                      <div className="space-y-3">
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white flex items-center">
                            <Heart className="mr-2 w-4 h-4 text-gambla-orange" />
                            Passione
                          </span>
                          <span className="text-gambla-orange font-bold">100%</span>
                        </div>
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white flex items-center">
                            <Users className="mr-2 w-4 h-4 text-gambla-magenta" />
                            Community
                          </span>
                          <span className="text-gambla-magenta font-bold">ATTIVA</span>
                        </div>
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white flex items-center">
                            <Zap className="mr-2 w-4 h-4 text-gambla-yellow" />
                            Innovazione
                          </span>
                          <span className="text-gray-400">Sempre</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Story Section */}
        <section className="py-16 bg-black relative">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
              <div>
                <h2 className="text-3xl md:text-5xl font-display font-bold text-white mb-6">
                  La Nostra <span className="text-transparent bg-clip-text bg-gambla-gradient">Storia</span>
                </h2>
                <p className="text-gray-300 mb-6 leading-relaxed">
                  Tutto è iniziato con una semplice idea: creare uno spazio dove la passione sportiva 
                  potesse unire persone da tutto il mondo. Gambla.it è nato nel 2024 dall'entusiasmo 
                  di un gruppo di appassionati che credeva nel potere dello sport di creare connessioni autentiche.
                </p>
                <p className="text-gray-300 mb-6 leading-relaxed">
                  Oggi siamo una community in crescita che abbraccia calcio, tennis e tutti gli sport 
                  che accendono l'adrenalina. Il nostro obiettivo è semplice ma ambizioso: 
                  diventare il punto di riferimento per tutti gli sportivi italiani e internazionali.
                </p>
                <button className="gambla-btn-primary">
                  Scopri di Più
                </button>
              </div>
              <div className="relative">
                <img 
                  src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                  alt="Team sportivo"
                  className="w-full rounded-2xl shadow-2xl transform hover:scale-105 transition-transform duration-500"
                />
                <div className="absolute inset-0 bg-gambla-gradient/20 rounded-2xl"></div>
              </div>
            </div>

            {/* Values */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              <div className="gambla-card text-center group">
                <div className="w-20 h-20 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                  <Heart className="w-10 h-10 text-gambla-orange" />
                </div>
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Passione
                </h3>
                <p className="text-gray-400">
                  Lo sport è nel nostro DNA. Viviamo ogni emozione insieme alla nostra community.
                </p>
              </div>

              <div className="gambla-card text-center group">
                <div className="w-20 h-20 bg-gambla-magenta/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                  <Users className="w-10 h-10 text-gambla-magenta" />
                </div>
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Community
                </h3>
                <p className="text-gray-400">
                  Crediamo nel potere delle connessioni umane attraverso lo sport.
                </p>
              </div>

              <div className="gambla-card text-center group">
                <div className="w-20 h-20 bg-gambla-yellow/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                  <Target className="w-10 h-10 text-gambla-yellow" />
                </div>
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Innovazione
                </h3>
                <p className="text-gray-400">
                  Utilizziamo la tecnologia per migliorare l'esperienza sportiva.
                </p>
              </div>

              <div className="gambla-card text-center group">
                <div className="w-20 h-20 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                  <Zap className="w-10 h-10 text-gambla-orange" />
                </div>
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Energia
                </h3>
                <p className="text-gray-400">
                  Portiamo sempre il massimo entusiasmo in tutto quello che facciamo.
                </p>
              </div>
            </div>
          </div>
        </section>

        {/* Mission Section */}
        <section className="py-16 bg-gray-800/30 relative">
          <div className="absolute inset-0 opacity-5">
            <div className="absolute inset-0" style={{
              backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
              backgroundSize: '30px 30px'
            }}></div>
          </div>
          
          <div className="container px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 className="text-3xl md:text-5xl font-display font-bold text-white mb-8">
              La Nostra <span className="text-transparent bg-clip-text bg-gambla-gradient">Missione</span>
            </h2>
            <div className="max-w-4xl mx-auto">
              <p className="text-xl text-gray-300 mb-8 leading-relaxed">
                Vogliamo democratizzare l'accesso alle informazioni sportive, creare spazi di dibattito 
                costruttivo e offrire esperienze interattive che rendano ogni tifoso protagonista 
                della propria passione sportiva.
              </p>
              <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div className="gambla-card text-center">
                  <div className="text-4xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">10K+</div>
                  <div className="text-gray-400">Utenti Attivi</div>
                </div>
                <div className="gambla-card text-center">
                  <div className="text-4xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">500+</div>
                  <div className="text-gray-400">Articoli Pubblicati</div>
                </div>
                <div className="gambla-card text-center">
                  <div className="text-4xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">24/7</div>
                  <div className="text-gray-400">Supporto Community</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default ChiSiamo;
