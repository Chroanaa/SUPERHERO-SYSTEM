import { useEffect, useState } from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation } from 'react-router-dom';
import { Helmet, HelmetProvider } from 'react-helmet-async'; // Import HelmetProvider
import LandingRoutes from './pages/routes/LandingRoutes';
import SecureRoutes from './pages/routes/SecureRoutes';
import { ThemeProvider } from './components/ThemeProvider';

const pageMetadata = {
  "/": {
    title: "Brgy. Sta Lucia of QC Portal",
    description: "Unofficial portal of Brgy Sta Lucia of Quezon City, see following informations.",
    keywords: "Barangay Sta Lucia, community portal, local services",
    ogTitle: "Brgy. Sta Lucia of QC Portal",
    ogDescription: "Unofficial page made by QCU students (2024).",
    ogImage: "",
  },
  "/login": {
    title: "Login first! - Brgy. Sta Lucia",
    description: "Log in to access Barangay Sta Lucia's exclusive community services and features.",
    keywords: "Barangay Sta Lucia login, community login",
    ogTitle: "Login - Brgy. Sta Lucia",
    ogDescription: "Access your Barangay Sta Lucia account to manage community services.",
    ogImage: "",
  },
  "/records/residents": {
    title: "Resident Profiles - Brgy. Sta Lucia",
    description: "Log in to access Barangay Sta Lucia's exclusive community services and features.",
    keywords: "Barangay Sta Lucia login, community login",
    ogTitle: "Resident Profiles - Brgy. Sta Lucia",
    ogDescription: "Access your Barangay Sta Lucia account to manage community services.",
    ogImage: "",
  },
};

function TitleUpdater() {
  const location = useLocation();
  const metadata = pageMetadata[location.pathname] || {
    title: "Brgy. Sta Lucia, Quezon City",
    description: "This is unofficial portal made by QCU students.",
    keywords: "qcu, sbit3k2024, sia101, stalucia, ruelmarpa",
    ogTitle: "Unofficial Portal of Brgy. Sta Lucia",
    ogDescription: "This is unofficial portal made by QCU students.",
    ogImage: "https://your-site.com/images/default-og-image.jpg",
  };

  return (
    <Helmet>
      <title>{metadata.title}</title>
      <meta name="description" content={metadata.description} />
      <meta name="keywords" content={metadata.keywords} />
      <meta property="og:title" content={metadata.ogTitle} />
      <meta property="og:description" content={metadata.ogDescription} />
      <meta property="og:image" content={metadata.ogImage} />
      <meta property="og:type" content="website" />
      <meta property="og:url" content={window.location.href} />
      <meta name="twitter:card" content="summary_large_image" />
    </Helmet>
  );
}

function App() {
  const [largeScreen, setLargeScreen] = useState(window.innerWidth >= 1240);

  useEffect(() => {
    const handleResize = () => {
      setLargeScreen(window.innerWidth >= 1240);
    }

    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  return (
    <HelmetProvider>
      <ThemeProvider defaultTheme="light" storageKey="vite-ui-theme">
        <Router>
          <TitleUpdater />
          {largeScreen ? (
            <main className="min-h-screen bg-background font-geist selection:bg-black selection:text-white dark:selection:bg-white dark:selection:text-black">
              <Routes>
                {LandingRoutes()}
                {SecureRoutes()}
              </Routes>
            </main>
          ) : (
            <div className="min-h-screen bg-background flex items-center justify-center text-center font-geist text-lg text-muted-foreground">
              This portal is only intended for big screens! Use larger screens or enable the desktop site feature.
            </div>
          )}
        </Router>
      </ThemeProvider>
    </HelmetProvider>
  );
}

export default App;
