import { useState, useRef } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { useInView } from 'motion/react';
import { ImageWithFallback } from '@/app/components/figma/ImageWithFallback';
import { ChevronLeft, ChevronRight } from 'lucide-react';

const showcaseProducts = [
  {
    id: 1,
    title: '24K Gold Bar - 1oz',
    purity: '999.9 Fine Gold',
    weight: '1 Troy Ounce (31.1g)',
    dimensions: '50mm × 28mm × 2mm',
    image: 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    description: 'Investment-grade gold bar featuring precision-minted finish and laser-engraved serial number.',
  },
  {
    id: 2,
    title: 'Silver Bullion - 10oz',
    purity: '999 Fine Silver',
    weight: '10 Troy Ounces (311g)',
    dimensions: '90mm × 52mm × 8mm',
    image: 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    description: 'Premium silver bar with mirror-like finish and individually numbered certificate of authenticity.',
  },
  {
    id: 3,
    title: 'Gold Ingot - 5oz',
    purity: '999.9 Fine Gold',
    weight: '5 Troy Ounces (155.5g)',
    dimensions: '80mm × 40mm × 5mm',
    image: 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    description: 'Substantial gold ingot with refined casting marks and tamper-evident security packaging.',
  },
];

export function ProductShowcase() {
  const [currentIndex, setCurrentIndex] = useState(0);
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.2 });

  const currentProduct = showcaseProducts[currentIndex];

  const handlePrevious = () => {
    setCurrentIndex((prev) => (prev === 0 ? showcaseProducts.length - 1 : prev - 1));
  };

  const handleNext = () => {
    setCurrentIndex((prev) => (prev === showcaseProducts.length - 1 ? 0 : prev + 1));
  };

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12 bg-gradient-to-b from-transparent via-primary/5 to-transparent">
      <div className="max-w-7xl mx-auto">
        {/* Section header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
          transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
          className="mb-16 text-center"
        >
          <h2 className="text-3xl md:text-4xl lg:text-5xl text-white mb-6" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            Featured Pieces
          </h2>
          <div className="w-24 h-px bg-primary mx-auto" />
        </motion.div>

        {/* Showcase */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
          {/* Image side */}
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            animate={isInView ? { opacity: 1, x: 0 } : { opacity: 0, x: -30 }}
            transition={{ duration: 1.2, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            className="relative"
          >
            <AnimatePresence mode="wait">
              <motion.div
                key={currentProduct.id}
                initial={{ opacity: 0, scale: 0.95 }}
                animate={{ opacity: 1, scale: 1 }}
                exit={{ opacity: 0, scale: 0.95 }}
                transition={{ duration: 0.7, ease: [0.22, 1, 0.36, 1] }}
                className="relative aspect-square overflow-hidden border border-primary/20"
              >
                <ImageWithFallback
                  src={currentProduct.image}
                  alt={currentProduct.title}
                  className="w-full h-full object-cover"
                />
                
                {/* Subtle overlay */}
                <div className="absolute inset-0 bg-gradient-to-t from-background/40 via-transparent to-transparent" />
              </motion.div>
            </AnimatePresence>

            {/* Navigation */}
            <div className="flex items-center justify-center gap-4 mt-8">
              <button
                onClick={handlePrevious}
                className="group w-10 h-10 flex items-center justify-center border border-primary/30 transition-all duration-700 hover:border-primary hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]"
              >
                <ChevronLeft className="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary" strokeWidth={1.5} />
              </button>

              {/* Dots */}
              <div className="flex gap-2">
                {showcaseProducts.map((_, index) => (
                  <button
                    key={index}
                    onClick={() => setCurrentIndex(index)}
                    className={`w-2 h-2 rounded-full transition-all duration-500 ${
                      index === currentIndex ? 'bg-primary w-8' : 'bg-white/30 hover:bg-white/50'
                    }`}
                  />
                ))}
              </div>

              <button
                onClick={handleNext}
                className="group w-10 h-10 flex items-center justify-center border border-primary/30 transition-all duration-700 hover:border-primary hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]"
              >
                <ChevronRight className="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary" strokeWidth={1.5} />
              </button>
            </div>
          </motion.div>

          {/* Details side */}
          <motion.div
            initial={{ opacity: 0, x: 30 }}
            animate={isInView ? { opacity: 1, x: 0 } : { opacity: 0, x: 30 }}
            transition={{ duration: 1.2, delay: 0.4, ease: [0.22, 1, 0.36, 1] }}
          >
            <AnimatePresence mode="wait">
              <motion.div
                key={currentProduct.id}
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: -20 }}
                transition={{ duration: 0.6, ease: [0.22, 1, 0.36, 1] }}
              >
                <h3 className="text-3xl md:text-4xl text-white mb-6" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                  {currentProduct.title}
                </h3>

                <p className="text-lg text-white/70 leading-relaxed mb-8" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                  {currentProduct.description}
                </p>

                <div className="space-y-4 border-l-2 border-primary/30 pl-6">
                  <div>
                    <div className="text-xs tracking-[0.3em] uppercase text-white/40 mb-1" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                      Purity
                    </div>
                    <div className="text-base text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                      {currentProduct.purity}
                    </div>
                  </div>

                  <div>
                    <div className="text-xs tracking-[0.3em] uppercase text-white/40 mb-1" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                      Weight
                    </div>
                    <div className="text-base text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                      {currentProduct.weight}
                    </div>
                  </div>

                  <div>
                    <div className="text-xs tracking-[0.3em] uppercase text-white/40 mb-1" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                      Dimensions
                    </div>
                    <div className="text-base text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                      {currentProduct.dimensions}
                    </div>
                  </div>
                </div>
              </motion.div>
            </AnimatePresence>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
