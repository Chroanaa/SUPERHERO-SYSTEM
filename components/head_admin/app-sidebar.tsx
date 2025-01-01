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
// import { NavProjects } from "@/components/head_admin/nav-projects"
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
import { ResidentMenu } from "@/components/bpso/resident-menu"

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
          title: "Pending Request",
          url: "/onboardings/head_admin/main/pages/authorization",
        },
        {
          title: "Approved Request",
          url: "#",
        },
        {
          title: "Disapproved Request",
          url: "#",
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
          title: "Manage Residents",
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
        {/* <NavProjects projects={data.projects} /> */}
      </SidebarContent>
      <SidebarFooter>
        <NavUser user={data.user} />
      </SidebarFooter>
      <SidebarRail />
    </Sidebar>
  )
}