
import React, { useState, useEffect } from "react";
import { Instagram, MessageCircle, Mail, Phone } from "lucide-react";

const SocialNetwork = () => {
  const [activeNode, setActiveNode] = useState<number | null>(null);
  const [pulseNodes, setPulseNodes] = useState<number[]>([]);

  const socialNodes = [
    {
      id: 1,
      name: "Instagram",
      icon: Instagram,
      color: "gambla-magenta",
      status: "Molto Attivo",
      followers: "2.5K",
      link: "https://www.instagram.com/gambla.it?igsh=MWJxOTQxcmt5b3p6Mg==",
      position: { x: 20, y: 30 }
    },
    {
      id: 2,
      name: "TikTok",
      icon: MessageCircle,
      color: "gambla-orange",
      status: "In Crescita",
      followers: "1.2K",
      link: "https://www.tiktok.com/@gambla.it?_t=ZN-8x6C4necE6c&_r=1",
      position: { x: 70, y: 20 }
    },
    {
      id: 3,
      name: "Telegram",
      icon: MessageCircle,
      color: "gambla-yellow",
      status: "Community",
      followers: "800",
      link: "http://t.me/+QHqp3ShP8ZZkOTA0",
      position: { x: 50, y: 60 }
    },
    {
      id: 4,
      name: "Email",
      icon: Mail,
      color: "gambla-orange",
      status: "Sempre Aperto",
      followers: "24/7",
      link: "mailto:info@gambla.it",
      position: { x: 80, y: 70 }
    }
  ];

  useEffect(() => {
    const interval = setInterval(() => {
      const randomNodes = socialNodes
        .sort(() => Math.random() - 0.5)
        .slice(0, Math.floor(Math.random() * 3) + 1)
        .map(node => node.id);
      
      setPulseNodes(randomNodes);
      
      setTimeout(() => {
        setPulseNodes([]);
      }, 2000);
    }, 4000);

    return () => clearInterval(interval);
  }, []);

  return (
    <div className="relative h-96 bg-gray-900/30 rounded-3xl p-8 overflow-hidden">
      <h3 className="text-2xl font-display font-bold text-white mb-6 text-center">
        Network di Comunicazione
      </h3>
      
      {/* Connection Lines */}
      <svg className="absolute inset-0 w-full h-full pointer-events-none">
        {socialNodes.map((node, index) => 
          socialNodes.slice(index + 1).map((otherNode) => (
            <line
              key={`${node.id}-${otherNode.id}`}
              x1={`${node.position.x}%`}
              y1={`${node.position.y}%`}
              x2={`${otherNode.position.x}%`}
              y2={`${otherNode.position.y}%`}
              stroke="rgba(255, 20, 147, 0.2)"
              strokeWidth="1"
              className="animate-pulse"
            />
          ))
        )}
      </svg>

      {/* Social Nodes */}
      {socialNodes.map((node) => (
        <div
          key={node.id}
          className="absolute transform -translate-x-1/2 -translate-y-1/2 transition-all duration-300"
          style={{ 
            left: `${node.position.x}%`, 
            top: `${node.position.y}%` 
          }}
        >
          <div
            className={`relative group cursor-pointer ${
              pulseNodes.includes(node.id) ? 'animate-pulse' : ''
            }`}
            onMouseEnter={() => setActiveNode(node.id)}
            onMouseLeave={() => setActiveNode(null)}
            onClick={() => window.open(node.link, '_blank')}
          >
            {/* Pulse Ring */}
            {pulseNodes.includes(node.id) && (
              <div className={`absolute inset-0 w-16 h-16 rounded-full bg-${node.color}/30 animate-ping`}></div>
            )}
            
            {/* Node */}
            <div className={`w-16 h-16 rounded-full bg-${node.color}/20 border-2 border-${node.color} flex items-center justify-center hover:scale-110 transition-transform duration-300`}>
              <node.icon className={`w-8 h-8 text-${node.color}`} />
            </div>

            {/* Info Card */}
            {activeNode === node.id && (
              <div className="absolute top-20 left-1/2 transform -translate-x-1/2 bg-black border border-gray-700 rounded-lg p-3 min-w-max z-10 animate-fade-in">
                <div className="text-white font-semibold text-sm">{node.name}</div>
                <div className="text-gray-400 text-xs">{node.status}</div>
                <div className={`text-${node.color} text-xs font-bold`}>{node.followers}</div>
              </div>
            )}
          </div>
        </div>
      ))}

      {/* Central Hub */}
      <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div className="w-20 h-20 rounded-full bg-gambla-gradient flex items-center justify-center animate-float">
          <span className="text-white font-bold text-xl">G</span>
        </div>
        <div className="absolute inset-0 w-20 h-20 rounded-full bg-gambla-gradient opacity-30 animate-ping"></div>
      </div>
    </div>
  );
};

export default SocialNetwork;
