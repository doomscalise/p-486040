
import React, { useEffect } from "react";
import Navbar from "@/components/Navbar";
import GamblaHero from "@/components/GamblaHero";
import SportIconsGrid from "@/components/SportIconsGrid";
import SocialNetwork from "@/components/SocialNetwork";
import NewsletterSignup from "@/components/NewsletterSignup";
import BottomCTA from "@/components/BottomCTA";
import Footer from "@/components/Footer";
import SEOHead from "@/components/SEOHead";
import Analytics from "@/components/Analytics";

const Index = () => {
  useEffect(() => {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-fade-in");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );
    
    const elements = document.querySelectorAll(".animate-on-scroll");
    elements.forEach((el) => observer.observe(el));
    
    return () => {
      elements.forEach((el) => observer.unobserve(el));
    };
  }, []);

  return (
    <div className="min-h-screen bg-gambla-dark">
      <SEOHead 
        title="GAMBLA.it - Il Portale Sportivo #1 d'Italia | Fantacalcio e News Live"
        description="Accendi la tua passione sportiva con GAMBLA.it! Notizie live, fantacalcio innovativo, community attiva e contenuti esclusivi. Unisciti a 10K+ appassionati."
        keywords="gambla, fantacalcio, calcio italia, serie a, notizie sportive, community calcio, pronostici, statistiche calcio, fantagambla"
      />
      <Analytics />
      
      <Navbar />
      <main>
        <GamblaHero />
        <SportIconsGrid />
        
        {/* Social Network Section */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="max-w-4xl mx-auto">
              <SocialNetwork />
            </div>
          </div>
        </section>
        
        {/* Newsletter Section */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="max-w-2xl mx-auto">
              <NewsletterSignup variant="inline" />
            </div>
          </div>
        </section>

        <BottomCTA />
      </main>
      <Footer />
    </div>
  );
};

export default Index;
