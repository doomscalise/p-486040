
import React, { useState, useEffect } from "react";
import { cn } from "@/lib/utils";
import { Menu, X } from "lucide-react";
import { Link, useLocation } from "react-router-dom";

const Navbar = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const location = useLocation();

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 10);
    };
    
    window.addEventListener("scroll", handleScroll, { passive: true });
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
    document.body.style.overflow = !isMenuOpen ? 'hidden' : '';
  };

  const closeMenu = () => {
    setIsMenuOpen(false);
    document.body.style.overflow = '';
  };

  const navigationItems = [
    { name: "Home", path: "/" },
    { name: "Blog", path: "/blog" },
    { name: "Fantasy", path: "/fantagambla" },
    { name: "Chi Siamo", path: "/chi-siamo" },
    { name: "Contatti", path: "/contatti" }
  ];

  return (
    <header
      className={cn(
        "fixed top-0 left-0 right-0 z-50 py-3 md:py-4 transition-all duration-300",
        isScrolled 
          ? "bg-gambla-dark/95 backdrop-blur-md shadow-lg border-b border-gray-800" 
          : "bg-transparent"
      )}
    >
      <div className="container flex items-center justify-between px-4 sm:px-6 lg:px-8">
        <Link 
          to="/" 
          className="flex items-center space-x-3"
          onClick={closeMenu}
        >
          <div className="w-10 h-10 bg-gambla-gradient rounded-full flex items-center justify-center">
            <span className="text-white font-bold text-xl">G</span>
          </div>
          <span className="text-2xl font-display font-bold text-white">
            Gambla<span className="text-transparent bg-clip-text bg-gambla-gradient">.it</span>
          </span>
        </Link>

        {/* Desktop Navigation */}
        <nav className="hidden md:flex space-x-8">
          {navigationItems.map((item) => (
            <Link
              key={item.path}
              to={item.path}
              className={cn(
                "relative text-white hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient py-2 transition-colors duration-300 font-medium",
                "after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-0 after:bg-gambla-gradient after:transition-all hover:after:w-full",
                location.pathname === item.path && "text-transparent bg-clip-text bg-gambla-gradient after:w-full"
              )}
            >
              {item.name}
            </Link>
          ))}
        </nav>

        {/* Mobile menu button */}
        <button 
          className="md:hidden text-white p-3 focus:outline-none" 
          onClick={toggleMenu}
          aria-label={isMenuOpen ? "Chiudi menu" : "Apri menu"}
        >
          {isMenuOpen ? <X size={24} /> : <Menu size={24} />}
        </button>
      </div>

      {/* Mobile Navigation */}
      <div className={cn(
        "fixed inset-0 z-40 bg-gambla-dark flex flex-col pt-16 px-6 md:hidden transition-all duration-300 ease-in-out",
        isMenuOpen ? "opacity-100 translate-x-0" : "opacity-0 translate-x-full pointer-events-none"
      )}>
        <nav className="flex flex-col space-y-8 items-center mt-8">
          {navigationItems.map((item) => (
            <Link
              key={item.path}
              to={item.path}
              className={cn(
                "text-xl font-medium py-3 px-6 w-full text-center rounded-lg transition-colors duration-300",
                location.pathname === item.path 
                  ? "text-transparent bg-clip-text bg-gambla-gradient bg-gray-800/50" 
                  : "text-white hover:text-transparent hover:bg-clip-text hover:bg-gambla-gradient hover:bg-gray-800/30"
              )}
              onClick={closeMenu}
            >
              {item.name}
            </Link>
          ))}
        </nav>
      </div>
    </header>
  );
};

export default Navbar;
