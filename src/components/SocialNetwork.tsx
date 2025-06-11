
import React from "react";
import { Instagram, Send, Mail } from "lucide-react";

const SocialNetwork = ({ hideNetworkVisualization = false }) => {
  const socialNodes = [
    {
      icon: Instagram,
      name: "Instagram",
      handle: "@gambla.it",
      color: "from-pink-500 to-purple-600",
      followers: "8.2K",
      angle: 0, // Top
      link: "https://instagram.com/gambla.it",
    },
    {
      icon: "TikTok",
      name: "TikTok", 
      handle: "@gambla.it",
      color: "from-black to-red-600",
      followers: "12.5K",
      angle: 90, // Right
      link: "https://tiktok.com/@gambla.it",
    },
    {
      icon: Send,
      name: "Telegram",
      handle: "Community GAMBLA",
      color: "from-blue-400 to-blue-600",
      followers: "3.1K",
      angle: 180, // Bottom
      link: "https://t.me/+QHqp3ShP8ZZkOTA0?fbclid=PAZXh0bgNhZW0CMTEAAacaMd9hyFpQJfWwQryQplF_XPO5Zhl48Xer1pft84qjll4AqbffBxL2boof7g_aem_n3yWzB4S3Zkb4URTkUlS3A",
    },
    {
      icon: Mail,
      name: "Newsletter",
      handle: "Aggiornamenti Weekly",
      color: "from-gambla-orange to-gambla-magenta",
      followers: "5.8K",
      angle: 270, // Left
      link: "mailto:info@gambla.it",
    }
  ];

  const handleSocialClick = (link) => {
    if (link.startsWith('mailto:')) {
      window.location.href = link;
    } else {
      window.open(link, '_blank', 'noopener,noreferrer');
    }
  };

  // Calcola posizione geometrica perfetta
  const getPositionFromAngle = (angle, radius = 120) => {
    const radian = (angle * Math.PI) / 180;
    const x = Math.cos(radian) * radius;
    const y = Math.sin(radian) * radius;
    return {
      transform: `translate(${x}px, ${y}px)`
    };
  };

  // Calcola posizione info card per evitare sovrapposizioni
  const getInfoPosition = (angle) => {
    if (angle === 0) return "top-full mt-4 left-1/2 -translate-x-1/2"; // Top icon
    if (angle === 90) return "left-full ml-4 top-1/2 -translate-y-1/2"; // Right icon
    if (angle === 180) return "bottom-full mb-4 left-1/2 -translate-x-1/2"; // Bottom icon
    if (angle === 270) return "right-full mr-4 top-1/2 -translate-y-1/2"; // Left icon
    return "top-full mt-4 left-1/2 -translate-x-1/2";
  };

  // Se hideNetworkVisualization è true, non mostrare nulla
  if (hideNetworkVisualization) {
    return null;
  }

  return (
    <div className="animate-on-scroll">
      <div className="text-center mb-16">
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

      {/* Network visualization geometricamente perfetto */}
      <div className="relative h-96 mx-auto max-w-3xl flex items-center justify-center">
        {/* Logo centrale GAMBLA */}
        <div className="relative z-10 group cursor-pointer">
          <div className="w-32 h-32 bg-gambla-gradient rounded-full flex items-center justify-center shadow-2xl transition-all duration-500 group-hover:scale-125 group-hover:shadow-3xl group-hover:shadow-gambla-orange/50">
            <img 
              src="/lovable-uploads/3440b5bf-cc6b-4e15-a97e-8c44c35f3558.png" 
              alt="GAMBLA Logo" 
              className="w-16 h-16 object-contain transition-transform duration-500 group-hover:scale-110"
            />
          </div>
          <div className="text-center mt-4">
            <span className="text-white font-bold text-xl transition-all duration-300 group-hover:text-gambla-yellow">GAMBLA</span>
          </div>
        </div>

        {/* Icone social disposte geometricamente in cerchio */}
        {socialNodes.map((node, index) => (
          <div
            key={node.name}
            className="absolute group cursor-pointer"
            style={getPositionFromAngle(node.angle)}
            onClick={() => handleSocialClick(node.link)}
          >
            {/* Icona social */}
            <div className={`w-20 h-20 bg-gradient-to-br ${node.color} rounded-full flex items-center justify-center shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl group-hover:shadow-${node.color.split('-')[1]}-500/30`}>
              {node.icon === "TikTok" ? (
                <div className="w-10 h-10 bg-white rounded-sm flex items-center justify-center transition-transform duration-300 group-hover:rotate-12">
                  <div className="text-black font-bold text-sm">TT</div>
                </div>
              ) : (
                React.createElement(node.icon, { 
                  className: "w-10 h-10 text-white transition-transform duration-300 group-hover:rotate-12" 
                })
              )}
            </div>
            
            {/* Info Card con posizionamento intelligente */}
            <div className={`absolute ${getInfoPosition(node.angle)} opacity-0 group-hover:opacity-100 transition-all duration-300 bg-gambla-dark/95 backdrop-blur-md rounded-xl p-4 min-w-max border border-gray-700/50 shadow-xl transform scale-95 group-hover:scale-100`}>
              <h4 className="text-white font-semibold text-sm">{node.name}</h4>
              <p className="text-gray-300 text-xs">{node.handle}</p>
              <p className="text-gambla-yellow text-xs font-semibold">{node.followers} followers</p>
            </div>
          </div>
        ))}

        {/* Linee di connessione sottili e discrete */}
        <svg className="absolute inset-0 w-full h-full pointer-events-none" style={{ zIndex: 1 }}>
          <defs>
            <linearGradient id="connectionGradient" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stopColor="#FF1493" stopOpacity="0.1" />
              <stop offset="100%" stopColor="#FF8C00" stopOpacity="0.1" />
            </linearGradient>
          </defs>
          
          {/* Linee dal centro alle icone */}
          {socialNodes.map((node, index) => {
            const { transform } = getPositionFromAngle(node.angle, 120);
            const match = transform.match(/translate\(([^,]+),\s*([^)]+)\)/);
            if (!match) return null;
            
            const x = parseFloat(match[1]);
            const y = parseFloat(match[2]);
            
            return (
              <line 
                key={index}
                x1="50%" 
                y1="50%" 
                x2={`calc(50% + ${x}px)`} 
                y2={`calc(50% + ${y}px)`} 
                stroke="url(#connectionGradient)" 
                strokeWidth="1" 
                strokeDasharray="4,4"
              />
            );
          })}
        </svg>
      </div>

      {/* CTA Buttons */}
      <div className="text-center mt-16">
        <div className="flex flex-wrap justify-center gap-4">
          <button 
            className="gambla-btn-primary hover:scale-105 transition-transform duration-300"
            onClick={() => handleSocialClick("https://instagram.com/gambla.it")}
          >
            Seguici su Instagram
          </button>
          <button 
            className="gambla-btn-secondary hover:scale-105 transition-transform duration-300"
            onClick={() => handleSocialClick("https://t.me/+QHqp3ShP8ZZkOTA0?fbclid=PAZXh0bgNhZW0CMTEAAacaMd9hyFpQJfWwQryQplF_XPO5Zhl48Xer1pft84qjll4AqbffBxL2boof7g_aem_n3yWzB4S3Zkb4URTkUlS3A")}
          >
            Unisciti al Telegram
          </button>
        </div>
      </div>
    </div>
  );
};

export default SocialNetwork;
