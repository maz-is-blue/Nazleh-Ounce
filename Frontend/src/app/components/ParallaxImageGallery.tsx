import { motion, useScroll, useTransform } from 'motion/react';
import { useRef } from 'react';
import { ImageWithFallback } from '@/app/components/figma/ImageWithFallback';

const galleryImages = [
  {
    id: 1,
    url: 'https://images.unsplash.com/photo-1758551038941-a67e29026bff?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkZW4lMjBhYnN0cmFjdCUyMGx1eHVyeSUyMHRleHR1cmV8ZW58MXx8fHwxNzcwMDI0NjM4fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    offset: 0,
  },
  {
    id: 2,
    url: 'https://images.unsplash.com/photo-1613751501087-1633ef20b3d4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjB2YXVsdCUyMHNlY3VyaXR5fGVufDF8fHx8MTc3MDAyNDYzN3ww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    offset: 50,
  },
  {
    id: 3,
    url: 'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
    offset: -50,
  },
];

export function ParallaxImageGallery() {
  return null;
}