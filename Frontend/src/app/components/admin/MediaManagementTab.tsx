import { useState } from 'react';
import { motion } from 'motion/react';
import { ImageIcon, Save, AlertCircle, ExternalLink } from 'lucide-react';

interface WebsiteImage {
  id: string;
  name: string;
  description: string;
  location: string;
  url: string;
}

export function MediaManagementTab() {
  const [images, setImages] = useState<WebsiteImage[]>(() => {
    const stored = localStorage.getItem('nazleh_website_images');
    return stored ? JSON.parse(stored) : [
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
  });

  const [editingId, setEditingId] = useState<string | null>(null);
  const [editUrl, setEditUrl] = useState('');
  const [saveMessage, setSaveMessage] = useState('');

  const handleEdit = (image: WebsiteImage) => {
    setEditingId(image.id);
    setEditUrl(image.url);
  };

  const handleSave = (id: string) => {
    const updatedImages = images.map(img => 
      img.id === id ? { ...img, url: editUrl } : img
    );
    setImages(updatedImages);
    localStorage.setItem('nazleh_website_images', JSON.stringify(updatedImages));
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
