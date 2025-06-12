
import React, { useState } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import { ChevronDown, ChevronUp, HelpCircle, Search } from "lucide-react";
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from "@/components/ui/accordion";

const FAQ = () => {
  const [searchTerm, setSearchTerm] = useState("");

  const faqData = [
    {
      category: "Generale",
      questions: [
        {
          question: "Cos'è GAMBLA?",
          answer: "GAMBLA è la tua fonte principale per notizie sportive, fantacalcio e pronostici. Offriamo contenuti di qualità, analisi approfondite e una community appassionata di sport."
        },
        {
          question: "Come posso iscrivermi alla newsletter?",
          answer: "Puoi iscriverti alla nostra newsletter dalla pagina dedicata o compilando il form presente in homepage. Riceverai aggiornamenti settimanali con le migliori notizie sportive."
        },
        {
          question: "GAMBLA è gratuito?",
          answer: "Sì, tutti i nostri contenuti principali sono completamente gratuiti. Offriamo anche contenuti premium per chi vuole approfondimenti esclusivi."
        }
      ]
    },
    {
      category: "Fantacalcio",
      questions: [
        {
          question: "Cos'è Fantagambla?",
          answer: "Fantagambla è la nostra sezione dedicata al fantacalcio, con consigli, formazioni, e analisi per aiutarti a vincere la tua lega."
        },
        {
          question: "Quando vengono pubblicati i consigli per la formazione?",
          answer: "I nostri consigli vengono pubblicati ogni settimana, solitamente il giovedì sera, dopo l'analisi di tutti i match del weekend."
        },
        {
          question: "Posso suggerire giocatori da analizzare?",
          answer: "Assolutamente! Puoi contattarci attraverso i nostri canali social o la pagina contatti per suggerire giocatori da analizzare."
        }
      ]
    },
    {
      category: "Community",
      questions: [
        {
          question: "Come posso unirmi alla community?",
          answer: "Puoi unirti alla nostra community seguendoci sui social media e partecipando al gruppo Telegram dove condividiamo pronostici e discutiamo di sport."
        },
        {
          question: "Posso condividere i miei pronostici?",
          answer: "Certo! Incoraggiamo i membri della community a condividere le loro analisi e pronostici nel gruppo Telegram."
        },
        {
          question: "Organizzate eventi o contest?",
          answer: "Sì, organizziamo regolarmente contest di pronostici e eventi speciali per la community. Seguici sui social per non perdere nessuna novità!"
        }
      ]
    },
    {
      category: "Supporto",
      questions: [
        {
          question: "Come posso contattare il team di GAMBLA?",
          answer: "Puoi contattarci attraverso la pagina contatti, via email a info@gambla.it, o attraverso i nostri canali social ufficiali."
        },
        {
          question: "Quanto tempo impiegate a rispondere?",
          answer: "Cerchiamo di rispondere a tutte le richieste entro 24 ore nei giorni lavorativi. Per richieste urgenti, contattaci sui social media."
        },
        {
          question: "Posso proporre collaborazioni?",
          answer: "Siamo sempre aperti a nuove collaborazioni! Contattaci via email a redazione@gambla.it con la tua proposta."
        }
      ]
    }
  ];

  const filteredFAQ = faqData.map(category => ({
    ...category,
    questions: category.questions.filter(
      q => q.question.toLowerCase().includes(searchTerm.toLowerCase()) ||
           q.answer.toLowerCase().includes(searchTerm.toLowerCase())
    )
  })).filter(category => category.questions.length > 0);

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

          <div className="container px-4 sm:px-6 lg:px-8 relative z-10">
            <div className="text-center max-w-4xl mx-auto mb-16">
              <div className="inline-block px-6 py-3 bg-gambla-gradient/20 rounded-full text-gambla-yellow text-sm font-semibold mb-6">
                <HelpCircle className="w-4 h-4 inline mr-2" />
                Domande Frequenti
              </div>
              
              <h1 className="text-4xl md:text-6xl font-display font-bold text-white mb-6 leading-tight">
                Hai delle{" "}
                <span className="text-transparent bg-clip-text bg-gambla-gradient">
                  Domande?
                </span>
              </h1>
              <p className="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Trova rapidamente le risposte che cerchi nella nostra sezione FAQ
              </p>

              {/* Search Bar */}
              <div className="max-w-md mx-auto relative">
                <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
                <input
                  type="text"
                  placeholder="Cerca nelle FAQ..."
                  value={searchTerm}
                  onChange={(e) => setSearchTerm(e.target.value)}
                  className="w-full pl-10 pr-4 py-3 bg-white/10 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gambla-magenta focus:border-transparent transition-all duration-300"
                />
              </div>
            </div>
          </div>
        </section>

        {/* FAQ Content */}
        <section className="py-16 bg-gambla-dark">
          <div className="container px-4 sm:px-6 lg:px-8">
            <div className="max-w-4xl mx-auto">
              {filteredFAQ.length > 0 ? (
                filteredFAQ.map((category, categoryIndex) => (
                  <div key={categoryIndex} className="mb-12">
                    <h2 className="text-2xl font-display font-bold text-white mb-6 flex items-center">
                      <span className="w-8 h-8 bg-gambla-gradient rounded-full flex items-center justify-center text-white text-sm font-bold mr-3">
                        {categoryIndex + 1}
                      </span>
                      {category.category}
                    </h2>
                    
                    <Accordion type="single" collapsible className="space-y-4">
                      {category.questions.map((faq, index) => (
                        <AccordionItem
                          key={index}
                          value={`item-${categoryIndex}-${index}`}
                          className="gambla-card border-none"
                        >
                          <AccordionTrigger className="text-left text-white hover:text-gambla-orange transition-colors duration-300 py-6">
                            {faq.question}
                          </AccordionTrigger>
                          <AccordionContent className="text-gray-300 pb-6 leading-relaxed">
                            {faq.answer}
                          </AccordionContent>
                        </AccordionItem>
                      ))}
                    </Accordion>
                  </div>
                ))
              ) : (
                <div className="text-center py-16">
                  <HelpCircle className="w-16 h-16 text-gray-600 mx-auto mb-4" />
                  <h3 className="text-xl font-semibold text-white mb-2">
                    Nessun risultato trovato
                  </h3>
                  <p className="text-gray-400">
                    Prova a modificare i termini di ricerca o{" "}
                    <a href="/contatti" className="text-gambla-magenta hover:text-gambla-orange transition-colors">
                      contattaci direttamente
                    </a>
                  </p>
                </div>
              )}

              {/* Contact CTA */}
              <div className="mt-16 text-center gambla-card">
                <h3 className="text-2xl font-display font-bold text-white mb-4">
                  Non hai trovato quello che cerchi?
                </h3>
                <p className="text-gray-300 mb-6">
                  Il nostro team è sempre disponibile per aiutarti
                </p>
                <a
                  href="/contatti"
                  className="gambla-btn-primary inline-block"
                >
                  Contattaci Ora
                </a>
              </div>
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default FAQ;
