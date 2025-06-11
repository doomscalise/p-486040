
import React, { useState } from "react";
import { X, Trophy, Gift, Calendar, Users } from "lucide-react";
import { toast } from "@/components/ui/use-toast";

interface PreRegistrationFormProps {
  isOpen: boolean;
  onClose: () => void;
}

const PreRegistrationForm = ({ isOpen, onClose }: PreRegistrationFormProps) => {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    phone: "",
    experience: ""
  });
  const [isSubmitting, setIsSubmitting] = useState(false);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setIsSubmitting(true);

    // Simulate API call
    setTimeout(() => {
      toast({
        title: "Pre-registrazione completata!",
        description: "Ti contatteremo presto per l'anteprima esclusiva del fantacalcio Gambla."
      });
      setFormData({ name: "", email: "", phone: "", experience: "" });
      setIsSubmitting(false);
      onClose();
    }, 1500);
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    setFormData(prev => ({
      ...prev,
      [e.target.name]: e.target.value
    }));
  };

  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm">
      <div className="bg-gambla-dark border border-gray-800 rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        {/* Header */}
        <div className="relative p-8 pb-6">
          <button
            onClick={onClose}
            className="absolute top-6 right-6 text-gray-400 hover:text-white transition-colors"
          >
            <X className="w-6 h-6" />
          </button>
          
          <div className="text-center">
            <div className="w-20 h-20 bg-gambla-gradient rounded-full flex items-center justify-center mx-auto mb-6">
              <img 
                src="/lovable-uploads/5551ac8e-24aa-42a4-a884-df70ee009be3.png" 
                alt="Gambla Logo" 
                className="w-12 h-12 filter brightness-0 invert"
              />
            </div>
            <h2 className="text-3xl font-display font-bold text-white mb-2">
              <span className="text-transparent bg-clip-text bg-gambla-gradient">
                Fantacalcio Gambla
              </span>
            </h2>
            <p className="text-gray-300 text-lg">
              Entra nell'attesa per l'esperienza fantasy più innovativa!
            </p>
          </div>
        </div>

        {/* Features Grid */}
        <div className="px-8 pb-6">
          <div className="grid grid-cols-2 gap-4 mb-8">
            <div className="bg-gray-900/50 rounded-xl p-4 text-center">
              <Trophy className="w-8 h-8 text-gambla-yellow mx-auto mb-2" />
              <div className="text-white font-semibold">Premi Esclusivi</div>
              <div className="text-gray-400 text-sm">In palio ogni settimana</div>
            </div>
            <div className="bg-gray-900/50 rounded-xl p-4 text-center">
              <Gift className="w-8 h-8 text-gambla-magenta mx-auto mb-2" />
              <div className="text-white font-semibold">Early Access</div>
              <div className="text-gray-400 text-sm">Anteprima esclusiva</div>
            </div>
            <div className="bg-gray-900/50 rounded-xl p-4 text-center">
              <Calendar className="w-8 h-8 text-gambla-orange mx-auto mb-2" />
              <div className="text-white font-semibold">Countdown</div>
              <div className="text-gray-400 text-sm">Lancio imminente</div>
            </div>
            <div className="bg-gray-900/50 rounded-xl p-4 text-center">
              <Users className="w-8 h-8 text-gambla-yellow mx-auto mb-2" />
              <div className="text-white font-semibold">Community VIP</div>
              <div className="text-gray-400 text-sm">Accesso prioritario</div>
            </div>
          </div>
        </div>

        {/* Form */}
        <div className="px-8 pb-8">
          <form onSubmit={handleSubmit} className="space-y-6">
            <div>
              <label className="block text-white font-semibold mb-2">Nome Completo *</label>
              <input
                type="text"
                name="name"
                value={formData.name}
                onChange={handleChange}
                required
                className="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:border-gambla-magenta focus:outline-none transition-colors"
                placeholder="Inserisci il tuo nome"
              />
            </div>

            <div>
              <label className="block text-white font-semibold mb-2">Email *</label>
              <input
                type="email"
                name="email"
                value={formData.email}
                onChange={handleChange}
                required
                className="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:border-gambla-magenta focus:outline-none transition-colors"
                placeholder="tua@email.com"
              />
            </div>

            <div>
              <label className="block text-white font-semibold mb-2">Telefono</label>
              <input
                type="tel"
                name="phone"
                value={formData.phone}
                onChange={handleChange}
                className="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:border-gambla-magenta focus:outline-none transition-colors"
                placeholder="Il tuo numero (opzionale)"
              />
            </div>

            <div>
              <label className="block text-white font-semibold mb-2">Esperienza Fantacalcio</label>
              <select
                name="experience"
                value={formData.experience}
                onChange={handleChange}
                className="w-full bg-gray-900/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:border-gambla-magenta focus:outline-none transition-colors"
              >
                <option value="">Seleziona il tuo livello</option>
                <option value="principiante">Principiante</option>
                <option value="intermedio">Intermedio</option>
                <option value="esperto">Esperto</option>
                <option value="professionista">Professionista</option>
              </select>
            </div>

            <div className="bg-gambla-gradient p-1 rounded-xl">
              <button
                type="submit"
                disabled={isSubmitting}
                className="w-full bg-gambla-dark text-white font-bold py-4 rounded-xl hover:bg-gray-900 transition-colors disabled:opacity-50"
              >
                {isSubmitting ? "Registrazione..." : "Unisciti al Countdown!"}
              </button>
            </div>

            <p className="text-gray-400 text-sm text-center">
              Riceverai aggiornamenti esclusivi e l'accesso prioritario al lancio
            </p>
          </form>
        </div>
      </div>
    </div>
  );
};

export default PreRegistrationForm;
