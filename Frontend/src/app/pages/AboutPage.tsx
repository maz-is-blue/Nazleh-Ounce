import { motion } from 'motion/react';
import { About } from '@/app/components/About';
import { Statement } from '@/app/components/Statement';
import { Timeline } from '@/app/components/Timeline';
import { ParallaxImageGallery } from '@/app/components/ParallaxImageGallery';
import { Footer } from '@/app/components/Footer';

export function AboutPage() {
  return (
    <>
      {/* Page header with spacing for navigation */}
      <div className="pt-32 md:pt-40" />
      
      {/* Page title section */}
      <section className="relative py-20 md:py-24 px-6 md:px-12">
        <div className="max-w-5xl mx-auto text-center">
          <motion.h1
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
            className="text-5xl md:text-6xl lg:text-7xl mb-6 tracking-[0.15em] uppercase text-white"
            style={{ fontFamily: 'var(--font-display)', fontWeight: 300, letterSpacing: '0.2em' }}
          >
            About Nazleh
          </motion.h1>
          
          <motion.div
            initial={{ scaleX: 0 }}
            animate={{ scaleX: 1 }}
            transition={{ duration: 1.5, delay: 0.3, ease: [0.22, 1, 0.36, 1] }}
            className="w-24 h-px bg-primary mx-auto mb-12"
          />
          
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1, delay: 0.5, ease: [0.22, 1, 0.36, 1] }}
            className="text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl mx-auto"
            style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}
          >
            A legacy of precision, authenticity, and uncompromising standards in precious metal craftsmanship.
          </motion.p>
        </div>
      </section>

      {/* Our Beginning */}
      <section className="relative py-20 md:py-32 px-6 md:px-12">
        <div className="max-w-4xl mx-auto">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
            viewport={{ once: true }}
            className="mb-16"
          >
            <h2 
              className="text-3xl md:text-4xl mb-8 tracking-[0.15em] uppercase text-primary"
              style={{ fontFamily: 'var(--font-display)', fontWeight: 300, letterSpacing: '0.2em' }}
            >
              Our Beginning
            </h2>
            
            <div className="space-y-6 text-lg md:text-xl text-white/70 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
              <p>
                Founded with an unwavering commitment to authenticity, NAZLEH OUNCE emerged from a vision to redefine the standards of precious metal trading. In an industry where trust is paramount, we recognized the need for absolute transparency and verifiable quality.
              </p>
              
              <p>
                Our journey began with a simple yet profound principle: every ounce of gold and silver we offer must be traceable, certified, and worthy of the most discerning collectors and institutions.
              </p>
              
              <p>
                What started as a dedication to craftsmanship has evolved into a comprehensive system of verification, authentication, and unparalleled service in the precious metals market.
              </p>
            </div>
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 1.2, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            viewport={{ once: true }}
          >
            <h2 
              className="text-3xl md:text-4xl mb-8 tracking-[0.15em] uppercase text-primary"
              style={{ fontFamily: 'var(--font-display)', fontWeight: 300, letterSpacing: '0.2em' }}
            >
              What We Offer
            </h2>
            
            <div className="space-y-8">
              <div className="border-l-2 border-primary/30 pl-6">
                <h3 className="text-xl md:text-2xl mb-3 text-white" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                  Certified Precious Metal Alloys
                </h3>
                <p className="text-base md:text-lg text-white/70 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                  Each bar and bullion piece is meticulously crafted from the finest gold and silver alloys, meeting international purity standards. Our collection ranges from classic 24K gold to sophisticated silver compositions, each authenticated and documented.
                </p>
              </div>

              <div className="border-l-2 border-primary/30 pl-6">
                <h3 className="text-xl md:text-2xl mb-3 text-white" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                  Advanced QR Verification System
                </h3>
                <p className="text-base md:text-lg text-white/70 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                  Every piece features our proprietary QR verification technology, providing instant access to complete provenance, certification details, and authenticity documentation. This system ensures absolute transparency and peace of mind.
                </p>
              </div>

              <div className="border-l-2 border-primary/30 pl-6">
                <h3 className="text-xl md:text-2xl mb-3 text-white" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                  White Glove Service
                </h3>
                <p className="text-base md:text-lg text-white/70 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                  From private consultations to secure delivery, we provide a seamless experience for collectors and institutions. Our team offers expert guidance on portfolio diversification, market insights, and long-term wealth preservation strategies.
                </p>
              </div>

              <div className="border-l-2 border-primary/30 pl-6">
                <h3 className="text-xl md:text-2xl mb-3 text-white" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                  Legacy Investments
                </h3>
                <p className="text-base md:text-lg text-white/70 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                  Beyond transactions, we facilitate generational wealth transfer and long-term value preservation. Our precious metals are designed to be heirlooms, investments that transcend time and economic cycles.
                </p>
              </div>
            </div>
          </motion.div>
        </div>
      </section>

      {/* Include existing About and Statement components */}
      <About />
      <Statement />
      <Timeline />
      <ParallaxImageGallery />
      
      <Footer />
    </>
  );
}