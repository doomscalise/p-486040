
import React from "react";
import { Instagram, MessageCircle, Send, Mail } from "lucide-react";

const SocialNetwork = () => {
  const socialNodes = [
    {
      icon: Instagram,
      name: "Instagram",
      handle: "@gambla.it",
      color: "from-pink-500 to-purple-600",
      followers: "8.2K",
      position: "top-4 left-8"
    },
    {
      icon: MessageCircle,
      name: "TikTok", 
      handle: "@gambla.it",
      color: "from-black to-red-600",
      followers: "12.5K",
      position: "top-12 right-12"
    },
    {
      icon: Send,
      name: "Telegram",
      handle: "Community GAMBLA",
      color: "from-blue-400 to-blue-600",
      followers: "3.1K",
      position: "bottom-8 left-12"
    },
    {
      icon: Mail,
      name: "Newsletter",
      handle: "Aggiornamenti Weekly",
      color: "from-gambla-orange to-gambla-magenta",
      followers: "5.8K",
      position: "bottom-4 right-8"
    }
  ];

  return (
    <div className="animate-on-scroll">
      <div className="text-center mb-12">
        <div className="inline-block px-6 py-3 bg-gambla-gradient/20 rounded-full text-gambla-yellow text-sm font-semibold mb-6">
          🌐 La Nostra Community
        </div>
        
        <h2 className="text-4xl md:text-5xl font-display font-bold text-white mb-6">
          Connessi al{" "}
          <span className="text-transparent bg-clip-text bg-gambla-gradient">
            Mondo Sport
          </span>
        </h2>
        
        <p className="text-xl text-gray-300 max-w-2xl mx-auto">
          Unisciti alla community più appassionata d'Italia. 
          Seguici su tutti i canali per non perdere nemmeno una notizia!
        </p>
      </div>

      {/* Network visualization */}
      <div className="relative h-96 mx-auto max-w-4xl">
        {/* Central Hub */}
        <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
          <div className="w-20 h-20 bg-gambla-gradient rounded-full flex items-center justify-center shadow-lg animate-pulse-slow">
            <span className="text-white font-bold text-2xl">G</span>
          </div>
          <div className="text-center mt-2">
            <span className="text-white font-semibold">GAMBLA</span>
          </div>
        </div>

        {/* Social Nodes */}
        {socialNodes.map((node, index) => {
          const Icon = node.icon;
          return (
            <div
              key={node.name}
              className={`absolute ${node.position} group cursor-pointer`}
              style={{ animationDelay: `${index * 0.2}s` }}
            >
              {/* Connection Line */}
              <svg className="absolute inset-0 w-full h-full -z-10" style={{
                left: node.position.includes('left') ? '50px' : '-50px',
                top: node.position.includes('top') ? '50px' : '-50px',
              }}>
                <line
                  x1="50%"
                  y1="50%"
                  x2={node.position.includes('left') ? '100%' : '0%'}
                  y2={node.position.includes('top') ? '100%' : '0%'}
                  stroke="url(#gradient)"
                  strokeWidth="2"
                  className="opacity-30 group-hover:opacity-70 transition-opacity duration-300"
                />
                <defs>
                  <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stopColor="#FF1493" />
                    <stop offset="100%" stopColor="#FF8C00" />
                  </linearGradient>
                </defs>
              </svg>

              {/* Node */}
              <div className="group">
                <div className={`w-16 h-16 bg-gradient-to-br ${node.color} rounded-full flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform duration-300 animate-float`}>
                  <Icon className="w-8 h-8 text-white" />
                </div>
                
                {/* Info Card */}
                <div className="absolute top-20 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gambla-dark/90 backdrop-blur-md rounded-lg p-3 min-w-max border border-gray-700">
                  <h4 className="text-white font-semibold text-sm">{node.name}</h4>
                  <p className="text-gray-300 text-xs">{node.handle}</p>
                  <p className="text-gambla-yellow text-xs font-semibold">{node.followers} followers</p>
                </div>
              </div>
            </div>
          );
        })}
      </div>

      {/* CTA Buttons */}
      <div className="text-center mt-12">
        <div className="flex flex-wrap justify-center gap-4">
          <button className="gambla-btn-primary">
            Seguici su Instagram
          </button>
          <button className="gambla-btn-secondary">
            Unisciti al Telegram
          </button>
        </div>
      </div>
    </div>
  );
};

export default SocialNetwork;
