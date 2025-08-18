import { Fragment, useEffect, useRef } from 'react';
import { NavLink, Outlet, Link, useNavigate } from 'react-router-dom';
import { Button } from '@/components/ui/button';
import { Moon, Sun, Equal, Download, Home, NotepadText, CircleUser, CroissantIcon, Box } from 'lucide-react';
import { useTheme } from '@/components/ThemeProvider';
import {
  Drawer,
  DrawerClose,
  DrawerContent,
  DrawerDescription,
  DrawerFooter,
  DrawerHeader,
  DrawerTitle,
  DrawerTrigger,
} from "@/components/ui/drawer"
import { RippleButton } from "@/components/magicui/ripple-button";
import { Route } from 'lucide-react';
import Footer from './Footer';

function Appbar_Layout() {
  const { theme, toggleTheme } = useTheme();
  const drawerCloseRef = useRef(null);

  useEffect(() => {
    const handleResize = () => {
      const isLargeScreen = window.matchMedia('(min-width: 1024px)').matches;
      if (isLargeScreen && drawerCloseRef.current) {
        drawerCloseRef.current.click();
      }
    };

    handleResize();
    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  // Applicable for ID inside one page :0
  const scrollToId = (id) => {
    const el = document.getElementById(id);
    if (el) el.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <Fragment>
      <nav className="fixed top-0 left-0 w-full h-fit flex items-center justify-between px-5 py-3 font-medium bg-background z-50 border">
        <div className="inline-flex items-center space-x-2 text-card-foreground selection:bg-card-foreground selection:text-white dark:selection:bg-card-foreground dark:selection:text-black">
          <Route />
          <h1 className="text-lg font-bold tracking-tighter">unofficial.</h1>
        </div>
        <div className='flex items-center gap-2 '>
          <div className="xs:hidden lg:block">
            <div className="flex text-card-foreground selection:bg-card-foreground selection:text-white dark:selection:bg-card-foreground dark:selection:text-black">
              <Button asChild variant="ghost">
                <NavLink
                  onClick={() => scrollToId("staLucia-mainpage")}
                  className={({ isActive }) =>
                    `${isActive ? 'underline' : ''}`
                  }
                >
                  Home
                </NavLink>
              </Button>
              <Button asChild variant="ghost">
                <NavLink
                  onClick={() => scrollToId("about-us")}
                  className={({ isActive }) =>
                    ` ${isActive ? 'underline' : ''}`
                  }
                >
                  About
                </NavLink>
              </Button>
              <Button asChild variant="ghost">
                <NavLink
                  onClick={() => scrollToId("services")}
                  className={({ isActive }) =>
                    `${isActive ? 'underline' : ''}`
                  }
                >
                  Services
                </NavLink>
              </Button>
              <Button asChild variant="ghost">
                <NavLink
                  onClick={() => scrollToId("contacts")}
                  className={({ isActive }) =>
                    `hover:text-neutral-600 dark:hover:text-neutral-400 ${isActive ? 'underline' : ''}`
                  }
                >
                  Contact
                </NavLink>
              </Button>
            </div>
          </div>
          <Button
            variant="outline"
            onClick={toggleTheme}
            className="text-card-foreground cursor-pointer"
          >
            {theme === 'light' ? (
              <>
                <Moon /> Dark
              </>
            ) : (
              <>
                <Sun /> Light
              </>
            )}
          </Button>
          {/*      
          <Button
            variant="outline"
            onClick={() => navigate("/login")}
            className="text-card-foreground cursor-pointer"
          >
            <Box /> Login
          </Button>
          */}
          <Drawer>
            <DrawerTrigger>
              <Button size="icon" className="lg:hidden">
                <Equal />
              </Button>
            </DrawerTrigger>
            <DrawerContent>
              <DrawerHeader>
                <DrawerTitle className="text-lg">
                  Made with {String.fromCodePoint('0x1f499')}
                </DrawerTitle>
                <DrawerDescription>Explore more.</DrawerDescription>
              </DrawerHeader>
              <div className="flex flex-col gap-2 p-4 font-medium text-sm">
                <Link to="">
                  <RippleButton rippleColor="#ADD8E6" className="w-full justify-start text-card-foreground" onClick={() => drawerCloseRef.current?.click()}>
                    <div className='flex items-center space-x-3'>
                      <Home size={16} />
                      <label>Home</label>
                    </div>
                  </RippleButton>
                </Link>
                <Link to="">
                  <RippleButton rippleColor="#ADD8E6" className="w-full justify-start text-card-foreground" onClick={() => drawerCloseRef.current?.click()}>
                    <div className='flex items-center space-x-3'>
                      <NotepadText size={16} />
                      <label>About</label>
                    </div>
                  </RippleButton>
                </Link>
                <Link to="">
                  <RippleButton rippleColor="#ADD8E6" className="w-full justify-start text-card-foreground" onClick={() => drawerCloseRef.current?.click()}>
                    <div className='flex items-center space-x-3'>
                      <CircleUser size={16} />
                      <label>Services</label>
                    </div>
                  </RippleButton>
                </Link>
                <Link to="">
                  <RippleButton rippleColor="#ADD8E6" className="w-full justify-start text-card-foreground" onClick={() => drawerCloseRef.current?.click()}>
                    <div className='flex items-center space-x-3'>
                      <CroissantIcon size={16} />
                      <label>Contacts</label>
                    </div>
                  </RippleButton>
                </Link>
              </div>
              <DrawerFooter>
                <DrawerClose ref={drawerCloseRef} />
              </DrawerFooter>
            </DrawerContent>
          </Drawer>
        </div>
      </nav>
      <main id="main-page" className='pt-28'>
        <Outlet />
      </main>
      <Footer />
    </Fragment>
  );
}

export default Appbar_Layout;

