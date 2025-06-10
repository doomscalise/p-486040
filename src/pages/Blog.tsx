
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { MessageCircle, Calendar, User, Filter } from "lucide-react";

const Blog = () => {
  const [selectedCategory, setSelectedCategory] = useState("tutti");

  const categories = [
    { id: "tutti", name: "Tutti" },
    { id: "calcio", name: "Calcio" },
    { id: "tennis", name: "Tennis" },
    { id: "altri-sport", name: "Altri Sport" }
  ];

  const articles = [
    {
      id: 1,
      title: "La nuova era del calcio italiano: analisi delle ultime tattiche",
      excerpt: "Scopri come le squadre italiane stanno evolvendo tatticamente in questa stagione...",
      category: "calcio",
      date: "2024-06-08",
      author: "Marco Rossi",
      image: "https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      comments: 24
    },
    {
      id: 2,
      title: "Wimbledon 2024: i favoriti e le sorprese da non perdere",
      excerpt: "Un'analisi completa sui protagonisti del torneo più prestigioso del tennis...",
      category: "tennis",
      date: "2024-06-07",
      author: "Sara Bianchi",
      image: "https://images.unsplash.com/photo-1530915365347-e67d0ffe6209?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      comments: 18
    },
    {
      id: 3,
      title: "Olimpiadi 2024: gli sport emergenti che conquisteranno il pubblico",
      excerpt: "Dalle nuove discipline ai giovani talenti, tutto quello che devi sapere...",
      category: "altri-sport",
      date: "2024-06-06",
      author: "Luca Verdi",
      image: "https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      comments: 31
    }
  ];

  const filteredArticles = selectedCategory === "tutti" 
    ? articles 
    : articles.filter(article => article.category === selectedCategory);

  return (
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      
      <main className="pt-20">
        {/* Header Section */}
        <section className="py-16 bg-gambla-gradient">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="text-center max-w-4xl mx-auto">
              <h1 className="section-title mb-6">
                Il Cuore delle <span className="text-gambla-orange">Notizie Sportive</span>
              </h1>
              <p className="section-subtitle mx-auto mb-8">
                Scopri storie inedite, analisi approfondite e aggiornamenti dal mondo dello sport. 
                Condividi le tue opinioni e unisciti al dibattito!
              </p>
              <button className="gambla-btn-tertiary">
                Leggi l'Ultimo Articolo
              </button>
            </div>
          </div>
        </section>

        {/* Filters */}
        <section className="py-8 border-b border-gray-800">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="flex flex-wrap items-center gap-4">
              <div className="flex items-center text-white">
                <Filter className="w-5 h-5 mr-2 text-gambla-orange" />
                <span className="font-medium">Filtra per categoria:</span>
              </div>
              <div className="flex flex-wrap gap-2">
                {categories.map((category) => (
                  <button
                    key={category.id}
                    onClick={() => setSelectedCategory(category.id)}
                    className={`px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 ${
                      selectedCategory === category.id
                        ? "bg-gambla-orange text-white"
                        : "bg-gray-800 text-gray-300 hover:bg-gray-700 hover:text-white"
                    }`}
                  >
                    {category.name}
                  </button>
                ))}
              </div>
            </div>
          </div>
        </section>

        {/* Articles Grid */}
        <section className="py-16">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              {filteredArticles.map((article) => (
                <article key={article.id} className="gambla-card group cursor-pointer">
                  <div className="relative mb-4 overflow-hidden rounded-lg">
                    <img 
                      src={article.image} 
                      alt={article.title}
                      className="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110"
                    />
                    <div className="absolute top-3 left-3">
                      <span className="px-3 py-1 bg-gambla-orange text-white text-xs font-semibold rounded-full">
                        {categories.find(cat => cat.id === article.category)?.name}
                      </span>
                    </div>
                  </div>
                  
                  <h3 className="text-xl font-display font-semibold text-white mb-3 group-hover:text-gambla-orange transition-colors duration-300">
                    {article.title}
                  </h3>
                  
                  <p className="text-gray-400 mb-4 line-clamp-3">
                    {article.excerpt}
                  </p>
                  
                  <div className="flex items-center justify-between text-sm text-gray-500">
                    <div className="flex items-center space-x-4">
                      <div className="flex items-center">
                        <User className="w-4 h-4 mr-1" />
                        {article.author}
                      </div>
                      <div className="flex items-center">
                        <Calendar className="w-4 h-4 mr-1" />
                        {new Date(article.date).toLocaleDateString('it-IT')}
                      </div>
                    </div>
                    <div className="flex items-center text-gambla-pink">
                      <MessageCircle className="w-4 h-4 mr-1" />
                      {article.comments}
                    </div>
                  </div>
                </article>
              ))}
            </div>

            {/* CTA Section */}
            <div className="text-center mt-16 p-8 bg-gray-800/30 rounded-xl border border-gray-700">
              <h3 className="text-2xl font-display font-semibold text-white mb-4">
                Cosa ne pensi?
              </h3>
              <p className="text-gray-400 mb-6 max-w-2xl mx-auto">
                Lascia un commento e segui{" "}
                <a 
                  href="https://instagram.com/gambla_it" 
                  target="_blank" 
                  rel="noopener noreferrer"
                  className="text-gambla-pink hover:text-gambla-yellow transition-colors duration-300 font-semibold"
                >
                  @gambla_it
                </a>{" "}
                per altri contenuti!
              </p>
              <button className="gambla-btn-primary">
                Scrivi il Tuo Commento
              </button>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Blog;
