
import React from "react";
import { ArrowRight } from "lucide-react";
import { Link } from "react-router-dom";

const GamblaHero = () => {
  return (
    <section 
      className="min-h-screen flex items-center justify-center relative overflow-hidden bg-gambla-gradient"
      style={{
        backgroundImage: 'linear-gradient(rgba(28, 37, 38, 0.7), rgba(42, 9, 68, 0.8)), url("https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80")',
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        backgroundAttachment: 'fixed'
      }}
    >
      {/* Animated background elements */}
      <div className="absolute top-20 left-10 w-32 h-32 bg-gambla-magenta/20 rounded-full blur-xl animate-float"></div>
      <div className="absolute bottom-20 right-10 w-40 h-40 bg-gambla-orange/20 rounded-full blur-xl animate-float" style={{ animationDelay: '2s' }}></div>
      <div className="absolute top-1/2 left-1/4 w-24 h-24 bg-gambla-yellow/20 rounded-full blur-xl animate-float" style={{ animationDelay: '4s' }}></div>

      <div className="container px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div className="max-w-4xl mx-auto">
          {/* Main Hero Content */}
          <h1 className="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-display font-bold mb-6 opacity-0 animate-fade-in">
            <span className="text-white">Accendi la Tua</span>{" "}
            <span className="text-transparent bg-clip-text bg-gambla-gradient">
              Passione Sportiva
            </span>{" "}
            <span className="text-white">con</span>{" "}
            <span className="text-gambla-yellow">Gambla!</span>
          </h1>
          
          <p 
            className="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed opacity-0 animate-fade-in max-w-3xl mx-auto"
            style={{ animationDelay: "0.3s" }}
          >
            Diventa parte di un'avventura sportiva unica! Unisciti alla nostra community per vivere emozioni live, 
            condividere i tuoi momenti preferiti e accedere a contenuti esclusivi. 
            Il tuo ingresso nel mondo dello sport è a un clic di distanza!
          </p>
          
          <div 
            className="flex flex-col sm:flex-row gap-4 justify-center items-center opacity-0 animate-fade-in"
            style={{ animationDelay: "0.6s" }}
          >
            <button className="gambla-btn-primary flex items-center group">
              Unisciti Ora
              <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
            </button>
          </div>
        </div>

        {/* Scroll indicator */}
        <div 
          className="absolute bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 animate-fade-in"
          style={{ animationDelay: "1s" }}
        >
          <div className="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
            <div className="w-1 h-3 bg-white/70 rounded-full mt-2 animate-bounce"></div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default GamblaHero;
