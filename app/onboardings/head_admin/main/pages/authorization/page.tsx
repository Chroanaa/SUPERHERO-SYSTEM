"use client";

import { useState, useEffect, Fragment } from "react";
import { Button } from "@/components/ui/button";
import {
  Card,
  Cardboard,
  CardBanner,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
  CardTableContent,
} from "@/components/ui/card";
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table"

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

  // Mock data for roles (test)
  const mockRoles = ["Handle User", "BPSO", "Admin"];

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
                  Onboarding
                </BreadcrumbLink>
              </BreadcrumbItem>
              <BreadcrumbSeparator className="hidden md:block" />
              <BreadcrumbItem>
                <BreadcrumbPage>Authorization</BreadcrumbPage>
              </BreadcrumbItem>
            </BreadcrumbList>
          </Breadcrumb>
        </div>
      </header>
      <section className="px-8">
        <div className="flex items-start justify-between max-w-[640px] break-words">
          <aside className="mt-4 mb-8 space-y-2">
            <div className="font-bold text-3xl tracking-tight">
              Staffs Management
            </div>
            <p className="font-medium text-muted-foreground">This contains the streamlined processing of making all employees or staffs to have an access to our system.</p>
          </aside>
        </div>
        <Card>
          <Cardboard>
            <div className="flex flex-row items-start justify-between space-x-3">
              <div id="search-users">
                <Input
                  type="text"
                  placeholder="Search by name"
                  className="md:w-[480px] sm:w-full"
                />
              </div>
              <div id="add-new-users">
                <Link href="/onboardings/head_admin/main/pages/authorization/create-staff">
                  <Button variant="outline">
                    <Plus />
                    Add New Staff
                  </Button>
                </Link>
              </div>
            </div>
          </Cardboard>
          <CardTableContent>
            <Table>
              {/* <TableCaption>A list of your recent invoices.</TableCaption> */}
              <TableHeader>
                <TableRow>
                  <TableHead>Names (LN, FN, MI)</TableHead>
                  <TableHead>Email Address</TableHead>
                  <TableHead>Phone Number</TableHead>
                  <TableHead>Roles</TableHead>
                  <TableHead>Action</TableHead>
                </TableRow>
              </TableHeader>
              <TableBody>
                <TableRow>
                  <TableCell className="max-w-[200px] truncate">Dela Cruz, Juan A.</TableCell>
                  <TableCell className="max-w-[250px] truncate">delacruzjuan@gmail.com</TableCell>
                  <TableCell>9952072434</TableCell>
                  <TableCell className="max-w-[200px] space-x-1.5">
                    {mockRoles.slice(0, 1).map((role, index) => (
                      <Badge key={index} variant="outline" className="rounded-full">{role}</Badge>
                    ))}
                    {mockRoles.length > 1 && (
                      <Badge variant="outline" className="rounded-full">+{mockRoles.length - 1}</Badge>
                    )}
                  </TableCell>
                  <TableCell>
                    <Button variant="default">
                      View Details
                    </Button>
                  </TableCell>
                </TableRow>
              </TableBody>
            </Table>
          </CardTableContent>
        </Card>
      </section>
    </Fragment >
  );
}