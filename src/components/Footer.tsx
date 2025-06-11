
import React from "react";
import { Link } from "react-router-dom";
import { Instagram, Send, Mail, Heart } from "lucide-react";

const Footer = () => {
  const currentYear = new Date().getFullYear();

  const footerSections = [
    {
      title: "Navigazione",
      links: [
        { name: "Home", path: "/" },
        { name: "Blog", path: "/blog" },
        { name: "Fantagambla", path: "/fantagambla" },
        { name: "Chi Siamo", path: "/chi-siamo" },
        { name: "Contatti", path: "/contatti" }
      ]
    },
    {
      title: "Sport",
      links: [
        { name: "Serie A", path: "/blog?category=serie-a" },
        { name: "Champions League", path: "/blog?category=champions" },
        { name: "Fantacalcio", path: "/blog?category=fantacalcio" },
        { name: "Basket NBA", path: "/blog?category=basket" },
        { name: "Tennis ATP", path: "/blog?category=tennis" }
      ]
    },
    {
      title: "Community",
      links: [
        { name: "Telegram Community", path: "https://t.me/gambla_community", external: true },
        { name: "Instagram", path: "https://instagram.com/gambla.it", external: true },
        { name: "TikTok", path: "https://tiktok.com/@gambla.it", external: true },
        { name: "Newsletter", path: "#newsletter" },
        { name: "FAQ", path: "/faq" }
      ]
    }
  ];

  const socialLinks = [
    { icon: Instagram, href: "https://instagram.com/gambla.it", name: "Instagram" },
    { icon: "TikTok", href: "https://tiktok.com/@gambla.it", name: "TikTok" },
    { icon: Send, href: "https://t.me/gambla_community", name: "Telegram" },
    { icon: Mail, href: "mailto:info@gambla.it", name: "Email" }
  ];

  const handleSocialClick = (href) => {
    if (href.startsWith('mailto:')) {
      window.location.href = href;
    } else {
      window.open(href, '_blank', 'noopener,noreferrer');
    }
  };

  return (
    <footer className="bg-gambla-dark border-t border-gray-800">
      {/* Main Footer */}
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {/* Brand Section con logo PNG */}
          <div className="lg:col-span-1">
            <Link to="/" className="flex items-center space-x-3 mb-6">
              <div className="w-12 h-12 bg-gambla-gradient rounded-full flex items-center justify-center">
                <img 
                  src="/lovable-uploads/3440b5bf-cc6b-4e15-a97e-8c44c35f3558.png" 
                  alt="GAMBLA Logo" 
                  className="w-7 h-7 object-contain"
                />
              </div>
              <span className="text-2xl font-display font-bold text-transparent bg-clip-text bg-gambla-gradient">
                GAMBLA
              </span>
            </Link>
            
            <p className="text-gray-300 mb-6 leading-relaxed">
              Il portale sportivo #1 d'Italia. Accendi la tua passione sportiva 
              con notizie esclusive, fantacalcio innovativo e una community appassionata.
            </p>

            {/* Social Links */}
            <div className="flex space-x-4">
              {socialLinks.map((social, index) => {
                return (
                  <button
                    key={index}
                    onClick={() => handleSocialClick(social.href)}
                    className="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-gray-400 hover:text-white hover:bg-gambla-gradient transition-all duration-300 group"
                  >
                    {social.icon === "TikTok" ? (
                      <div className="w-5 h-5 bg-white rounded-sm flex items-center justify-center group-hover:bg-black transition-colors">
                        <div className="text-black group-hover:text-white font-bold text-xs">TT</div>
                      </div>
                    ) : (
                      React.createElement(social.icon, { className: "w-5 h-5 group-hover:scale-110 transition-transform" })
                    )}
                  </button>
                );
              })}
            </div>
          </div>

          {/* Navigation Sections */}
          {footerSections.map((section, index) => (
            <div key={index}>
              <h3 className="text-white font-semibold mb-4">{section.title}</h3>
              <ul className="space-y-2">
                {section.links.map((link, linkIndex) => (
                  <li key={linkIndex}>
                    {link.external ? (
                      <button
                        onClick={() => handleSocialClick(link.path)}
                        className="text-gray-400 hover:text-gambla-magenta transition-colors duration-300 text-sm text-left"
                      >
                        {link.name}
                      </button>
                    ) : (
                      <Link
                        to={link.path}
                        className="text-gray-400 hover:text-gambla-magenta transition-colors duration-300 text-sm"
                      >
                        {link.name}
                      </Link>
                    )}
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-gray-800 py-6">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col md:flex-row justify-between items-center">
            <div className="text-sm text-gray-400 mb-4 md:mb-0">
              © {currentYear} GAMBLA. Tutti i diritti riservati.
            </div>
            
            <div className="flex items-center space-x-6 text-sm">
              <Link to="/privacy" className="text-gray-400 hover:text-gambla-magenta transition-colors">
                Privacy Policy
              </Link>
              <Link to="/terms" className="text-gray-400 hover:text-gambla-magenta transition-colors">
                Termini di Servizio
              </Link>
              <div className="flex items-center text-gray-400">
                Made with <Heart className="w-4 h-4 text-red-500 mx-1" /> in Italy
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
