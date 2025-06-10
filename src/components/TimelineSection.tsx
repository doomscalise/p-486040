
import React, { useState, useEffect, useRef } from "react";
import { Trophy, Users, Zap, Target, Calendar, Star } from "lucide-react";

const TimelineSection = () => {
  const [visibleItems, setVisibleItems] = useState<number[]>([]);
  const [counters, setCounters] = useState({ articles: 0, users: 0, predictions: 0 });
  const timelineRef = useRef<HTMLDivElement>(null);

  const timelineData = [
    {
      year: "2024",
      title: "Nascita di GAMBLA",
      description: "Lanciamo la piattaforma con l'obiettivo di rivoluzionare il mondo dello sport digitale",
      icon: Zap,
      color: "gambla-magenta"
    },
    {
      year: "2024",
      title: "Community in Crescita",
      description: "Raggiungiamo i primi 1000 utenti attivi sulla nostra piattaforma",
      icon: Users,
      color: "gambla-orange"
    },
    {
      year: "2024",
      title: "Fantagambla Launch",
      description: "Introduciamo il nostro sistema di fantasy football innovativo",
      icon: Trophy,
      color: "gambla-yellow"
    },
    {
      year: "2024",
      title: "Obiettivi Futuri",
      description: "Espansione verso nuovi sport e funzionalità avanzate per la community",
      icon: Target,
      color: "gambla-magenta"
    }
  ];

  useEffect(() => {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const index = parseInt(entry.target.getAttribute('data-index') || '0');
            setVisibleItems(prev => [...prev, index]);
          }
        });
      },
      { threshold: 0.3 }
    );

    const timelineItems = timelineRef.current?.querySelectorAll('.timeline-item');
    timelineItems?.forEach((item) => observer.observe(item));

    return () => observer.disconnect();
  }, []);

  useEffect(() => {
    // Animate counters
    const animateCounter = (target: number, setter: (value: number) => void) => {
      let current = 0;
      const increment = target / 50;
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          setter(target);
          clearInterval(timer);
        } else {
          setter(Math.floor(current));
        }
      }, 30);
    };

    if (visibleItems.length > 0) {
      animateCounter(150, (value) => setCounters(prev => ({ ...prev, articles: value })));
      animateCounter(1200, (value) => setCounters(prev => ({ ...prev, users: value })));
      animateCounter(2500, (value) => setCounters(prev => ({ ...prev, predictions: value })));
    }
  }, [visibleItems]);

  return (
    <div className="space-y-16">
      {/* Stats Counter */}
      <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div className="text-center p-6 bg-gradient-to-br from-gambla-magenta/20 to-gambla-orange/20 rounded-2xl border border-gray-700">
          <div className="text-4xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">
            {counters.articles}+
          </div>
          <div className="text-gray-300">Articoli Pubblicati</div>
        </div>
        <div className="text-center p-6 bg-gradient-to-br from-gambla-orange/20 to-gambla-yellow/20 rounded-2xl border border-gray-700">
          <div className="text-4xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">
            {counters.users}+
          </div>
          <div className="text-gray-300">Utenti Attivi</div>
        </div>
        <div className="text-center p-6 bg-gradient-to-br from-gambla-yellow/20 to-gambla-magenta/20 rounded-2xl border border-gray-700">
          <div className="text-4xl font-bold text-transparent bg-clip-text bg-gambla-gradient mb-2">
            {counters.predictions}+
          </div>
          <div className="text-gray-300">Pronostici Vincenti</div>
        </div>
      </div>

      {/* Timeline */}
      <div ref={timelineRef} className="relative">
        <div className="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-gambla-magenta via-gambla-orange to-gambla-yellow"></div>
        
        <div className="space-y-12">
          {timelineData.map((item, index) => (
            <div
              key={index}
              data-index={index}
              className={`timeline-item relative flex items-start space-x-8 transition-all duration-700 ${
                visibleItems.includes(index) 
                  ? 'opacity-100 translate-x-0' 
                  : 'opacity-0 translate-x-8'
              }`}
              style={{ transitionDelay: `${index * 200}ms` }}
            >
              <div className={`relative z-10 w-16 h-16 bg-${item.color}/20 rounded-full flex items-center justify-center border-4 border-gray-800`}>
                <item.icon className={`w-8 h-8 text-${item.color}`} />
                <div className="absolute inset-0 rounded-full bg-gradient-to-r from-gambla-magenta to-gambla-orange opacity-20 animate-pulse"></div>
              </div>
              
              <div className="flex-1 bg-gray-900/50 rounded-2xl p-6 border border-gray-700 hover:border-gambla-magenta/50 transition-all duration-300">
                <div className="flex items-center space-x-3 mb-3">
                  <Calendar className="w-5 h-5 text-gambla-orange" />
                  <span className="text-gambla-orange font-semibold">{item.year}</span>
                </div>
                <h3 className="text-xl font-bold text-white mb-2">{item.title}</h3>
                <p className="text-gray-300">{item.description}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default TimelineSection;
