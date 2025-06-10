
import React from "react";
import { Link } from "react-router-dom";

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
                href="https://instagram.com/gambla_it" 
                target="_blank" 
                rel="noopener noreferrer"
                className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300"
              >
                Instagram
              </a>
              <a 
                href="https://tiktok.com/@gambla_it" 
                target="_blank" 
                rel="noopener noreferrer"
                className="text-gray-400 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient transition-colors duration-300"
              >
                TikTok
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
