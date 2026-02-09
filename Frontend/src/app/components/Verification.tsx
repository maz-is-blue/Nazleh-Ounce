import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { Shield, Fingerprint, FileCheck, QrCode } from 'lucide-react';

const verificationFeatures = [
  {
    icon: Shield,
    title: 'Authenticity Guarantee',
    description: 'Every piece comes with a certificate of authenticity, ensuring investment-grade quality.',
  },
  {
    icon: Fingerprint,
    title: 'Unique Identification',
    description: 'Individual serial numbers and hallmarks for complete traceability.',
  },
  {
    icon: FileCheck,
    title: 'Third-Party Verification',
    description: 'Independently certified by recognized assay offices and institutions.',
  },
  {
    icon: QrCode,
    title: 'Digital Verification',
    description: 'Scan QR codes to instantly verify purity, weight, and origin.',
  },
];

export function Verification() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.3 });

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      {/* Background accent */}
      <div className="absolute inset-0 bg-gradient-to-b from-primary/5 via-transparent to-primary/5 opacity-30" />

      <div className="relative z-10 max-w-7xl mx-auto">
        {/* Section header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
          transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
          className="mb-20 md:mb-32 max-w-4xl mx-auto text-center"
        >
          <div className="flex items-center justify-center gap-6 mb-8">
            <div className="w-12 h-px bg-primary" />
            <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              Verification
            </span>
            <div className="w-12 h-px bg-primary" />
          </div>
          
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            Trust Through Transparency
          </h2>
          
          <p className="text-lg md:text-xl text-white/60 max-w-2xl mx-auto leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            Every Nazleh Ounce bar undergoes rigorous verification processes to ensure complete authenticity and value preservation.
          </p>
        </motion.div>

        {/* Features grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
          {verificationFeatures.map((feature, index) => {
            const Icon = feature.icon;
            
            return (
              <motion.div
                key={feature.title}
                initial={{ opacity: 0, y: 40 }}
                animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
                transition={{ duration: 1, delay: 0.2 + index * 0.15, ease: [0.22, 1, 0.36, 1] }}
              >
                <div className="group">
                  {/* Icon with glow effect */}
                  <div className="mb-8 relative inline-block">
                    <div className="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40" />
                    <div className="relative w-16 h-16 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                      <Icon className="w-7 h-7 text-primary transition-transform duration-700 group-hover:scale-110" strokeWidth={1.5} />
                    </div>
                  </div>

                  <h3 className="text-2xl md:text-3xl text-white mb-4 transition-colors duration-500 group-hover:text-primary" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                    {feature.title}
                  </h3>
                  
                  <p className="text-white/50 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                    {feature.description}
                  </p>

                  {/* Bottom accent line */}
                  <div className="mt-8 w-16 h-px bg-primary/30 transition-all duration-700 group-hover:w-24 group-hover:bg-primary" />
                </div>
              </motion.div>
            );
          })}
        </div>

        {/* CTA section */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
          transition={{ duration: 1, delay: 0.8, ease: [0.22, 1, 0.36, 1] }}
          className="mt-24 md:mt-32 text-center"
        >
          <p className="text-white/70 mb-8 tracking-[0.15em] uppercase" style={{ fontFamily: 'var(--font-body)', fontSize: '0.875rem', fontWeight: 400 }}>
            Request Verification Documentation
          </p>
          
          <button className="group relative px-10 py-4 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]" style={{ fontFamily: 'var(--font-body)', fontSize: '0.875rem', fontWeight: 400 }}>
            <span className="relative z-10">Contact Us</span>
            <div className="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5" />
          </button>
        </motion.div>
      </div>
    </section>
  );
}