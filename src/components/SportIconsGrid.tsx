
import React from "react";

const SportIconsGrid = () => {
  const sports = [
    { name: "Calcio", emoji: "⚽", description: "Serie A, Champions League" },
    { name: "Basket", emoji: "🏀", description: "NBA, Serie A Basket" },
    { name: "Tennis", emoji: "🎾", description: "ATP, WTA, Slam" },
    { name: "Volley", emoji: "🏐", description: "SuperLega, Nations League" },
    { name: "F1", emoji: "🏎️", description: "Formula 1, MotoGP" },
    { name: "Rugby", emoji: "🏉", description: "Sei Nazioni, World Cup" },
    { name: "Nuoto", emoji: "🏊‍♂️", description: "Mondiali, Olimpiadi" },
    { name: "Ciclismo", emoji: "🚴‍♂️", description: "Giro, Tour de France" },
  ];

  return (
    <section className="py-20 bg-gambla-dark relative">
      {/* Background Pattern */}
      <div className="absolute inset-0 opacity-5">
        <div className="absolute inset-0" style={{
          backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
          backgroundSize: '40px 40px'
        }}></div>
      </div>

      <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="text-center mb-16">
          <div className="inline-block px-6 py-3 bg-gambla-gradient/20 rounded-full text-gambla-yellow text-sm font-semibold mb-6">
            🏆 Tutti gli Sport
          </div>
          
          <h2 className="text-4xl md:text-6xl font-display font-bold text-white mb-6 leading-tight">
            La Tua{" "}
            <span className="text-transparent bg-clip-text bg-gambla-gradient">
              Arena
            </span>{" "}
            Sportiva
          </h2>
          
          <p className="text-xl text-gray-300 max-w-2xl mx-auto">
            Segui tutti i tuoi sport preferiti in un unico posto. 
            News, risultati e analisi approfondite.
          </p>
        </div>

        <div className="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
          {sports.map((sport, index) => (
            <div
              key={sport.name}
              className="icon-grid-item group cursor-pointer"
              style={{ animationDelay: `${index * 0.1}s` }}
            >
              <div className="text-4xl md:text-5xl mb-4 sport-element sport-ball-bounce group-hover:scale-125 transition-transform duration-300">
                {sport.emoji}
              </div>
              <h3 className="text-lg font-display font-semibold text-white mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gambla-gradient transition-all duration-300">
                {sport.name}
              </h3>
              <p className="text-sm text-gray-400 text-center group-hover:text-gray-300 transition-colors duration-300">
                {sport.description}
              </p>
            </div>
          ))}
        </div>

        <div className="text-center mt-16">
          <button className="gambla-btn-secondary">
            Esplora Tutti gli Sport
          </button>
        </div>
      </div>
    </section>
  );
};

export default SportIconsGrid;
