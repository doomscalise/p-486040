
import React, { useEffect } from "react";
import Navbar from "@/components/Navbar";
import GamblaHero from "@/components/GamblaHero";
import SportIconsGrid from "@/components/SportIconsGrid";
import BottomCTA from "@/components/BottomCTA";
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
        <BottomCTA />
      </main>
      <Footer />
    </div>
  );
};

export default Index;
