
import React from "react";
import { ArrowRight, Play } from "lucide-react";
import { Link } from "react-router-dom";

const GamblaHero = () => {
  return (
    <section className="min-h-screen bg-black relative overflow-hidden">
      {/* Grid pattern background */}
      <div className="absolute inset-0 opacity-10">
        <div className="absolute inset-0" style={{
          backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
          backgroundSize: '50px 50px'
        }}></div>
      </div>

      <div className="container mx-auto px-4 sm:px-6 lg:px-8 pt-20 relative z-10">
        <div className="grid lg:grid-cols-2 gap-12 items-center min-h-screen">
          {/* Left side - Content */}
          <div className="space-y-8">
            <div className="space-y-6">
              <div className="inline-block px-4 py-2 bg-gambla-gradient rounded-full text-white text-sm font-semibold">
                🔥 Portale Sportivo #1 in Italia
              </div>
              
              <h1 className="text-4xl md:text-6xl lg:text-7xl font-display font-bold text-white leading-tight">
                Accendi la Tua{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Passione
                </span>{" "}
                Sportiva
              </h1>
              
              <p className="text-xl text-gray-300 leading-relaxed max-w-2xl">
                Unisciti alla community sportiva più dinamica d'Italia. Notizie live, 
                fantacalcio, discussioni accese e contenuti esclusivi ti aspettano.
              </p>
            </div>

            <div className="flex flex-col sm:flex-row gap-4">
              <button className="gambla-btn-primary flex items-center justify-center group">
                Unisciti Ora
                <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
              </button>
              
              <button className="flex items-center justify-center px-6 py-3 text-white border-2 border-gray-600 rounded-full hover:border-white transition-colors">
                <Play className="mr-2 w-5 h-5" />
                Guarda Demo
              </button>
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
                <div className="text-gray-400 text-sm">Copertura Live</div>
              </div>
            </div>
          </div>

          {/* Right side - Visual */}
          <div className="relative">
            <div className="relative z-10">
              <div className="bg-gambla-gradient p-8 rounded-3xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                <div className="bg-black p-6 rounded-2xl">
                  <h3 className="text-white font-bold text-xl mb-4">🏆 Highlights Oggi</h3>
                  <div className="space-y-3">
                    <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg">
                      <span className="text-white">Inter vs Milan</span>
                      <span className="text-gambla-orange font-bold">2-1</span>
                    </div>
                    <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg">
                      <span className="text-white">Juventus vs Roma</span>
                      <span className="text-gambla-magenta font-bold">LIVE</span>
                    </div>
                    <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg">
                      <span className="text-white">Napoli vs Lazio</span>
                      <span className="text-gray-400">20:45</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            {/* Floating elements */}
            <div className="absolute top-10 right-10 w-20 h-20 bg-gambla-magenta/20 rounded-full blur-xl animate-float"></div>
            <div className="absolute bottom-10 left-10 w-32 h-32 bg-gambla-orange/20 rounded-full blur-xl animate-float" style={{ animationDelay: '2s' }}></div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default GamblaHero;
