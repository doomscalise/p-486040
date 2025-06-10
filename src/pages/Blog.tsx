
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { MessageCircle, Calendar, User, Filter, ArrowRight, Bookmark, Eye } from "lucide-react";

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
      comments: 24,
      views: 1250
    },
    {
      id: 2,
      title: "Wimbledon 2024: i favoriti e le sorprese da non perdere",
      excerpt: "Un'analisi completa sui protagonisti del torneo più prestigioso del tennis...",
      category: "tennis",
      date: "2024-06-07",
      author: "Sara Bianchi",
      image: "https://images.unsplash.com/photo-1530915365347-e67d0ffe6209?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      comments: 18,
      views: 890
    },
    {
      id: 3,
      title: "Olimpiadi 2024: gli sport emergenti che conquisteranno il pubblico",
      excerpt: "Dalle nuove discipline ai giovani talenti, tutto quello che devi sapere...",
      category: "altri-sport",
      date: "2024-06-06",
      author: "Luca Verdi",
      image: "https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
      comments: 31,
      views: 2100
    }
  ];

  const filteredArticles = selectedCategory === "tutti" 
    ? articles 
    : articles.filter(article => article.category === selectedCategory);

  return (
    <div className="min-h-screen bg-black">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="min-h-screen bg-black relative overflow-hidden">
          {/* Grid pattern background */}
          <div className="absolute inset-0 opacity-10">
            <div className="absolute inset-0" style={{
              backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
              backgroundSize: '50px 50px'
            }}></div>
          </div>

          {/* Floating elements */}
          <div className="absolute top-20 right-20 w-32 h-32 bg-gambla-magenta/20 rounded-full blur-xl animate-float"></div>
          <div className="absolute bottom-40 left-20 w-40 h-40 bg-gambla-orange/20 rounded-full blur-xl animate-float" style={{ animationDelay: '2s' }}></div>
          <div className="absolute top-60 left-1/4 w-24 h-24 bg-gambla-yellow/20 rounded-full blur-xl animate-float" style={{ animationDelay: '4s' }}></div>

          <div className="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="grid lg:grid-cols-2 gap-12 items-center min-h-screen">
              {/* Left side - Content */}
              <div className="space-y-8">
                <div className="space-y-6">
                  <div className="inline-block px-4 py-2 bg-gambla-gradient rounded-full text-white text-sm font-semibold animate-pulse-slow">
                    📰 Blog Sportivo
                  </div>
                  
                  <h1 className="text-4xl md:text-6xl lg:text-7xl font-display font-bold text-white leading-tight">
                    Il Cuore delle{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      Notizie Sportive
                    </span>
                  </h1>
                  
                  <p className="text-xl text-gray-300 leading-relaxed max-w-2xl">
                    Scopri storie inedite, analisi approfondite e aggiornamenti dal mondo dello sport. 
                    Condividi le tue opinioni e unisciti al dibattito!
                  </p>
                </div>

                <div className="flex flex-col sm:flex-row gap-4">
                  <button className="gambla-btn-primary flex items-center justify-center group">
                    Leggi l'Ultimo Articolo
                    <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
                  </button>
                  
                  <button className="flex items-center justify-center px-6 py-3 text-white border-2 border-gray-600 rounded-full hover:border-white transition-colors">
                    <Bookmark className="mr-2 w-5 h-5" />
                    Articoli Salvati
                  </button>
                </div>
              </div>

              {/* Right side - Article Preview */}
              <div className="relative">
                <div className="relative z-10">
                  <div className="bg-gambla-gradient p-8 rounded-3xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <div className="bg-black p-6 rounded-2xl">
                      <h3 className="text-white font-bold text-xl mb-4 flex items-center">
                        <MessageCircle className="mr-2 w-6 h-6 text-gambla-yellow" />
                        Ultimi Articoli
                      </h3>
                      <div className="space-y-3">
                        {articles.slice(0, 3).map((article, index) => (
                          <div key={article.id} className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                            <span className="text-white text-sm">{article.title.substring(0, 30)}...</span>
                            <div className="flex items-center space-x-2">
                              <Eye className="w-3 h-3 text-gray-400" />
                              <span className="text-xs text-gray-400">{article.views}</span>
                            </div>
                          </div>
                        ))}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Filters */}
        <section className="py-8 border-b border-gray-800 bg-black">
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
                        ? "bg-gambla-gradient text-white"
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
        <section className="py-16 bg-black">
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
                      <span className="px-3 py-1 bg-gambla-gradient text-white text-xs font-semibold rounded-full">
                        {categories.find(cat => cat.id === article.category)?.name}
                      </span>
                    </div>
                    <div className="absolute top-3 right-3">
                      <div className="flex items-center bg-black/70 backdrop-blur-sm rounded-full px-2 py-1">
                        <Eye className="w-3 h-3 text-white mr-1" />
                        <span className="text-white text-xs">{article.views}</span>
                      </div>
                    </div>
                  </div>
                  
                  <h3 className="text-xl font-display font-semibold text-white mb-3 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gambla-gradient transition-all duration-300">
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
                    <div className="flex items-center text-gambla-magenta">
                      <MessageCircle className="w-4 h-4 mr-1" />
                      {article.comments}
                    </div>
                  </div>
                </article>
              ))}
            </div>

            {/* CTA Section */}
            <div className="text-center mt-16 p-8 bg-gambla-gradient rounded-3xl border border-gray-700 relative overflow-hidden">
              <div className="absolute inset-0 bg-black/20"></div>
              <div className="relative z-10">
                <h3 className="text-2xl font-display font-semibold text-white mb-4">
                  Cosa ne pensi?
                </h3>
                <p className="text-gray-100 mb-6 max-w-2xl mx-auto">
                  Lascia un commento e segui{" "}
                  <a 
                    href="https://www.instagram.com/gambla.it?igsh=MWJxOTQxcmt5b3p6Mg==" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    className="text-white hover:text-gambla-yellow transition-colors duration-300 font-semibold underline"
                  >
                    @gambla.it
                  </a>{" "}
                  per altri contenuti!
                </p>
                <button className="gambla-btn-tertiary">
                  Scrivi il Tuo Commento
                </button>
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Blog;
