import { createContext, useContext, useState, ReactNode, useEffect } from 'react';

export interface Purchase {
  id: string;
  alloyName: string;
  weight: string;
  purity: string;
  serialNumber: string;
  purchaseDate: string;
  certificateId: string;
}

export interface User {
  id: string;
  email: string;
  name: string;
  purchases: Purchase[];
  isAdmin?: boolean;
}

export interface AuthContextType {
  user: User | null;
  login: (email: string, password: string) => Promise<boolean>;
  signup: (email: string, password: string, name: string) => Promise<boolean>;
  logout: () => void;
  isAuthenticated: boolean;
  isAdmin: boolean;
  adminLogin: (email: string, password: string) => Promise<boolean>;
}

const AuthContext = createContext<AuthContextType | undefined>(undefined);

// Mock users database (in a real app, this would be in Supabase)
const mockUsers: Record<string, { password: string; user: User }> = {
  'demo@nazlehounce.com': {
    password: 'demo123',
    user: {
      id: '1',
      email: 'demo@nazlehounce.com',
      name: 'Demo User',
      purchases: [
        {
          id: '1',
          alloyName: 'Moonstone Gold',
          weight: '1 oz',
          purity: '24K',
          serialNumber: 'MSG-2025-001234',
          purchaseDate: '2025-12-15',
          certificateId: 'CERT-MSG-001234'
        },
        {
          id: '2',
          alloyName: 'Aurora Silver',
          weight: '5 oz',
          purity: '99.9%',
          serialNumber: 'AUS-2026-005678',
          purchaseDate: '2026-01-20',
          certificateId: 'CERT-AUS-005678'
        },
        {
          id: '3',
          alloyName: 'Eclipse Platinum',
          weight: '10 g',
          purity: '99.95%',
          serialNumber: 'ECP-2026-009012',
          purchaseDate: '2026-02-01',
          certificateId: 'CERT-ECP-009012'
        }
      ]
    }
  },
  'admin@nazlehounce.com': {
    password: 'admin123',
    user: {
      id: 'admin',
      email: 'admin@nazlehounce.com',
      name: 'Administrator',
      purchases: [],
      isAdmin: true
    }
  }
};

export function AuthProvider({ children }: { children: ReactNode }) {
  const [user, setUser] = useState<User | null>(null);

  // Check for stored session on mount
  useEffect(() => {
    const storedUser = localStorage.getItem('nazleh_user');
    if (storedUser) {
      setUser(JSON.parse(storedUser));
    }
  }, []);

  const login = async (email: string, password: string): Promise<boolean> => {
    // Simulate API delay
    await new Promise(resolve => setTimeout(resolve, 800));
    
    const mockUser = mockUsers[email];
    if (mockUser && mockUser.password === password) {
      setUser(mockUser.user);
      localStorage.setItem('nazleh_user', JSON.stringify(mockUser.user));
      return true;
    }
    return false;
  };

  const signup = async (email: string, password: string, name: string): Promise<boolean> => {
    // Simulate API delay
    await new Promise(resolve => setTimeout(resolve, 800));
    
    // Check if user already exists
    if (mockUsers[email]) {
      return false;
    }

    // Create new user
    const newUser: User = {
      id: Date.now().toString(),
      email,
      name,
      purchases: []
    };

    mockUsers[email] = { password, user: newUser };
    setUser(newUser);
    localStorage.setItem('nazleh_user', JSON.stringify(newUser));
    return true;
  };

  const logout = () => {
    setUser(null);
    localStorage.removeItem('nazleh_user');
  };

  const adminLogin = async (email: string, password: string): Promise<boolean> => {
    // Simulate API delay
    await new Promise(resolve => setTimeout(resolve, 800));
    
    const mockUser = mockUsers[email];
    
    // Check if user exists, password matches, AND user is an admin
    if (mockUser && mockUser.password === password && mockUser.user.isAdmin) {
      setUser(mockUser.user);
      localStorage.setItem('nazleh_user', JSON.stringify(mockUser.user));
      return true;
    }
    
    return false;
  };

  return (
    <AuthContext.Provider
      value={{
        user,
        login,
        signup,
        logout,
        isAuthenticated: !!user,
        isAdmin: user?.isAdmin || false,
        adminLogin
      }}
    >
      {children}
    </AuthContext.Provider>
  );
}

export function useAuth() {
  const context = useContext(AuthContext);
  if (context === undefined) {
    throw new Error('useAuth must be used within an AuthProvider');
  }
  return context;
}