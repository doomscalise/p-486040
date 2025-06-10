
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { Mail, MessageCircle, Send, User } from "lucide-react";
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
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="py-16 bg-gambla-gradient">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="text-center max-w-4xl mx-auto">
              <h1 className="section-title mb-6">
                Contattaci per la Tua <span className="text-gambla-orange">Voce!</span>
              </h1>
              <p className="section-subtitle mx-auto">
                Hai domande o idee? Scrivi al nostro team e unisciti alla conversazione!
              </p>
            </div>
          </div>
        </section>

        {/* Contact Form Section */}
        <section className="py-16">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
              {/* Contact Info */}
              <div>
                <h2 className="text-3xl font-display font-bold text-white mb-8">
                  Parliamo di <span className="text-gambla-yellow">Sport!</span>
                </h2>
                
                <div className="space-y-6 mb-8">
                  <div className="flex items-start space-x-4">
                    <div className="w-12 h-12 bg-gambla-orange/20 rounded-full flex items-center justify-center flex-shrink-0">
                      <Mail className="w-6 h-6 text-gambla-orange" />
                    </div>
                    <div>
                      <h3 className="text-lg font-semibold text-white mb-2">Email</h3>
                      <p className="text-gray-400">info@gambla.it</p>
                      <p className="text-gray-400">redazione@gambla.it</p>
                    </div>
                  </div>

                  <div className="flex items-start space-x-4">
                    <div className="w-12 h-12 bg-gambla-pink/20 rounded-full flex items-center justify-center flex-shrink-0">
                      <MessageCircle className="w-6 h-6 text-gambla-pink" />
                    </div>
                    <div>
                      <h3 className="text-lg font-semibold text-white mb-2">Social Media</h3>
                      <div className="space-y-1">
                        <p className="text-gray-400">
                          Instagram:{" "}
                          <a 
                            href="https://instagram.com/gambla_it" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            className="text-gambla-pink hover:text-gambla-yellow transition-colors duration-300"
                          >
                            @gambla_it
                          </a>
                        </p>
                        <p className="text-gray-400">
                          TikTok:{" "}
                          <a 
                            href="https://tiktok.com/@gambla_it" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            className="text-gambla-pink hover:text-gambla-yellow transition-colors duration-300"
                          >
                            @gambla_it
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="bg-gray-800/30 backdrop-blur-sm rounded-xl p-6 border border-gray-700">
                  <h3 className="text-lg font-semibold text-white mb-3">
                    Perché contattarci?
                  </h3>
                  <ul className="space-y-2 text-gray-400">
                    <li>• Suggerimenti per articoli</li>
                    <li>• Collaborazioni e partnership</li>
                    <li>• Feedback sulla piattaforma</li>
                    <li>• Supporto tecnico</li>
                    <li>• Proposte per la community</li>
                  </ul>
                </div>
              </div>

              {/* Contact Form */}
              <div className="bg-gray-800/30 backdrop-blur-sm rounded-2xl p-8 border border-gray-700">
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
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Contatti;
