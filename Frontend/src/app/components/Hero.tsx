import { motion } from 'motion/react';
import { Link } from 'react-router-dom';
import logoLight from 'figma:asset/745644c6e029e199887d58020055681422a94ef7.png';

export function Hero() {
  return (
    <section className="relative h-screen flex items-center justify-center overflow-hidden">
      {/* Subtle background texture overlay */}
      <div className="absolute inset-0 opacity-5">
        <div className="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent" />
      </div>

      {/* Main content */}
      <div className="relative z-10 flex flex-col items-center text-center px-6 md:px-12 max-w-5xl mx-auto">
        {/* Logo/Monogram with slow fade-in and scale - only showing the monogram/N symbol */}
        <motion.div
          initial={{ opacity: 0, scale: 0.95 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ duration: 1.8, ease: [0.22, 1, 0.36, 1] }}
          className="mb-12 md:mb-16"
        >
          <div className="w-48 h-48 md:w-64 md:h-64 flex items-center justify-center">
            <img
              src={logoLight}
              alt="Nazleh Ounce Monogram"
              className="w-full h-full object-contain opacity-90 mt-24"
            />
          </div>
        </motion.div>

        {/* Brand name with staggered letter animation */}
        <motion.h1
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1.2, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          className="mb-6 md:mb-8"
          style={{ fontFamily: 'var(--font-display)' }}
        >
          <span className="block text-[3rem] md:text-[5rem] lg:text-[6.5rem] tracking-[0.15em] uppercase text-white" style={{ fontWeight: 300, letterSpacing: '0.2em' }}>
            NAZLEH OUNCE
          </span>
        </motion.h1>

        {/* Tagline - Correct version per brand brief */}
        <motion.p
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1.2, delay: 1.2, ease: [0.22, 1, 0.36, 1] }}
          className="text-lg md:text-xl tracking-[0.3em] uppercase text-white/70 mb-12 md:mb-16"
          style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}
        >
          Handcrafted Gold & Silver Alloys
        </motion.p>

        {/* Divider line */}
        <motion.div
          initial={{ scaleX: 0 }}
          animate={{ scaleX: 1 }}
          transition={{ duration: 1.5, delay: 1.6, ease: [0.22, 1, 0.36, 1] }}
          className="w-24 h-px bg-primary mb-12 md:mb-16"
        />

        {/* CTA */}
        <Link to="/collection">
          <motion.button
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1.2, delay: 2, ease: [0.22, 1, 0.36, 1] }}
            className="group relative px-10 py-4 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]"
            style={{ fontFamily: 'var(--font-body)', fontSize: '0.875rem', fontWeight: 400 }}
          >
            <span className="relative z-10">Explore Collection</span>
            <div className="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5" />
          </motion.button>
        </Link>
      </div>

      {/* Scroll indicator */}
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ duration: 1, delay: 2.5 }}
        className="absolute bottom-12 left-1/2 -translate-x-1/2"
      >
        <motion.div
          animate={{ y: [0, 10, 0] }}
          transition={{ duration: 2, repeat: Infinity, ease: "easeInOut" }}
          className="w-px h-16 bg-gradient-to-b from-transparent via-primary to-transparent"
        />
      </motion.div>
    </section>
  );
}