"use client"

import * as React from "react"
import {
  ChartNetwork,
  Building,
  Users,
  BookUser,
  FileChartLine,
} from "lucide-react"

import { NavMain } from "@/components/head_admin/nav-main"
import { TreasurerMenu } from "@/components/head_admin/treasurer-menu"
import { NavUser } from "@/components/head_admin/nav-user"
import { NavHeader } from "@/components/head_admin/nav-header"
import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarHeader,
  SidebarRail,
} from "@/components/ui/sidebar"
import { ScrollArea } from "@radix-ui/react-scroll-area"
import { ResidentMenu } from "@/components/head_admin/resident-menu"

// This is sample data.
const data = {
  user: {
    name: "Kenneth O.",
    email: "k80308392@gmail.com",
    avatar: "",
  },
  teams: [
    {
      name: "Brgy. Sta Lucia",
      logo: Building,
      plan: "Head Admin / Secretary Team",
      url: "/onboardings/head_admin/main/",
    }
  ],
  navMain: [
    {
      title: "Authorization",
      url: "#",
      icon: Users,
      isActive: true,
      items: [
        {
          title: "Staffs Management",
          url: "/onboardings/head_admin/main/pages/authorization",
        },
      ],
    },
    {
      title: "Secretary Portal",
      url: "#",
      icon: BookUser,
      items: [
        {
          title: "Transactions",
          url: "#",
        },
        {
          title: "Case Records",
          url: "#",
        },
      ],
    },
  ],
  treasurerPortal: [
    {
      title: "Statistics",
      url: "#",
      icon: ChartNetwork,
      isActive: true,
      items: [
        {
          title: "Dashboard",
          url: "#",
        },
      ],
    },
    {
      title: "Analytics",
      url: "#",
      icon: FileChartLine,
      items: [
        {
          title: "Reports",
          url: "#",
        },
        {
          title: "Fund Tracking",
          url: "#",
        },
        {
          title: "Transaction History",
          url: "#",
        },
      ],
    },
  ],
  residentMenu: [
    {
      title: "Personal Records",
      url: "#",
      icon: Users,
      isActive: true,
      items: [
        {
          title: "Residents Management",
          url: "#",
        },
      ],
    },
  ],
}

export function AppSidebar({ ...props }: React.ComponentProps<typeof Sidebar>) {
  return (
    <Sidebar collapsible="icon" {...props}>
      <SidebarHeader>
        <NavHeader teams={data.teams} />
      </SidebarHeader>
      <SidebarContent>
        <NavMain items={data.navMain} />
        <TreasurerMenu items={data.treasurerPortal} />
        <ResidentMenu items={data.residentMenu} />
      </SidebarContent>
      <SidebarFooter>
        <NavUser user={data.user} />
      </SidebarFooter>
      <SidebarRail />
    </Sidebar>
  )
}