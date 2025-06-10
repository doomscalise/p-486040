
import React from "react";
import { ArrowRight, Star, Users, Zap } from "lucide-react";
import { Link } from "react-router-dom";

const BottomCTA = () => {
  return (
    <section className="py-20 bg-gambla-dark relative overflow-hidden">
      {/* Background Pattern */}
      <div className="absolute inset-0 opacity-5">
        <div className="absolute inset-0" style={{
          backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
          backgroundSize: '40px 40px'
        }}></div>
      </div>

      {/* Floating elements */}
      <div className="absolute top-10 right-20 w-32 h-32 bg-gambla-magenta/10 rounded-full blur-xl animate-float"></div>
      <div className="absolute bottom-20 left-20 w-40 h-40 bg-gambla-orange/10 rounded-full blur-xl animate-float" style={{ animationDelay: '3s' }}></div>

      <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="text-center max-w-4xl mx-auto">
          <div className="inline-block px-6 py-3 bg-gambla-gradient rounded-full text-white text-sm font-semibold mb-8 animate-pulse-slow">
            🚀 Unisciti alla Community
          </div>
          
          <h2 className="text-4xl md:text-6xl font-display font-bold text-white mb-6 leading-tight">
            Pronto a Vivere lo Sport in{" "}
            <span className="text-transparent bg-clip-text bg-gambla-gradient">
              Prima Persona?
            </span>
          </h2>
          
          <p className="text-xl text-gray-300 mb-12 max-w-2xl mx-auto leading-relaxed">
            Seguici su{" "}
            <a 
              href="https://www.instagram.com/gambla.it?igsh=MWJxOTQxcmt5b3p6Mg==" 
              target="_blank" 
              rel="noopener noreferrer"
              className="text-transparent bg-clip-text bg-gambla-gradient hover:text-gambla-yellow transition-colors duration-300 font-semibold"
            >
              @gambla.it
            </a>
          </p>

          <div className="flex flex-col sm:flex-row gap-6 justify-center mb-16">
            <Link to="/blog" className="gambla-btn-primary flex items-center justify-center group">
              Esplora il Blog
              <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
            </Link>
            
            <Link to="/fantagambla" className="gambla-btn-secondary flex items-center justify-center group">
              <Zap className="mr-2 w-5 h-5" />
              Prova Fantagambla
              <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
            </Link>
          </div>

          {/* Features Grid */}
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="bg-gray-900/30 border border-gray-800 rounded-2xl p-8 hover:border-gambla-magenta/50 transition-all duration-300 group">
              <div className="w-16 h-16 bg-gambla-magenta/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                <Users className="w-8 h-8 text-gambla-magenta" />
              </div>
              <h3 className="text-2xl font-display font-semibold text-white mb-4">
                Community Attiva
              </h3>
              <p className="text-gray-400">
                Partecipa alle discussioni più accese del panorama sportivo italiano
              </p>
            </div>

            <div className="bg-gray-900/30 border border-gray-800 rounded-2xl p-8 hover:border-gambla-orange/50 transition-all duration-300 group">
              <div className="w-16 h-16 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                <Star className="w-8 h-8 text-gambla-orange" />
              </div>
              <h3 className="text-2xl font-display font-semibold text-white mb-4">
                Contenuti Esclusivi
              </h3>
              <p className="text-gray-400">
                Analisi approfondite, statistiche e insider news che non trovi altrove
              </p>
            </div>

            <div className="bg-gray-900/30 border border-gray-800 rounded-2xl p-8 hover:border-gambla-yellow/50 transition-all duration-300 group">
              <div className="w-16 h-16 bg-gambla-yellow/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                <Zap className="w-8 h-8 text-gambla-yellow" />
              </div>
              <h3 className="text-2xl font-display font-semibold text-white mb-4">
                Sempre Aggiornato
              </h3>
              <p className="text-gray-400">
                News in tempo reale e aggiornamenti live sui tuoi sport preferiti
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default BottomCTA;
