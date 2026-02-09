import { useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { motion } from 'motion/react';
import { QRCodeSVG } from 'qrcode.react';
import { LogOut, Award, Calendar, Weight, ShieldCheck, Download } from 'lucide-react';
import { useAuth } from '@/app/contexts/AuthContext';

export function AccountPage() {
  const navigate = useNavigate();
  const { user, logout, isAuthenticated } = useAuth();

  useEffect(() => {
    if (!isAuthenticated) {
      navigate('/login');
    }
  }, [isAuthenticated, navigate]);

  if (!user) {
    return null;
  }

  const handleLogout = () => {
    logout();
    navigate('/');
  };

  const downloadQRCode = (certificateId: string, alloyName: string) => {
    const canvas = document.getElementById(`qr-${certificateId}`) as HTMLCanvasElement;
    if (canvas) {
      const svg = canvas.querySelector('svg');
      if (svg) {
        const svgData = new XMLSerializer().serializeToString(svg);
        const svgBlob = new Blob([svgData], { type: 'image/svg+xml;charset=utf-8' });
        const url = URL.createObjectURL(svgBlob);
        const link = document.createElement('a');
        link.href = url;
        link.download = `${alloyName.replace(/\s+/g, '-')}-${certificateId}.svg`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
      }
    }
  };

  return (
    <div className="min-h-screen px-6 py-32">
      <div className="max-w-6xl mx-auto">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
          className="mb-16"
        >
          <div className="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
              <h1 className="font-display text-4xl md:text-5xl mb-3 text-primary">
                Your Collection
              </h1>
              <p className="text-foreground/60 tracking-wider">
                Welcome back, {user.name}
              </p>
              <p className="text-sm text-foreground/40 mt-1">{user.email}</p>
            </div>
            <button
              onClick={handleLogout}
              className="self-start md:self-auto px-6 py-3 border border-primary/30 
                       hover:border-primary/60 hover:bg-primary/10
                       transition-all duration-500 text-primary tracking-wider
                       flex items-center gap-2 group"
            >
              <LogOut className="size-4 group-hover:translate-x-1 transition-transform duration-500" />
              SIGN OUT
            </button>
          </div>
        </motion.div>

        {/* Purchases Grid */}
        {user.purchases.length === 0 ? (
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 1, delay: 0.3 }}
            className="text-center py-20"
          >
            <Award className="size-16 text-primary/30 mx-auto mb-6" />
            <h2 className="font-display text-2xl mb-3 text-foreground/60">
              No Purchases Yet
            </h2>
            <p className="text-foreground/40 mb-8">
              Your verified alloy collection will appear here
            </p>
            <button
              onClick={() => navigate('/collection')}
              className="px-8 py-4 bg-primary/10 border border-primary/40 
                       hover:bg-primary/20 hover:border-primary/60
                       transition-all duration-700 text-primary tracking-widest"
            >
              EXPLORE COLLECTION
            </button>
          </motion.div>
        ) : (
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {user.purchases.map((purchase, index) => (
              <motion.div
                key={purchase.id}
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ 
                  duration: 0.8, 
                  delay: index * 0.15,
                  ease: [0.22, 1, 0.36, 1] 
                }}
                className="backdrop-blur-sm bg-background/40 border border-primary/20 p-8
                         hover:border-primary/40 transition-all duration-700 group"
              >
                {/* Alloy Name & Status */}
                <div className="flex items-start justify-between mb-8">
                  <div>
                    <h3 className="font-display text-2xl mb-2 text-primary group-hover:text-primary/80 transition-colors duration-500">
                      {purchase.alloyName}
                    </h3>
                    <div className="flex items-center gap-2 text-sm text-foreground/60">
                      <ShieldCheck className="size-4 text-green-400" />
                      <span className="tracking-wide">VERIFIED AUTHENTIC</span>
                    </div>
                  </div>
                </div>

                {/* Purchase Details */}
                <div className="grid grid-cols-2 gap-4 mb-8">
                  <div className="flex items-center gap-3 text-foreground/70">
                    <Weight className="size-5 text-primary/60" />
                    <div>
                      <p className="text-xs text-foreground/40 tracking-wide mb-1">WEIGHT</p>
                      <p className="text-sm">{purchase.weight}</p>
                    </div>
                  </div>
                  <div className="flex items-center gap-3 text-foreground/70">
                    <Award className="size-5 text-primary/60" />
                    <div>
                      <p className="text-xs text-foreground/40 tracking-wide mb-1">PURITY</p>
                      <p className="text-sm">{purchase.purity}</p>
                    </div>
                  </div>
                  <div className="flex items-center gap-3 text-foreground/70 col-span-2">
                    <Calendar className="size-5 text-primary/60" />
                    <div>
                      <p className="text-xs text-foreground/40 tracking-wide mb-1">PURCHASE DATE</p>
                      <p className="text-sm">{new Date(purchase.purchaseDate).toLocaleDateString('en-US', { 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric' 
                      })}</p>
                    </div>
                  </div>
                </div>

                {/* Serial Number */}
                <div className="mb-8 p-4 bg-primary/5 border border-primary/20">
                  <p className="text-xs text-foreground/40 tracking-wide mb-2">SERIAL NUMBER</p>
                  <p className="font-mono text-sm text-primary tracking-wider">{purchase.serialNumber}</p>
                </div>

                {/* QR Code Section */}
                <div className="border-t border-primary/20 pt-8">
                  <div className="flex flex-col sm:flex-row items-center gap-6">
                    <div 
                      id={`qr-${purchase.certificateId}`}
                      className="bg-white p-4 flex-shrink-0"
                    >
                      <QRCodeSVG
                        value={JSON.stringify({
                          certificateId: purchase.certificateId,
                          serialNumber: purchase.serialNumber,
                          alloyName: purchase.alloyName,
                          weight: purchase.weight,
                          purity: purchase.purity,
                          purchaseDate: purchase.purchaseDate,
                          owner: user.email,
                          verificationUrl: `https://nazlehounce.com/verify/${purchase.certificateId}`
                        })}
                        size={140}
                        level="H"
                        includeMargin={false}
                      />
                    </div>
                    <div className="flex-1 text-center sm:text-left">
                      <p className="text-xs text-foreground/40 tracking-wide mb-2">
                        CERTIFICATE QR CODE
                      </p>
                      <p className="text-sm text-foreground/60 mb-4">
                        Scan to verify authenticity and ownership
                      </p>
                      <button
                        onClick={() => downloadQRCode(purchase.certificateId, purchase.alloyName)}
                        className="inline-flex items-center gap-2 px-4 py-2 
                                 border border-primary/30 hover:border-primary/60
                                 hover:bg-primary/10 transition-all duration-500
                                 text-primary text-sm tracking-wider group/btn"
                      >
                        <Download className="size-4 group-hover/btn:translate-y-0.5 transition-transform duration-300" />
                        DOWNLOAD QR
                      </button>
                    </div>
                  </div>
                  <p className="text-xs text-foreground/30 mt-4 font-mono">
                    {purchase.certificateId}
                  </p>
                </div>
              </motion.div>
            ))}
          </div>
        )}

        {/* Bottom Actions */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 1, delay: 0.6 }}
          className="mt-16 text-center"
        >
          <button
            onClick={() => navigate('/collection')}
            className="px-8 py-4 bg-primary/10 border border-primary/40 
                     hover:bg-primary/20 hover:border-primary/60
                     transition-all duration-700 text-primary tracking-widest
                     relative overflow-hidden group"
          >
            <span className="relative z-10">EXPLORE MORE ALLOYS</span>
            <div className="absolute inset-0 bg-primary/5 translate-x-full 
                          group-hover:translate-x-0 transition-transform duration-700" />
          </button>
        </motion.div>
      </div>
    </div>
  );
}
