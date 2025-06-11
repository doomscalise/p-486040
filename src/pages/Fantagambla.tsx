
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import FantaDashboard from "@/components/FantaDashboard";
import PreRegistrationForm from "@/components/PreRegistrationForm";
import { Trophy, Users, Zap, Target, ArrowRight, Star } from "lucide-react";

const Fantagambla = () => {
  const [showPreRegistration, setShowPreRegistration] = useState(false);

  const features = [
    {
      icon: Trophy,
      title: "Competizioni Esclusive",
      description: "Partecipa ai nostri tornei settimanali e mensili",
      color: "gambla-yellow"
    },
    {
      icon: Users,
      title: "Community Attiva",
      description: "Confrontati con altri appassionati di fantacalcio",
      color: "gambla-magenta"
    },
    {
      icon: Zap,
      title: "Statistiche Avanzate",
      description: "Analisi dettagliate per migliorare le tue performance",
      color: "gambla-orange"
    },
    {
      icon: Target,
      title: "Pronostici AI",
      description: "Suggerimenti intelligenti per la tua formazione",
      color: "gambla-yellow"
    }
  ];

  return (
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="py-20 bg-gambla-dark relative overflow-hidden">
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

          <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="text-center max-w-4xl mx-auto mb-16">
              <div className="inline-block px-6 py-3 bg-gambla-gradient rounded-full text-white text-sm font-semibold mb-8 animate-pulse-slow">
                🎮 Nuovo: Stagione 2024/25
              </div>
              
              <h1 className="text-4xl md:text-6xl font-display font-bold text-white mb-6 leading-tight">
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Fantagambla
                </span>
                <br />Il Futuro del Fantasy
              </h1>
              
              <p className="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Unisciti alla rivoluzione del fantacalcio. Statistiche avanzate, AI e community in un'unica piattaforma.
              </p>

              <div className="flex flex-col sm:flex-row gap-6 justify-center mb-16">
                <button 
                  onClick={() => setShowPreRegistration(true)}
                  className="gambla-btn-primary flex items-center justify-center group"
                >
                  Inizia a Giocare
                  <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
                </button>
                
                <button className="gambla-btn-secondary flex items-center justify-center group">
                  <Star className="mr-2 w-5 h-5" />
                  Scopri le Features
                </button>
              </div>
            </div>

            {/* Dashboard Preview */}
            <FantaDashboard />
          </div>
        </section>

        {/* Features Section */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <h2 className="text-3xl md:text-5xl font-display font-bold text-white text-center mb-12">
              Perché Scegliere <span className="text-transparent bg-clip-text bg-gambla-gradient">Fantagambla</span>
            </h2>
            
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              {features.map((feature, index) => (
                <div key={index} className="gambla-card text-center group hover:scale-105 transition-all duration-300">
                  <div className={`w-16 h-16 bg-${feature.color}/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300`}>
                    <feature.icon className={`w-8 h-8 text-${feature.color}`} />
                  </div>
                  <h3 className="text-xl font-bold text-white mb-3">{feature.title}</h3>
                  <p className="text-gray-400">{feature.description}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* CTA Section */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="bg-gambla-gradient p-1 rounded-3xl">
              <div className="bg-gambla-dark p-12 rounded-3xl text-center">
                <h3 className="text-3xl md:text-4xl font-display font-bold text-white mb-6">
                  Pronto per la Sfida?
                </h3>
                <p className="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                  Unisciti a migliaia di giocatori che hanno già scelto Fantagambla per la loro esperienza fantasy.
                </p>
                <button 
                  onClick={() => setShowPreRegistration(true)}
                  className="gambla-btn-tertiary text-lg px-8 py-4"
                >
                  Registrati Ora - È Gratis!
                </button>
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
      
      <PreRegistrationForm 
        isOpen={showPreRegistration}
        onClose={() => setShowPreRegistration(false)}
      />
    </div>
  );
};

export default Fantagambla;
