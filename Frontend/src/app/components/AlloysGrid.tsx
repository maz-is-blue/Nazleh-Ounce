import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { Link } from 'react-router-dom';
import { ImageWithFallback } from '@/app/components/figma/ImageWithFallback';
import { useProducts } from '@/app/contexts/ProductContext';
import { useContent } from '@/app/contexts/ContentContext';
import { Star, AlertCircle, CheckCircle } from 'lucide-react';

export function AlloysGrid() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.2 });
  const { products } = useProducts();
  const { content } = useContent();

  const getStockBadge = (product: any) => {
    if (product.isSoldOut) {
      return (
        <div className="absolute top-4 right-4 px-3 py-1.5 bg-red-400/90 backdrop-blur-sm text-white text-xs tracking-wider flex items-center gap-1">
          <AlertCircle className="size-3" />
          SOLD OUT
        </div>
      );
    }
    if (product.stock <= product.lowStockThreshold) {
      return (
        <div className="absolute top-4 right-4 px-3 py-1.5 bg-yellow-400/90 backdrop-blur-sm text-background text-xs tracking-wider flex items-center gap-1">
          <AlertCircle className="size-3" />
          {product.stock} LEFT
        </div>
      );
    }
    return null;
  };

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
              {content.collection.sectionLabel}
            </span>
          </div>
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white max-w-3xl" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            {content.collection.sectionTitle}
          </h2>
        </motion.div>

        {/* Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
          {products
            .sort((a, b) => a.displayOrder - b.displayOrder)
            .map((product, index) => (
              <motion.div
                key={product.id}
                initial={{ opacity: 0, y: 40 }}
                animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
                transition={{ duration: 1, delay: index * 0.15, ease: [0.22, 1, 0.36, 1] }}
              >
                <Link to={`/product/${product.id}`} className="group cursor-pointer block">
                  {/* Image container */}
                  <div className="relative aspect-[4/5] mb-6 overflow-hidden bg-muted/5">
                    <ImageWithFallback
                      src={product.images[0] || 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=800&q=80'}
                      alt={product.name}
                      className="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"
                    />
                    
                    {/* Stock Badge */}
                    {getStockBadge(product)}

                    {/* Limited Edition Badge */}
                    {product.isLimitedEdition && !product.isSoldOut && (
                      <div className="absolute top-4 left-4 px-3 py-1.5 bg-primary/90 backdrop-blur-sm text-background text-xs tracking-wider flex items-center gap-1">
                        <Star className="size-3 fill-background" />
                        LIMITED EDITION
                      </div>
                    )}
                    
                    {/* Overlay on hover */}
                    <div className="absolute inset-0 bg-gradient-to-t from-background/80 via-background/20 to-transparent opacity-0 transition-all duration-700 group-hover:opacity-100" />
                    
                    {/* Subtle border glow on hover */}
                    <div className="absolute inset-0 border border-transparent transition-all duration-700 group-hover:border-primary/40 group-hover:shadow-[inset_0_0_40px_rgba(139,212,226,0.15)]" />
                  </div>

                  {/* Info */}
                  <div className="space-y-3">
                    <div className="flex items-start justify-between gap-2">
                      <h3 className="text-xl md:text-2xl text-white transition-colors duration-500 group-hover:text-primary" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                        {product.name}
                      </h3>
                    </div>
                    
                    <p className="text-sm text-white/60" style={{ fontFamily: 'var(--font-body)' }}>
                      {product.subtitle}
                    </p>
                    
                    <div className="space-y-1">
                      <p className="text-sm tracking-[0.15em] text-white/50" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                        {product.purity}
                      </p>
                      <p className="text-lg text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                        ${product.price} <span className="text-sm text-white/50">{product.unit}</span>
                      </p>
                    </div>

                    {/* Hover indicator */}
                    <div className="flex items-center gap-3 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                      <div className="w-8 h-px bg-primary" />
                      <span className="text-xs tracking-[0.2em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                        View Details
                      </span>
                    </div>
                  </div>
                </Link>
              </motion.div>
            ))}
        </div>
      </div>
    </section>
  );
}