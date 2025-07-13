import { createContext, useContext, useEffect, useState } from 'react';

const ThemeProviderContext = createContext({
  theme: 'light',
  toggleTheme: () => null,
});

export function ThemeProvider({
  children,
  defaultTheme = 'light',
  storageKey = 'vite-ui-theme',
}) {
  const [theme, setTheme] = useState(() => {
    const savedTheme = localStorage.getItem(storageKey) || defaultTheme;
    return savedTheme;
  });

  useEffect(() => {
    const root = window.document.documentElement;
    root.classList.remove('light', 'dark');
    root.classList.add(theme);
  }, [theme]);

  const value = {
    theme,
    toggleTheme: () => {
      const newTheme = theme === 'light' ? 'dark' : 'light';
      localStorage.setItem(storageKey, newTheme);
      setTheme(newTheme);
    },
  };

  return (
    <ThemeProviderContext.Provider value={value}>
      {children}
    </ThemeProviderContext.Provider>
  );
}

export function useTheme() {
  const context = useContext(ThemeProviderContext);
  if (context === undefined) {
    throw new Error('useTheme must be used within a ThemeProvider');
  }
  return context;
}
