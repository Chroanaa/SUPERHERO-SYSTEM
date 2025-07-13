import { useEffect } from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation, useNavigate } from 'react-router-dom';
import LandingRoutes from './pages/routes/LandingRoutes';
import { ThemeProvider } from './components/ThemeProvider';

const pageTitles = {
  "/": "Brgy. Sta Lucia's Portal",
  "/login": "Login first! - Brgy. Sta Lucia",
};

function TitleUpdater() {
  const location = useLocation();

  useEffect(() => {
    document.title = pageTitles[location.pathname] || "my page";
  }, [location.pathname]);

  return null;
}

function App() {
  return (
    <ThemeProvider defaultTheme="light" storageKey="vite-ui-theme">
      <Router>
        <TitleUpdater />
        <main className='min-h-screen bg-background font-geist'>
          <Routes>
            {LandingRoutes()}
          </Routes>
        </main>
      </Router>
    </ThemeProvider>
  )
}

export default App;
