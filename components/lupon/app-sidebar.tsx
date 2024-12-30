"use client"

import * as React from "react"
import {
  Layers,
  Building,
  Users,
  BookUser,
  FileChartLine,
} from "lucide-react"

import { NavMain } from "@/components/lupon/nav-main"
import { LuponMenu } from "@/components/lupon/lupon-menu"
// import { NavProjects } from "@/components/lupon/nav-projects"
import { NavUser } from "@/components/lupon/nav-user"
import { NavHeader } from "@/components/lupon/nav-header"
import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarHeader,
  SidebarRail,
} from "@/components/ui/sidebar"
import { ResidentMenu } from "@/components/lupon/resident-menu"

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
      plan: "LUPON Tagapamayapa",
    }
  ],
  navMain: [
    {
      title: "Case Records",
      url: "#",
      icon: Users,
      isActive: true,
      items: [
        {
          title: "All Cases",
          url: "#",
        },
        {
          title: "Case Reports",
          url: "#",
        },
        {
          title: "Case Analytics",
          url: "#",
        },
        {
          title: "Escalated Cases",
          url: "#",
        },
      ],
    },
  ],
  luponMenu: [
    {
      title: "Scheduling",
      url: "#",
      icon: Layers,
      isActive: true,
      items: [
        {
          title: "Hearings",
          url: "#",
        },
      ],
    },
  ],
  scheduleData: [
    {
      title: "Case Reports",
      url: "#",
      icon: Layers,
      isActive: true,
      items: [
        {
          title: "Hearings",
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
        <LuponMenu items={data.luponMenu} />
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