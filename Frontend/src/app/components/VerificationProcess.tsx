import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef, useState } from 'react';
import { QrCode, Shield, FileCheck, Award } from 'lucide-react';

const verificationSteps = [
  {
    id: 1,
    icon: QrCode,
    title: 'Scan QR Code',
    description: 'Each piece features a unique QR code engraved directly into the metal surface.',
    details: 'Our proprietary laser engraving ensures the QR code is permanent, tamper-proof, and perfectly scannable.',
  },
  {
    id: 2,
    icon: Shield,
    title: 'Secure Authentication',
    description: 'Instant verification through our encrypted blockchain-backed database.',
    details: 'Multi-layer security protocols ensure every scan is logged and verified against our master registry.',
  },
  {
    id: 3,
    icon: FileCheck,
    title: 'Certificate Access',
    description: 'View complete documentation including purity analysis, origin, and chain of custody.',
    details: 'Digital certificates include metallurgical reports, weight verification, and historical provenance data.',
  },
  {
    id: 4,
    icon: Award,
    title: 'Lifetime Guarantee',
    description: 'Authenticated pieces carry our perpetual guarantee of authenticity and quality.',
    details: 'Full buyback program and complimentary re-certification service for verified pieces.',
  },
];

export function VerificationProcess() {
  const [activeStep, setActiveStep] = useState<number | null>(null);
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.2 });

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      <div className="max-w-7xl mx-auto">
        {/* Section header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
          transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
          className="mb-20 md:mb-32 text-center"
        >
          <div className="flex items-center justify-center gap-6 mb-8">
            <div className="w-12 h-px bg-primary" />
            <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              How It Works
            </span>
            <div className="w-12 h-px bg-primary" />
          </div>
          
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            Verification Process
          </h2>
          
          <p className="text-lg md:text-xl text-white/60 max-w-3xl mx-auto leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            Four seamless steps to absolute certainty in authenticity and provenance
          </p>
        </motion.div>

        {/* Process Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
          {verificationSteps.map((step, index) => {
            const Icon = step.icon;
            const isActive = activeStep === step.id;

            return (
              <motion.div
                key={step.id}
                initial={{ opacity: 0, y: 40 }}
                animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
                transition={{ duration: 1, delay: index * 0.15, ease: [0.22, 1, 0.36, 1] }}
              >
                <div
                  onMouseEnter={() => setActiveStep(step.id)}
                  onMouseLeave={() => setActiveStep(null)}
                  className={`group relative border transition-all duration-700 p-8 md:p-10 cursor-pointer ${
                    isActive
                      ? 'border-primary shadow-[0_0_40px_rgba(139,212,226,0.2)]'
                      : 'border-primary/20 hover:border-primary/40'
                  }`}
                >
                  {/* Step number */}
                  <div className="absolute top-6 right-6 text-6xl text-primary/10" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                    0{index + 1}
                  </div>

                  {/* Icon */}
                  <div className="mb-6 relative inline-block">
                    <div className={`absolute inset-0 blur-xl transition-all duration-700 ${
                      isActive ? 'bg-primary/40' : 'bg-primary/20'
                    }`} />
                    <div className={`relative w-16 h-16 flex items-center justify-center border transition-all duration-700 ${
                      isActive ? 'border-primary shadow-[0_0_30px_rgba(139,212,226,0.3)]' : 'border-primary/30'
                    }`}>
                      <Icon className={`w-7 h-7 text-primary transition-transform duration-700 ${
                        isActive ? 'scale-110' : ''
                      }`} strokeWidth={1.5} />
                    </div>
                  </div>

                  {/* Content */}
                  <h3 className={`text-2xl md:text-3xl mb-4 transition-colors duration-500 ${
                    isActive ? 'text-primary' : 'text-white'
                  }`} style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                    {step.title}
                  </h3>

                  <p className="text-white/60 leading-relaxed mb-4" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                    {step.description}
                  </p>

                  {/* Expandable details */}
                  <motion.div
                    initial={{ height: 0, opacity: 0 }}
                    animate={isActive ? { height: 'auto', opacity: 1 } : { height: 0, opacity: 0 }}
                    transition={{ duration: 0.5, ease: [0.22, 1, 0.36, 1] }}
                    className="overflow-hidden"
                  >
                    <div className="pt-4 mt-4 border-t border-primary/20">
                      <p className="text-sm text-primary/80 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                        {step.details}
                      </p>
                    </div>
                  </motion.div>

                  {/* Bottom accent */}
                  <div className={`mt-6 h-px transition-all duration-700 ${
                    isActive ? 'w-full bg-primary' : 'w-16 bg-primary/30'
                  }`} />
                </div>
              </motion.div>
            );
          })}
        </div>

        {/* QR Demo Section */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
          transition={{ duration: 1, delay: 0.8, ease: [0.22, 1, 0.36, 1] }}
          className="mt-20 md:mt-32 text-center"
        >
          <div className="inline-block border border-primary/20 p-12 md:p-16">
            <div className="w-48 h-48 md:w-64 md:h-64 mx-auto mb-8 bg-white/5 border border-primary/30 flex items-center justify-center">
              <QrCode className="w-32 h-32 md:w-40 md:h-40 text-primary/40" strokeWidth={1} />
            </div>
            <p className="text-white/50 text-sm tracking-[0.2em] uppercase" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
              Sample QR Code
            </p>
          </div>
        </motion.div>
      </div>
    </section>
  );
}
