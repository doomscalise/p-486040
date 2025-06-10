
import React from "react";
import { Users, BookOpen, Trophy, Target, Zap } from "lucide-react";

const SportIconsGrid = () => {
  const features = [
    {
      icon: <Zap className="w-12 h-12 text-gambla-orange" />,
      title: "Live Sport Action",
      description: "Segui gli eventi in diretta e condividi le tue reazioni in tempo reale!"
    },
    {
      icon: <Users className="w-12 h-12 text-gambla-magenta" />,
      title: "Tifosi Connessi",
      description: "Collegati con altri appassionati e crea il tuo gruppo di supporto!"
    },
    {
      icon: <BookOpen className="w-12 h-12 text-gambla-yellow" />,
      title: "Storie dal Campo",
      description: "Leggi racconti esclusivi e condividi i tuoi commenti con noi!"
    },
    {
      icon: <Target className="w-12 h-12 text-gambla-orange" />,
      title: "Sfide Personalizzate",
      description: "Preparati a competere con analisi uniche presto disponibili!"
    },
    {
      icon: <Trophy className="w-12 h-12 text-gambla-magenta" />,
      title: "Fantasy Challenge",
      description: "Crea la tua squadra e sfida amici – iscriviti per il lancio!"
    }
  ];

  return (
    <section className="py-20 bg-gambla-dark relative">
      <div className="container px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-16">
          <h2 className="section-title mb-6 opacity-0 animate-fade-in">
            Sblocca il Tuo <span className="text-transparent bg-clip-text bg-gambla-gradient">Potenziale Sportivo!</span>
          </h2>
          <p 
            className="section-subtitle mx-auto opacity-0 animate-fade-in"
            style={{ animationDelay: "0.2s" }}
          >
            Trasforma la tua passione in azione! Connettiti con tifosi da tutto il mondo, 
            partecipa a discussioni accese e scopri contenuti esclusivi che ti ispireranno. 
            Il tuo trampolino di lancio è qui!
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-12">
          {features.map((feature, index) => (
            <div 
              key={index}
              className={`icon-grid-item opacity-0 animate-fade-in stagger-${index + 1}`}
            >
              <div className="mb-4 p-4 rounded-full bg-gray-800/50">
                {feature.icon}
              </div>
              <h3 className="text-lg font-display font-semibold text-white mb-3">
                {feature.title}
              </h3>
              <p className="text-gray-400 text-sm leading-relaxed">
                {feature.description}
              </p>
            </div>
          ))}
        </div>

        <div 
          className="flex flex-col sm:flex-row gap-4 justify-center items-center opacity-0 animate-fade-in"
          style={{ animationDelay: "1s" }}
        >
          <button className="gambla-btn-secondary">
            Partecipa Subito
          </button>
          <button className="gambla-btn-tertiary">
            Scopri la Community
          </button>
        </div>
      </div>
    </section>
  );
};

export default SportIconsGrid;
