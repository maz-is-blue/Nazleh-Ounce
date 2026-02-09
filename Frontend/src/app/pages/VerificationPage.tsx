import { Verification } from '@/app/components/Verification';
import { VerificationProcess } from '@/app/components/VerificationProcess';
import { Footer } from '@/app/components/Footer';
import { motion } from 'motion/react';

export function VerificationPage() {
  return (
    <>
      {/* Hero Section */}
      <section className="min-h-[60vh] flex items-center justify-center relative">
        <div className="max-w-4xl mx-auto px-6 md:px-12 text-center">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
          >
            <h1
              className="text-5xl md:text-7xl mb-6 text-white"
              style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}
            >
              Verification & Authenticity
            </h1>
            <p
              className="text-lg md:text-xl text-white/70 max-w-2xl mx-auto leading-relaxed"
              style={{ fontFamily: 'var(--font-body)' }}
            >
              Every piece in our collection undergoes rigorous verification to ensure
              the highest standards of authenticity and quality.
            </p>
          </motion.div>
        </div>
      </section>

      {/* Full Verification Section */}
      <Verification />
      <VerificationProcess />
      <Footer />
    </>
  );
}