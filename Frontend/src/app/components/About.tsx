import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';

export function About() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.3 });

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      {/* Background gradient accent */}
      <div className="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent opacity-30" />

      <div className="relative z-10 max-w-6xl mx-auto">
        {/* Section label */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
          transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
          className="mb-16 md:mb-24"
        >
          <div className="flex items-center gap-6 mb-8">
            <div className="w-12 h-px bg-primary" />
            <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              Philosophy
            </span>
          </div>
        </motion.div>

        {/* Main statement */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
          transition={{ duration: 1, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
          className="mb-20 md:mb-32"
        >
          <h2 className="text-4xl md:text-5xl lg:text-6xl leading-tight text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            Every bar tells a story<br />of precision and permanence
          </h2>
          <p className="text-lg md:text-xl text-white/60 max-w-3xl leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            We craft gold and silver alloys with an unwavering commitment to purity, authenticity, and long-term value. Each piece is handcrafted to meet the highest standards of excellence.
          </p>
        </motion.div>

        {/* Values grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16">
          {[
            {
              title: 'Craftsmanship',
              description: 'Meticulous attention to every detail, ensuring each alloy meets exacting specifications.',
            },
            {
              title: 'Purity',
              description: 'Only the finest materials, refined to investment-grade standards.',
            },
            {
              title: 'Trust',
              description: 'Complete transparency and verification for every piece we create.',
            },
          ].map((value, index) => (
            <motion.div
              key={value.title}
              initial={{ opacity: 0, y: 30 }}
              animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
              transition={{ duration: 1, delay: 0.4 + index * 0.2, ease: [0.22, 1, 0.36, 1] }}
            >
              <div className="group">
                {/* Decorative top border that glows on hover */}
                <div className="w-16 h-px bg-primary/30 mb-8 transition-all duration-700 group-hover:w-24 group-hover:bg-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.5)]" />
                
                <h3 className="text-2xl md:text-3xl mb-4 text-white" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                  {value.title}
                </h3>
                
                <p className="text-white/50 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                  {value.description}
                </p>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
