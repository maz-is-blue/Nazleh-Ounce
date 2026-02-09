import { motion } from 'motion/react';
import { Mail, Phone, MapPin } from 'lucide-react';

export function Contact() {
  const contactInfo = [
    {
      icon: Mail,
      label: 'Email',
      value: 'inquiries@nazlehounce.com',
      href: 'mailto:inquiries@nazlehounce.com'
    },
    {
      icon: Phone,
      label: 'Phone',
      value: '+1 (555) 123-4567',
      href: 'tel:+15551234567'
    },
    {
      icon: MapPin,
      label: 'Location',
      value: 'New York, NY',
      href: null
    }
  ];

  return (
    <section id="contact" className="relative py-32 md:py-40 px-6 md:px-12">
      <div className="max-w-5xl mx-auto">
        {/* Section header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
          viewport={{ once: true }}
          className="text-center mb-20 md:mb-24"
        >
          <h2 
            className="text-4xl md:text-5xl lg:text-6xl mb-6 tracking-[0.15em] uppercase text-white"
            style={{ fontFamily: 'var(--font-display)', fontWeight: 300, letterSpacing: '0.2em' }}
          >
            Contact
          </h2>
          
          <motion.div
            initial={{ scaleX: 0 }}
            whileInView={{ scaleX: 1 }}
            transition={{ duration: 1.5, delay: 0.3, ease: [0.22, 1, 0.36, 1] }}
            viewport={{ once: true }}
            className="w-24 h-px bg-primary mx-auto mb-8"
          />
          
          <p className="text-lg md:text-xl text-white/60 max-w-2xl mx-auto leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            For inquiries regarding our precious metal alloys, verification services, or private acquisitions.
          </p>
        </motion.div>

        {/* Contact cards */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
          {contactInfo.map((item, index) => {
            const Icon = item.icon;
            const content = (
              <motion.div
                key={item.label}
                initial={{ opacity: 0, y: 30 }}
                whileInView={{ opacity: 1, y: 0 }}
                transition={{ duration: 1, delay: index * 0.2, ease: [0.22, 1, 0.36, 1] }}
                viewport={{ once: true }}
                className="group relative"
              >
                <div className="relative border border-primary/20 p-8 md:p-10 transition-all duration-700 hover:border-primary/40 hover:shadow-[0_0_40px_rgba(139,212,226,0.15)]">
                  {/* Icon */}
                  <div className="mb-6 flex justify-center">
                    <div className="w-12 h-12 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]">
                      <Icon className="w-5 h-5 text-primary" strokeWidth={1.5} />
                    </div>
                  </div>

                  {/* Label */}
                  <h3 
                    className="text-sm tracking-[0.25em] uppercase text-primary mb-4 text-center"
                    style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
                  >
                    {item.label}
                  </h3>

                  {/* Value */}
                  <p 
                    className="text-base md:text-lg text-white/80 text-center transition-colors duration-500 group-hover:text-white"
                    style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}
                  >
                    {item.value}
                  </p>

                  {/* Subtle hover effect */}
                  <div className="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5 pointer-events-none" />
                </div>
              </motion.div>
            );

            return item.href ? (
              <a key={item.label} href={item.href} className="block">
                {content}
              </a>
            ) : (
              <div key={item.label}>
                {content}
              </div>
            );
          })}
        </div>

        {/* Additional message */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 1.2, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          viewport={{ once: true }}
          className="mt-20 md:mt-24 text-center"
        >
          <p 
            className="text-base text-white/50 italic max-w-2xl mx-auto leading-relaxed"
            style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}
          >
            "We welcome discerning collectors and institutions seeking authenticated precious metal investments of the highest caliber."
          </p>
        </motion.div>

        {/* Decorative element */}
        <motion.div
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          transition={{ duration: 2, delay: 0.8 }}
          viewport={{ once: true }}
          className="mt-16 flex justify-center"
        >
          <div className="w-1 h-1 rounded-full bg-primary/50" />
        </motion.div>
      </div>
    </section>
  );
}
