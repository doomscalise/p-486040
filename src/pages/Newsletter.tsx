
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import NewsletterSignup from "@/components/NewsletterSignup";
import { Mail, Users, TrendingUp, Award, Clock, CheckCircle } from "lucide-react";

const Newsletter = () => {
  const benefits = [
    {
      icon: TrendingUp,
      title: "Notizie Esclusive",
      description: "Ricevi per primo le breaking news del mondo sportivo direttamente nella tua inbox",
      color: "text-gambla-orange"
    },
    {
      icon: Award,
      title: "Pronostici Premium",
      description: "Analisi approfondite e pronostici esclusivi per maximizzare le tue vincite",
      color: "text-gambla-magenta"
    },
    {
      icon: Users,
      title: "Community VIP",
      description: "Accesso prioritario a contenuti speciali e eventi riservati agli iscritti",
      color: "text-gambla-yellow"
    },
    {
      icon: Clock,
      title: "Aggiornamenti Tempestivi",
      description: "Non perdere mai una notizia importante con i nostri update in tempo reale",
      color: "text-gambla-orange"
    }
  ];

  const testimonials = [
    {
      name: "Marco R.",
      text: "Grazie ai consigli di GAMBLA ho migliorato notevolmente le mie performance al fantacalcio!",
      role: "Iscritto da 2 anni"
    },
    {
      name: "Giulia T.",
      text: "La newsletter è diventata la mia lettura quotidiana. Contenuti sempre aggiornati e di qualità.",
      role: "Iscritto da 1 anno"
    },
    {
      name: "Alessandro M.",
      text: "Finalmente una fonte affidabile per il mondo dello sport. Consigliatissimo!",
      role: "Iscritto da 6 mesi"
    }
  ];

  const features = [
    "✅ Aggiornamenti settimanali",
    "✅ Contenuti esclusivi",
    "✅ Pronostici esperti",
    "✅ Cancellazione in qualsiasi momento",
    "✅ Zero spam garantito",
    "✅ Accesso community VIP"
  ];

  return (
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="py-20 bg-gambla-dark relative overflow-hidden">
          <div className="absolute inset-0 opacity-10">
            <div className="absolute inset-0" style={{
              backgroundImage: `radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0)`,
              backgroundSize: '50px 50px'
            }}></div>
          </div>

          <div className="absolute top-20 right-20 w-32 h-32 bg-gambla-magenta/20 rounded-full blur-xl animate-float"></div>
          <div className="absolute bottom-40 left-20 w-40 h-40 bg-gambla-orange/20 rounded-full blur-xl animate-float" style={{ animationDelay: '2s' }}></div>

          <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="text-center max-w-4xl mx-auto mb-16">
              <div className="inline-block px-6 py-3 bg-gambla-gradient/20 rounded-full text-gambla-yellow text-sm font-semibold mb-6">
                <Mail className="w-4 h-4 inline mr-2" />
                Newsletter Esclusiva
              </div>
              
              <h1 className="text-4xl md:text-6xl font-display font-bold text-white mb-6 leading-tight">
                Resta Sempre{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Aggiornato
                </span>
              </h1>
              <p className="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Unisciti a migliaia di appassionati che ricevono i migliori contenuti sportivi direttamente nella loro inbox
              </p>

              <div className="flex flex-wrap justify-center gap-6 mb-8">
                <div className="flex items-center text-gray-300">
                  <CheckCircle className="w-5 h-5 text-green-500 mr-2" />
                  <span>Oltre 5.000 iscritti</span>
                </div>
                <div className="flex items-center text-gray-300">
                  <CheckCircle className="w-5 h-5 text-green-500 mr-2" />
                  <span>Contenuti settimanali</span>
                </div>
                <div className="flex items-center text-gray-300">
                  <CheckCircle className="w-5 h-5 text-green-500 mr-2" />
                  <span>100% Gratuito</span>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Newsletter Signup Section */}
        <section className="py-16 bg-gradient-to-b from-gambla-dark to-gray-900">
          <div className="container px-4 sm:px-6 lg:px-8">
            <NewsletterSignup variant="inline" />
          </div>
        </section>

        {/* Benefits Section */}
        <section className="py-16 bg-gray-900">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="text-center mb-16">
              <h2 className="text-3xl md:text-5xl font-display font-bold text-white mb-6">
                Perché Iscriversi alla{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Newsletter?
                </span>
              </h2>
              <p className="text-xl text-gray-300 max-w-2xl mx-auto">
                Scopri tutti i vantaggi esclusivi riservati ai nostri iscritti
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              {benefits.map((benefit, index) => (
                <div key={index} className="gambla-card text-center group hover:scale-105 transition-transform duration-300">
                  <div className={`w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-br from-gray-800 to-gray-700 flex items-center justify-center group-hover:from-gambla-orange/20 group-hover:to-gambla-magenta/20 transition-all duration-300`}>
                    <benefit.icon className={`w-8 h-8 ${benefit.color}`} />
                  </div>
                  <h3 className="text-xl font-display font-bold text-white mb-3">
                    {benefit.title}
                  </h3>
                  <p className="text-gray-300 leading-relaxed">
                    {benefit.description}
                  </p>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Features List */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="max-w-4xl mx-auto">
              <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                  <h2 className="text-3xl md:text-4xl font-display font-bold text-white mb-6">
                    Cosa Include la{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      Newsletter
                    </span>
                  </h2>
                  <div className="space-y-4">
                    {features.map((feature, index) => (
                      <div key={index} className="text-lg text-gray-300">
                        {feature}
                      </div>
                    ))}
                  </div>
                </div>
                
                <div className="gambla-card">
                  <h3 className="text-xl font-display font-bold text-white mb-4">
                    📊 Statistiche Newsletter
                  </h3>
                  <div className="space-y-4">
                    <div className="flex justify-between items-center">
                      <span className="text-gray-300">Iscritti Attivi</span>
                      <span className="text-gambla-orange font-bold">5.000+</span>
                    </div>
                    <div className="flex justify-between items-center">
                      <span className="text-gray-300">Tasso di Apertura</span>
                      <span className="text-gambla-magenta font-bold">78%</span>
                    </div>
                    <div className="flex justify-between items-center">
                      <span className="text-gray-300">Frequenza Invio</span>
                      <span className="text-gambla-yellow font-bold">Settimanale</span>
                    </div>
                    <div className="flex justify-between items-center">
                      <span className="text-gray-300">Soddisfazione</span>
                      <span className="text-green-400 font-bold">95%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Testimonials */}
        <section className="py-16 bg-gray-900">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="text-center mb-16">
              <h2 className="text-3xl md:text-4xl font-display font-bold text-white mb-6">
                Cosa Dicono i Nostri{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Iscritti
                </span>
              </h2>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
              {testimonials.map((testimonial, index) => (
                <div key={index} className="gambla-card">
                  <div className="mb-4">
                    {[...Array(5)].map((_, i) => (
                      <span key={i} className="text-gambla-yellow text-lg">⭐</span>
                    ))}
                  </div>
                  <p className="text-gray-300 mb-4 italic">
                    "{testimonial.text}"
                  </p>
                  <div>
                    <div className="font-semibold text-white">{testimonial.name}</div>
                    <div className="text-sm text-gray-400">{testimonial.role}</div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Final CTA */}
        <section className="py-20 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="text-center max-w-4xl mx-auto">
              <h2 className="text-4xl md:text-5xl font-display font-bold text-white mb-6">
                Pronto a Unirti alla{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Community?
                </span>
              </h2>
              <p className="text-xl text-gray-300 mb-10">
                Non perdere l'opportunità di rimanere sempre aggiornato sul mondo dello sport
              </p>
              <a href="#newsletter" className="gambla-btn-primary text-lg px-8 py-4">
                Iscriviti Ora - È Gratis!
              </a>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Newsletter;
