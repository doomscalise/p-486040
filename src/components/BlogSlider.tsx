
import React, { useState, useEffect } from "react";
import { ChevronLeft, ChevronRight, Calendar, User, ArrowRight } from "lucide-react";

const BlogSlider = () => {
  const [currentSlide, setCurrentSlide] = useState(0);
  const [isTyping, setIsTyping] = useState(true);

  const articles = [
    {
      id: 1,
      title: "Le strategie vincenti per il fantacalcio 2024",
      excerpt: "Scopri i segreti dei campioni per dominare la tua lega",
      author: "Marco Rossi",
      date: "15 Dic 2024",
      image: "https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      category: "Fantacalcio"
    },
    {
      id: 2,
      title: "Analisi tattica: Inter vs Juventus",
      excerpt: "Un'analisi approfondita del Derby d'Italia",
      author: "Luca Bianchi",
      date: "14 Dic 2024",
      image: "https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      category: "Serie A"
    },
    {
      id: 3,
      title: "Champions League: pronostici quarti di finale",
      excerpt: "Le nostre previsioni per le sfide più attese",
      author: "Sofia Verde",
      date: "13 Dic 2024",
      image: "https://images.unsplash.com/photo-1508098682722-e99c43a406b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      category: "Champions"
    }
  ];

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev + 1) % articles.length);
    setIsTyping(false);
    setTimeout(() => setIsTyping(true), 100);
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + articles.length) % articles.length);
    setIsTyping(false);
    setTimeout(() => setIsTyping(true), 100);
  };

  useEffect(() => {
    const interval = setInterval(nextSlide, 5000);
    return () => clearInterval(interval);
  }, []);

  return (
    <div className="relative overflow-hidden bg-gray-900/30 rounded-3xl p-8">
      <div className="flex items-center justify-between mb-6">
        <h3 className="text-2xl font-display font-bold text-white">Ultimi Articoli</h3>
        <div className="flex space-x-2">
          <button 
            onClick={prevSlide}
            className="p-2 bg-gambla-magenta/20 rounded-full hover:bg-gambla-magenta/40 transition-colors"
          >
            <ChevronLeft className="w-5 h-5 text-white" />
          </button>
          <button 
            onClick={nextSlide}
            className="p-2 bg-gambla-magenta/20 rounded-full hover:bg-gambla-magenta/40 transition-colors"
          >
            <ChevronRight className="w-5 h-5 text-white" />
          </button>
        </div>
      </div>

      <div className="relative h-64">
        {articles.map((article, index) => (
          <div
            key={article.id}
            className={`absolute inset-0 transition-all duration-500 ${
              index === currentSlide 
                ? 'opacity-100 transform translate-x-0' 
                : index < currentSlide 
                  ? 'opacity-0 transform -translate-x-full'
                  : 'opacity-0 transform translate-x-full'
            }`}
          >
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6 h-full">
              <div className="relative overflow-hidden rounded-2xl group">
                <img 
                  src={article.image} 
                  alt={article.title}
                  className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div className="absolute bottom-4 left-4">
                  <span className="px-3 py-1 bg-gambla-gradient rounded-full text-white text-sm font-semibold">
                    {article.category}
                  </span>
                </div>
              </div>

              <div className="flex flex-col justify-center space-y-4">
                <h4 className={`text-xl font-bold text-white leading-tight ${isTyping ? 'animate-fade-in' : ''}`}>
                  {article.title}
                </h4>
                <p className="text-gray-300">{article.excerpt}</p>
                
                <div className="flex items-center space-x-4 text-sm text-gray-400">
                  <div className="flex items-center space-x-1">
                    <User className="w-4 h-4" />
                    <span>{article.author}</span>
                  </div>
                  <div className="flex items-center space-x-1">
                    <Calendar className="w-4 h-4" />
                    <span>{article.date}</span>
                  </div>
                </div>

                <button className="flex items-center text-gambla-orange hover:text-gambla-yellow transition-colors group w-fit">
                  Leggi di più
                  <ArrowRight className="ml-2 w-4 h-4 transition-transform group-hover:translate-x-1" />
                </button>
              </div>
            </div>
          </div>
        ))}
      </div>

      <div className="flex justify-center mt-6 space-x-2">
        {articles.map((_, index) => (
          <button
            key={index}
            onClick={() => setCurrentSlide(index)}
            className={`w-2 h-2 rounded-full transition-all duration-300 ${
              index === currentSlide ? 'bg-gambla-orange w-8' : 'bg-gray-600'
            }`}
          />
        ))}
      </div>
    </div>
  );
};

export default BlogSlider;
