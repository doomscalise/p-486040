
import React from "react";
import { Link } from "react-router-dom";
import { Instagram, MessageCircle } from "lucide-react";

const Footer = () => {
  return (
    <footer className="bg-gambla-dark border-t border-gray-800 py-12">
      <div className="container px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          {/* Brand */}
          <div className="col-span-1 md:col-span-2">
            <div className="flex items-center space-x-3 mb-4">
              <div className="w-10 h-10 bg-gambla-gradient rounded-full flex items-center justify-center">
                <span className="text-white font-bold text-xl">G</span>
              </div>
              <span className="text-2xl font-display font-bold text-white">
                Gambla<span className="text-transparent bg-clip-text bg-gambla-gradient">.it</span>
              </span>
            </div>
            <p className="text-gray-400 mb-4 max-w-md">
              Il tuo portale sportivo di riferimento. Unisciti alla community più appassionata d'Italia 
              per vivere lo sport in ogni sua sfumatura.
            </p>
            <div className="flex space-x-4">
              <a 
                href="https://www.instagram.com/gambla.it?igsh=MWJxOTQxcmt5b3p6Mg==" 
                target="_blank" 
                rel="noopener noreferrer"
                className="flex items-center space-x-2 text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300"
              >
                <Instagram size={20} />
                <span>Instagram</span>
              </a>
              <a 
                href="https://www.tiktok.com/@gambla.it?_t=ZN-8x6C4necE6c&_r=1" 
                target="_blank" 
                rel="noopener noreferrer"
                className="flex items-center space-x-2 text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300"
              >
                <span className="text-lg">🎵</span>
                <span>TikTok</span>
              </a>
              <a 
                href="/lovable-uploads/2f5d270b-71b2-4843-a72e-9a8dc6527fb9.png" 
                target="_blank" 
                rel="noopener noreferrer"
                className="flex items-center space-x-2 text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300"
              >
                <MessageCircle size={20} />
                <span>Telegram</span>
              </a>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h3 className="text-lg font-semibold text-white mb-4">Collegamenti</h3>
            <ul className="space-y-2">
              <li>
                <Link to="/" className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300">
                  Home
                </Link>
              </li>
              <li>
                <Link to="/blog" className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300">
                  Blog
                </Link>
              </li>
              <li>
                <Link to="/fantagambla" className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300">
                  Fantagambla
                </Link>
              </li>
              <li>
                <Link to="/chi-siamo" className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300">
                  Chi Siamo
                </Link>
              </li>
            </ul>
          </div>

          {/* Contact */}
          <div>
            <h3 className="text-lg font-semibold text-white mb-4">Contatti</h3>
            <ul className="space-y-2">
              <li>
                <Link to="/contatti" className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300">
                  Contattaci
                </Link>
              </li>
              <li>
                <a href="mailto:info@gambla.it" className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300">
                  info@gambla.it
                </a>
              </li>
              <li>
                <a href="mailto:redazione@gambla.it" className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300">
                  redazione@gambla.it
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div className="border-t border-gray-800 mt-8 pt-8 text-center">
          <p className="text-gray-400 text-sm">
            © 2024 Gambla.it. Tutti i diritti riservati. | Accendi la tua passione sportiva con noi!
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
