import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';

const timelineEvents = [
  {
    year: '2018',
    title: 'Foundation',
    description: 'NAZLEH OUNCE was founded with a vision to revolutionize precious metal authentication and trading standards.',
  },
  {
    year: '2019',
    title: 'QR Verification System',
    description: 'Launched our proprietary QR verification technology, ensuring complete traceability and transparency.',
  },
  {
    year: '2021',
    title: 'International Expansion',
    description: 'Expanded operations to serve collectors and institutions across the Middle East and Europe.',
  },
  {
    year: '2023',
    title: 'Certification Excellence',
    description: 'Achieved highest industry certifications for purity standards and sustainable sourcing practices.',
  },
  {
    year: '2026',
    title: 'Future of Authenticity',
    description: 'Leading the industry in blockchain integration and advanced metallurgical verification methods.',
  },
];

export function Timeline() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.1 });

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      <div className="max-w-6xl mx-auto">
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
              Our Journey
            </span>
            <div className="w-12 h-px bg-primary" />
          </div>
          
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            Milestones of Excellence
          </h2>
        </motion.div>

        {/* Timeline */}
        <div className="relative">
          {/* Vertical line */}
          <div className="absolute left-0 md:left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-primary/40 to-transparent hidden md:block" />

          {/* Timeline items */}
          <div className="space-y-24 md:space-y-32">
            {timelineEvents.map((event, index) => (
              <motion.div
                key={event.year}
                initial={{ opacity: 0, y: 40 }}
                animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
                transition={{ duration: 1, delay: index * 0.15, ease: [0.22, 1, 0.36, 1] }}
                className={`relative flex flex-col md:flex-row ${
                  index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse'
                } items-center gap-8 md:gap-16`}
              >
                {/* Content */}
                <div className={`flex-1 ${index % 2 === 0 ? 'md:text-right' : 'md:text-left'} text-left`}>
                  <div className="inline-block">
                    <div className="text-6xl md:text-7xl text-primary/30 mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                      {event.year}
                    </div>
                    <h3 className="text-2xl md:text-3xl text-white mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                      {event.title}
                    </h3>
                    <p className="text-white/60 leading-relaxed max-w-md" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                      {event.description}
                    </p>
                  </div>
                </div>

                {/* Center dot */}
                <div className="relative z-10 flex-shrink-0">
                  <div className="w-4 h-4 rounded-full bg-primary shadow-[0_0_20px_rgba(139,212,226,0.6)]">
                    <div className="absolute inset-0 rounded-full bg-primary animate-ping opacity-40" />
                  </div>
                </div>

                {/* Spacer for alternating layout */}
                <div className="flex-1 hidden md:block" />
              </motion.div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
