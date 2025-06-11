
import React, { useEffect } from "react";
import Navbar from "@/components/Navbar";
import GamblaHero from "@/components/GamblaHero";
import SportIconsGrid from "@/components/SportIconsGrid";
import SocialNetwork from "@/components/SocialNetwork";
import NewsletterSignup from "@/components/NewsletterSignup";
import Footer from "@/components/Footer";

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
      <Navbar />
      <main>
        <GamblaHero />
        <SportIconsGrid />
        
        {/* Social Network Section */}
        <section className="py-20 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <SocialNetwork />
          </div>
        </section>
        
        {/* Newsletter Section */}
        <section className="py-20 bg-gradient-to-b from-gambla-dark to-gray-900">
          <div className="container px-4 sm:px-6 lg:px-8">
            <NewsletterSignup variant="inline" />
          </div>
        </section>

        {/* Final CTA Section */}
        <section className="py-20 bg-gray-900 relative overflow-hidden">
          <div className="absolute inset-0 bg-gambla-gradient opacity-10"></div>
          <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="text-center max-w-4xl mx-auto">
              <h2 className="text-4xl md:text-6xl font-display font-bold text-white mb-6">
                Pronto a Vivere lo Sport{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  in Prima Persona?
                </span>
              </h2>
              <p className="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
                Unisciti a migliaia di appassionati che hanno già scelto GAMBLA 
                come fonte principale di notizie sportive e fantacalcio.
              </p>
              <div className="flex flex-col sm:flex-row gap-4 justify-center">
                <button className="gambla-btn-primary text-lg px-8 py-4">
                  Inizia Subito - È Gratis!
                </button>
                <button className="gambla-btn-secondary text-lg px-8 py-4">
                  Scopri Fantagambla
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

export default Index;
