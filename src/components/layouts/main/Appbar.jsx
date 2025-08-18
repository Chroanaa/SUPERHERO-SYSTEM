import { Fragment, useEffect, useRef } from 'react';
import { NavLink, Outlet, Link, useNavigate } from 'react-router-dom';
import { Button } from '@/components/ui/button';
import { Moon, Sun, Search, Bell, User, Users, LogOut, BadgeCheck } from 'lucide-react';
import { RippleButton } from "@/components/magicui/ripple-button";
import { Route } from 'lucide-react';
import { Avatar, AvatarImage, AvatarFallback } from "@/components/ui/avatar";
import { Badge } from "@/components/ui/badge";
import { Input } from '@/components/ui/input';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { useTheme } from '@/components/ThemeProvider';

function App_Layout() {
  const { theme, setTheme } = useTheme();
  const switchTheme = useRef(null);

  const handleThemes = (e) => {
    e.preventDefault();
    e.stopPropagation();
    setTheme(theme === "light" ? "dark" : "light");
    if (switchTheme.current) {
      switchTheme.current.focus();
    }
  }

  return (
    <div id="app-container">
      <div id="appbar" className="w-full">
        <div className="px-6 py-4 flex items-center justify-between">
          <div className="inline-flex items-center gap-3 text-card-foreground selection:bg-card-foreground selection:text-white dark:selection:bg-card-foreground dark:selection:text-black">
            <Route />
            <span className="inline-block w-px h-5 bg-gray-400 transform rotate-20 mx-1.5" />
            <div className="flex items-center gap-3">
              <Avatar className="size-6">
                <AvatarImage src="https://github.com/lash0000.png" />
                <AvatarFallback>PH</AvatarFallback>
              </Avatar>
              <span className="text-sm font-medium">Simonyan, Margarita</span>
              <div className="inline-flex gap-2">
                {/* Superuser detected (Admin) */}
                <Badge id="user-role" variant="secondary">Superuser</Badge>
                <Badge id="superuser" className="bg-blue-500 text-white">
                  <BadgeCheck /> Admin
                </Badge>
                {/* You will only show it for every new accounts. */}
                {/*<Badge className="bg-primary text-white">
                <BadgeAlert /> Unverified
              </Badge>*/}
                {/* <Badge className="bg-blue-500 text-white">
                <BadgeCheck /> Verified
              </Badge> */}
              </div>
            </div>
          </div>
          <div id="right-side">
            <div className="flex items-center space-x-2">
              {/* Search Input */}
              <div className="relative">
                <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" />
                <Input
                  type="text"
                  placeholder="Find..."
                  className="pl-10 pr-12 py-2 w-64 border rounded-lg"
                />
                <span className="border absolute rounded-sm right-2 top-1/2 transform -translate-y-1/2 text-sm font-medium size-6 flex items-center justify-center select-none">
                  F
                </span>
              </div>
              <div className="ml-4 flex gap-3.5">
                <Button
                  variant="ghost"
                  size="icon"
                  className="border hover:bg-gray-100 rounded-full size-8"
                >
                  <Bell />
                </Button>
                <DropdownMenu>
                  <DropdownMenuTrigger className="outline-none cursor-pointer">
                    <Avatar className="border">
                      <AvatarImage src="https://github.com/lash0000.png" />
                      <AvatarFallback className="bg-pink-100 text-pink-600 text-sm">U</AvatarFallback>
                    </Avatar>
                  </DropdownMenuTrigger>
                  <DropdownMenuContent className="w-60 font-geist" align="end" sideOffset={15}>
                    <div className="space-y-0 py-2">
                      <DropdownMenuLabel className="py-0">Kenneth Obsequio</DropdownMenuLabel>
                      <DropdownMenuLabel className="py-0 text-muted-foreground">email@you.xyz</DropdownMenuLabel>
                    </div>
                    <DropdownMenuSeparator />
                    <DropdownMenuItem className="flex justify-between items-center">
                      <span>Profile</span>
                      <User />
                    </DropdownMenuItem>
                    <DropdownMenuItem className="flex justify-between items-center">
                      <span>Team</span>
                      <Users />
                    </DropdownMenuItem>
                    <DropdownMenuItem
                      onClick={handleThemes}
                      className="flex justify-between items-center"
                    >
                      <span>{theme === "light" ? "Theme (Dark)" : "Theme (Light)"}</span>
                      {theme === "light" ? (
                        <Moon />
                      ) : (
                        <Sun />
                      )}
                    </DropdownMenuItem>
                    <DropdownMenuSeparator />
                    <DropdownMenuItem className="flex justify-between items-center text-red-600 focus:text-red-600 dark:text-white">
                      <span>Log out</span>
                      <LogOut />
                    </DropdownMenuItem>
                  </DropdownMenuContent>
                </DropdownMenu>
              </div>
            </div>
          </div>
        </div>
      </div>
      <main id="main-page" className="min-h-screen bg-background">
        <Outlet />
      </main>
    </div>
  );
}

export default App_Layout;
