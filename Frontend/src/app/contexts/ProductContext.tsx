import { createContext, useContext, useState, useEffect, ReactNode } from 'react';

export interface Product {
  id: string;
  name: string;
  subtitle: string;
  description: string;
  longDescription: string;
  price: string;
  unit: string;
  purity: string;
  weight: string;
  stock: number;
  isLimitedEdition: boolean;
  isSoldOut: boolean;
  lowStockThreshold: number;
  features: string[];
  specifications: Record<string, string>;
  images: string[];
  category: string;
  displayOrder: number;
}

// Default products
const defaultProducts: Product[] = [
  {
    id: 'moonstone-gold',
    name: 'Moonstone Gold',
    subtitle: '24K Pure Gold Alloy',
    description: 'Our flagship gold alloy, crafted with the finest 24-karat gold. Each piece undergoes rigorous quality control and comes with lifetime authenticity certification.',
    longDescription: 'Moonstone Gold represents the pinnacle of our craftsmanship. Sourced from conflict-free mines and refined to 99.99% purity, this alloy embodies luxury and trust. The distinctive moonstone finish is achieved through our proprietary cooling process, creating subtle variations that make each piece unique.',
    price: '2,450',
    unit: 'per oz',
    purity: '99.99% (24K)',
    weight: 'Available in 1oz, 5oz, 10oz bars',
    stock: 124,
    isLimitedEdition: false,
    isSoldOut: false,
    lowStockThreshold: 50,
    features: [
      'Certified 24K pure gold',
      'Unique serial number engraved',
      'Tamper-proof packaging',
      'Lifetime authenticity guarantee',
      'Blockchain-verified provenance',
      'Eligible for IRA investment',
    ],
    specifications: {
      'Metal Type': 'Gold',
      'Purity': '99.99% (24K)',
      'Finish': 'Moonstone Matte',
      'Origin': 'Swiss Refined',
      'Certification': 'LBMA Approved',
      'Storage': 'Hermetically Sealed',
    },
    images: [
      'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=800&q=80',
      'https://images.unsplash.com/photo-1611085583191-a3b181a88401?w=800&q=80',
      'https://images.unsplash.com/photo-1609424307541-5848b1a3f4fe?w=800&q=80',
    ],
    category: 'gold',
    displayOrder: 1,
  },
  {
    id: 'aurora-silver',
    name: 'Aurora Silver',
    subtitle: '99.9% Pure Silver',
    description: 'Brilliant silver alloy with exceptional luster. Perfect for both investment and collection.',
    longDescription: 'Aurora Silver showcases the natural beauty of pure silver at 99.9% purity. Named for its brilliant, aurora-like sheen, this alloy is struck multiple times to achieve mirror-like surfaces. Each bar is individually inspected and sealed to maintain its pristine condition.',
    price: '37',
    unit: 'per oz',
    purity: '99.9%',
    weight: 'Available in 1oz, 5oz, 10oz, 100oz bars',
    stock: 856,
    isLimitedEdition: false,
    isSoldOut: false,
    lowStockThreshold: 100,
    features: [
      'Investment-grade silver',
      'Mirror-like finish',
      'Anti-tarnish coating',
      'Numbered certificate of authenticity',
      'Secure vault storage available',
      'Buyback guarantee',
    ],
    specifications: {
      'Metal Type': 'Silver',
      'Purity': '99.9%',
      'Finish': 'Brilliant Aurora',
      'Origin': 'Canadian Minted',
      'Certification': 'ISO 9001',
      'Dimensions': '50mm x 30mm x 3mm (1oz)',
    },
    images: [
      'https://images.unsplash.com/photo-1610375461369-d613b564f6c4?w=800&q=80',
      'https://images.unsplash.com/photo-1611085583440-1e1e2f4d16a7?w=800&q=80',
      'https://images.unsplash.com/photo-1541721856805-0a1f36c2a9b3?w=800&q=80',
    ],
    category: 'silver',
    displayOrder: 2,
  },
  {
    id: 'eclipse-platinum',
    name: 'Eclipse Platinum',
    subtitle: '99.95% Pure Platinum',
    description: 'Rare and prestigious platinum alloy for discerning collectors.',
    longDescription: 'Eclipse Platinum is our most exclusive offering. With 99.95% purity, this dense and lustrous metal is among the rarest precious metals available. The Eclipse collection features a distinctive dark patina edge that frames the brilliant platinum center.',
    price: '45',
    unit: 'per gram',
    purity: '99.95%',
    weight: 'Available in 10g, 31.1g (1oz), 100g bars',
    stock: 243,
    isLimitedEdition: true,
    isSoldOut: false,
    lowStockThreshold: 100,
    features: [
      'Ultra-rare 99.95% purity',
      'Distinctive eclipse finish',
      'Museum-quality presentation case',
      'Full provenance documentation',
      'Certified by international assayers',
      'Private vault storage included',
    ],
    specifications: {
      'Metal Type': 'Platinum',
      'Purity': '99.95%',
      'Finish': 'Eclipse Dual-Tone',
      'Origin': 'South African Source',
      'Certification': 'LPPM Good Delivery',
      'Density': '21.45 g/cm³',
    },
    images: [
      'https://images.unsplash.com/photo-1621857923687-96d48cf66bf4?w=800&q=80',
      'https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?w=800&q=80',
      'https://images.unsplash.com/photo-1634878907856-1b60ab8e7d1e?w=800&q=80',
    ],
    category: 'platinum',
    displayOrder: 3,
  },
  {
    id: 'celestial-bronze',
    name: 'Celestial Bronze',
    subtitle: 'Premium Bronze Alloy',
    description: 'Handcrafted bronze alloy with distinctive patina finish.',
    longDescription: 'Celestial Bronze combines traditional metallurgy with modern aesthetics. Our proprietary bronze formula achieves 99.5% purity with a warm, celestial glow. Each piece develops a unique patina over time, making it a living work of art.',
    price: '12',
    unit: 'per oz',
    purity: '99.5%',
    weight: 'Available in 1oz, 5oz, 10oz medallions',
    stock: 567,
    isLimitedEdition: false,
    isSoldOut: false,
    lowStockThreshold: 200,
    features: [
      'Artisanal bronze formula',
      'Natural aging patina',
      'Hand-numbered edition',
      'Artistic collector value',
      'Historical significance',
      'Custom display stand included',
    ],
    specifications: {
      'Metal Type': 'Bronze',
      'Purity': '99.5%',
      'Finish': 'Celestial Patina',
      'Origin': 'European Alloy',
      'Composition': 'Copper-Tin',
      'Aging': 'Natural Oxidation',
    },
    images: [
      'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=800&q=80',
      'https://images.unsplash.com/photo-1567225591450-5a8b3e3a4f1a?w=800&q=80',
      'https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=800&q=80',
    ],
    category: 'bronze',
    displayOrder: 4,
  },
];

interface ProductContextType {
  products: Product[];
  addProduct: (product: Product) => void;
  updateProduct: (id: string, product: Partial<Product>) => void;
  deleteProduct: (id: string) => void;
  getProductById: (id: string) => Product | undefined;
  resetProducts: () => void;
}

const ProductContext = createContext<ProductContextType | undefined>(undefined);

export function ProductProvider({ children }: { children: ReactNode }) {
  const [products, setProducts] = useState<Product[]>(() => {
    const stored = localStorage.getItem('nazleh_products');
    return stored ? JSON.parse(stored) : defaultProducts;
  });

  useEffect(() => {
    localStorage.setItem('nazleh_products', JSON.stringify(products));
  }, [products]);

  const addProduct = (product: Product) => {
    setProducts(prev => [...prev, product]);
  };

  const updateProduct = (id: string, updates: Partial<Product>) => {
    setProducts(prev =>
      prev.map(product => (product.id === id ? { ...product, ...updates } : product))
    );
  };

  const deleteProduct = (id: string) => {
    setProducts(prev => prev.filter(product => product.id !== id));
  };

  const getProductById = (id: string) => {
    return products.find(product => product.id === id);
  };

  const resetProducts = () => {
    setProducts(defaultProducts);
    localStorage.setItem('nazleh_products', JSON.stringify(defaultProducts));
  };

  return (
    <ProductContext.Provider
      value={{ products, addProduct, updateProduct, deleteProduct, getProductById, resetProducts }}
    >
      {children}
    </ProductContext.Provider>
  );
}

export function useProducts() {
  const context = useContext(ProductContext);
  if (!context) {
    throw new Error('useProducts must be used within a ProductProvider');
  }
  return context;
}
