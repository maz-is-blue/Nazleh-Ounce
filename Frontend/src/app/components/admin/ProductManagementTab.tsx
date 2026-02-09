import { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { Package, Plus, Edit2, Trash2, X, Save, AlertCircle, Star, ShoppingBag } from 'lucide-react';
import { useProducts, Product } from '@/app/contexts/ProductContext';

export function ProductManagementTab() {
  const { products, addProduct, updateProduct, deleteProduct } = useProducts();
  const [isAddingProduct, setIsAddingProduct] = useState(false);
  const [editingProduct, setEditingProduct] = useState<string | null>(null);
  const [formData, setFormData] = useState<Partial<Product>>({});
  const [saveMessage, setSaveMessage] = useState('');

  const handleEdit = (product: Product) => {
    setEditingProduct(product.id);
    setFormData(product);
    setIsAddingProduct(false);
  };

  const handleAddNew = () => {
    setIsAddingProduct(true);
    setEditingProduct(null);
    setFormData({
      id: '',
      name: '',
      subtitle: '',
      description: '',
      longDescription: '',
      price: '',
      unit: 'per oz',
      purity: '',
      weight: '',
      stock: 0,
      isLimitedEdition: false,
      isSoldOut: false,
      lowStockThreshold: 50,
      features: [''],
      specifications: {},
      images: ['', '', ''],
      category: 'gold',
      displayOrder: products.length + 1,
    });
  };

  const handleSave = () => {
    if (isAddingProduct) {
      if (!formData.id || !formData.name) {
        alert('Please fill in Product ID and Name');
        return;
      }
      addProduct(formData as Product);
      setSaveMessage('Product added successfully!');
    } else if (editingProduct) {
      updateProduct(editingProduct, formData);
      setSaveMessage('Product updated successfully!');
    }
    
    setIsAddingProduct(false);
    setEditingProduct(null);
    setFormData({});
    setTimeout(() => setSaveMessage(''), 3000);
  };

  const handleCancel = () => {
    setIsAddingProduct(false);
    setEditingProduct(null);
    setFormData({});
  };

  const handleDelete = (id: string, name: string) => {
    if (confirm(`Are you sure you want to delete "${name}"?`)) {
      deleteProduct(id);
      setSaveMessage('Product deleted successfully!');
      setTimeout(() => setSaveMessage(''), 3000);
    }
  };

  const updateFormField = (field: keyof Product, value: any) => {
    setFormData(prev => ({ ...prev, [field]: value }));
  };

  const updateFeature = (index: number, value: string) => {
    const newFeatures = [...(formData.features || [])];
    newFeatures[index] = value;
    updateFormField('features', newFeatures);
  };

  const addFeature = () => {
    updateFormField('features', [...(formData.features || []), '']);
  };

  const removeFeature = (index: number) => {
    const newFeatures = (formData.features || []).filter((_, i) => i !== index);
    updateFormField('features', newFeatures);
  };

  const updateSpecification = (key: string, value: string, oldKey?: string) => {
    const newSpecs = { ...(formData.specifications || {}) };
    if (oldKey && oldKey !== key) {
      delete newSpecs[oldKey];
    }
    newSpecs[key] = value;
    updateFormField('specifications', newSpecs);
  };

  const addSpecification = () => {
    updateFormField('specifications', { ...(formData.specifications || {}), '': '' });
  };

  const removeSpecification = (key: string) => {
    const newSpecs = { ...(formData.specifications || {}) };
    delete newSpecs[key];
    updateFormField('specifications', newSpecs);
  };

  const updateImage = (index: number, value: string) => {
    const newImages = [...(formData.images || ['', '', ''])];
    newImages[index] = value;
    updateFormField('images', newImages);
  };

  const getStockStatus = (product: Product) => {
    if (product.isSoldOut) return { label: 'SOLD OUT', color: 'text-red-400' };
    if (product.stock <= product.lowStockThreshold) {
      return { label: `${product.stock} LEFT`, color: 'text-yellow-400' };
    }
    return { label: 'IN STOCK', color: 'text-green-400' };
  };

  return (
    <div className="space-y-6">
      {/* Header */}
      <div className="flex items-center justify-between mb-6">
        <div>
          <h3 className="font-display text-2xl text-primary flex items-center gap-2">
            <Package className="size-6" />
            Product Management
          </h3>
          <p className="text-foreground/60 text-sm mt-1">
            Add, edit, and manage all products in your collection
          </p>
        </div>
        <button
          onClick={handleAddNew}
          className="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 
                   hover:border-primary/60 transition-all duration-500 text-primary 
                   tracking-wider flex items-center gap-2"
        >
          <Plus className="size-4" />
          ADD PRODUCT
        </button>
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

      {/* Add/Edit Form */}
      <AnimatePresence>
        {(isAddingProduct || editingProduct) && (
          <motion.div
            initial={{ opacity: 0, height: 0 }}
            animate={{ opacity: 1, height: 'auto' }}
            exit={{ opacity: 0, height: 0 }}
            className="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 mb-6 overflow-hidden"
          >
            <div className="flex items-center justify-between mb-6">
              <h4 className="font-display text-xl text-primary">
                {isAddingProduct ? 'Add New Product' : 'Edit Product'}
              </h4>
              <button onClick={handleCancel} className="text-foreground/60 hover:text-foreground">
                <X className="size-5" />
              </button>
            </div>

            <div className="space-y-6">
              {/* Basic Info */}
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Product ID *
                  </label>
                  <input
                    type="text"
                    value={formData.id || ''}
                    onChange={(e) => updateFormField('id', e.target.value)}
                    disabled={!isAddingProduct}
                    placeholder="moonstone-gold"
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground disabled:opacity-50"
                  />
                </div>
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Product Name *
                  </label>
                  <input
                    type="text"
                    value={formData.name || ''}
                    onChange={(e) => updateFormField('name', e.target.value)}
                    placeholder="Moonstone Gold"
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Subtitle
                  </label>
                  <input
                    type="text"
                    value={formData.subtitle || ''}
                    onChange={(e) => updateFormField('subtitle', e.target.value)}
                    placeholder="24K Pure Gold Alloy"
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Category
                  </label>
                  <select
                    value={formData.category || 'gold'}
                    onChange={(e) => updateFormField('category', e.target.value)}
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  >
                    <option value="gold">Gold</option>
                    <option value="silver">Silver</option>
                    <option value="platinum">Platinum</option>
                    <option value="bronze">Bronze</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div>

              {/* Descriptions */}
              <div>
                <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                  Short Description
                </label>
                <textarea
                  value={formData.description || ''}
                  onChange={(e) => updateFormField('description', e.target.value)}
                  rows={3}
                  className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                           focus:outline-none focus:border-primary/60 transition-colors duration-500
                           text-foreground resize-none"
                />
              </div>

              <div>
                <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                  Long Description
                </label>
                <textarea
                  value={formData.longDescription || ''}
                  onChange={(e) => updateFormField('longDescription', e.target.value)}
                  rows={4}
                  className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                           focus:outline-none focus:border-primary/60 transition-colors duration-500
                           text-foreground resize-none"
                />
              </div>

              {/* Pricing & Stock */}
              <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Price (number only)
                  </label>
                  <input
                    type="text"
                    value={formData.price || ''}
                    onChange={(e) => updateFormField('price', e.target.value)}
                    placeholder="2,450"
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Unit
                  </label>
                  <input
                    type="text"
                    value={formData.unit || ''}
                    onChange={(e) => updateFormField('unit', e.target.value)}
                    placeholder="per oz"
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Stock Quantity
                  </label>
                  <input
                    type="number"
                    value={formData.stock || 0}
                    onChange={(e) => updateFormField('stock', parseInt(e.target.value) || 0)}
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
              </div>

              <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Purity
                  </label>
                  <input
                    type="text"
                    value={formData.purity || ''}
                    onChange={(e) => updateFormField('purity', e.target.value)}
                    placeholder="99.99% (24K)"
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Available Weights
                  </label>
                  <input
                    type="text"
                    value={formData.weight || ''}
                    onChange={(e) => updateFormField('weight', e.target.value)}
                    placeholder="1oz, 5oz, 10oz bars"
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
                <div>
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    Low Stock Alert (units)
                  </label>
                  <input
                    type="number"
                    value={formData.lowStockThreshold || 50}
                    onChange={(e) => updateFormField('lowStockThreshold', parseInt(e.target.value) || 50)}
                    className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                             focus:outline-none focus:border-primary/60 transition-colors duration-500
                             text-foreground"
                  />
                </div>
              </div>

              {/* Status Toggles */}
              <div className="flex gap-6">
                <label className="flex items-center gap-2 cursor-pointer">
                  <input
                    type="checkbox"
                    checked={formData.isLimitedEdition || false}
                    onChange={(e) => updateFormField('isLimitedEdition', e.target.checked)}
                    className="w-5 h-5 accent-primary"
                  />
                  <span className="text-foreground/80 flex items-center gap-2">
                    <Star className="size-4 text-primary" />
                    Limited Edition
                  </span>
                </label>
                <label className="flex items-center gap-2 cursor-pointer">
                  <input
                    type="checkbox"
                    checked={formData.isSoldOut || false}
                    onChange={(e) => updateFormField('isSoldOut', e.target.checked)}
                    className="w-5 h-5 accent-red-400"
                  />
                  <span className="text-foreground/80 flex items-center gap-2">
                    <AlertCircle className="size-4 text-red-400" />
                    Sold Out
                  </span>
                </label>
              </div>

              {/* Images */}
              <div>
                <label className="block text-sm tracking-wide text-foreground/60 mb-3 uppercase">
                  Product Images (URLs)
                </label>
                <div className="space-y-2">
                  {(formData.images || ['', '', '']).map((img, index) => (
                    <input
                      key={index}
                      type="text"
                      value={img}
                      onChange={(e) => updateImage(index, e.target.value)}
                      placeholder={`Image ${index + 1} URL`}
                      className="w-full bg-background/60 border border-primary/30 px-4 py-2 
                               focus:outline-none focus:border-primary/60 transition-colors duration-500
                               text-foreground text-sm"
                    />
                  ))}
                </div>
              </div>

              {/* Features */}
              <div>
                <div className="flex items-center justify-between mb-3">
                  <label className="block text-sm tracking-wide text-foreground/60 uppercase">
                    Key Features
                  </label>
                  <button
                    onClick={addFeature}
                    className="text-xs text-primary hover:text-primary/80 flex items-center gap-1"
                  >
                    <Plus className="size-3" />
                    ADD FEATURE
                  </button>
                </div>
                <div className="space-y-2">
                  {(formData.features || ['']).map((feature, index) => (
                    <div key={index} className="flex gap-2">
                      <input
                        type="text"
                        value={feature}
                        onChange={(e) => updateFeature(index, e.target.value)}
                        placeholder="Feature description"
                        className="flex-1 bg-background/60 border border-primary/30 px-4 py-2 
                                 focus:outline-none focus:border-primary/60 transition-colors duration-500
                                 text-foreground text-sm"
                      />
                      {(formData.features?.length || 0) > 1 && (
                        <button
                          onClick={() => removeFeature(index)}
                          className="p-2 text-red-400/60 hover:text-red-400"
                        >
                          <X className="size-4" />
                        </button>
                      )}
                    </div>
                  ))}
                </div>
              </div>

              {/* Specifications */}
              <div>
                <div className="flex items-center justify-between mb-3">
                  <label className="block text-sm tracking-wide text-foreground/60 uppercase">
                    Technical Specifications
                  </label>
                  <button
                    onClick={addSpecification}
                    className="text-xs text-primary hover:text-primary/80 flex items-center gap-1"
                  >
                    <Plus className="size-3" />
                    ADD SPEC
                  </button>
                </div>
                <div className="space-y-2">
                  {Object.entries(formData.specifications || {}).map(([key, value]) => (
                    <div key={key} className="flex gap-2">
                      <input
                        type="text"
                        value={key}
                        onChange={(e) => updateSpecification(e.target.value, value, key)}
                        placeholder="Specification name"
                        className="w-1/3 bg-background/60 border border-primary/30 px-4 py-2 
                                 focus:outline-none focus:border-primary/60 transition-colors duration-500
                                 text-foreground text-sm"
                      />
                      <input
                        type="text"
                        value={value}
                        onChange={(e) => updateSpecification(key, e.target.value)}
                        placeholder="Value"
                        className="flex-1 bg-background/60 border border-primary/30 px-4 py-2 
                                 focus:outline-none focus:border-primary/60 transition-colors duration-500
                                 text-foreground text-sm"
                      />
                      <button
                        onClick={() => removeSpecification(key)}
                        className="p-2 text-red-400/60 hover:text-red-400"
                      >
                        <X className="size-4" />
                      </button>
                    </div>
                  ))}
                </div>
              </div>

              {/* Action Buttons */}
              <div className="flex gap-3 pt-4 border-t border-primary/20">
                <button
                  onClick={handleSave}
                  className="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 
                           transition-all duration-500 text-primary flex items-center gap-2"
                >
                  <Save className="size-4" />
                  {isAddingProduct ? 'ADD PRODUCT' : 'SAVE CHANGES'}
                </button>
                <button
                  onClick={handleCancel}
                  className="px-6 py-3 border border-foreground/20 hover:bg-foreground/5 
                           transition-all duration-500 text-foreground/60"
                >
                  CANCEL
                </button>
              </div>
            </div>
          </motion.div>
        )}
      </AnimatePresence>

      {/* Products Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {products
          .sort((a, b) => a.displayOrder - b.displayOrder)
          .map((product) => {
            const status = getStockStatus(product);
            return (
              <div
                key={product.id}
                className="backdrop-blur-sm bg-background/40 border border-primary/20 
                         hover:border-primary/40 transition-all duration-500 overflow-hidden group"
              >
                {/* Product Image */}
                {product.images[0] && (
                  <div className="aspect-video overflow-hidden bg-background/60">
                    <img
                      src={product.images[0]}
                      alt={product.name}
                      className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                    />
                  </div>
                )}

                {/* Product Info */}
                <div className="p-4">
                  <div className="flex items-start justify-between mb-2">
                    <div className="flex-1">
                      <div className="flex items-center gap-2 mb-1">
                        <h3 className="font-display text-lg text-primary">{product.name}</h3>
                        {product.isLimitedEdition && (
                          <Star className="size-4 text-primary fill-primary" />
                        )}
                      </div>
                      <p className="text-xs text-foreground/60">{product.subtitle}</p>
                    </div>
                    <div className="flex gap-1">
                      <button
                        onClick={() => handleEdit(product)}
                        className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary"
                      >
                        <Edit2 className="size-4" />
                      </button>
                      <button
                        onClick={() => handleDelete(product.id, product.name)}
                        className="p-2 hover:bg-red-500/10 transition-colors duration-300 text-red-400/60 hover:text-red-400"
                      >
                        <Trash2 className="size-4" />
                      </button>
                    </div>
                  </div>

                  <div className="space-y-2 mb-3">
                    <div className="flex items-center justify-between text-sm">
                      <span className="text-foreground/60">Price:</span>
                      <span className="text-primary">${product.price} {product.unit}</span>
                    </div>
                    <div className="flex items-center justify-between text-sm">
                      <span className="text-foreground/60">Stock:</span>
                      <span className={status.color}>{status.label}</span>
                    </div>
                    <div className="flex items-center justify-between text-sm">
                      <span className="text-foreground/60">Purity:</span>
                      <span className="text-foreground/80">{product.purity}</span>
                    </div>
                  </div>

                  <div className="pt-3 border-t border-primary/10">
                    <p className="text-xs text-foreground/50 font-mono">ID: {product.id}</p>
                  </div>
                </div>
              </div>
            );
          })}
      </div>
    </div>
  );
}
