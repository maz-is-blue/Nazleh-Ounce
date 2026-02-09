import { useParams, useNavigate, Link } from 'react-router-dom';
import { motion } from 'motion/react';
import { ArrowLeft, Shield, CheckCircle, Package, Zap, Star, AlertCircle } from 'lucide-react';
import { Footer } from '@/app/components/Footer';
import { useProducts } from '@/app/contexts/ProductContext';

export function ProductDetailsPage() {
  const { id } = useParams<{ id: string }>();
  const navigate = useNavigate();
  const { getProductById } = useProducts();
  const product = getProductById(id || '');

  if (!product) {
    return (
      <div className="min-h-screen flex items-center justify-center px-6">
        <div className="text-center">
          <h1 className="font-display text-4xl text-primary mb-4">Product Not Found</h1>
          <Link to="/collection" className="text-primary/60 hover:text-primary transition-colors">
            ← Back to Collection
          </Link>
        </div>
      </div>
    );
  }

  const getStockBadge = () => {
    if (product.isSoldOut) {
      return (
        <div className="inline-flex items-center gap-2 px-4 py-2 bg-red-400/10 border border-red-400/30 text-red-400">
          <AlertCircle className="size-4" />
          <span className="text-sm tracking-wider">SOLD OUT</span>
        </div>
      );
    }
    if (product.stock <= product.lowStockThreshold) {
      return (
        <div className="inline-flex items-center gap-2 px-4 py-2 bg-yellow-400/10 border border-yellow-400/30 text-yellow-400">
          <AlertCircle className="size-4" />
          <span className="text-sm tracking-wider">ONLY {product.stock} LEFT</span>
        </div>
      );
    }
    return (
      <div className="inline-flex items-center gap-2 px-4 py-2 bg-green-400/10 border border-green-400/30 text-green-400">
        <CheckCircle className="size-4" />
        <span className="text-sm tracking-wider">IN STOCK</span>
      </div>
    );
  };

  return (
    <>
      <div className="min-h-screen px-6 py-32">
        <div className="max-w-7xl mx-auto">
          {/* Back Button */}
          <motion.button
            initial={{ opacity: 0, x: -20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6 }}
            onClick={() => navigate('/collection')}
            className="flex items-center gap-2 text-foreground/60 hover:text-primary 
                     transition-colors duration-500 mb-12 group"
          >
            <ArrowLeft className="size-4 group-hover:-translate-x-1 transition-transform duration-500" />
            <span className="tracking-wider text-sm">BACK TO COLLECTION</span>
          </motion.button>

          {/* Product Grid */}
          <div className="grid lg:grid-cols-2 gap-12 lg:gap-16 mb-24">
            {/* Images Section */}
            <motion.div
              initial={{ opacity: 0, x: -30 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
              className="space-y-6"
            >
              {/* Main Image */}
              <div className="aspect-square overflow-hidden border border-primary/20 bg-background/40">
                <img
                  src={product.images[0]}
                  alt={product.name}
                  className="w-full h-full object-cover hover:scale-105 transition-transform duration-1000"
                />
              </div>

              {/* Thumbnail Gallery */}
              <div className="grid grid-cols-3 gap-4">
                {product.images.slice(1).map((image, index) => (
                  <div
                    key={index}
                    className="aspect-square overflow-hidden border border-primary/20 bg-background/40"
                  >
                    <img
                      src={image}
                      alt={`${product.name} view ${index + 2}`}
                      className="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
                    />
                  </div>
                ))}
              </div>
            </motion.div>

            {/* Details Section */}
            <motion.div
              initial={{ opacity: 0, x: 30 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.8, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
              className="space-y-8"
            >
              {/* Header */}
              <div className="border-b border-primary/20 pb-8">
                <h1 className="font-display text-5xl md:text-6xl text-primary mb-3">
                  {product.name}
                </h1>
                <p className="text-xl text-foreground/70 tracking-wide mb-6">
                  {product.subtitle}
                </p>
                <div className="flex items-baseline gap-2">
                  <span className="text-4xl text-primary">{product.price}</span>
                  <span className="text-foreground/60">{product.unit}</span>
                </div>
              </div>

              {/* Description */}
              <div>
                <p className="text-foreground/80 leading-relaxed mb-4">
                  {product.description}
                </p>
                <p className="text-foreground/60 leading-relaxed">
                  {product.longDescription}
                </p>
              </div>

              {/* Key Info */}
              <div className="grid grid-cols-2 gap-4 py-6 border-y border-primary/20">
                <div>
                  <p className="text-foreground/60 text-sm mb-1">PURITY</p>
                  <p className="text-primary tracking-wide">{product.purity}</p>
                </div>
                <div>
                  <p className="text-foreground/60 text-sm mb-1">STOCK</p>
                  <p className="text-primary tracking-wide">{product.stock} units</p>
                </div>
                <div className="col-span-2">
                  <p className="text-foreground/60 text-sm mb-1">AVAILABLE WEIGHTS</p>
                  <p className="text-foreground/80">{product.weight}</p>
                </div>
              </div>

              {/* Features */}
              <div>
                <h3 className="font-display text-xl text-primary mb-4 flex items-center gap-2">
                  <CheckCircle className="size-5" />
                  KEY FEATURES
                </h3>
                <ul className="space-y-3">
                  {product.features.map((feature, index) => (
                    <li key={index} className="flex items-start gap-3 text-foreground/70">
                      <Zap className="size-4 text-primary mt-1 flex-shrink-0" />
                      <span>{feature}</span>
                    </li>
                  ))}
                </ul>
              </div>

              {/* CTA Button */}
              <button
                className="w-full bg-primary/10 border border-primary/40 py-4 px-8
                         hover:bg-primary/20 hover:border-primary/60 
                         transition-all duration-700 text-primary tracking-widest
                         relative overflow-hidden group"
              >
                <span className="relative z-10 flex items-center justify-center gap-2">
                  <Package className="size-5" />
                  ADD TO INQUIRY
                </span>
                <div className="absolute inset-0 bg-primary/5 translate-y-full 
                              group-hover:translate-y-0 transition-transform duration-700" />
              </button>
            </motion.div>
          </div>

          {/* Specifications Table */}
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.4 }}
            className="border border-primary/20 bg-background/40 p-8 md:p-12"
          >
            <h2 className="font-display text-3xl text-primary mb-8 flex items-center gap-3">
              <Shield className="size-7" />
              Technical Specifications
            </h2>
            <div className="grid md:grid-cols-2 gap-x-12 gap-y-6">
              {Object.entries(product.specifications).map(([key, value]) => (
                <div key={key} className="flex justify-between items-start border-b border-primary/10 pb-4">
                  <span className="text-foreground/60 tracking-wide">{key}</span>
                  <span className="text-foreground font-medium text-right">{value}</span>
                </div>
              ))}
            </div>
          </motion.div>
        </div>
      </div>
      <Footer />
    </>
  );
}