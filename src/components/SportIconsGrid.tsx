
import React from "react";
import { Link } from "react-router-dom";
import { Users, BookOpen, Trophy, Target, Zap, TrendingUp } from "lucide-react";

const SportIconsGrid = () => {
  const features = [
    {
      icon: <Zap className="w-8 h-8" />,
      title: "Live Sport Action",
      description: "Segui gli eventi in diretta e condividi le tue reazioni"
    },
    {
      icon: <Users className="w-8 h-8" />,
      title: "Community Globale",
      description: "Collegati con tifosi da tutto il mondo"
    },
    {
      icon: <BookOpen className="w-8 h-8" />,
      title: "Storie Esclusive",
      description: "Racconti dal campo e analisi approfondite"
    },
    {
      icon: <Target className="w-8 h-8" />,
      title: "Sfide Personalizzate",
      description: "Compete con analisi e pronostici unici"
    },
    {
      icon: <Trophy className="w-8 h-8" />,
      title: "Fantasy Challenge",
      description: "Crea la tua squadra e sfida gli amici"
    },
    {
      icon: <TrendingUp className="w-8 h-8" />,
      title: "Statistiche Live",
      description: "Dati in tempo reale e trend di mercato"
    }
  ];

  const categories = [
    { name: "Calcio", count: "2.5K", image: "⚽" },
    { name: "Tennis", count: "1.8K", image: "🎾" },
    { name: "Basket", count: "1.2K", image: "🏀" },
    { name: "Formula 1", count: "950", image: "🏎️" }
  ];

  return (
    <section className="py-20 bg-black">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        {/* Categories Section */}
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-display font-bold text-white mb-6">
            Esplora Per <span className="text-transparent bg-clip-text bg-gambla-gradient">Categoria</span>
          </h2>
          <p className="text-xl text-gray-300 max-w-3xl mx-auto">
            Scopri contenuti su misura per le tue passioni sportive
          </p>
        </div>

        <div className="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-20">
          {categories.map((category, index) => (
            <div key={index} className="group cursor-pointer">
              <div className="bg-gambla-gradient p-[1px] rounded-2xl transition-all duration-300 hover:scale-105">
                <div className="bg-black p-6 rounded-2xl h-full text-center">
                  <div className="text-4xl mb-4">{category.image}</div>
                  <h3 className="text-white font-bold text-lg mb-2">{category.name}</h3>
                  <p className="text-gray-400">{category.count} contenuti</p>
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* Features Grid */}
        <div className="text-center mb-16">
          <h2 className="text-3xl md:text-5xl font-display font-bold text-white mb-6">
            Tutto Quello Che <span className="text-transparent bg-clip-text bg-gambla-gradient">Ti Serve</span>
          </h2>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          {features.map((feature, index) => (
            <div key={index} className="group">
              <div className="bg-gray-900/50 backdrop-blur-sm border border-gray-800 rounded-xl p-6 transition-all duration-300 hover:border-gambla-magenta/50 hover:bg-gray-800/50">
                <div className="w-16 h-16 bg-gambla-gradient rounded-xl flex items-center justify-center text-white mb-4 group-hover:scale-110 transition-transform">
                  {feature.icon}
                </div>
                <h3 className="text-xl font-semibold text-white mb-3">
                  {feature.title}
                </h3>
                <p className="text-gray-400 leading-relaxed">
                  {feature.description}
                </p>
              </div>
            </div>
          ))}
        </div>

        <div className="text-center">
          <div className="inline-flex flex-col sm:flex-row gap-4">
            <Link to="/blog" className="gambla-btn-primary">
              Esplora il Blog
            </Link>
            <Link to="/fantagambla" className="gambla-btn-secondary">
              Prova Fantasy
            </Link>
          </div>
        </div>
      </div>
    </section>
  );
};

export default SportIconsGrid;
