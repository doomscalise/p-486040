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

      {/* Interactive Sports Elements - Moved more to the right */}
      <div className="absolute inset-0 pointer-events-none">
        {/* Tennis Racket with Ball */}
        <div className="absolute top-20 right-16 group pointer-events-auto cursor-pointer">
          <div className="relative transform transition-all duration-500 hover:scale-110 hover:rotate-12">
            <div className="w-16 h-16 bg-gambla-gradient rounded-full flex items-center justify-center shadow-lg animate-float">
              <span className="text-2xl">🎾</span>
            </div>
            <div className="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-r from-gambla-orange to-gambla-magenta rounded-full opacity-80 transform transition-all duration-300 group-hover:translate-x-2 group-hover:-translate-y-2 group-hover:scale-125"></div>
          </div>
        </div>

        {/* Soccer Ball */}
        <div className="absolute top-1/3 right-32 group pointer-events-auto cursor-pointer">
          <div className="relative transform transition-all duration-500 hover:scale-110 hover:rotate-45">
            <div className="w-20 h-20 bg-gradient-to-br from-gambla-magenta to-gambla-orange rounded-full flex items-center justify-center shadow-xl animate-float" style={{ animationDelay: '1s' }}>
              <span className="text-3xl transform transition-transform duration-300 group-hover:rotate-180">⚽</span>
            </div>
          </div>
        </div>

        {/* Basketball */}
        <div className="absolute bottom-1/4 right-20 group pointer-events-auto cursor-pointer">
          <div className="relative transform transition-all duration-500 hover:scale-110 hover:-rotate-12">
            <div className="w-14 h-14 bg-gradient-to-tr from-gambla-orange to-gambla-magenta rounded-full flex items-center justify-center shadow-lg animate-float" style={{ animationDelay: '2s' }}>
              <span className="text-xl">🏀</span>
            </div>
          </div>
        </div>

        {/* Formula 1 Car */}
        <div className="absolute bottom-20 right-1/3 group pointer-events-auto cursor-pointer">
          <div className="relative transform transition-all duration-500 hover:scale-110 hover:translate-x-4">
            <div className="w-12 h-12 bg-gambla-gradient rounded-lg flex items-center justify-center shadow-lg animate-float" style={{ animationDelay: '3s' }}>
              <span className="text-lg transform transition-transform duration-300 group-hover:scale-125">🏎️</span>
            </div>
            <div className="absolute inset-0 bg-gambla-gradient rounded-lg opacity-0 group-hover:opacity-30 transition-opacity duration-300 blur-lg"></div>
          </div>
        </div>

        {/* Trophy */}
        <div className="absolute top-1/2 right-8 group pointer-events-auto cursor-pointer">
          <div className="relative transform transition-all duration-500 hover:scale-110 hover:-translate-y-2">
            <div className="w-16 h-16 bg-gradient-to-b from-gambla-orange to-gambla-magenta rounded-full flex items-center justify-center shadow-xl animate-float" style={{ animationDelay: '0.5s' }}>
              <span className="text-2xl transform transition-transform duration-300 group-hover:rotate-12">🏆</span>
            </div>
            <div className="absolute -inset-2 bg-gambla-gradient rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300 blur-xl"></div>
          </div>
        </div>

        {/* Additional small floating elements - also moved right */}
        <div className="absolute top-1/4 right-1/4 w-8 h-8 bg-gambla-magenta/30 rounded-full animate-float blur-sm" style={{ animationDelay: '4s' }}></div>
        <div className="absolute bottom-1/3 right-1/2 w-6 h-6 bg-gambla-orange/40 rounded-full animate-float blur-sm" style={{ animationDelay: '5s' }}></div>
        <div className="absolute top-2/3 right-1/5 w-4 h-4 bg-gambla-gradient rounded-full animate-float" style={{ animationDelay: '6s' }}></div>
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
