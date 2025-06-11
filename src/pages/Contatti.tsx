
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import SocialNetwork from "@/components/SocialNetwork";
import { Mail, MessageCircle, Send, User, Phone, MapPin, ArrowRight, Clock } from "lucide-react";
import { toast } from "@/hooks/use-toast";

const Contatti = () => {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    message: ""
  });
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [currentStep, setCurrentStep] = useState(0);

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
      setCurrentStep(0);
    }, 1000);
  };

  const nextStep = () => {
    if (currentStep < 2) setCurrentStep(currentStep + 1);
  };

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
                Entra in{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Contatto
                </span>
              </h1>
              <p className="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Scrivici attraverso i nostri canali di comunicazione
              </p>
            </div>

            {/* Hide Social Network Section */}
            <SocialNetwork hideNetworkVisualization={true} />
          </div>
        </section>

        {/* Contact Section */}
        <section className="py-16 bg-gambla-dark">
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

              {/* Compact Form */}
              <div className="bg-gambla-gradient p-1 rounded-2xl h-fit">
                <div className="bg-gambla-dark p-4 rounded-2xl">
                  <div className="flex items-center justify-between mb-3">
                    <h2 className="text-lg font-display font-bold text-white">
                      Invia un Messaggio
                    </h2>
                    <div className="flex space-x-1">
                      {[0, 1, 2].map((step) => (
                        <div
                          key={step}
                          className={`w-1.5 h-1.5 rounded-full transition-colors ${
                            step <= currentStep ? 'bg-gambla-orange' : 'bg-gray-600'
                          }`}
                        />
                      ))}
                    </div>
                  </div>

                  <form onSubmit={handleSubmit} className="space-y-3">
                    {currentStep === 0 && (
                      <div className="space-y-2 animate-fade-in">
                        <div className="relative">
                          <User className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
                          <input
                            type="text"
                            name="name"
                            value={formData.name}
                            onChange={handleChange}
                            placeholder="Il tuo nome"
                            className="w-full pl-10 pr-3 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300 text-sm"
                            required
                          />
                        </div>
                        <button
                          type="button"
                          onClick={nextStep}
                          disabled={!formData.name}
                          className="w-full gambla-btn-primary disabled:opacity-50 py-2 text-sm"
                        >
                          Continua
                        </button>
                      </div>
                    )}

                    {currentStep === 1 && (
                      <div className="space-y-2 animate-fade-in">
                        <div className="relative">
                          <Mail className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
                          <input
                            type="email"
                            name="email"
                            value={formData.email}
                            onChange={handleChange}
                            placeholder="La tua email"
                            className="w-full pl-10 pr-3 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300 text-sm"
                            required
                          />
                        </div>
                        <button
                          type="button"
                          onClick={nextStep}
                          disabled={!formData.email}
                          className="w-full gambla-btn-primary disabled:opacity-50 py-2 text-sm"
                        >
                          Continua
                        </button>
                      </div>
                    )}

                    {currentStep === 2 && (
                      <div className="space-y-2 animate-fade-in">
                        <div className="relative">
                          <MessageCircle className="absolute left-3 top-3 text-gray-400 w-4 h-4" />
                          <textarea
                            name="message"
                            value={formData.message}
                            onChange={handleChange}
                            placeholder="Il tuo messaggio"
                            rows={2}
                            className="w-full pl-10 pr-3 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-orange focus:border-transparent transition-all duration-300 resize-none text-sm"
                            required
                          />
                        </div>
                        <button
                          type="submit"
                          disabled={isSubmitting || !formData.message}
                          className="w-full gambla-btn-tertiary flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed py-2 text-sm"
                        >
                          <Send className="mr-2 w-4 h-4" />
                          {isSubmitting ? "Invio in corso..." : "Invia Messaggio"}
                        </button>
                      </div>
                    )}
                  </form>
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
