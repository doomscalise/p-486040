
import Navbar from "@/components/Navbar";
import GamblaHero from "@/components/GamblaHero";
import Footer from "@/components/Footer";
import Newsletter from "@/components/Newsletter";
import { Sparkles, Target, Users, Trophy, BarChart3, MessageCircle } from "lucide-react";

const Index = () => {
  return (
    <div className="min-h-screen bg-gambla-dark">
      <Navbar />
      <GamblaHero />
      
      {/* Servizi GAMBLA Section */}
      <section className="py-20 bg-gradient-to-b from-gambla-dark to-black relative overflow-hidden">
        <div className="absolute inset-0 bg-grid-pattern opacity-5"></div>
        <div className="container mx-auto px-4 relative z-10">
          <div className="text-center mb-16 animate-fade-in">
            <div className="inline-flex items-center gap-2 bg-gambla-gradient px-6 py-2 rounded-full text-white font-medium text-sm mb-6">
              <Sparkles className="w-4 h-4" />
              I Nostri Servizi
            </div>
            <h2 className="text-4xl md:text-6xl font-display font-bold mb-6 text-transparent bg-clip-text bg-gambla-gradient">
              Cosa Offre GAMBLA
            </h2>
            <p className="text-xl text-gray-300 max-w-3xl mx-auto">
              La piattaforma completa per gli appassionati di sport: analisi, community e strumenti avanzati
            </p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            {/* Analisi Sportive */}
            <div className="group bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl border border-gray-700 hover:border-gambla-magenta/50 transition-all duration-300 hover:transform hover:scale-105 cursor-pointer">
              <div className="w-16 h-16 bg-gambla-gradient rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <BarChart3 className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-display font-bold text-white mb-4">Analisi Avanzate</h3>
              <p className="text-gray-300 mb-6">
                Statistiche in tempo reale, pronostici AI e analisi approfondite per ogni partita e competizione.
              </p>
              <div className="bg-black/50 p-4 rounded-xl border border-gambla-magenta/20">
                <div className="flex justify-between items-center mb-2">
                  <span className="text-sm text-gray-400">Accuratezza AI</span>
                  <span className="text-gambla-magenta font-bold">87%</span>
                </div>
                <div className="w-full bg-gray-700 rounded-full h-2">
                  <div className="bg-gambla-gradient h-2 rounded-full" style={{ width: '87%' }}></div>
                </div>
              </div>
            </div>

            {/* FantaGambla */}
            <div className="group bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl border border-gray-700 hover:border-gambla-orange/50 transition-all duration-300 hover:transform hover:scale-105 cursor-pointer">
              <div className="w-16 h-16 bg-gradient-to-r from-gambla-orange to-yellow-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <Trophy className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-display font-bold text-white mb-4">FantaGambla</h3>
              <p className="text-gray-300 mb-6">
                Il fantacalcio più innovativo d'Italia con premi reali, leghe esclusive e competizioni settimanali.
              </p>
              <div className="bg-black/50 p-4 rounded-xl border border-gambla-orange/20">
                <div className="flex justify-between items-center mb-2">
                  <span className="text-sm text-gray-400">La Tua Posizione</span>
                  <span className="text-gambla-orange font-bold">#3</span>
                </div>
                <div className="flex justify-between items-center">
                  <span className="text-sm text-gray-400">Punti Totali</span>
                  <span className="text-yellow-400 font-bold">1,247</span>
                </div>
              </div>
            </div>

            {/* Community */}
            <div className="group bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl border border-gray-700 hover:border-yellow-400/50 transition-all duration-300 hover:transform hover:scale-105 cursor-pointer">
              <div className="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <MessageCircle className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-display font-bold text-white mb-4">Community Attiva</h3>
              <p className="text-gray-300 mb-6">
                Confrontati con migliaia di appassionati, condividi previsioni e partecipa alle discussioni più accese.
              </p>
              <div className="bg-black/50 p-4 rounded-xl border border-yellow-400/20">
                <div className="flex justify-between items-center mb-2">
                  <span className="text-sm text-gray-400">Membri Online</span>
                  <span className="text-gambla-magenta font-bold">342</span>
                </div>
                <div className="flex justify-between items-center">
                  <span className="text-sm text-gray-400">Discussioni Attive</span>
                  <span className="text-gambla-orange font-bold">28</span>
                </div>
              </div>
            </div>

            {/* Notizie Live */}
            <div className="group bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl border border-gray-700 hover:border-gambla-magenta/50 transition-all duration-300 hover:transform hover:scale-105 cursor-pointer">
              <div className="w-16 h-16 bg-gambla-gradient rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <Target className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-display font-bold text-white mb-4">Notizie Live</h3>
              <p className="text-gray-300 mb-6">
                Aggiornamenti in tempo reale su tutti gli sport, con notifiche personalizzate e breaking news.
              </p>
              <div className="bg-black/50 p-4 rounded-xl border border-gambla-magenta/20">
                <div className="flex justify-between items-center mb-2">
                  <span className="text-sm text-gray-400">Stato</span>
                  <span className="text-green-400 font-bold flex items-center gap-1">
                    <div className="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    LIVE
                  </span>
                </div>
                <div className="flex justify-between items-center">
                  <span className="text-sm text-gray-400">Aggiornamenti/Giorno</span>
                  <span className="text-gambla-orange font-bold">150+</span>
                </div>
              </div>
            </div>

            {/* Statistiche Avanzate */}
            <div className="group bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl border border-gray-700 hover:border-gambla-orange/50 transition-all duration-300 hover:transform hover:scale-105 cursor-pointer">
              <div className="w-16 h-16 bg-gradient-to-r from-gambla-orange to-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <Users className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-display font-bold text-white mb-4">Dashboard Personale</h3>
              <p className="text-gray-300 mb-6">
                La tua area riservata con statistiche personali, cronologia scommesse e performance tracking.
              </p>
              <div className="bg-black/50 p-4 rounded-xl border border-gambla-orange/20">
                <div className="flex justify-between items-center mb-2">
                  <span className="text-sm text-gray-400">Win Rate</span>
                  <span className="text-green-400 font-bold">73%</span>
                </div>
                <div className="flex justify-between items-center">
                  <span className="text-sm text-gray-400">Profit/Loss</span>
                  <span className="text-green-400 font-bold">+€2,847</span>
                </div>
              </div>
            </div>

            {/* Blog & Insights */}
            <div className="group bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-3xl border border-gray-700 hover:border-yellow-400/50 transition-all duration-300 hover:transform hover:scale-105 cursor-pointer">
              <div className="w-16 h-16 bg-gradient-to-r from-yellow-400 to-gambla-magenta rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <Sparkles className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-2xl font-display font-bold text-white mb-4">Blog & Insights</h3>
              <p className="text-gray-300 mb-6">
                Articoli esclusivi, interviste e approfondimenti scritti dai nostri esperti del settore.
              </p>
              <div className="bg-black/50 p-4 rounded-xl border border-yellow-400/20">
                <div className="flex justify-between items-center mb-2">
                  <span className="text-sm text-gray-400">Articoli/Settimana</span>
                  <span className="text-yellow-400 font-bold">15+</span>
                </div>
                <div className="flex justify-between items-center">
                  <span className="text-sm text-gray-400">Letture Medie</span>
                  <span className="text-gambla-magenta font-bold">12.5K</span>
                </div>
              </div>
            </div>
          </div>

          {/* CTA Section */}
          <div className="text-center">
            <div className="bg-gradient-to-r from-gray-800 to-gray-900 p-8 rounded-3xl border border-gray-700 max-w-4xl mx-auto">
              <h3 className="text-3xl font-display font-bold text-white mb-4">
                Pronto a Trasformare la Tua Passione in Successo?
              </h3>
              <p className="text-gray-300 mb-8 text-lg">
                Unisciti alla community più dinamica d'Italia e inizia a vincere con GAMBLA
              </p>
              <div className="flex flex-col sm:flex-row gap-4 justify-center">
                <button className="gambla-btn-primary text-lg px-8 py-4">
                  Inizia Gratis Ora
                </button>
                <a 
                  href="https://blog.gambla.it" 
                  target="_blank" 
                  rel="noopener noreferrer"
                  className="gambla-btn-secondary text-lg px-8 py-4 inline-flex items-center justify-center"
                >
                  Leggi il Blog
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <Newsletter />
      <Footer />
    </div>
  );
};

export default Index;
