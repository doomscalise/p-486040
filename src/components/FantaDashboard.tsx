
import React, { useState, useEffect } from "react";
import { Trophy, TrendingUp, Users, Star, ChevronUp, ChevronDown } from "lucide-react";

const FantaDashboard = () => {
  const [activeTab, setActiveTab] = useState('classifica');
  const [animatedStats, setAnimatedStats] = useState({ points: 0, position: 0, trend: 0 });

  const leaderboard = [
    { name: "FantaKing", points: 1247, trend: "+5", avatar: "👑" },
    { name: "SportMaster", points: 1203, trend: "+2", avatar: "⚽" },
    { name: "TacticalGeniu", points: 1189, trend: "-1", avatar: "🎯" },
    { name: "FootballPro", points: 1156, trend: "+3", avatar: "🏆" },
    { name: "Tu", points: 1089, trend: "+7", avatar: "🔥" },
  ];

  const stats = [
    { label: "Punti Totali", value: 1089, icon: Star, color: "gambla-yellow" },
    { label: "Posizione", value: 5, icon: Trophy, color: "gambla-orange" },
    { label: "Trend", value: 7, icon: TrendingUp, color: "gambla-magenta", prefix: "+" },
  ];

  useEffect(() => {
    const animateStats = () => {
      const pointsTarget = 1089;
      const positionTarget = 5;
      const trendTarget = 7;

      let pointsCurrent = 0;
      let positionCurrent = 0;
      let trendCurrent = 0;

      const interval = setInterval(() => {
        if (pointsCurrent < pointsTarget) {
          pointsCurrent += Math.ceil((pointsTarget - pointsCurrent) / 10);
          setAnimatedStats(prev => ({ ...prev, points: pointsCurrent }));
        }
        if (positionCurrent < positionTarget) {
          positionCurrent += 1;
          setAnimatedStats(prev => ({ ...prev, position: positionCurrent }));
        }
        if (trendCurrent < trendTarget) {
          trendCurrent += 1;
          setAnimatedStats(prev => ({ ...prev, trend: trendCurrent }));
        }

        if (pointsCurrent >= pointsTarget && positionCurrent >= positionTarget && trendCurrent >= trendTarget) {
          clearInterval(interval);
        }
      }, 100);
    };

    animateStats();
  }, []);

  return (
    <div className="bg-gray-900/50 rounded-3xl p-6 border border-gray-800">
      <div className="flex items-center justify-between mb-6">
        <h3 className="text-2xl font-display font-bold text-white flex items-center">
          <Trophy className="mr-3 w-8 h-8 text-gambla-yellow" />
          Fantagambla Dashboard
        </h3>
        <div className="flex space-x-2">
          <button
            onClick={() => setActiveTab('classifica')}
            className={`px-4 py-2 rounded-lg transition-colors ${
              activeTab === 'classifica'
                ? 'bg-gambla-gradient text-white'
                : 'bg-gray-800 text-gray-400 hover:text-white'
            }`}
          >
            Classifica
          </button>
          <button
            onClick={() => setActiveTab('stats')}
            className={`px-4 py-2 rounded-lg transition-colors ${
              activeTab === 'stats'
                ? 'bg-gambla-gradient text-white'
                : 'bg-gray-800 text-gray-400 hover:text-white'
            }`}
          >
            Le Tue Stats
          </button>
        </div>
      </div>

      {activeTab === 'classifica' && (
        <div className="space-y-3">
          <div className="flex items-center justify-between text-gray-400 text-sm border-b border-gray-800 pb-2">
            <span>Giocatore</span>
            <span>Punti</span>
            <span>Trend</span>
          </div>
          {leaderboard.map((player, index) => (
            <div
              key={index}
              className={`flex items-center justify-between p-3 rounded-lg transition-all duration-300 hover:scale-105 ${
                player.name === 'Tu'
                  ? 'bg-gambla-gradient/20 border border-gambla-orange'
                  : 'bg-gray-800/50 hover:bg-gray-800'
              }`}
              style={{ animationDelay: `${index * 100}ms` }}
            >
              <div className="flex items-center space-x-3">
                <span className="text-2xl">{player.avatar}</span>
                <div>
                  <div className={`font-semibold ${player.name === 'Tu' ? 'text-gambla-yellow' : 'text-white'}`}>
                    {player.name}
                  </div>
                  <div className="text-xs text-gray-400">#{index + 1}</div>
                </div>
              </div>
              <div className="text-white font-bold">{player.points}</div>
              <div className={`flex items-center space-x-1 ${
                player.trend.startsWith('+') ? 'text-green-400' : 'text-red-400'
              }`}>
                {player.trend.startsWith('+') ? (
                  <ChevronUp className="w-4 h-4" />
                ) : (
                  <ChevronDown className="w-4 h-4" />
                )}
                <span className="text-sm font-semibold">{player.trend}</span>
              </div>
            </div>
          ))}
        </div>
      )}

      {activeTab === 'stats' && (
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          {stats.map((stat, index) => (
            <div
              key={index}
              className="bg-gray-800/50 rounded-xl p-4 text-center hover:bg-gray-800 transition-colors"
            >
              <div className={`w-12 h-12 mx-auto mb-3 rounded-full bg-${stat.color}/20 flex items-center justify-center`}>
                <stat.icon className={`w-6 h-6 text-${stat.color}`} />
              </div>
              <div className={`text-2xl font-bold text-${stat.color} mb-1`}>
                {stat.prefix || ''}{
                  stat.label === 'Punti Totali' ? animatedStats.points :
                  stat.label === 'Posizione' ? animatedStats.position :
                  animatedStats.trend
                }
              </div>
              <div className="text-gray-400 text-sm">{stat.label}</div>
            </div>
          ))}
        </div>
      )}

      <div className="mt-6 text-center">
        <button className="gambla-btn-primary">
          Accedi alla Dashboard Completa
        </button>
      </div>
    </div>
  );
};

export default FantaDashboard;
