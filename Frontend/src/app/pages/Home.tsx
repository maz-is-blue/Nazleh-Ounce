import { Hero } from '@/app/components/Hero';
import { LuxurySlider } from '@/app/components/LuxurySlider';
import { AboutPreview } from '@/app/components/AboutPreview';
import { CollectionPreview } from '@/app/components/CollectionPreview';
import { VerificationPreview } from '@/app/components/VerificationPreview';
import { ContactPreview } from '@/app/components/ContactPreview';
import { Footer } from '@/app/components/Footer';

export function Home() {
  return (
    <>
      <Hero />
      <LuxurySlider />
      <AboutPreview />
      <CollectionPreview />
      <VerificationPreview />
      <ContactPreview />
      <Footer />
    </>
  );
}