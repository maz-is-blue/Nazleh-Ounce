import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { ImageWithFallback } from '@/app/components/figma/ImageWithFallback';
import { Link } from 'react-router-dom';

const featuredAlloys = [
  {
    id: 1,
    title: '24K Gold Bar',
    purity: '999.9 Fine Gold',
    weight: '1 Troy Ounce',
    image: 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
  },
  {
    id: 2,
    title: 'Silver Bullion',
    purity: '999 Fine Silver',
    weight: '10 Troy Ounces',
    image: 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
  },
  {
    id: 3,
    title: 'Gold Ingot',
    purity: '999.9 Fine Gold',
    weight: '5 Troy Ounces',
    image: 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
  },
];

export function CollectionPreview() {
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
          className="mb-20 md:mb-32"
        >
          <div className="flex items-center gap-6 mb-8">
            <div className="w-12 h-px bg-primary" />
            <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              Collection
            </span>
          </div>
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white max-w-3xl mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            Gold & Silver Alloys
          </h2>
          <p className="text-lg text-white/60 max-w-2xl mb-12" style={{ fontFamily: 'var(--font-body)' }}>
            A curated selection of investment-grade precious metals
          </p>
        </motion.div>

        {/* Preview Grid - Only 3 items */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 mb-16">
          {featuredAlloys.map((alloy, index) => (
            <motion.div
              key={alloy.id}
              initial={{ opacity: 0, y: 40 }}
              animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
              transition={{ duration: 1, delay: index * 0.15, ease: [0.22, 1, 0.36, 1] }}
            >
              <div className="group cursor-pointer">
                {/* Image container */}
                <div className="relative aspect-[4/5] mb-6 overflow-hidden bg-muted/5">
                  <ImageWithFallback
                    src={alloy.image}
                    alt={alloy.title}
                    className="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"
                  />
                  
                  {/* Overlay on hover */}
                  <div className="absolute inset-0 bg-gradient-to-t from-background/80 via-background/20 to-transparent opacity-0 transition-all duration-700 group-hover:opacity-100" />
                  
                  {/* Subtle border glow on hover */}
                  <div className="absolute inset-0 border border-transparent transition-all duration-700 group-hover:border-primary/40 group-hover:shadow-[inset_0_0_40px_rgba(139,212,226,0.15)]" />
                </div>

                {/* Info */}
                <div className="space-y-3">
                  <h3 className="text-xl md:text-2xl text-white transition-colors duration-500 group-hover:text-primary" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                    {alloy.title}
                  </h3>
                  
                  <div className="space-y-1">
                    <p className="text-sm tracking-[0.15em] text-white/50" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                      {alloy.purity}
                    </p>
                    <p className="text-sm tracking-[0.15em] text-white/50" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                      {alloy.weight}
                    </p>
                  </div>
                </div>
              </div>
            </motion.div>
          ))}
        </div>

        {/* View Full Collection Link */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={isInView ? { opacity: 1 } : { opacity: 0 }}
          transition={{ duration: 1, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          className="text-center"
        >
          <Link
            to="/collection"
            className="inline-flex items-center gap-4 group"
          >
            <span className="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              View Full Collection
            </span>
            <div className="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24" />
          </Link>
        </motion.div>
      </div>
    </section>
  );
}
