import { motion, useScroll, useTransform } from 'motion/react';
import { useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';
import { User, LogOut } from 'lucide-react';
import { useAuth } from '@/app/contexts/AuthContext';

export function Navigation() {
  const [isScrolled, setIsScrolled] = useState(false);
  const { scrollYProgress } = useScroll();
  const opacity = useTransform(scrollYProgress, [0, 0.1], [0, 1]);
  const location = useLocation();
  const { isAuthenticated, logout } = useAuth();

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 100);
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const navItems = [
    { label: 'Home', path: '/', hash: '' },
    { label: 'About', path: '/about', hash: '' },
    { label: 'Collection', path: '/collection', hash: '' },
    { label: 'Verification', path: '/verification', hash: '' },
    { label: 'Contact', path: '/contact', hash: '' },
  ];

  return (
    <motion.nav
      style={{ opacity }}
      className="fixed top-0 left-0 right-0 z-50 transition-all duration-700"
    >
      <div
        className={`transition-all duration-700 ${
          isScrolled ? 'bg-background/80 backdrop-blur-xl border-b border-primary/10' : ''
        }`}
      >
        <div className="max-w-[1600px] mx-auto px-6 md:px-12 py-2 flex items-center justify-between">
          {/* Logo/Brand */}
          <Link to="/" className="flex items-center gap-3 group">
            <div className="flex flex-col">
              <span
                className="text-xl tracking-[0.2em] uppercase text-white transition-colors duration-500 group-hover:text-primary"
                style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}
              >
                NAZLEH OUNCE
              </span>
            </div>
          </Link>

          {/* Navigation links */}
          <div className="hidden md:flex items-center gap-10">
            {navItems.map((item) => (
              <Link
                key={item.label}
                to={item.path + item.hash}
                className="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
              >
                {item.label}
                <span className="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full" />
              </Link>
            ))}
          </div>

          {/* Account Section */}
          <div className="flex items-center gap-4">
            {isAuthenticated ? (
              <>
                <Link
                  to="/account"
                  className="flex items-center gap-2 text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                  style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
                >
                  <User className="size-4" />
                  <span className="hidden lg:inline">Account</span>
                </Link>
              </>
            ) : (
              <Link
                to="/login"
                className="flex items-center gap-2 px-4 py-2 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary text-sm tracking-wider"
              >
                <User className="size-4" />
                <span className="hidden lg:inline">Sign In</span>
              </Link>
            )}
          </div>
        </div>
      </div>
    </motion.nav>
  );
}