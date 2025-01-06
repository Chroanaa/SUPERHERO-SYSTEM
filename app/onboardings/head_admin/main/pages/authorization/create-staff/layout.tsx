import type { Metadata } from "next";
import { Inter } from 'next/font/google'
import {
    SidebarInset,
    SidebarProvider,
    SidebarTrigger,
} from "@/components/ui/sidebar"
import { AppSidebar } from "@/components/head_admin/app-sidebar"
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import { Separator } from "@/components/ui/separator"

export const metadata: Metadata = {
    title: "Add New Staff! - Brgy. Sta Lucia",
    description: "This page is for barangay secretary side.",
    generator: "Next.js",
    applicationName: "Rigma",
    referrer: "origin-when-cross-origin",
    creator: "SBIT-3K (1st Semester) from Quezon City University",
    formatDetection: {
        email: false,
        address: false,
        telephone: false,
    },
    /* SEO things starts at metadataBase */
    metadataBase: new URL("http://localhost:0000/head_admin/main"),
    alternates: {
        canonical: "/",
        languages: {
            "en-US": "/en-US",
        },
    },
    openGraph: {
        title: "",
        description: "",
        url: "",
        siteName: "",
        images: [
            {
                url: "",
                width: 1200,
                height: 630,
            },
        ],
    },
    twitter: {
        card: "summary_large_image",
        title: "",
        description: "",
        images: "",
    },
};

export default function BlankForm({
    children,
}: Readonly<{
    children: React.ReactNode;
}>) {
    return (
        <section id="blank-form">
            <SidebarInset>
                {children}
            </SidebarInset>
        </section>
    );
}
