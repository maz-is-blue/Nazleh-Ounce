import { useRef } from 'react';
import Slider from 'react-slick';
import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { ChevronLeft, ChevronRight } from 'lucide-react';
import { ImageWithFallback } from '@/app/components/figma/ImageWithFallback';

const sliderImages = [
  {
    id: 1,
    url: 'https://images.unsplash.com/photo-1768359666502-306694fa6fcf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBnb2xkJTIwYmFycyUyMHZhdWx0fGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    title: 'Secured Excellence',
    subtitle: 'Premium vault storage',
  },
  {
    id: 2,
    url: 'https://images.unsplash.com/photo-1598724168411-9ba1e003a7fe?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFscyUyMGNyYWZ0c21hbnNoaXAlMjBhcnRpc2FufGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    title: 'Master Craftsmanship',
    subtitle: 'Artisan precision',
  },
  {
    id: 3,
    url: 'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    title: 'Curated Collection',
    subtitle: 'Investment grade metals',
  },
  {
    id: 4,
    url: 'https://images.unsplash.com/photo-1522255272218-7ac5249be344?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBiYW5raW5nJTIwcHJpdmF0ZSUyMHdlYWx0aHxlbnwxfHx8fDE3NzAwMjQ2Mzd8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    title: 'Private Wealth',
    subtitle: 'Exclusive service',
  },
];

export function LuxurySlider() {
  const sliderRef = useRef<Slider>(null);
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.2 });

  const settings = {
    dots: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    pauseOnHover: true,
    arrows: false,
    cssEase: 'cubic-bezier(0.22, 1, 0.36, 1)',
    appendDots: (dots: React.ReactNode) => (
      <div className="relative bottom-8">
        <ul className="flex items-center justify-center gap-3"> {dots} </ul>
      </div>
    ),
    customPaging: () => (
      <button className="w-2 h-2 rounded-full bg-white/30 transition-all duration-500 hover:bg-primary" />
    ),
  };

  return (
    <section ref={ref} className="relative py-20 md:py-32 overflow-hidden">
      <motion.div
        initial={{ opacity: 0 }}
        animate={isInView ? { opacity: 1 } : { opacity: 0 }}
        transition={{ duration: 1.5, ease: [0.22, 1, 0.36, 1] }}
        className="relative"
      >
        <Slider ref={sliderRef} {...settings}>
          {sliderImages.map((image) => (
            <div key={image.id} className="relative">
              <div className="relative h-[60vh] md:h-[70vh] overflow-hidden">
                {/* Image */}
                <ImageWithFallback
                  src={image.url}
                  alt={image.title}
                  className="w-full h-full object-cover"
                />
                
                {/* Gradient overlay */}
                <div className="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent" />
                
                {/* Content overlay */}
                <div className="absolute inset-0 flex items-end justify-center pb-24 md:pb-32">
                  <div className="text-center px-6">
                    <motion.h3
                      initial={{ opacity: 0, y: 20 }}
                      animate={{ opacity: 1, y: 0 }}
                      transition={{ duration: 1, delay: 0.3 }}
                      className="text-3xl md:text-5xl lg:text-6xl text-white mb-4"
                      style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}
                    >
                      {image.title}
                    </motion.h3>
                    <motion.p
                      initial={{ opacity: 0, y: 20 }}
                      animate={{ opacity: 1, y: 0 }}
                      transition={{ duration: 1, delay: 0.5 }}
                      className="text-sm md:text-base tracking-[0.3em] uppercase text-primary"
                      style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}
                    >
                      {image.subtitle}
                    </motion.p>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </Slider>

        {/* Custom navigation arrows */}
        <div className="absolute top-1/2 -translate-y-1/2 left-0 right-0 z-10 pointer-events-none">
          <div className="max-w-7xl mx-auto px-6 md:px-12 flex items-center justify-between">
            <button
              onClick={() => sliderRef.current?.slickPrev()}
              className="pointer-events-auto group w-12 h-12 flex items-center justify-center border border-white/20 transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]"
            >
              <ChevronLeft className="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary" strokeWidth={1.5} />
            </button>
            
            <button
              onClick={() => sliderRef.current?.slickNext()}
              className="pointer-events-auto group w-12 h-12 flex items-center justify-center border border-white/20 transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]"
            >
              <ChevronRight className="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary" strokeWidth={1.5} />
            </button>
          </div>
        </div>
      </motion.div>
    </section>
  );
}
