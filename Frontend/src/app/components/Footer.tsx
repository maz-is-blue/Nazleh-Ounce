import { motion } from 'motion/react';
import { Link } from 'react-router-dom';
import logoDark from 'figma:asset/ad55badd66729deaf5ba431b2183bff941840cf9.png';

export function Footer() {
  return (
    <footer className="relative py-20 md:py-24 px-6 md:px-12 border-t border-primary/10">
      <div className="max-w-7xl mx-auto">
        {/* Top section with logo */}
        <div className="flex flex-col items-center mb-12">
          <motion.div
            initial={{ opacity: 0, scale: 0.95 }}
            whileInView={{ opacity: 1, scale: 1 }}
            transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
            viewport={{ once: true }}
            className="mb-8"
          >
            <img
              src={logoDark}
              alt="Nazleh Ounce"
              className="w-16 h-16 md:w-20 md:h-20 object-contain opacity-80"
            />
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 1, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            viewport={{ once: true }}
            className="text-center"
          >
            <h3 className="text-2xl md:text-3xl mb-2" style={{ fontFamily: 'var(--font-display)', fontWeight: 300, letterSpacing: '0.2em', color: 'white' }}>
              NAZLEH OUNCE
            </h3>
            <p className="text-sm tracking-[0.3em] uppercase text-white/50" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
              Handcrafted Precious Metal Alloys
            </p>
          </motion.div>
        </div>

        {/* Divider */}
        <motion.div
          initial={{ scaleX: 0 }}
          whileInView={{ scaleX: 1 }}
          transition={{ duration: 1.5, delay: 0.4, ease: [0.22, 1, 0.36, 1] }}
          viewport={{ once: true }}
          className="w-full h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent mb-12"
        />

        {/* Bottom section */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 1, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          viewport={{ once: true }}
          className="flex flex-col md:flex-row items-center justify-between gap-8"
        >
          {/* Links */}
          <nav className="flex flex-wrap items-center justify-center gap-8 md:gap-12">
            <Link
              to="/"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Home
            </Link>
            <Link
              to="/about"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              About
            </Link>
            <Link
              to="/collection"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Collection
            </Link>
            <Link
              to="/verification"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Verification
            </Link>
            <Link
              to="/contact"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Contact
            </Link>
          </nav>

          {/* Copyright */}
          <p className="text-sm text-white/30" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            © 2026 Nazleh Ounce
          </p>
        </motion.div>

        {/* Decorative element */}
        <motion.div
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          transition={{ duration: 2, delay: 0.8 }}
          viewport={{ once: true }}
          className="mt-12 flex justify-center"
        >
          <div className="w-1 h-1 rounded-full bg-primary/50" />
        </motion.div>
      </div>
    </footer>
  );
}