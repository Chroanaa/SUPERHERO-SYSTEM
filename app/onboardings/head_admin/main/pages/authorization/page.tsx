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
        <div className="flex items-start justify-between space-x-6">
          <aside className="mt-4 mb-8 space-y-2">
            <div className="font-bold text-3xl tracking-tight">
              Pending Request
            </div>
            <p className="font-medium max-w-[640px] break-words text-muted-foreground">This contains the streamlined processing of making all employees and staffs to have an access to our system.</p>
          </aside>
          
        </div>
        <Card>
          <Cardboard>
            afsdgoksdfgkofsdgko
          </Cardboard>
          <CardTableContent>
            <Table>
              {/* <TableCaption>A list of your recent invoices.</TableCaption> */}
              <TableHeader>
                <TableRow>
                  <TableHead>Status</TableHead>
                  <TableHead>Names (LN, FN, MI)</TableHead>
                  <TableHead>Email Address</TableHead>
                  <TableHead>Phone Number</TableHead>
                  <TableHead>Registered Date & Time</TableHead>
                  <TableHead>Action</TableHead>
                </TableRow>
              </TableHeader>
              <TableBody>
                <TableRow>
                  <TableCell>Pending</TableCell>
                  <TableCell className="max-w-[200px] truncate">Dela Cruz, Juan A.</TableCell>
                  <TableCell className="max-w-[250px] truncate">delacruzjuan@gmail.com</TableCell>
                  <TableCell>9952072434</TableCell>
                  <TableCell>01/01/25 as of 07:33 AM</TableCell>
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