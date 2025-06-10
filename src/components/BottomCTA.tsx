
import React from "react";
import { Link } from "react-router-dom";
import { ArrowRight, Users, Mail } from "lucide-react";

const BottomCTA = () => {
  return (
    <section className="py-20 bg-black relative overflow-hidden">
      {/* Background pattern */}
      <div className="absolute inset-0 opacity-5">
        <div className="absolute inset-0" style={{
          backgroundImage: `radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0)`,
          backgroundSize: '40px 40px'
        }}></div>
      </div>

      <div className="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="max-w-6xl mx-auto">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            {/* Left side - Content */}
            <div className="space-y-8">
              <h2 className="text-4xl md:text-6xl font-display font-bold text-white leading-tight">
                Trasforma la Tua{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Adrenalina
                </span>{" "}
                in Azioni!
              </h2>
              
              <p className="text-xl text-gray-300 leading-relaxed">
                Entra in un'area dove lo sport prende vita! Sfida te stesso con giochi interattivi, 
                unisciti a eventi live e condividi la tua energia con una community globale.
              </p>
              
              <div className="flex flex-col sm:flex-row gap-4">
                <Link to="/fantagambla" className="gambla-btn-primary flex items-center justify-center group">
                  Inizia la Sfida
                  <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
                </Link>
                
                <button className="gambla-btn-secondary flex items-center justify-center group">
                  <Users className="mr-2 w-5 h-5" />
                  Unisciti alla Community
                </button>
              </div>
            </div>

            {/* Right side - Newsletter signup */}
            <div className="relative">
              <div className="bg-gambla-gradient p-[1px] rounded-3xl">
                <div className="bg-black p-8 rounded-3xl">
                  <div className="text-center mb-6">
                    <Mail className="w-12 h-12 text-transparent bg-clip-text bg-gambla-gradient mx-auto mb-4" />
                    <h3 className="text-2xl font-bold text-white mb-2">Resta Aggiornato</h3>
                    <p className="text-gray-400">Ricevi le ultime notizie sportive direttamente nella tua inbox</p>
                  </div>
                  
                  <div className="space-y-4">
                    <input 
                      type="email" 
                      placeholder="La tua email"
                      className="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:border-gambla-magenta focus:outline-none"
                    />
                    <button className="w-full gambla-btn-primary">
                      Iscriviti Gratis
                    </button>
                  </div>
                  
                  <p className="text-xs text-gray-500 mt-4 text-center">
                    Niente spam, solo contenuti di qualità. Cancellati quando vuoi.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {/* Social proof */}
          <div className="mt-16 text-center">
            <p className="text-gray-400 text-lg mb-6">
              Seguici su{" "}
              <a 
                href="https://instagram.com/gambla_it" 
                target="_blank" 
                rel="noopener noreferrer"
                className="text-transparent bg-clip-text bg-gambla-gradient hover:text-gambla-yellow transition-colors duration-300 font-semibold"
              >
                @gambla_it
              </a>{" "}
              per contenuti esclusivi!
            </p>
            
            <div className="flex justify-center items-center space-x-8 text-sm text-gray-500">
              <span>🔥 10K+ Utenti Attivi</span>
              <span>⚡ Aggiornamenti Live</span>
              <span>🏆 Community #1</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default BottomCTA;
