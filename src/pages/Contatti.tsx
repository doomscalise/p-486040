
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { Mail, MessageCircle, Send, User, Phone, MapPin, ArrowRight, Clock } from "lucide-react";
import { toast } from "@/hooks/use-toast";

const Contatti = () => {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    message: ""
  });
  const [isSubmitting, setIsSubmitting] = useState(false);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!formData.name || !formData.email || !formData.message) {
      toast({
        title: "Compila tutti i campi",
        description: "Nome, email e messaggio sono obbligatori",
        variant: "destructive"
      });
      return;
    }

    setIsSubmitting(true);

    setTimeout(() => {
      toast({
        title: "Messaggio inviato!",
        description: "Ti risponderemo al più presto. Grazie per averci contattato!"
      });
      setFormData({ name: "", email: "", message: "" });
      setIsSubmitting(false);
    }, 1000);
  };

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
                    💬 Contattaci
                  </div>
                  
                  <h1 className="text-4xl md:text-6xl lg:text-7xl font-display font-bold text-white leading-tight">
                    Contattaci per ogni{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      Domanda
                    </span>{" "}
                    o{" "}
                    <span className="text-transparent bg-clip-text bg-gambla-gradient">
                      Collaborazione
                    </span>
                  </h1>
                  
                  <p className="text-xl text-gray-300 leading-relaxed max-w-2xl">
                    Hai domande, suggerimenti o vuoi collaborare con noi? Scrivici e ti risponderemo il prima possibile!
                  </p>
                </div>

                {/* Quick Stats */}
                <div className="grid grid-cols-2 gap-6">
                  <div className="bg-gradient-to-br from-gray-900 to-gray-800 rounded-xl p-4 border border-gray-700 hover:border-gambla-magenta/50 transition-all duration-300">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">
                      <24 h
                    </div>
                    <div className="text-gray-400 text-sm">
                      Tempo di Risposta
                    </div>
                  </div>
                  <div className="bg-gradient-to-br from-gray-900 to-gray-800 rounded-xl p-4 border border-gray-700 hover:border-gambla-magenta/50 transition-all duration-300">
                    <div className="text-2xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">
                      24/7
                    </div>
                    <div className="text-gray-400 text-sm">
                      Supporto Attivo
                    </div>
                  </div>
                </div>

                <div className="flex flex-col sm:flex-row gap-4">
                  <button className="gambla-btn-primary flex items-center justify-center group">
                    Invia Messaggio
                    <ArrowRight className="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" />
                  </button>
                  
                  <button className="flex items-center justify-center px-6 py-3 text-white border-2 border-gray-600 rounded-full hover:border-white transition-colors">
                    <Clock className="mr-2 w-5 h-5" />
                    Orari di Lavoro
                  </button>
                </div>
              </div>

              {/* Right side - Contact Preview */}
              <div className="relative">
                <div className="relative z-10">
                  <div className="bg-gambla-gradient p-8 rounded-3xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <div className="bg-black p-6 rounded-2xl">
                      <h3 className="text-white font-bold text-xl mb-4 flex items-center">
                        <MessageCircle className="mr-2 w-6 h-6 text-gambla-yellow" />
                        Come Contattarci
                      </h3>
                      <div className="space-y-3">
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white flex items-center">
                            <Mail className="mr-2 w-4 h-4 text-gambla-orange" />
                            Email
                          </span>
                          <span className="text-gambla-orange font-bold">VELOCE</span>
                        </div>
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white flex items-center">
                            <MessageCircle className="mr-2 w-4 h-4 text-gambla-magenta" />
                            Social
                          </span>
                          <span className="text-gambla-magenta font-bold">ATTIVO</span>
                        </div>
                        <div className="flex justify-between items-center p-3 bg-gray-800 rounded-lg hover:bg-gray-700 transition-colors">
                          <span className="text-white flex items-center">
                            <Phone className="mr-2 w-4 h-4 text-gambla-yellow" />
                            Telegram
                          </span>
                          <span className="text-gray-400">Gruppo</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Contact Section */}
        <section className="py-16 bg-black">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
              {/* Contact Info */}
              <div>
                <h2 className="text-3xl md:text-5xl font-display font-bold text-white mb-8">
                  Raggiungi il nostro <span className="text-transparent bg-clip-text bg-gambla-gradient">Team</span>
                </h2>
                
                <div className="space-y-6 mb-8">
                  <div className="gambla-card flex items-start space-x-4">
                    <div className="w-12 h-12 bg-gambla-orange/20 rounded-full flex items-center justify-center flex-shrink-0">
                      <Mail className="w-6 h-6 text-gambla-orange" />
                    </div>
                    <div>
                      <h3 className="text-lg font-semibold text-white mb-2">Email</h3>
                      <p className="text-gray-400">info@gambla.it</p>
                      <p className="text-gray-400">redazione@gambla.it</p>
                    </div>
                  </div>

                  <div className="gambla-card flex items-start space-x-4">
                    <div className="w-12 h-12 bg-gambla-magenta/20 rounded-full flex items-center justify-center flex-shrink-0">
                      <MessageCircle className="w-6 h-6 text-gambla-magenta" />
                    </div>
                    <div>
                      <h3 className="text-lg font-semibold text-white mb-2">Social Media</h3>
                      <div className="space-y-1">
                        <p className="text-gray-400">
                          Instagram:{" "}
                          <a 
                            href="https://www.instagram.com/gambla.it?igsh=MWJxOTQxcmt5b3p6Mg==" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            className="text-gambla-magenta hover:text-gambla-yellow transition-colors duration-300"
                          >
                            @gambla.it
                          </a>
                        </p>
                        <p className="text-gray-400">
                          TikTok:{" "}
                          <a 
                            href="https://www.tiktok.com/@gambla.it?_t=ZN-8x6C4necE6c&_r=1" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            className="text-gambla-magenta hover:text-gambla-yellow transition-colors duration-300"
                          >
                            @gambla.it
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>

                  <div className="gambla-card flex items-start space-x-4">
                    <div className="w-12 h-12 bg-gambla-yellow/20 rounded-full flex items-center justify-center flex-shrink-0">
                      <MessageCircle className="w-6 h-6 text-gambla-yellow" />
                    </div>
                    <div>
                      <h3 className="text-lg font-semibold text-white mb-2">Telegram</h3>
                      <p className="text-gray-400 mb-2">Gruppo pubblico pronostici</p>
                      <a 
                        href="http://t.me/+QHqp3ShP8ZZkOTA0" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        className="text-gambla-yellow hover:text-gambla-orange transition-colors duration-300 font-medium"
                      >
                        Unisciti al gruppo Telegram
                      </a>
                    </div>
                  </div>

                  <div className="gambla-card flex items-start space-x-4">
                    <div className="w-12 h-12 bg-gambla-orange/20 rounded-full flex items-center justify-center flex-shrink-0">
                      <Phone className="w-6 h-6 text-gambla-orange" />
                    </div>
                    <div>
                      <h3 className="text-lg font-semibold text-white mb-2">Risposta Rapida</h3>
                      <p className="text-gray-400">Ti rispondiamo entro 24 ore</p>
                      <p className="text-gray-400">Lunedì - Venerdì: 9:00 - 18:00</p>
                    </div>
                  </div>
                </div>

                <div className="gambla-card">
                  <h3 className="text-lg font-semibold text-white mb-3 flex items-center">
                    <MapPin className="w-5 h-5 text-gambla-orange mr-2" />
                    Come possiamo aiutarti?
                  </h3>
                  <ul className="space-y-2 text-gray-400">
                    <li>• Suggerimenti per nuovi contenuti</li>
                    <li>• Collaborazioni e partnership</li>
                    <li>• Feedback sulla piattaforma</li>
                    <li>• Supporto tecnico</li>
                    <li>• Proposte dalla community</li>
                    <li>• Richieste pubblicitarie</li>
                  </ul>
                </div>
              </div>

              {/* Contact Form */}
              <div className="bg-gambla-gradient p-1 rounded-3xl">
                <div className="bg-black p-8 rounded-3xl">
                  <h2 className="text-2xl font-display font-bold text-white mb-6">
                    Invia un Messaggio
                  </h2>

                  <form onSubmit={handleSubmit} className="space-y-6">
                    <div className="relative">
                      <User className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input
                        type="text"
                        name="name"
                        value={formData.name}
                        onChange={handleChange}
                        placeholder="Il tuo nome"
                        className="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300"
                        required
                      />
                    </div>

                    <div className="relative">
                      <Mail className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                      <input
                        type="email"
                        name="email"
                        value={formData.email}
                        onChange={handleChange}
                        placeholder="La tua email"
                        className="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300"
                        required
                      />
                    </div>

                    <div className="relative">
                      <MessageCircle className="absolute left-3 top-4 text-gray-400 w-5 h-5" />
                      <textarea
                        name="message"
                        value={formData.message}
                        onChange={handleChange}
                        placeholder="Il tuo messaggio"
                        rows={5}
                        className="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300 resize-none"
                        required
                      />
                    </div>

                    <button
                      type="submit"
                      disabled={isSubmitting}
                      className="w-full gambla-btn-tertiary flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                      <Send className="mr-2 w-5 h-5" />
                      {isSubmitting ? "Invio in corso..." : "Invia Messaggio"}
                    </button>
                  </form>

                  <div className="mt-6 text-center">
                    <p className="text-gray-400 text-sm">
                      Ti risponderemo entro 24 ore. La tua privacy è importante per noi.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Contatti;
