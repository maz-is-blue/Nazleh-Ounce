import { createContext, useContext, useState, useEffect, ReactNode } from 'react';

// Define content structure for the entire website
export interface WebsiteContent {
  hero: {
    title: string;
    subtitle: string;
    description: string;
  };
  about: {
    title: string;
    subtitle: string;
    description: string;
    missionTitle: string;
    missionText: string;
  };
  collection: {
    heroTitle: string;
    heroDescription: string;
    sectionLabel: string;
    sectionTitle: string;
  };
  philosophy: {
    quote: string;
    author: string;
  };
  verification: {
    title: string;
    subtitle: string;
    description: string;
    processTitle: string;
  };
  contact: {
    title: string;
    subtitle: string;
    email: string;
    phone: string;
    address: string;
  };
  footer: {
    tagline: string;
    copyright: string;
  };
}

// Default content
const defaultContent: WebsiteContent = {
  hero: {
    title: 'NAZLEH OUNCE',
    subtitle: 'Artisanal Precious Metal Alloys',
    description: 'Where heritage meets purity. Each piece crafted with precision, verified with care, and treasured for generations.',
  },
  about: {
    title: 'About Nazleh',
    subtitle: 'A Legacy of Excellence',
    description: 'Founded on principles of authenticity and trust, Nazleh Ounce represents the pinnacle of precious metal craftsmanship.',
    missionTitle: 'Our Mission',
    missionText: 'To preserve the timeless value of precious metals through uncompromising quality and transparent verification.',
  },
  collection: {
    heroTitle: 'Premium Alloys',
    heroDescription: 'Explore our curated collection of investment-grade gold and silver bullion, each piece verified and certified for authenticity.',
    sectionLabel: 'Collection',
    sectionTitle: 'Premium Precious Metals',
  },
  philosophy: {
    quote: 'We believe in the enduring value of precious metals. Each piece we create represents not just wealth, but a legacy—crafted with precision, verified with care, and held with pride.',
    author: 'Nazleh Ounce Philosophy',
  },
  verification: {
    title: 'Verification & Authenticity',
    subtitle: 'Trust Through Transparency',
    description: 'Every alloy comes with a unique serial number and QR code for instant verification.',
    processTitle: 'Our Verification Process',
  },
  contact: {
    title: 'Contact Us',
    subtitle: 'Connect With Our Team',
    email: 'contact@nazlehounce.com',
    phone: '+1 (555) 123-4567',
    address: '123 Precious Metals Boulevard, New York, NY 10001',
  },
  footer: {
    tagline: 'Handcrafted Precious Metal Alloys',
    copyright: '© 2026 Nazleh Ounce',
  },
};

interface ContentContextType {
  content: WebsiteContent;
  updateContent: (section: keyof WebsiteContent, field: string, value: string) => void;
  resetContent: () => void;
}

const ContentContext = createContext<ContentContextType | undefined>(undefined);

// Migration function to merge stored content with new defaults
function migrateContent(stored: any): WebsiteContent {
  return {
    hero: { ...defaultContent.hero, ...stored?.hero },
    about: { ...defaultContent.about, ...stored?.about },
    collection: { ...defaultContent.collection, ...stored?.collection },
    philosophy: { ...defaultContent.philosophy, ...stored?.philosophy },
    verification: { ...defaultContent.verification, ...stored?.verification },
    contact: { ...defaultContent.contact, ...stored?.contact },
    footer: { ...defaultContent.footer, ...stored?.footer },
  };
}

export function ContentProvider({ children }: { children: ReactNode }) {
  const [content, setContent] = useState<WebsiteContent>(() => {
    const stored = localStorage.getItem('nazleh_content');
    if (stored) {
      const parsedStored = JSON.parse(stored);
      return migrateContent(parsedStored);
    }
    return defaultContent;
  });

  useEffect(() => {
    localStorage.setItem('nazleh_content', JSON.stringify(content));
  }, [content]);

  const updateContent = (section: keyof WebsiteContent, field: string, value: string) => {
    setContent(prev => ({
      ...prev,
      [section]: {
        ...prev[section],
        [field]: value,
      },
    }));
  };

  const resetContent = () => {
    setContent(defaultContent);
    localStorage.setItem('nazleh_content', JSON.stringify(defaultContent));
  };

  return (
    <ContentContext.Provider value={{ content, updateContent, resetContent }}>
      {children}
    </ContentContext.Provider>
  );
}

export function useContent() {
  const context = useContext(ContentContext);
  if (!context) {
    throw new Error('useContent must be used within a ContentProvider');
  }
  return context;
}