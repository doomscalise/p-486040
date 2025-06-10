
import React from "react";
import { Link } from "react-router-dom";
import { ArrowRight, Users } from "lucide-react";

const BottomCTA = () => {
  return (
    <section 
      className="py-20 relative overflow-hidden"
      style={{
        backgroundImage: 'linear-gradient(rgba(42, 9, 68, 0.9), rgba(10, 29, 55, 0.9)), url("https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80")',
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        backgroundAttachment: 'fixed'
      }}
    >
      {/* Animated elements */}
      <div className="absolute top-10 right-10 w-20 h-20 bg-gambla-orange/30 rounded-full blur-lg animate-pulse"></div>
      <div className="absolute bottom-10 left-10 w-32 h-32 bg-gambla-pink/20 rounded-full blur-xl animate-float"></div>

      <div className="container px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div className="max-w-4xl mx-auto">
          <h2 className="section-title mb-6 opacity-0 animate-fade-in">
            Trasforma la Tua <span className="text-gambla-yellow">Adrenalina</span> in{" "}
            <span className="text-gambla-pink">Azioni!</span>
          </h2>
          
          <p 
            className="section-subtitle mx-auto mb-12 opacity-0 animate-fade-in"
            style={{ animationDelay: "0.2s" }}
          >
            Entra in un'area dove lo sport prende vita! Sfida te stesso con giochi interattivi, 
            unisciti a eventi live e condividi la tua energia con una community globale. 
            Gambla è il tuo campo di gioco!
          </p>
          
          <div 
            className="flex flex-col sm:flex-row gap-6 justify-center items-center opacity-0 animate-fade-in"
            style={{ animationDelay: "0.4s" }}
          >
            <Link to="/fantagambla" className="gambla-btn-primary flex items-center group">
              Inizia la Sfida
              <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
            </Link>
            
            <button className="gambla-btn-secondary flex items-center group">
              <Users className="mr-2 w-5 h-5" />
              Unisciti alla Community
            </button>
          </div>

          {/* Social media mention */}
          <div 
            className="mt-12 opacity-0 animate-fade-in"
            style={{ animationDelay: "0.6s" }}
          >
            <p className="text-gray-400 text-lg">
              Seguici su{" "}
              <a 
                href="https://instagram.com/gambla_it" 
                target="_blank" 
                rel="noopener noreferrer"
                className="text-gambla-pink hover:text-gambla-yellow transition-colors duration-300 font-semibold"
              >
                @gambla_it
              </a>{" "}
              per contenuti esclusivi!
            </p>
          </div>
        </div>
      </div>
    </section>
  );
};

export default BottomCTA;
