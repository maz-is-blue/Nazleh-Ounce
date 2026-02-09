# ALL UPDATED COMPONENTS - COMPLETE CODE

Copy and paste each section to replace the corresponding file.

---

## 1. `/src/app/contexts/MediaContext.tsx` (NEW FILE)

```tsx
import { createContext, useContext, useState, useEffect, ReactNode } from 'react';

export interface MediaImage {
  id: string;
  name: string;
  description: string;
  location: string;
  url: string;
}

interface MediaContextType {
  images: MediaImage[];
  getImageById: (id: string) => string;
  updateImage: (id: string, url: string) => void;
}

const MediaContext = createContext<MediaContextType | undefined>(undefined);

// Default images
const defaultImages: MediaImage[] = [
  {
    id: 'hero-background',
    name: 'Hero Background',
    description: 'Main hero section background image',
    location: 'Home Page - Hero Section',
    url: 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=1600&q=80'
  },
  {
    id: 'about-hero',
    name: 'About Page Hero',
    description: 'About page header background',
    location: 'About Page - Hero Section',
    url: 'https://images.unsplash.com/photo-1611085583191-a3b181a88401?w=1600&q=80'
  },
  {
    id: 'collection-hero',
    name: 'Collection Hero',
    description: 'Collection page header background',
    location: 'Collection Page - Hero Section',
    url: 'https://images.unsplash.com/photo-1609424307541-5848b1a3f4fe?w=1600&q=80'
  },
  {
    id: 'verification-hero',
    name: 'Verification Hero',
    description: 'Verification page header background',
    location: 'Verification Page - Hero Section',
    url: 'https://images.unsplash.com/photo-1621857923687-96d48cf66bf4?w=1600&q=80'
  },
  {
    id: 'contact-hero',
    name: 'Contact Hero',
    description: 'Contact page header background',
    location: 'Contact Page - Hero Section',
    url: 'https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?w=1600&q=80'
  },
  {
    id: 'philosophy-section',
    name: 'Philosophy Section Image',
    description: 'Background image for philosophy section',
    location: 'Home Page - Philosophy Section',
    url: 'https://images.unsplash.com/photo-1610375461369-d613b564f6c4?w=1600&q=80'
  },
  {
    id: 'verification-process',
    name: 'Verification Process Image',
    description: 'Image showing verification and authenticity',
    location: 'Verification Page - Process Section',
    url: 'https://images.unsplash.com/photo-1541721856805-0a1f36c2a9b3?w=1600&q=80'
  },
  {
    id: 'craftsmanship-image',
    name: 'Craftsmanship Image',
    description: 'Detailed metalwork and craftsmanship',
    location: 'About Page - Craftsmanship Section',
    url: 'https://images.unsplash.com/photo-1567225591450-5a8b3e3a4f1a?w=1600&q=80'
  },
  {
    id: 'luxury-detail-1',
    name: 'Luxury Detail 1',
    description: 'High-end luxury metal detail shot',
    location: 'Home Page - Feature Sections',
    url: 'https://images.unsplash.com/photo-1634878907856-1b60ab8e7d1e?w=1600&q=80'
  },
  {
    id: 'luxury-detail-2',
    name: 'Luxury Detail 2',
    description: 'Premium metal texture closeup',
    location: 'Various Pages - Decorative',
    url: 'https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=1600&q=80'
  }
];

export function MediaProvider({ children }: { children: ReactNode }) {
  const [images, setImages] = useState<MediaImage[]>(() => {
    const stored = localStorage.getItem('nazleh_website_images');
    return stored ? JSON.parse(stored) : defaultImages;
  });

  useEffect(() => {
    localStorage.setItem('nazleh_website_images', JSON.stringify(images));
  }, [images]);

  const getImageById = (id: string): string => {
    const image = images.find(img => img.id === id);
    return image?.url || defaultImages.find(img => img.id === id)?.url || '';
  };

  const updateImage = (id: string, url: string) => {
    setImages(prev => prev.map(img => img.id === id ? { ...img, url } : img));
  };

  return (
    <MediaContext.Provider value={{ images, getImageById, updateImage }}>
      {children}
    </MediaContext.Provider>
  );
}

export function useMedia() {
  const context = useContext(MediaContext);
  if (!context) {
    throw new Error('useMedia must be used within a MediaProvider');
  }
  return context;
}
```

---

## 2. `/src/app/App.tsx`

```tsx
import { BrowserRouter, Routes, Route, useLocation } from 'react-router-dom';
import { AuthProvider } from '@/app/contexts/AuthContext';
import { ContentProvider } from '@/app/contexts/ContentContext';
import { ProductProvider } from '@/app/contexts/ProductContext';
import { MediaProvider } from '@/app/contexts/MediaContext';
import { ParallaxBackground } from '@/app/components/ParallaxBackground';
import { Navigation } from '@/app/components/Navigation';
import { PageLoader } from '@/app/components/PageLoader';
import { CustomCursor } from '@/app/components/CustomCursor';
import { ScrollToTop } from '@/app/components/ScrollToTop';
import { Home } from '@/app/pages/Home';
import { AboutPage } from '@/app/pages/AboutPage';
import { Collection } from '@/app/pages/Collection';
import { VerificationPage } from '@/app/pages/VerificationPage';
import { ContactPage } from '@/app/pages/ContactPage';
import { LoginPage } from '@/app/pages/LoginPage';
import { SignupPage } from '@/app/pages/SignupPage';
import { AccountPage } from '@/app/pages/AccountPage';
import { AdminLoginPage } from '@/app/pages/AdminLoginPage';
import { AdminDashboard } from '@/app/pages/AdminDashboard';
import { ProductDetailsPage } from '@/app/pages/ProductDetailsPage';

function AppContent() {
  const location = useLocation();
  const isAdminRoute = location.pathname.startsWith('/admin');

  return (
    <>
      <ScrollToTop />
      <PageLoader />
      <CustomCursor />
      <div className="min-h-screen bg-background overflow-x-hidden" style={{ fontFamily: 'var(--font-body)' }}>
        <ParallaxBackground />
        {!isAdminRoute && <Navigation />}
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/about" element={<AboutPage />} />
          <Route path="/collection" element={<Collection />} />
          <Route path="/product/:id" element={<ProductDetailsPage />} />
          <Route path="/verification" element={<VerificationPage />} />
          <Route path="/contact" element={<ContactPage />} />
          <Route path="/login" element={<LoginPage />} />
          <Route path="/signup" element={<SignupPage />} />
          <Route path="/account" element={<AccountPage />} />
          <Route path="/admin/login" element={<AdminLoginPage />} />
          <Route path="/admin/dashboard" element={<AdminDashboard />} />
        </Routes>
      </div>
    </>
  );
}

function App() {
  return (
    <AuthProvider>
      <ContentProvider>
        <ProductProvider>
          <MediaProvider>
            <BrowserRouter>
              <AppContent />
            </BrowserRouter>
          </MediaProvider>
        </ProductProvider>
      </ContentProvider>
    </AuthProvider>
  );
}

export default App;
```

---

## 3. `/src/app/components/Hero.tsx`

```tsx
import { motion } from 'motion/react';
import { Link } from 'react-router-dom';
import logoLight from 'figma:asset/745644c6e029e199887d58020055681422a94ef7.png';
import { useContent } from '@/app/contexts/ContentContext';

export function Hero() {
  const { content } = useContent();
  
  return (
    <section className="relative h-screen flex items-center justify-center overflow-hidden">
      {/* Subtle background texture overlay */}
      <div className="absolute inset-0 opacity-5">
        <div className="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent" />
      </div>

      {/* Main content */}
      <div className="relative z-10 flex flex-col items-center text-center px-6 md:px-12 max-w-5xl mx-auto">
        {/* Logo/Monogram with slow fade-in and scale - only showing the monogram/N symbol */}
        <motion.div
          initial={{ opacity: 0, scale: 0.95 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ duration: 1.8, ease: [0.22, 1, 0.36, 1] }}
          className="mb-12 md:mb-16"
        >
          <div className="w-48 h-48 md:w-64 md:h-64 flex items-center justify-center">
            <img
              src={logoLight}
              alt="Nazleh Ounce Monogram"
              className="w-full h-full object-contain opacity-90 mt-24"
            />
          </div>
        </motion.div>

        {/* Brand name with staggered letter animation */}
        <motion.h1
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1.2, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          className="mb-6 md:mb-8"
          style={{ fontFamily: 'var(--font-display)' }}
        >
          <span className="block text-[3rem] md:text-[5rem] lg:text-[6.5rem] tracking-[0.15em] uppercase text-white" style={{ fontWeight: 300, letterSpacing: '0.2em' }}>
            {content.hero.title}
          </span>
        </motion.h1>

        {/* Tagline - Correct version per brand brief */}
        <motion.p
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1.2, delay: 1.2, ease: [0.22, 1, 0.36, 1] }}
          className="text-lg md:text-xl tracking-[0.3em] uppercase text-white/70 mb-12 md:mb-16"
          style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}
        >
          {content.hero.subtitle}
        </motion.p>

        {/* Divider line */}
        <motion.div
          initial={{ scaleX: 0 }}
          animate={{ scaleX: 1 }}
          transition={{ duration: 1.5, delay: 1.6, ease: [0.22, 1, 0.36, 1] }}
          className="w-24 h-px bg-primary mb-12 md:mb-16"
        />

        {/* CTA */}
        <Link to="/collection">
          <motion.button
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1.2, delay: 2, ease: [0.22, 1, 0.36, 1] }}
            className="group relative px-10 py-4 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]"
            style={{ fontFamily: 'var(--font-body)', fontSize: '0.875rem', fontWeight: 400 }}
          >
            <span className="relative z-10">Explore Collection</span>
            <div className="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5" />
          </motion.button>
        </Link>
      </div>

      {/* Scroll indicator */}
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ duration: 1, delay: 2.5 }}
        className="absolute bottom-12 left-1/2 -translate-x-1/2"
      >
        <motion.div
          animate={{ y: [0, 10, 0] }}
          transition={{ duration: 2, repeat: Infinity, ease: "easeInOut" }}
          className="w-px h-16 bg-gradient-to-b from-transparent via-primary to-transparent"
        />
      </motion.div>
    </section>
  );
}
```

---

## 4. `/src/app/components/Footer.tsx`

```tsx
import { motion } from 'motion/react';
import { Link } from 'react-router-dom';
import logoDark from 'figma:asset/ad55badd66729deaf5ba431b2183bff941840cf9.png';
import { useContent } from '@/app/contexts/ContentContext';

export function Footer() {
  const { content } = useContent();
  
  return (
    <footer className="relative py-20 md:py-24 px-6 md:px-12 border-t border-primary/10">
      <div className="max-w-7xl mx-auto">
        {/* Top section with logo */}
        <div className="flex flex-col items-center mb-12">
          <motion.div
            initial={{ opacity: 0, scale: 0.95 }}
            whileInView={{ opacity: 1, scale: 1 }}
            transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
            viewport={{ once: true }}
            className="mb-8"
          >
            <img
              src={logoDark}
              alt="Nazleh Ounce"
              className="w-16 h-16 md:w-20 md:h-20 object-contain opacity-80"
            />
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 1, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            viewport={{ once: true }}
            className="text-center"
          >
            <h3 className="text-2xl md:text-3xl mb-2" style={{ fontFamily: 'var(--font-display)', fontWeight: 300, letterSpacing: '0.2em', color: 'white' }}>
              NAZLEH OUNCE
            </h3>
            <p className="text-sm tracking-[0.3em] uppercase text-white/50" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
              {content.footer.tagline}
            </p>
          </motion.div>
        </div>

        {/* Divider */}
        <motion.div
          initial={{ scaleX: 0 }}
          whileInView={{ scaleX: 1 }}
          transition={{ duration: 1.5, delay: 0.4, ease: [0.22, 1, 0.36, 1] }}
          viewport={{ once: true }}
          className="w-full h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent mb-12"
        />

        {/* Bottom section */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 1, delay: 0.6, ease: [0.22, 1, 0.36, 1] }}
          viewport={{ once: true }}
          className="flex flex-col md:flex-row items-center justify-between gap-8"
        >
          {/* Links */}
          <nav className="flex flex-wrap items-center justify-center gap-8 md:gap-12">
            <Link
              to="/"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Home
            </Link>
            <Link
              to="/about"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              About
            </Link>
            <Link
              to="/collection"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Collection
            </Link>
            <Link
              to="/verification"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Verification
            </Link>
            <Link
              to="/contact"
              className="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary"
              style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}
            >
              Contact
            </Link>
          </nav>

          {/* Copyright */}
          <p className="text-sm text-white/30" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            {content.footer.copyright}
          </p>
        </motion.div>

        {/* Decorative element */}
        <motion.div
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          transition={{ duration: 2, delay: 0.8 }}
          viewport={{ once: true }}
          className="mt-12 flex justify-center"
        >
          <div className="w-1 h-1 rounded-full bg-primary/50" />
        </motion.div>
      </div>
    </footer>
  );
}
```

---

## 5. `/src/app/components/AboutPreview.tsx`

```tsx
import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { Link } from 'react-router-dom';
import { useContent } from '@/app/contexts/ContentContext';

export function AboutPreview() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.3 });
  const { content } = useContent();

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
          {/* Left: Text Content */}
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            animate={isInView ? { opacity: 1, x: 0 } : { opacity: 0, x: -30 }}
            transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
          >
            <div className="flex items-center gap-6 mb-8">
              <div className="w-12 h-px bg-primary" />
              <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                {content.about.title}
              </span>
            </div>

            <h2 className="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
              {content.about.subtitle}
            </h2>

            <div className="space-y-6 text-lg text-white/60 leading-relaxed mb-12" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
              <p>
                {content.about.description}
              </p>
            </div>

            <Link
              to="/about"
              className="inline-flex items-center gap-4 group"
            >
              <span className="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
                Discover Our Story
              </span>
              <div className="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24" />
            </Link>
          </motion.div>

          {/* Right: Values Grid */}
          <motion.div
            initial={{ opacity: 0, x: 30 }}
            animate={isInView ? { opacity: 1, x: 0 } : { opacity: 0, x: 30 }}
            transition={{ duration: 1.2, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            className="grid grid-cols-1 sm:grid-cols-2 gap-8"
          >
            {/* Value 1 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                01
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Authenticity
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Certified quality and verifiable provenance
              </p>
            </div>

            {/* Value 2 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                02
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Transparency
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Complete documentation and QR verification
              </p>
            </div>

            {/* Value 3 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                03
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Excellence
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Investment-grade precious metals
              </p>
            </div>

            {/* Value 4 */}
            <div className="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
              <div className="text-5xl text-primary mb-4" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                04
              </div>
              <h3 className="text-xl text-white mb-3" style={{ fontFamily: 'var(--font-display)', fontWeight: 400 }}>
                Legacy
              </h3>
              <p className="text-white/50 text-sm leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                Generational wealth preservation
              </p>
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
```

---

## 6. `/src/app/components/ContactPreview.tsx`

```tsx
import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { Mail, Phone, MapPin } from 'lucide-react';
import { Link } from 'react-router-dom';
import { useContent } from '@/app/contexts/ContentContext';

export function ContactPreview() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.3 });
  const { content } = useContent();

  const contactInfo = [
    {
      icon: Mail,
      label: 'Email',
      value: content.contact.email,
      href: `mailto:${content.contact.email}`,
    },
    {
      icon: Phone,
      label: 'Phone',
      value: content.contact.phone,
      href: `tel:${content.contact.phone.replace(/\D/g, '')}`,
    },
    {
      icon: MapPin,
      label: 'Location',
      value: content.contact.address,
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
              {content.contact.title}
            </span>
            <div className="w-12 h-px bg-primary" />
          </div>
          
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            {content.contact.subtitle}
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
```

---

## 7. `/src/app/components/VerificationPreview.tsx`

```tsx
import { motion } from 'motion/react';
import { useInView } from 'motion/react';
import { useRef } from 'react';
import { Shield, Fingerprint } from 'lucide-react';
import { Link } from 'react-router-dom';
import { useContent } from '@/app/contexts/ContentContext';

const previewFeatures = [
  {
    icon: Shield,
    title: 'Authenticity Guarantee',
    description: 'Every piece comes with a certificate of authenticity, ensuring investment-grade quality.',
  },
  {
    icon: Fingerprint,
    title: 'Unique Identification',
    description: 'Individual serial numbers and hallmarks for complete traceability.',
  },
];

export function VerificationPreview() {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, amount: 0.3 });
  const { content } = useContent();

  return (
    <section ref={ref} className="relative py-32 md:py-48 px-6 md:px-12">
      {/* Background accent */}
      <div className="absolute inset-0 bg-gradient-to-b from-primary/5 via-transparent to-primary/5 opacity-30" />

      <div className="relative z-10 max-w-7xl mx-auto">
        {/* Section header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 30 }}
          transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
          className="mb-20 md:mb-32 max-w-4xl mx-auto text-center"
        >
          <div className="flex items-center justify-center gap-6 mb-8">
            <div className="w-12 h-px bg-primary" />
            <span className="text-sm tracking-[0.3em] uppercase text-primary" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              {content.verification.title}
            </span>
            <div className="w-12 h-px bg-primary" />
          </div>
          
          <h2 className="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
            {content.verification.subtitle}
          </h2>
          
          <p className="text-lg md:text-xl text-white/60 max-w-2xl mx-auto leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
            {content.verification.description}
          </p>
        </motion.div>

        {/* Preview Features - Only 2 items */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 mb-16">
          {previewFeatures.map((feature, index) => {
            const Icon = feature.icon;
            
            return (
              <motion.div
                key={feature.title}
                initial={{ opacity: 0, y: 40 }}
                animate={isInView ? { opacity: 1, y: 0 } : { opacity: 0, y: 40 }}
                transition={{ duration: 1, delay: 0.2 + index * 0.15, ease: [0.22, 1, 0.36, 1] }}
                className="group text-center"
              >
                {/* Icon */}
                <div className="mb-8 relative inline-block">
                  <div className="absolute inset-0 bg-primary/20 blur-2xl transition-all duration-700 group-hover:bg-primary/40" />
                  <div className="relative w-20 h-20 mx-auto flex items-center justify-center border border-primary/20 transition-all duration-700 group-hover:border-primary/60 group-hover:shadow-[0_0_30px_rgba(139,212,226,0.2)]">
                    <Icon className="w-10 h-10 text-primary transition-transform duration-700 group-hover:scale-110" strokeWidth={1.5} />
                  </div>
                </div>

                {/* Content */}
                <h3 className="text-2xl text-white mb-4 transition-colors duration-500 group-hover:text-primary" style={{ fontFamily: 'var(--font-display)', fontWeight: 300 }}>
                  {feature.title}
                </h3>
                <p className="text-white/60 leading-relaxed" style={{ fontFamily: 'var(--font-body)', fontWeight: 300 }}>
                  {feature.description}
                </p>
              </motion.div>
            );
          })}
        </div>

        {/* Learn More Link */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={isInView ? { opacity: 1 } : { opacity: 0 }}
          transition={{ duration: 1, delay: 0.5, ease: [0.22, 1, 0.36, 1] }}
          className="text-center"
        >
          <Link
            to="/verification"
            className="inline-flex items-center gap-4 group"
          >
            <span className="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style={{ fontFamily: 'var(--font-body)', fontWeight: 400 }}>
              Learn More
            </span>
            <div className="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24" />
          </Link>
        </motion.div>
      </div>
    </section>
  );
}
```

---

## 8. `/src/app/components/admin/MediaManagementTab.tsx`

```tsx
import { useState } from 'react';
import { motion } from 'motion/react';
import { ImageIcon, Save, AlertCircle, ExternalLink } from 'lucide-react';
import { useMedia } from '@/app/contexts/MediaContext';

export function MediaManagementTab() {
  const { images, updateImage } = useMedia();
  const [editingId, setEditingId] = useState<string | null>(null);
  const [editUrl, setEditUrl] = useState('');
  const [saveMessage, setSaveMessage] = useState('');

  const handleEdit = (image: any) => {
    setEditingId(image.id);
    setEditUrl(image.url);
  };

  const handleSave = (id: string) => {
    updateImage(id, editUrl);
    setEditingId(null);
    setEditUrl('');
    setSaveMessage('Image updated successfully!');
    setTimeout(() => setSaveMessage(''), 3000);
  };

  const handleCancel = () => {
    setEditingId(null);
    setEditUrl('');
  };

  return (
    <div className="space-y-6">
      {/* Header */}
      <div className="mb-6">
        <h3 className="font-display text-2xl text-primary flex items-center gap-2 mb-2">
          <ImageIcon className="size-6" />
          Website Media Management
        </h3>
        <p className="text-foreground/60 text-sm">
          Manage general website images and backgrounds. Product images are managed in the Products tab.
        </p>
      </div>

      {/* Info Banner */}
      <div className="backdrop-blur-sm bg-primary/5 border border-primary/20 p-4 flex items-start gap-3">
        <AlertCircle className="size-5 text-primary flex-shrink-0 mt-0.5" />
        <div className="text-sm text-foreground/80 space-y-1">
          <p className="font-semibold text-primary">How to use Unsplash for website images:</p>
          <ol className="list-decimal list-inside space-y-1 text-foreground/70 ml-2">
            <li>Visit <a href="https://unsplash.com" target="_blank" rel="noopener noreferrer" className="text-primary hover:underline">unsplash.com</a> and search for luxury, gold, silver, or metal images</li>
            <li>Right-click on any image and select "Copy image address"</li>
            <li>Paste the URL in the fields below</li>
            <li>For best quality, use URLs with <code className="bg-background/60 px-1 py-0.5">?w=1600&q=80</code> at the end</li>
          </ol>
        </div>
      </div>

      {/* Save Message */}
      {saveMessage && (
        <motion.div
          initial={{ opacity: 0, y: -10 }}
          animate={{ opacity: 1, y: 0 }}
          className="p-4 bg-green-400/10 border border-green-400/30 text-green-400"
        >
          {saveMessage}
        </motion.div>
      )}

      {/* Images Grid */}
      <div className="space-y-4">
        {images.map((image) => {
          const isEditing = editingId === image.id;
          
          return (
            <div
              key={image.id}
              className="backdrop-blur-sm bg-background/40 border border-primary/20 
                       hover:border-primary/40 transition-all duration-500 overflow-hidden"
            >
              <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
                {/* Image Preview */}
                <div className="space-y-3">
                  <div className="aspect-video overflow-hidden bg-background/60 border border-primary/10">
                    <img
                      src={isEditing ? editUrl : image.url}
                      alt={image.name}
                      className="w-full h-full object-cover"
                      onError={(e) => {
                        const target = e.target as HTMLImageElement;
                        target.src = 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=800&q=80';
                      }}
                    />
                  </div>
                  <a
                    href={isEditing ? editUrl : image.url}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="text-xs text-primary/60 hover:text-primary flex items-center gap-1 transition-colors"
                  >
                    <ExternalLink className="size-3" />
                    View Full Image
                  </a>
                </div>

                {/* Image Details */}
                <div className="space-y-4">
                  <div>
                    <h4 className="font-display text-xl text-primary mb-1">{image.name}</h4>
                    <p className="text-sm text-foreground/60 mb-2">{image.description}</p>
                    <div className="flex items-center gap-2 text-xs text-foreground/50">
                      <span className="px-2 py-1 bg-primary/10 border border-primary/20">
                        {image.location}
                      </span>
                    </div>
                  </div>

                  {isEditing ? (
                    <div className="space-y-3">
                      <div>
                        <label className="block text-xs tracking-wide text-foreground/60 mb-2 uppercase">
                          Image URL
                        </label>
                        <input
                          type="text"
                          value={editUrl}
                          onChange={(e) => setEditUrl(e.target.value)}
                          placeholder="https://images.unsplash.com/..."
                          className="w-full bg-background/60 border border-primary/30 px-3 py-2 text-sm
                                   focus:outline-none focus:border-primary/60 transition-colors duration-500
                                   text-foreground"
                        />
                      </div>
                      <div className="flex gap-2">
                        <button
                          onClick={() => handleSave(image.id)}
                          className="px-4 py-2 bg-primary/10 border border-primary/40 hover:bg-primary/20 
                                   transition-all duration-500 text-primary text-sm flex items-center gap-2"
                        >
                          <Save className="size-3" />
                          SAVE
                        </button>
                        <button
                          onClick={handleCancel}
                          className="px-4 py-2 border border-foreground/20 hover:bg-foreground/5 
                                   transition-all duration-500 text-foreground/60 text-sm"
                        >
                          CANCEL
                        </button>
                      </div>
                    </div>
                  ) : (
                    <div className="space-y-2">
                      <div className="text-xs text-foreground/40 break-all font-mono bg-background/40 p-2 border border-primary/10">
                        {image.url}
                      </div>
                      <button
                        onClick={() => handleEdit(image)}
                        className="px-4 py-2 bg-primary/10 border border-primary/40 hover:bg-primary/20 
                                 transition-all duration-500 text-primary text-sm tracking-wider"
                      >
                        CHANGE IMAGE
                      </button>
                    </div>
                  )}
                </div>
              </div>
            </div>
          );
        })}
      </div>

      {/* Help Section */}
      <div className="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 mt-8">
        <h4 className="font-display text-lg text-primary mb-3">Need Help Finding Images?</h4>
        <div className="space-y-2 text-sm text-foreground/70">
          <p>
            <strong className="text-foreground/90">Recommended Unsplash search terms:</strong>
          </p>
          <ul className="list-disc list-inside space-y-1 ml-2">
            <li>"luxury gold bar" - For precious metal imagery</li>
            <li>"silver ingot" - For silver product photos</li>
            <li>"metallic texture" - For abstract backgrounds</li>
            <li>"luxury minimalist" - For clean, high-end aesthetics</li>
            <li>"gold coins macro" - For detailed metal shots</li>
            <li>"dark luxury background" - For hero sections</li>
          </ul>
          <p className="pt-2">
            <strong className="text-foreground/90">Image size tip:</strong> Add <code className="bg-background/60 px-1.5 py-0.5 text-primary">?w=1600&q=80</code> to the end of any Unsplash URL for optimized quality and loading speed.
          </p>
        </div>
      </div>
    </div>
  );
}
```

---

**END OF FILE - All components ready to copy and paste!**
