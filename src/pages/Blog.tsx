
import React from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import BlogSlider from "@/components/BlogSlider";
import SEOHead from "@/components/SEOHead";
import Analytics from "@/components/Analytics";
import { useBlog } from "@/hooks/useBlog";
import { Search, Filter, Clock, User, Calendar, ArrowRight } from "lucide-react";

const Blog = () => {
  const { articles, loading, error, getFeaturedArticles } = useBlog();
  const featuredArticles = getFeaturedArticles();

  if (loading) {
    return (
      <div className="min-h-screen bg-gambla-dark flex items-center justify-center">
        <div className="text-white text-xl">Caricamento articoli...</div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="min-h-screen bg-gambla-dark flex items-center justify-center">
        <div className="text-red-500 text-xl">Errore: {error}</div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gambla-dark">
      <SEOHead 
        title="Blog GAMBLA - Notizie, Analisi e Consigli Sportivi"
        description="Il blog di GAMBLA.it: analisi approfondite, pronostici esperti, guide al fantacalcio e tutte le news dal mondo dello sport italiano."
        keywords="blog calcio, notizie serie a, analisi sportive, consigli fantacalcio, pronostici calcio"
        url="https://gambla.it/blog"
      />
      <Analytics />
      
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="py-20 bg-gambla-dark relative overflow-hidden">
          {/* Background Pattern */}
          <div className="absolute inset-0 opacity-5">
            <div className="absolute inset-0" style={{
              backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
              backgroundSize: '40px 40px'
            }}></div>
          </div>

          {/* Floating elements */}
          <div className="absolute top-10 right-20 w-32 h-32 bg-gambla-magenta/10 rounded-full blur-xl animate-float"></div>
          <div className="absolute bottom-20 left-20 w-40 h-40 bg-gambla-orange/10 rounded-full blur-xl animate-float" style={{ animationDelay: '3s' }}></div>
          
          <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="text-center max-w-4xl mx-auto mb-16">
              <h1 className="text-4xl md:text-6xl font-display font-bold text-white mb-6 leading-tight">
                Il Blog di{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  GAMBLA
                </span>
              </h1>
              <p className="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Analisi, pronostici e tutto quello che devi sapere sul mondo dello sport
              </p>
            </div>

            {/* Blog Slider Section */}
            <BlogSlider />
          </div>
        </section>

        {/* Articles Grid */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              {articles.map((article) => (
                <article key={article.id} className="gambla-card group cursor-pointer">
                  <div className="relative overflow-hidden rounded-lg mb-4">
                    <img 
                      src={article.image} 
                      alt={article.title}
                      className="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110"
                    />
                    <div className="absolute top-4 left-4">
                      <span className="px-3 py-1 bg-gambla-gradient rounded-full text-white text-sm font-semibold">
                        {article.category}
                      </span>
                    </div>
                    <div className="absolute bottom-4 right-4">
                      <span className="px-2 py-1 bg-black/70 rounded text-white text-xs">
                        {article.views} visualizzazioni
                      </span>
                    </div>
                  </div>
                  
                  <div className="space-y-3">
                    <h3 className="text-xl font-bold text-white group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gambla-gradient transition-all duration-300">
                      {article.title}
                    </h3>
                    <p className="text-gray-400">{article.excerpt}</p>
                    
                    <div className="flex items-center justify-between text-sm text-gray-500">
                      <div className="flex items-center space-x-4">
                        <div className="flex items-center space-x-1">
                          <User className="w-4 h-4" />
                          <span>{article.author}</span>
                        </div>
                        <div className="flex items-center space-x-1">
                          <Clock className="w-4 h-4" />
                          <span>{article.readTime}</span>
                        </div>
                      </div>
                      <div className="flex items-center space-x-1">
                        <Calendar className="w-4 h-4" />
                        <span>{article.date}</span>
                      </div>
                    </div>
                    
                    <button className="flex items-center text-gambla-orange hover:text-gambla-yellow transition-colors group">
                      Leggi articolo
                      <ArrowRight className="ml-2 w-4 h-4 transition-transform group-hover:translate-x-1" />
                    </button>
                  </div>
                </article>
              ))}
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Blog;
