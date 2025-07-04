
import React, { useState, useEffect } from "react";
import { Link, useLocation } from "react-router-dom";
import { Menu, X } from "lucide-react";

const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);
  const location = useLocation();

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const navItems = [
    { name: "Home", path: "/" },
    { name: "Blog", path: "https://blog.gambla.it", external: true },
    { name: "Fantagambla", path: "/fantagambla" },
    { name: "Chi Siamo", path: "/chi-siamo" },
    { name: "FAQ", path: "/faq" },
    { name: "Newsletter", path: "/newsletter" },
    { name: "Contatti", path: "/contatti" },
  ];

  return (
    <nav className={`fixed w-full z-50 transition-all duration-300 ${
      isScrolled ? "bg-gambla-dark/95 backdrop-blur-md border-b border-gray-800" : "bg-transparent"
    }`}>
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-16">
          {/* Logo con PNG collegato a blog.gambla.it */}
          <a 
            href="https://blog.gambla.it" 
            target="_blank" 
            rel="noopener noreferrer"
            className="flex items-center space-x-3 group"
          >
            <div className="w-10 h-10 bg-gambla-gradient rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
              <img 
                src="/lovable-uploads/3440b5bf-cc6b-4e15-a97e-8c44c35f3558.png" 
                alt="GAMBLA Logo" 
                className="w-6 h-6 object-contain"
              />
            </div>
            <span className="text-2xl font-display font-bold text-transparent bg-clip-text bg-gambla-gradient">
              GAMBLA
            </span>
          </a>

          {/* Desktop Navigation */}
          <div className="hidden md:flex items-center space-x-8">
            {navItems.map((item) => (
              item.external ? (
                <a
                  key={item.name}
                  href={item.path}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-sm font-medium transition-colors duration-300 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient text-gray-300"
                >
                  {item.name}
                </a>
              ) : (
                <Link
                  key={item.name}
                  to={item.path}
                  className={`text-sm font-medium transition-colors duration-300 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient ${
                    location.pathname === item.path 
                      ? "text-transparent bg-clip-text bg-gambla-gradient" 
                      : "text-gray-300"
                  }`}
                >
                  {item.name}
                </Link>
              )
            ))}
            <button className="gambla-btn-primary text-sm">
              Unisciti Ora
            </button>
          </div>

          {/* Mobile menu button */}
          <div className="md:hidden">
            <button
              onClick={() => setIsOpen(!isOpen)}
              className="text-white hover:text-gambla-orange transition-colors duration-300"
            >
              {isOpen ? <X size={24} /> : <Menu size={24} />}
            </button>
          </div>
        </div>

        {/* Mobile Navigation */}
        {isOpen && (
          <div className="md:hidden">
            <div className="px-2 pt-2 pb-3 space-y-1 bg-gambla-dark/95 backdrop-blur-md rounded-lg mt-2">
              {navItems.map((item) => (
                item.external ? (
                  <a
                    key={item.name}
                    href={item.path}
                    target="_blank"
                    rel="noopener noreferrer"
                    onClick={() => setIsOpen(false)}
                    className="block px-3 py-2 text-base font-medium transition-colors duration-300 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient text-gray-300"
                  >
                    {item.name}
                  </a>
                ) : (
                  <Link
                    key={item.name}
                    to={item.path}
                    onClick={() => setIsOpen(false)}
                    className={`block px-3 py-2 text-base font-medium transition-colors duration-300 hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient ${
                      location.pathname === item.path 
                        ? "text-transparent bg-clip-text bg-gambla-gradient" 
                        : "text-gray-300"
                    }`}
                  >
                    {item.name}
                  </Link>
                )
              ))}
              <div className="px-3 py-2">
                <button className="gambla-btn-primary w-full text-sm">
                  Unisciti Ora
                </button>
              </div>
            </div>
          </div>
        )}
      </div>
    </nav>
  );
};

export default Navbar;
