"use client"

import * as React from "react"
import {
  Layers,
  Building,
  Users,
  BookUser,
  FileChartLine,
} from "lucide-react"

import { NavMain } from "@/components/bpso/nav-main"
import { IncidentMenu } from "@/components/bpso/incident-menu"
// import { NavProjects } from "@/components/bpso/nav-projects"
import { NavUser } from "@/components/bpso/nav-user"
import { NavHeader } from "@/components/bpso/nav-header"
import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarHeader,
  SidebarRail,
} from "@/components/ui/sidebar"
import { ScrollArea } from "@radix-ui/react-scroll-area"
import { ResidentMenu } from "./resident-menu"

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
      plan: "BPSO Portal",
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
          title: "Add New Case",
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
    {
      title: "Complaint Records",
      url: "#",
      icon: BookUser,
      items: [
        {
          title: "Filing (New)",
          url: "#",
        },
        {
          title: "Complaint Lists",
          url: "#",
        },
      ],
    },
  ],
  incidentMenu: [
    {
      title: "Incident Records",
      url: "#",
      icon: Layers,
      isActive: true,
      items: [
        {
          title: "Patawag / Blotter",
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
        <IncidentMenu items={data.incidentMenu} />
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