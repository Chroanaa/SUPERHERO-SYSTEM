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
          <aside className="mt-4 mb-8 space-y-2">
            <Dialog>
              <DialogTrigger asChild>
                <Button variant="outline">
                  View Statistics
                </Button>
              </DialogTrigger>
              <DialogContent>
                <DialogHeader>
                  <DialogTitle className="text-2xl">Statistics (Tally)</DialogTitle>
                  <DialogDescription>
                    See those types of requests that had been processed.
                  </DialogDescription>
                </DialogHeader>
                <div className="flex flex-col items-start space-y-3 text-muted-foreground font-medium">
                  <div id="pending-tally" className="flex items-center justify-between w-full">
                    <span>Pending Request</span>
                    <span>0</span>
                  </div>
                  <div id="pending-tally" className="flex items-center justify-between w-full">
                    <span>Approved Request</span>
                    <span>0</span>
                  </div>
                  <div id="pending-tally" className="flex items-center justify-between w-full">
                    <span>Disapproved Request</span>
                    <span>0</span>
                  </div>
                </div>
                <DialogFooter>
                  <Button variant="outline">Clear All Request</Button>
                  <Button>Explore</Button>
                </DialogFooter>
              </DialogContent>
            </Dialog>
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
                  <TableHead className="w-[100px]">Status</TableHead>
                  <TableHead className="w-[200px]">Names (LN, FN, MI)</TableHead>
                  <TableHead className="w-[250px]">Email Address</TableHead>
                  <TableHead className="w-[150px]">Phone Number</TableHead>
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