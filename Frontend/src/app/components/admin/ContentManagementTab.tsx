import { useState } from 'react';
import { motion } from 'motion/react';
import { FileText, Edit2, Save, RotateCcw } from 'lucide-react';
import { useContent } from '@/app/contexts/ContentContext';

export function ContentManagementTab() {
  const { content, updateContent, resetContent } = useContent();
  const [editingSection, setEditingSection] = useState<string | null>(null);
  const [tempValues, setTempValues] = useState<Record<string, string>>({});
  const [saveMessage, setSaveMessage] = useState('');

  const handleEdit = (section: string, field: string, currentValue: string) => {
    setEditingSection(`${section}-${field}`);
    setTempValues({ ...tempValues, [`${section}-${field}`]: currentValue });
  };

  const handleSave = (section: any, field: string) => {
    const key = `${section}-${field}`;
    updateContent(section, field, tempValues[key] || '');
    setEditingSection(null);
    setSaveMessage('Content saved successfully!');
    setTimeout(() => setSaveMessage(''), 3000);
  };

  const handleCancel = () => {
    setEditingSection(null);
    setTempValues({});
  };

  const handleReset = () => {
    if (confirm('Are you sure you want to reset all content to defaults?')) {
      resetContent();
      setSaveMessage('Content reset to defaults!');
      setTimeout(() => setSaveMessage(''), 3000);
    }
  };

  const sections = [
    { key: 'hero', label: 'Hero Section', fields: ['title', 'subtitle', 'description'] },
    { key: 'about', label: 'About Section', fields: ['title', 'subtitle', 'description', 'missionTitle', 'missionText'] },
    { key: 'collection', label: 'Collection Page', fields: ['heroTitle', 'heroDescription', 'sectionLabel', 'sectionTitle'] },
    { key: 'philosophy', label: 'Philosophy', fields: ['quote', 'author'] },
    { key: 'verification', label: 'Verification', fields: ['title', 'subtitle', 'description', 'processTitle'] },
    { key: 'contact', label: 'Contact Information', fields: ['title', 'subtitle', 'email', 'phone', 'address'] },
    { key: 'footer', label: 'Footer', fields: ['tagline', 'copyright'] },
  ];

  return (
    <div className="space-y-6">
      {/* Header */}
      <div className="flex items-center justify-between mb-6">
        <div>
          <h3 className="font-display text-2xl text-primary flex items-center gap-2">
            <FileText className="size-6" />
            Website Content Management
          </h3>
          <p className="text-foreground/60 text-sm mt-1">
            Edit all text content across your website
          </p>
        </div>
        <button
          onClick={handleReset}
          className="px-4 py-2 border border-red-400/40 hover:bg-red-400/10 
                   transition-all duration-500 text-red-400 tracking-wider text-sm
                   flex items-center gap-2"
        >
          <RotateCcw className="size-4" />
          RESET TO DEFAULTS
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

      {/* Content Sections */}
      {sections.map((section) => (
        <div key={section.key} className="backdrop-blur-sm bg-background/40 border border-primary/20 p-6">
          <h4 className="font-display text-xl mb-4 text-primary">{section.label}</h4>
          <div className="space-y-4">
            {section.fields.map((field) => {
              const editKey = `${section.key}-${field}`;
              const isEditing = editingSection === editKey;
              const currentValue = (content as any)[section.key]?.[field] || '';
              const tempValue = tempValues[editKey] ?? currentValue;

              return (
                <div key={field} className="border-b border-primary/10 pb-4 last:border-0">
                  <label className="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">
                    {field.replace(/([A-Z])/g, ' $1').trim()}
                  </label>
                  {isEditing ? (
                    <div className="space-y-2">
                      {field === 'description' || field === 'heroDescription' || field === 'missionText' || field === 'quote' ? (
                        <textarea
                          value={tempValue}
                          onChange={(e) => setTempValues({ ...tempValues, [editKey]: e.target.value })}
                          rows={4}
                          className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                                   focus:outline-none focus:border-primary/60 transition-colors duration-500
                                   text-foreground resize-none"
                        />
                      ) : (
                        <input
                          type="text"
                          value={tempValue}
                          onChange={(e) => setTempValues({ ...tempValues, [editKey]: e.target.value })}
                          className="w-full bg-background/60 border border-primary/30 px-4 py-3 
                                   focus:outline-none focus:border-primary/60 transition-colors duration-500
                                   text-foreground"
                        />
                      )}
                      <div className="flex gap-2">
                        <button
                          onClick={() => handleSave(section.key, field)}
                          className="px-4 py-2 bg-primary/10 border border-primary/40 hover:bg-primary/20 
                                   transition-all duration-500 text-primary text-sm flex items-center gap-2"
                        >
                          <Save className="size-4" />
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
                    <div className="flex items-start justify-between gap-4">
                      <p className="text-foreground/80 flex-1">{currentValue}</p>
                      <button
                        onClick={() => handleEdit(section.key, field, currentValue)}
                        className="p-2 hover:bg-primary/10 transition-colors duration-300 text-primary/60 hover:text-primary flex-shrink-0"
                      >
                        <Edit2 className="size-4" />
                      </button>
                    </div>
                  )}
                </div>
              );
            })}
          </div>
        </div>
      ))}
    </div>
  );
}