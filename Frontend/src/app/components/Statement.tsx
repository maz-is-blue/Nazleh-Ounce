import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';

export function Statement() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.5 });

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      {/* Decorative background elements */}
      <div className="absolute inset-0 flex items-center justify-center opacity-[0.02]">
        <div className="text-[20rem] md:text-[30rem] font-serif text-primary select-none">
          "
        </div>
      </div>

      <div className="relative z-10 max-w-5xl mx-auto text-center">
        {/* Top decorative line */}
        <motion.div
          initial={{ scaleX: 0 }}
          animate={isInView ? { scaleX: 1 } : { scaleX: 0 }}
          transition={{ duration: 1.5, ease: [0.22, 1, 0.36, 1] }}
          className="w-32 h-px bg-gradient-to-r from-transparent via-primary to-transparent mx-auto mb-16"
        />

        {/* Statement */}
        <motion.blockquote
          initial={{ opacity: 0, y: 40 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
          transition={{ duration: 1.2, delay: 0.3, ease: [0.22, 1, 0.36, 1] }}
          className="space-y-8 md:space-y-12"
        >
          <blockquote className="text-2xl md:text-3xl lg:text-4xl leading-relaxed text-white/90 mb-8 max-w-4xl" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            "We believe in the enduring value of precious metals. Each piece we create represents not just wealth, but a legacy—crafted with precision, verified with care, and held with pride."
          </blockquote>
          <footer>
            <cite
              className="text-sm tracking-[0.25em] uppercase text-primary not-italic"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}
            >
              Nazleh Ounce Philosophy
            </cite>
          </footer>
        </motion.blockquote>

        {/* Bottom decorative line */}
        <motion.div
          initial={{ scaleX: 0 }}
          animate={isInView ? { scaleX: 1 } : { scaleX: 0 }}
          transition={{ duration: 1.5, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          className="w-32 h-px bg-gradient-to-r from-transparent via-primary to-transparent mx-auto mt-16"
        />
      </div>
    </section>
  );
}