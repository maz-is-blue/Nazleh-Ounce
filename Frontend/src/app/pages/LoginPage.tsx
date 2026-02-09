import { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { motion } from 'motion/react';
import { Mail, Lock, Eye, EyeOff, Loader2 } from 'lucide-react';
import { useAuth } from '@/app/contexts/AuthContext';

export function LoginPage() {
  const navigate = useNavigate();
  const { login } = useAuth();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [showPassword, setShowPassword] = useState(false);
  const [error, setError] = useState('');
  const [isLoading, setIsLoading] = useState(false);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setError('');
    setIsLoading(true);

    const success = await login(email, password);
    
    setIsLoading(false);
    
    if (success) {
      navigate('/account');
    } else {
      setError('Invalid email or password');
    }
  };

  return (
    <div className="min-h-screen flex items-center justify-center px-6 py-32">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
        className="w-full max-w-md"
      >
        {/* Logo/Brand */}
        <div className="text-center mb-12">
          <h1 className="font-display text-4xl mb-3 tracking-wide text-primary">
            NAZLEH OUNCE
          </h1>
          <p className="text-foreground/60 text-sm tracking-wider">
            ACCOUNT ACCESS
          </p>
        </div>

        {/* Login Form */}
        <div className="backdrop-blur-sm bg-background/40 border border-primary/20 p-8 md:p-10">
          <h2 className="font-display text-2xl mb-8 text-center">Sign In</h2>
          
          {error && (
            <motion.div
              initial={{ opacity: 0, height: 0 }}
              animate={{ opacity: 1, height: 'auto' }}
              className="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 text-sm"
            >
              {error}
            </motion.div>
          )}

          {/* Demo credentials helper */}
          <div className="mb-6 p-4 bg-primary/5 border border-primary/20 text-sm text-foreground/70">
            <p className="mb-1"><strong>Demo Account:</strong></p>
            <p className="font-mono text-xs">demo@nazlehounce.com</p>
            <p className="font-mono text-xs">demo123</p>
          </div>

          <form onSubmit={handleSubmit} className="space-y-6">
            {/* Email Field */}
            <div>
              <label className="block text-sm mb-2 tracking-wide text-foreground/80">
                EMAIL ADDRESS
              </label>
              <div className="relative">
                <Mail className="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-primary/50" />
                <input
                  type="email"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                  required
                  className="w-full bg-background/60 border border-primary/30 px-12 py-3 
                           focus:outline-none focus:border-primary/60 transition-colors duration-500
                           text-foreground placeholder:text-foreground/30"
                  placeholder="your@email.com"
                />
              </div>
            </div>

            {/* Password Field */}
            <div>
              <label className="block text-sm mb-2 tracking-wide text-foreground/80">
                PASSWORD
              </label>
              <div className="relative">
                <Lock className="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-primary/50" />
                <input
                  type={showPassword ? 'text' : 'password'}
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                  required
                  className="w-full bg-background/60 border border-primary/30 px-12 py-3 
                           focus:outline-none focus:border-primary/60 transition-colors duration-500
                           text-foreground placeholder:text-foreground/30"
                  placeholder="Enter your password"
                />
                <button
                  type="button"
                  onClick={() => setShowPassword(!showPassword)}
                  className="absolute right-4 top-1/2 -translate-y-1/2 text-primary/50 
                           hover:text-primary transition-colors duration-300"
                >
                  {showPassword ? <EyeOff className="size-5" /> : <Eye className="size-5" />}
                </button>
              </div>
            </div>

            {/* Submit Button */}
            <button
              type="submit"
              disabled={isLoading}
              className="w-full bg-primary/10 border border-primary/40 py-4 
                       hover:bg-primary/20 hover:border-primary/60 
                       transition-all duration-700 text-primary tracking-widest
                       disabled:opacity-50 disabled:cursor-not-allowed
                       relative overflow-hidden group"
            >
              <span className="relative z-10 flex items-center justify-center gap-2">
                {isLoading ? (
                  <>
                    <Loader2 className="size-5 animate-spin" />
                    AUTHENTICATING...
                  </>
                ) : (
                  'SIGN IN'
                )}
              </span>
              <div className="absolute inset-0 bg-primary/5 translate-y-full 
                            group-hover:translate-y-0 transition-transform duration-700" />
            </button>
          </form>

          {/* Sign Up Link */}
          <div className="mt-8 text-center">
            <p className="text-sm text-foreground/60">
              Don't have an account?{' '}
              <Link 
                to="/signup" 
                className="text-primary hover:text-primary/80 transition-colors duration-300 underline"
              >
                Create Account
              </Link>
            </p>
          </div>

          {/* Back to Home */}
          <div className="mt-6 text-center">
            <Link 
              to="/" 
              className="text-xs text-foreground/40 hover:text-foreground/70 
                       transition-colors duration-300 tracking-wider"
            >
              ← BACK TO HOME
            </Link>
          </div>
        </div>
      </motion.div>
    </div>
  );
}
