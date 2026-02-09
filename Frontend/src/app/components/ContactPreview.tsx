import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { Mail, Phone, MapPin } from 'lucide-react';
import { Link } from 'react-router-dom';

export function ContactPreview() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.3 });

  const contactInfo = [
    {
      icon: Mail,
      label: 'Email',
      value: 'info@nazlehounce.com',
      href: 'mailto:info@nazlehounce.com',
    },
    {
      icon: Phone,
      label: 'Phone',
      value: '+1 (555) 123-4567',
      href: 'tel:+15551234567',
    },
    {
      icon: MapPin,
      label: 'Location',
      value: 'Dubai, United Arab Emirates',
      href: null,
    },
  ];

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12 border-t border-primary/10">
      <div className="max-w-7xl mx-auto">
        {/* Section header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
          transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
          className="mb-20 md:mb-32 text-center max-w-3xl mx-auto"
        >
          <div className="flex items-center justify-center gap-6 mb-8">
            <div className="w-12 h-px bg-primary" />
            <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              Contact
            </span>
            <div className="w-12 h-px bg-primary" />
          </div>
          
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            Begin Your Journey
          </h2>
          
          <p className="text-lg md:text-xl text-white/60 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            Connect with our team for personalized consultation and expert guidance in precious metal investments.
          </p>
        </motion.div>

        {/* Contact Cards - Horizontal layout */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 mb-16">
          {contactInfo.map((item, index) => {
            const Icon = item.icon;
            const content = (
              <motion.div
                key={item.label}
                initial={{ opacity: 0, y: 40 }}
                animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
                transition={{ duration: 1, delay: 0.2 + index * 0.15, ease: [0.22, 1, 0.36, 1] }}
              >
                <div className="group relative border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.15)]">
                  {/* Icon */}
                  <div className="mb-6 relative inline-block">
                    <div className="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40" />
                    <div className="relative w-12 h-12 flex items-center justify-center">
                      <Icon className="w-6 h-6 text-primary transition-transform duration-700 group-hover:scale-110" strokeWidth={1.5} />
                    </div>
                  </div>

                  {/* Label */}
                  <div className="text-xs tracking-[0.3em] uppercase text-white/40 mb-3" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                    {item.label}
                  </div>

                  {/* Value */}
                  <div className="text-lg text-white transition-colors duration-500 group-hover:text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                    {item.value}
                  </div>
                </div>
              </motion.div>
            );

            return item.href ? (
              <a key={item.label} href={item.href}>
                {content}
              </a>
            ) : (
              <div key={item.label}>{content}</div>
            );
          })}
        </div>

        {/* Get in Touch Link */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={isInView ? { opacity: 1 } : { opacity: 0 }}
          transition={{ duration: 1, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          className="text-center"
        >
          <Link
            to="/contact"
            className="inline-flex items-center gap-4 group"
          >
            <span className="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              Get In Touch
            </span>
            <div className="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24" />
          </Link>
        </motion.div>
      </div>
    </section>
  );
}
