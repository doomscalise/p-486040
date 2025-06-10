import React from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import TimelineSection from "@/components/TimelineSection";
import { Heart, Target, Users, Zap } from "lucide-react";

const ChiSiamo = () => {
  const teamMembers = [
    {
      name: "Marco",
      role: "Founder & Sports Analyst",
      bio: "Appassionato di calcio da sempre, trasforma le statistiche in storie",
      avatar: "🏆",
      specialty: "Analisi Tattiche"
    },
    {
      name: "Luca", 
      role: "Content Creator",
      bio: "La voce della community, sempre aggiornato sulle ultime news",
      avatar: "📱",
      specialty: "Social Media"
    },
    {
      name: "Sofia",
      role: "Data Scientist", 
      bio: "I numeri non mentono mai, trasforma i dati in pronostici vincenti",
      avatar: "📊",
      specialty: "Pronostici"
    }
  ];

  return (
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="py-20 bg-gambla-dark relative overflow-hidden">
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

          <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="text-center max-w-4xl mx-auto mb-16">
              <h1 className="text-4xl md:text-6xl font-display font-bold text-white mb-6 leading-tight">
                Chi Siamo{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Noi
                </span>
              </h1>
              <p className="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Un team giovane e appassionato che vive lo sport a 360 gradi
              </p>
            </div>

            {/* Timeline Section */}
            <TimelineSection />
          </div>
        </section>

        {/* Team Section */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <h2 className="text-3xl md:text-5xl font-display font-bold text-white text-center mb-12">
              Il Nostro <span className="text-transparent bg-clip-text bg-gambla-gradient">Team</span>
            </h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              {teamMembers.map((member, index) => (
                <div key={index} className="gambla-card text-center group hover:scale-105 transition-all duration-300">
                  <div className="text-6xl mb-4">{member.avatar}</div>
                  <h3 className="text-xl font-bold text-white mb-2">{member.name}</h3>
                  <p className="text-gambla-orange font-semibold mb-3">{member.role}</p>
                  <p className="text-gray-400 mb-4">{member.bio}</p>
                  <div className="inline-block px-3 py-1 bg-gambla-gradient/20 rounded-full text-gambla-yellow text-sm">
                    {member.specialty}
                  </div>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Values Section */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <h2 className="text-3xl md:text-5xl font-display font-bold text-white text-center mb-12">
              I Nostri <span className="text-transparent bg-clip-text bg-gambla-gradient">Valori</span>
            </h2>
            
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              <div className="text-center">
                <div className="w-16 h-16 bg-gambla-magenta/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Heart className="w-8 h-8 text-gambla-magenta" />
                </div>
                <h3 className="text-xl font-bold text-white mb-2">Passione</h3>
                <p className="text-gray-400">Lo sport è la nostra vita</p>
              </div>
              
              <div className="text-center">
                <div className="w-16 h-16 bg-gambla-orange/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Target className="w-8 h-8 text-gambla-orange" />
                </div>
                <h3 className="text-xl font-bold text-white mb-2">Precisione</h3>
                <p className="text-gray-400">Analisi accurate e dettagliate</p>
              </div>
              
              <div className="text-center">
                <div className="w-16 h-16 bg-gambla-yellow/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Users className="w-8 h-8 text-gambla-yellow" />
                </div>
                <h3 className="text-xl font-bold text-white mb-2">Community</h3>
                <p className="text-gray-400">Insieme siamo più forti</p>
              </div>
              
              <div className="text-center">
                <div className="w-16 h-16 bg-gambla-magenta/20 rounded-full flex items-center justify-center mx-auto mb-4">
                  <Zap className="w-8 h-8 text-gambla-magenta" />
                </div>
                <h3 className="text-xl font-bold text-white mb-2">Innovazione</h3>
                <p className="text-gray-400">Sempre un passo avanti</p>
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default ChiSiamo;
