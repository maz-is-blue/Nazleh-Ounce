import { BrowserRouter, Routes, Route, useLocation } from 'react-router-dom';
import { AuthProvider } from '@/app/contexts/AuthContext';
import { ContentProvider } from '@/app/contexts/ContentContext';
import { ProductProvider } from '@/app/contexts/ProductContext';
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
          <BrowserRouter>
            <AppContent />
          </BrowserRouter>
        </ProductProvider>
      </ContentProvider>
    </AuthProvider>
  );
}

export default App;