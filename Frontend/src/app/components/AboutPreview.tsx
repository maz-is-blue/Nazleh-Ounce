import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { Link } from 'react-router-dom';

export function AboutPreview() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.3 });

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
          {/* Left: Text Content */}
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            animate={isInView ? { opacity: 1, x: 0 } : { opacity: 0, x: -30 }}
            transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
          >
            <div className="flex items-center gap-6 mb-8">
              <div className="w-12 h-px bg-primary" />
              <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                About Nazleh
              </span>
            </div>

            <h2 className="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
              Legacy of Excellence
            </h2>

            <div className="space-y-6 text-lg text-white/60 leading-relaxed mb-12" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
              <p>
                Founded with an unwavering commitment to authenticity, NAZLEH OUNCE emerged from a vision to redefine the standards of precious metal trading.
              </p>
              
              <p>
                In an industry where trust is paramount, we recognized the need for absolute transparency and verifiable quality. Every ounce we offer is traceable, certified, and worthy of the most discerning collectors.
              </p>
            </div>

            <Link
              to="/about"
              className="inline-flex items-center gap-4 group"
            >
              <span className="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                Discover Our Story
              </span>
              <div className="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24" />
            </Link>
          </motion.div>

          {/* Right: Values Grid */}
          <motion.div
            initial={{ opacity: 0, x: 30 }}
            animate={isInView ? { opacity: 1, x: 0 } : { opacity: 0, x: 30 }}
            transition={{ duration: 1.2, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            className="grid grid-cols-1 sm:grid-cols-2 gap-8"
          >
            {/* Value 1 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                01
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Authenticity
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Certified quality and verifiable provenance
              </p>
            </div>

            {/* Value 2 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                02
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Transparency
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Complete documentation and QR verification
              </p>
            </div>

            {/* Value 3 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                03
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Excellence
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Investment-grade precious metals
              </p>
            </div>

            {/* Value 4 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                04
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Legacy
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Generational wealth preservation
              </p>
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
