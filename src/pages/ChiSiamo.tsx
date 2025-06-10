
import React from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { Heart, Target, Users, Zap } from "lucide-react";

const ChiSiamo = () => {
  return (
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="py-16 bg-gambla-gradient">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="text-center max-w-4xl mx-auto">
              <h1 className="section-title mb-6">
                Chi Siamo: La Tua <span className="bg-white/90 px-4 py-2 rounded-lg text-gambla-magenta border-2 border-gambla-magenta font-bold shadow-lg">Community Sportiva</span>
              </h1>
              <p className="section-subtitle mx-auto">
                Gambla.it nasce dalla passione per lo sport, unendo tifosi in una community globale. 
                La nostra missione? Portare l'emozione sportiva a ogni clic!
              </p>
            </div>
          </div>
        </section>

        {/* Story Section */}
        <section className="py-16">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
              <div>
                <h2 className="text-3xl font-display font-bold text-white mb-6">
                  La Nostra <span className="text-gambla-yellow">Storia</span>
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
                  className="w-full rounded-2xl shadow-2xl"
                />
                <div className="absolute inset-0 bg-gambla-gradient/20 rounded-2xl"></div>
              </div>
            </div>

            {/* Values */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              <div className="gambla-card text-center">
                <div className="w-16 h-16 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Heart className="w-8 h-8 text-gambla-orange" />
                </div>
                <h3 className="text-xl font-display font-semibold text-white mb-3">
                  Passione
                </h3>
                <p className="text-gray-400">
                  Lo sport è nel nostro DNA. Viviamo ogni emozione insieme alla nostra community.
                </p>
              </div>

              <div className="gambla-card text-center">
                <div className="w-16 h-16 bg-gambla-pink/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Users className="w-8 h-8 text-gambla-pink" />
                </div>
                <h3 className="text-xl font-display font-semibold text-white mb-3">
                  Community
                </h3>
                <p className="text-gray-400">
                  Crediamo nel potere delle connessioni umane attraverso lo sport.
                </p>
              </div>

              <div className="gambla-card text-center">
                <div className="w-16 h-16 bg-gambla-yellow/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Target className="w-8 h-8 text-gambla-yellow" />
                </div>
                <h3 className="text-xl font-display font-semibold text-white mb-3">
                  Innovazione
                </h3>
                <p className="text-gray-400">
                  Utilizziamo la tecnologia per migliorare l'esperienza sportiva.
                </p>
              </div>

              <div className="gambla-card text-center">
                <div className="w-16 h-16 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Zap className="w-8 h-8 text-gambla-orange" />
                </div>
                <h3 className="text-xl font-display font-semibold text-white mb-3">
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
        <section className="py-16 bg-gray-800/30">
          <div className="container px-4 sm:px-6 lg:px-8 text-center">
            <h2 className="text-3xl font-display font-bold text-white mb-8">
              La Nostra <span className="text-gambla-pink">Missione</span>
            </h2>
            <div className="max-w-4xl mx-auto">
              <p className="text-xl text-gray-300 mb-8 leading-relaxed">
                Vogliamo democratizzare l'accesso alle informazioni sportive, creare spazi di dibattito 
                costruttivo e offrire esperienze interattive che rendano ogni tifoso protagonista 
                della propria passione sportiva.
              </p>
              <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div className="text-center">
                  <div className="text-4xl font-bold text-gambla-orange mb-2">10K+</div>
                  <div className="text-gray-400">Utenti Attivi</div>
                </div>
                <div className="text-center">
                  <div className="text-4xl font-bold text-gambla-pink mb-2">500+</div>
                  <div className="text-gray-400">Articoli Pubblicati</div>
                </div>
                <div className="text-center">
                  <div className="text-4xl font-bold text-gambla-yellow mb-2">24/7</div>
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
