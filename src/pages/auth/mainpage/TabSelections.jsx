import { useLocation, useNavigate, Outlet } from "react-router-dom"
import { HouseIcon, PanelsTopLeftIcon, BoxIcon, UsersRoundIcon, ChartLine, SettingsIcon, Layers } from 'lucide-react';
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"
import { ScrollArea, ScrollBar } from "@/components/ui/scroll-area"
import { Badge } from "@/components/ui/badge";
import Overview from './Overview';
import BarangayRecords from "./Records";

function Main_TabSelections({ initialTab = "tab-1" }) {
  const navigate = useNavigate();
  const location = useLocation();

  const switchTabPath = {
    "tab-1": "overview",
    "tab-2": "records",
    "tab-3": "test3",
  }

  const getActiveTab = () => {
    let path = location.pathname.split("/").pop();
    const tab = Object.keys(switchTabPath).find((key) => switchTabPath[key] === path);
    return tab || initialTab;
  }

  const activeTab = getActiveTab();
  let handleTabChange = (value) => {
    const path = switchTabPath[value] || "";
    navigate(`/test-page/${path}`);
  }

  return (
    <div id="switch-tabs">
      <Tabs value={activeTab} onValueChange={handleTabChange} defaultValue={initialTab}>
        <ScrollArea>
          <TabsList className="text-foreground mb-3 h-auto gap-2 rounded-none border-b bg-transparent px-0 py-1 w-full justify-start">
            <TabsTrigger
              value="tab-1"
              className="hover:bg-accent hover:text-foreground data-[state=active]:after:bg-primary data-[state=active]:hover:bg-accent relative after:absolute after:inset-x-0 after:bottom-0 after:-mb-1.5 after:h-0.5 data-[state=active]:bg-transparent data-[state=active]:shadow-none ml-4"
            >
              <HouseIcon
                className="-ms-0.5 me-1.5 opacity-60"
                size={16}
                aria-hidden="true"
              />
              Overview
            </TabsTrigger>
            <TabsTrigger
              value="tab-2"
              className="hover:bg-accent hover:text-foreground data-[state=active]:after:bg-primary data-[state=active]:hover:bg-accent relative after:absolute after:inset-x-0 after:bottom-0 after:-mb-1.5 after:h-0.5 data-[state=active]:bg-transparent data-[state=active]:shadow-none"
            >
              <Layers
                className="-ms-0.5 me-1.5 opacity-60"
                size={16}
                aria-hidden="true"
              />
              Records
            </TabsTrigger>
            <TabsTrigger
              value="tab-3"
              className="hover:bg-accent hover:text-foreground data-[state=active]:after:bg-primary data-[state=active]:hover:bg-accent relative after:absolute after:inset-x-0 after:bottom-0 after:-mb-1.5 after:h-0.5 data-[state=active]:bg-transparent data-[state=active]:shadow-none"
            >
              <BoxIcon
                className="-ms-0.5 me-1.5 opacity-60"
                size={16}
                aria-hidden="true"
              />
              Analytics
              {/*<Badge className="ms-1.5">New</Badge>*/}
            </TabsTrigger>
            <TabsTrigger
              value="tab-4"
              className="hover:bg-accent hover:text-foreground data-[state=active]:after:bg-primary data-[state=active]:hover:bg-accent relative after:absolute after:inset-x-0 after:bottom-0 after:-mb-1.5 after:h-0.5 data-[state=active]:bg-transparent data-[state=active]:shadow-none"
            >
              <UsersRoundIcon
                className="-ms-0.5 me-1.5 opacity-60"
                size={16}
                aria-hidden="true"
              />
              Team
            </TabsTrigger>

          </TabsList>
          <ScrollBar orientation="horizontal" />
        </ScrollArea>
        <TabsContent value="tab-1">
          <Overview />
        </TabsContent>
        <TabsContent value="tab-2">
          <Outlet />
        </TabsContent>
        <TabsContent value="tab-3">
        </TabsContent>
        <TabsContent value="tab-4">
        </TabsContent>
      </Tabs>
    </div>

  )
}

export default Main_TabSelections;
