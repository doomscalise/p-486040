import React from "react";
import { Instagram, Send, Mail } from "lucide-react";

const SocialNetwork = () => {
  const socialNodes = [
    {
      icon: Instagram,
      name: "Instagram",
      handle: "@gambla.it",
      color: "from-pink-500 to-purple-600",
      followers: "8.2K",
      position: "top-8 left-1/2 transform -translate-x-1/2 -translate-y-8",
      link: "https://instagram.com/gambla.it",
      infoPosition: "top-20 left-20" // Spostiamo a destra
    },
    {
      icon: "TikTok",
      name: "TikTok", 
      handle: "@gambla.it",
      color: "from-black to-red-600",
      followers: "12.5K",
      position: "top-1/2 right-8 transform translate-x-8 -translate-y-1/2",
      link: "https://tiktok.com/@gambla.it",
      infoPosition: "top-20 left-1/2 transform -translate-x-1/2"
    },
    {
      icon: Send,
      name: "Telegram",
      handle: "Community GAMBLA",
      color: "from-blue-400 to-blue-600",
      followers: "3.1K",
      position: "bottom-8 left-1/2 transform -translate-x-1/2 translate-y-8",
      link: "https://t.me/+QHqp3ShP8ZZkOTA0?fbclid=PAZXh0bgNhZW0CMTEAAacaMd9hyFpQJfWwQryQplF_XPO5Zhl48Xer1pft84qjll4AqbffBxL2boof7g_aem_n3yWzB4S3Zkb4URTkUlS3A",
      infoPosition: "bottom-20 left-20" // Spostiamo a destra
    },
    {
      icon: Mail,
      name: "Newsletter",
      handle: "Aggiornamenti Weekly",
      color: "from-gambla-orange to-gambla-magenta",
      followers: "5.8K",
      position: "top-1/2 left-8 transform -translate-x-8 -translate-y-1/2",
      link: "mailto:info@gambla.it",
      infoPosition: "top-20 left-1/2 transform -translate-x-1/2"
    }
  ];

  const handleSocialClick = (link) => {
    if (link.startsWith('mailto:')) {
      window.location.href = link;
    } else {
      window.open(link, '_blank', 'noopener,noreferrer');
    }
  };

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

      {/* Network visualization con design più professionale */}
      <div className="relative h-80 mx-auto max-w-2xl">
        {/* Central Hub con logo PNG */}
        <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 group">
          <div className="w-24 h-24 bg-gambla-gradient rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform duration-300 cursor-pointer">
            <img 
              src="/lovable-uploads/3440b5bf-cc6b-4e15-a97e-8c44c35f3558.png" 
              alt="GAMBLA Logo" 
              className="w-14 h-14 object-contain"
            />
          </div>
          <div className="text-center mt-3">
            <span className="text-white font-bold text-lg">GAMBLA</span>
          </div>
        </div>

        {/* Cerchi concentrici per design più elegante */}
        <div className="absolute inset-0 flex items-center justify-center">
          <div className="w-48 h-48 border border-gambla-magenta/30 rounded-full"></div>
        </div>
        <div className="absolute inset-0 flex items-center justify-center">
          <div className="w-64 h-64 border border-gambla-orange/20 rounded-full"></div>
        </div>

        {/* Linee eleganti che partono dal centro */}
        <svg className="absolute inset-0 w-full h-full" style={{ zIndex: 1 }}>
          <defs>
            <linearGradient id="connectionGradient" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stopColor="#FF1493" stopOpacity="0.4" />
              <stop offset="100%" stopColor="#FF8C00" stopOpacity="0.4" />
            </linearGradient>
            <filter id="glow">
              <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
              <feMerge> 
                <feMergeNode in="coloredBlur"/>
                <feMergeNode in="SourceGraphic"/>
              </feMerge>
            </filter>
          </defs>
          
          {/* Linee più eleganti dal centro ai nodi */}
          <line x1="50%" y1="50%" x2="50%" y2="20%" stroke="url(#connectionGradient)" strokeWidth="2" filter="url(#glow)" />
          <line x1="50%" y1="50%" x2="80%" y2="50%" stroke="url(#connectionGradient)" strokeWidth="2" filter="url(#glow)" />
          <line x1="50%" y1="50%" x2="50%" y2="80%" stroke="url(#connectionGradient)" strokeWidth="2" filter="url(#glow)" />
          <line x1="50%" y1="50%" x2="20%" y2="50%" stroke="url(#connectionGradient)" strokeWidth="2" filter="url(#glow)" />
        </svg>

        {/* Social Nodes - più vicini al centro */}
        {socialNodes.map((node, index) => {
          return (
            <div
              key={node.name}
              className={`absolute ${node.position} group cursor-pointer`}
              style={{ zIndex: 2 }}
              onClick={() => handleSocialClick(node.link)}
            >
              {/* Node */}
              <div className={`w-16 h-16 bg-gradient-to-br ${node.color} rounded-full flex items-center justify-center shadow-xl transition-all duration-300 hover:shadow-2xl`}>
                {node.icon === "TikTok" ? (
                  <div className="w-8 h-8 bg-white rounded-sm flex items-center justify-center">
                    <div className="text-black font-bold text-xs">TT</div>
                  </div>
                ) : (
                  React.createElement(node.icon, { className: "w-8 h-8 text-white" })
                )}
              </div>
              
              {/* Info Card con posizionamento migliorato */}
              <div className={`absolute ${node.infoPosition} opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gambla-dark/90 backdrop-blur-md rounded-lg p-3 min-w-max border border-gray-700`}>
                <h4 className="text-white font-semibold text-sm">{node.name}</h4>
                <p className="text-gray-300 text-xs">{node.handle}</p>
                <p className="text-gambla-yellow text-xs font-semibold">{node.followers} followers</p>
              </div>
            </div>
          );
        })}
      </div>

      {/* CTA Buttons */}
      <div className="text-center mt-16">
        <div className="flex flex-wrap justify-center gap-4">
          <button 
            className="gambla-btn-primary"
            onClick={() => handleSocialClick("https://instagram.com/gambla.it")}
          >
            Seguici su Instagram
          </button>
          <button 
            className="gambla-btn-secondary"
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
