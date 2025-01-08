"use client";

import { useState, useEffect, Fragment } from "react";
import { Button } from "@/components/ui/button";
import { useRouter } from "next/navigation";
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import { Separator } from "@/components/ui/separator"
import {
  SidebarTrigger,
} from "@/components/ui/sidebar"
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "@/components/ui/dialog"
import { Input } from "@/components/ui/input";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"
import { Badge } from "@/components/ui/badge"
import { Plus } from "lucide-react";
import Link from "next/link";
import { AddNewStaff } from "@/components/head_admin/secretary/authorization/add-new-staff";

export default function Page() {
    const router = useRouter();

    useEffect(() => {
        // Check if user is logged in
        const isLoggedIn = localStorage.getItem('isLoggedIn');
        if (isLoggedIn !== 'true') {
            router.replace('/');
            return;
        }
    }, []);

    return (
        <Fragment>
            <header className="flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12">
                <div className="flex items-center gap-2 px-4">
                    <SidebarTrigger className="-ml-1" />
                    <Separator orientation="vertical" className="mr-2 h-4" />
                    <Breadcrumb>
                        <BreadcrumbList>
                            <BreadcrumbItem className="hidden md:block">
                                <BreadcrumbLink>
                                    Authorization
                                </BreadcrumbLink>
                            </BreadcrumbItem>
                            <BreadcrumbSeparator className="hidden md:block" />
                            <BreadcrumbItem>
                                <BreadcrumbPage>Create New Staff</BreadcrumbPage>
                            </BreadcrumbItem>
                        </BreadcrumbList>
                    </Breadcrumb>
                </div>
            </header>
            <section className="px-8">
                <div className="flex items-start justify-between max-w-[640px] break-words">
                    <aside className="mt-4 mb-8 space-y-2">
                        <div className="font-bold text-3xl tracking-tight">
                            Add New Staff
                        </div>
                        <p className="font-medium text-muted-foreground">Provide the following information needed either Staff or Brgy. Official.</p>
                    </aside>
                </div>
                <div className="grid grid-cols-1 border p-3 bg-slate-100 rounded-lg">
                    <div className="border p-6 bg-white rounded-lg flex items-start flex-col">
                        <AddNewStaff />
                    </div>
                </div>
            </section>
        </Fragment>
    );
}