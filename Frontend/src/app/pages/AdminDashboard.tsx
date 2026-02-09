import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { motion } from 'motion/react';
import {
  Users,
  Package,
  ShieldCheck,
  TrendingUp,
  LogOut,
  Search,
  Plus,
  Edit2,
  Trash2,
  Eye,
  Download,
  Shield,
  FileText,
  Image as ImageIcon
} from 'lucide-react';
import { useAuth } from '@/app/contexts/AuthContext';
import { useContent } from '@/app/contexts/ContentContext';
import { QRCodeSVG } from 'qrcode.react';
import { ContentManagementTab } from '@/app/components/admin/ContentManagementTab';
import { MediaManagementTab } from '@/app/components/admin/MediaManagementTab';
import { ProductManagementTab } from '@/app/components/admin/ProductManagementTab';

// Mock data for admin dashboard
const mockDashboardData = {
  stats: {
    totalUsers: 247,
    totalPurchases: 1834,
    totalVerifications: 2104,
    monthlyRevenue: '$2.4M'
  },
  recentUsers: [
    { id: '1', name: 'John Smith', email: 'john@email.com', joined: '2026-02-01', purchases: 3 },
    { id: '2', name: 'Sarah Johnson', email: 'sarah@email.com', joined: '2026-02-03', purchases: 1 },
    { id: '3', name: 'Michael Chen', email: 'michael@email.com', joined: '2026-02-05', purchases: 5 },
    { id: '4', name: 'Emma Wilson', email: 'emma@email.com', joined: '2026-02-06', purchases: 2 },
  ],
  recentPurchases: [
    {
      id: '1',
      user: 'John Smith',
      alloy: 'Moonstone Gold',
      weight: '1 oz',
      amount: '$2,450',
      date: '2026-02-07',
      status: 'completed'
    },
    {
      id: '2',
      user: 'Sarah Johnson',
      alloy: 'Aurora Silver',
      weight: '5 oz',
      amount: '$185',
      date: '2026-02-06',
      status: 'pending'
    },
    {
      id: '3',
      user: 'Michael Chen',
      alloy: 'Eclipse Platinum',
      weight: '10 g',
      amount: '$450',
      date: '2026-02-05',
      status: 'completed'
    },
  ],
  alloyInventory: [
    { id: '1', name: 'Moonstone Gold', stock: 124, purity: '24K', price: '$2,450/oz' },
    { id: '2', name: 'Aurora Silver', stock: 856, purity: '99.9%', price: '$37/oz' },
    { id: '3', name: 'Eclipse Platinum', stock: 243, purity: '99.95%', price: '$45/g' },
    { id: '4', name: 'Celestial Bronze', stock: 567, purity: '99.5%', price: '$12/oz' },
  ],
  verifications: [
    {
      id: '1',
      serialNumber: 'MSG-2025-001234',
      alloy: 'Moonstone Gold',
      owner: 'john@email.com',
      date: '2026-02-07',
      status: 'verified'
    },
    {
      id: '2',
      serialNumber: 'AUS-2026-005678',
      alloy: 'Aurora Silver',
      owner: 'sarah@email.com',
      date: '2026-02-06',
      status: 'pending'
    },
  ]
};

type TabType = 'overview' | 'users' | 'purchases' | 'verifications' | 'content' | 'media' | 'products';

export function AdminDashboard() {
  const navigate = useNavigate();
  const { user, logout, isAdmin } = useAuth();
  const { content } = useContent();
  const [activeTab, setActiveTab] = useState<TabType>('overview');
  const [searchTerm, setSearchTerm] = useState('');

  useEffect(() => {
    if (!isAdmin) {
      navigate('/admin/login');
    }
  }, [isAdmin, navigate]);

  if (!user || !isAdmin) {
    return null;
  }

  const handleLogout = () => {
    logout();
    navigate('/');
  };

  const tabs = [
    { id: 'overview', label: 'Overview', icon: TrendingUp },
    { id: 'users', label: 'Users', icon: Users },
    { id: 'purchases', label: 'Purchases', icon: Package },
    { id: 'verifications', label: 'Verifications', icon: ShieldCheck },
    { id: 'content', label: 'Content', icon: FileText },
    { id: 'media', label: 'Media', icon: ImageIcon },
    { id: 'products', label: 'Products', icon: Package },
  ];

  return (
    <div className="min-h-screen px-6 py-32">
      <div className="max-w-[1600px] mx-auto">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
          className="mb-12"
        >
          <div className="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
              <div className="flex items-center gap-3 mb-2">
                <Shield className="size-8 text-primary" />
                <h1 className="font-display text-4xl md:text-5xl text-primary">
                  Admin Dashboard
                </h1>
              </div>
              <p className="text-foreground/60 tracking-wider">
                Welcome back, Administrator
              </p>
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

        {/* Tabs */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 0.8, delay: 0.2 }}
          className="mb-8 border-b border-primary/20"
        >
          <div className="flex gap-2 overflow-x-auto">
            {tabs.map((tab) => {
              const Icon = tab.icon;
              return (
                <button
                  key={tab.id}
                  onClick={() => setActiveTab(tab.id as TabType)}
                  className={`flex items-center gap-2 px-6 py-4 border-b-2 transition-all duration-500 whitespace-nowrap
                    ${activeTab === tab.id
                      ? 'border-primary text-primary'
                      : 'border-transparent text-foreground/60 hover:text-foreground/80'
                    }`}
                >
                  <Icon className="size-4" />
                  <span className="tracking-wider text-sm">{tab.label}</span>
                </button>
              );
            })}
          </div>
        </motion.div>

        {/* Content */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 0.8, delay: 0.4 }}
        >
          {activeTab === 'overview' && <OverviewTab data={mockDashboardData} />}
          {activeTab === 'users' && <UsersTab users={mockDashboardData.recentUsers} searchTerm={searchTerm} setSearchTerm={setSearchTerm} />}
          {activeTab === 'purchases' && <PurchasesTab purchases={mockDashboardData.recentPurchases} searchTerm={searchTerm} setSearchTerm={setSearchTerm} />}
          {activeTab === 'verifications' && <VerificationsTab verifications={mockDashboardData.verifications} searchTerm={searchTerm} setSearchTerm={setSearchTerm} />}
          {activeTab === 'content' && <ContentManagementTab />}
          {activeTab === 'media' && <MediaManagementTab />}
          {activeTab === 'products' && <ProductManagementTab />}
        </motion.div>
      </div>
    </div>
  );
}

// Overview Tab Component
function OverviewTab({ data }: { data: typeof mockDashboardData }) {
  const stats = [
    { label: 'Total Users', value: data.stats.totalUsers, icon: Users, color: 'text-blue-400' },
    { label: 'Total Purchases', value: data.stats.totalPurchases, icon: Package, color: 'text-green-400' },
    { label: 'Verifications', value: data.stats.totalVerifications, icon: ShieldCheck, color: 'text-purple-400' },
    { label: 'Monthly Revenue', value: data.stats.monthlyRevenue, icon: TrendingUp, color: 'text-primary' },
  ];

  return (
    <div className="space-y-8">
      {/* Stats Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {stats.map((stat, index) => {
          const Icon = stat.icon;
          return (
            <motion.div
              key={stat.label}
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: index * 0.1 }}
              className="backdrop-blur-sm bg-background/40 border border-primary/20 p-6
                       hover:border-primary/40 transition-all duration-500"
            >
              <div className="flex items-center justify-between mb-4">
                <Icon className={`size-8 ${stat.color}`} />
              </div>
              <p className="text-3xl font-display mb-2 text-primary">{stat.value}</p>
              <p className="text-sm text-foreground/60 tracking-wider">{stat.label}</p>
            </motion.div>
          );
        })}
      </div>

      {/* Recent Activity */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div className="backdrop-blur-sm bg-background/40 border border-primary/20 p-6">
          <h3 className="font-display text-xl mb-4 text-primary">Recent Users</h3>
          <div className="space-y-3">
            {data.recentUsers.slice(0, 4).map((user) => (
              <div key={user.id} className="flex items-center justify-between py-3 border-b border-primary/10 last:border-0">
                <div>
                  <p className="text-foreground/80">{user.name}</p>
                  <p className="text-xs text-foreground/40">{user.email}</p>
                </div>
                <span className="text-sm text-foreground/60">{user.purchases} purchases</span>
              </div>
            ))}
          </div>
        </div>

        <div className="backdrop-blur-sm bg-background/40 border border-primary/20 p-6">
          <h3 className="font-display text-xl mb-4 text-primary">Recent Purchases</h3>
          <div className="space-y-3">
            {data.recentPurchases.map((purchase) => (
              <div key={purchase.id} className="flex items-center justify-between py-3 border-b border-primary/10 last:border-0">
                <div>
                  <p className="text-foreground/80">{purchase.alloy}</p>
                  <p className="text-xs text-foreground/40">{purchase.user}</p>
                </div>
                <div className="text-right">
                  <p className="text-sm text-primary">{purchase.amount}</p>
                  <span className={`text-xs ${purchase.status === 'completed' ? 'text-green-400' : 'text-yellow-400'}`}>
                    {purchase.status}
                  </span>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
}

// Users Tab Component
function UsersTab({ users, searchTerm, setSearchTerm }: { users: any[], searchTerm: string, setSearchTerm: (term: string) => void }) {
  return (
    <div>
      {/* Search Bar */}
      <div className="mb-6 flex items-center gap-4">
        <div className="flex-1 relative">
          <Search className="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-primary/50" />
          <input
            type="text"
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            placeholder="Search users..."
            className="w-full bg-background/60 border border-primary/30 px-12 py-3 
                     focus:outline-none focus:border-primary/60 transition-colors duration-500
                     text-foreground placeholder:text-foreground/30"
          />
        </div>
        <button className="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 
                         hover:border-primary/60 transition-all duration-500 text-primary 
                         tracking-wider flex items-center gap-2">
          <Plus className="size-4" />
          ADD USER
        </button>
      </div>

      {/* Users Table */}
      <div className="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden">
        <table className="w-full">
          <thead className="bg-primary/5 border-b border-primary/20">
            <tr>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">NAME</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">EMAIL</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">JOINED</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">PURCHASES</th>
              <th className="px-6 py-4 text-right text-sm tracking-wider text-foreground/80">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            {users.map((user) => (
              <tr key={user.id} className="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                <td className="px-6 py-4 text-foreground/80">{user.name}</td>
                <td className="px-6 py-4 text-foreground/60 text-sm">{user.email}</td>
                <td className="px-6 py-4 text-foreground/60 text-sm">{new Date(user.joined).toLocaleDateString()}</td>
                <td className="px-6 py-4 text-foreground/60 text-sm">{user.purchases}</td>
                <td className="px-6 py-4">
                  <div className="flex items-center justify-end gap-2">
                    <button className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary">
                      <Eye className="size-4" />
                    </button>
                    <button className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary">
                      <Edit2 className="size-4" />
                    </button>
                    <button className="p-2 hover:bg-red-500/10 transition-colors duration-300 text-red-400/60 hover:text-red-400">
                      <Trash2 className="size-4" />
                    </button>
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}

// Purchases Tab Component
function PurchasesTab({ purchases, searchTerm, setSearchTerm }: { purchases: any[], searchTerm: string, setSearchTerm: (term: string) => void }) {
  return (
    <div>
      {/* Search Bar */}
      <div className="mb-6 relative">
        <Search className="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-primary/50" />
        <input
          type="text"
          value={searchTerm}
          onChange={(e) => setSearchTerm(e.target.value)}
          placeholder="Search purchases..."
          className="w-full bg-background/60 border border-primary/30 px-12 py-3 
                   focus:outline-none focus:border-primary/60 transition-colors duration-500
                   text-foreground placeholder:text-foreground/30"
        />
      </div>

      {/* Purchases Table */}
      <div className="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden">
        <table className="w-full">
          <thead className="bg-primary/5 border-b border-primary/20">
            <tr>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">USER</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">ALLOY</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">WEIGHT</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">AMOUNT</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">DATE</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">STATUS</th>
              <th className="px-6 py-4 text-right text-sm tracking-wider text-foreground/80">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            {purchases.map((purchase) => (
              <tr key={purchase.id} className="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                <td className="px-6 py-4 text-foreground/80">{purchase.user}</td>
                <td className="px-6 py-4 text-foreground/80">{purchase.alloy}</td>
                <td className="px-6 py-4 text-foreground/60 text-sm">{purchase.weight}</td>
                <td className="px-6 py-4 text-primary">{purchase.amount}</td>
                <td className="px-6 py-4 text-foreground/60 text-sm">{new Date(purchase.date).toLocaleDateString()}</td>
                <td className="px-6 py-4">
                  <span className={`px-3 py-1 text-xs tracking-wider ${
                    purchase.status === 'completed' 
                      ? 'bg-green-400/10 text-green-400 border border-green-400/30' 
                      : 'bg-yellow-400/10 text-yellow-400 border border-yellow-400/30'
                  }`}>
                    {purchase.status.toUpperCase()}
                  </span>
                </td>
                <td className="px-6 py-4">
                  <div className="flex items-center justify-end gap-2">
                    <button className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary">
                      <Eye className="size-4" />
                    </button>
                    <button className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary">
                      <Download className="size-4" />
                    </button>
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}

// Verifications Tab Component
function VerificationsTab({ verifications, searchTerm, setSearchTerm }: { verifications: any[], searchTerm: string, setSearchTerm: (term: string) => void }) {
  return (
    <div>
      {/* Search Bar */}
      <div className="mb-6 relative">
        <Search className="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-primary/50" />
        <input
          type="text"
          value={searchTerm}
          onChange={(e) => setSearchTerm(e.target.value)}
          placeholder="Search verifications..."
          className="w-full bg-background/60 border border-primary/30 px-12 py-3 
                   focus:outline-none focus:border-primary/60 transition-colors duration-500
                   text-foreground placeholder:text-foreground/30"
        />
      </div>

      {/* Verifications Table */}
      <div className="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden">
        <table className="w-full">
          <thead className="bg-primary/5 border-b border-primary/20">
            <tr>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">SERIAL NUMBER</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">ALLOY</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">OWNER</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">DATE</th>
              <th className="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">STATUS</th>
              <th className="px-6 py-4 text-right text-sm tracking-wider text-foreground/80">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            {verifications.map((verification) => (
              <tr key={verification.id} className="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                <td className="px-6 py-4 font-mono text-sm text-primary">{verification.serialNumber}</td>
                <td className="px-6 py-4 text-foreground/80">{verification.alloy}</td>
                <td className="px-6 py-4 text-foreground/60 text-sm">{verification.owner}</td>
                <td className="px-6 py-4 text-foreground/60 text-sm">{new Date(verification.date).toLocaleDateString()}</td>
                <td className="px-6 py-4">
                  <span className={`px-3 py-1 text-xs tracking-wider ${
                    verification.status === 'verified' 
                      ? 'bg-green-400/10 text-green-400 border border-green-400/30' 
                      : 'bg-yellow-400/10 text-yellow-400 border border-yellow-400/30'
                  }`}>
                    {verification.status.toUpperCase()}
                  </span>
                </td>
                <td className="px-6 py-4">
                  <div className="flex items-center justify-end gap-2">
                    <button className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary">
                      <Eye className="size-4" />
                    </button>
                    <button className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary">
                      <Download className="size-4" />
                    </button>
                  </div>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}