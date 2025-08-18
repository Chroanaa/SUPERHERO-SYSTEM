import { useState } from "react"
import { motion, AnimatePresence } from "framer-motion"
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from "@/components/ui/breadcrumb"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table"
import { Checkbox } from "@/components/ui/checkbox"
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"
import { HomeIcon as House, Users, Search, Filter, ChevronDown, Check, Trash2, Download } from "lucide-react"
import { Link } from "react-router-dom"
import { HoverCard, HoverCardContent, HoverCardTrigger } from "@/components/ui/hover-card"

const recordsData = [
  {
    id: "132900000",
    residentName: "Margarita, Simoyan L.",
    avatar: "https://github.com/shadcn.png",
    dateCreated: "2024/10/08",
    email: "margarita@russia.one",
    phoneNumber: "1209984000",
    transactionHistory: "Requested Indigency for Employement as of 10/08/25 9:45 AM",
    address: "Sitio 1, J.P Rizal",
    transactionCount: 3,
    violationCount: 0,
  },
  {
    id: "132900001",
    residentName: "Smith, John A.",
    avatar: "https://github.com/shadcn.png",
    dateCreated: "2024/10/07",
    email: "john.smith@example.com",
    phoneNumber: "1234567890",
    transactionHistory: "Applied for Business Permit for new restaurant opening in downtown area",
    address: "Sitio 2, Barangay Central",
    transactionCount: 7,
    violationCount: 1,
  },
  {
    id: "132900002",
    residentName: "Doe, Jane B.",
    avatar: "https://github.com/shadcn.png",
    dateCreated: "2024/10/06",
    email: "jane.doe@example.com",
    phoneNumber: "0987654321",
    transactionHistory: "Requested Certificate of Residency for school enrollment application",
    address: "Sitio 3, Riverside District.",
    transactionCount: 2,
    violationCount: 0,
  },
]

export default function ResidentRecords() {
  const [selectedNameSort, setSelectedNameSort] = useState("Ascending")
  const [selectedMonthlyFilter, setSelectedMonthlyFilter] = useState("Monthly")
  const [selectedItems, setSelectedItems] = useState([])

  const handleItemSelect = (itemId) => {
    setSelectedItems((prev) => (prev.includes(itemId) ? prev.filter((id) => id !== itemId) : [...prev, itemId]))
  }

  const handleSelectAll = () => {
    if (selectedItems.length === sortedRecords.length) {
      setSelectedItems([])
    } else {
      setSelectedItems(sortedRecords.map((record) => record.id))
    }
  }

  // Sort records based on selectedNameSort
  const sortedRecords = [...recordsData].sort((a, b) => {
    const nameA = a.residentName.toLowerCase()
    const nameB = b.residentName.toLowerCase()
    if (selectedNameSort === "Ascending") {
      return nameA < nameB ? -1 : nameA > nameB ? 1 : 0
    } else if (selectedNameSort === "Descending") {
      return nameA > nameB ? -1 : nameA < nameB ? 1 : 0
    }
    return 0
  })

  return (
    <section className="px-6 relative">
      <div className="space-y-6">
        <Breadcrumb>
          <BreadcrumbList>
            <BreadcrumbItem>
              <BreadcrumbLink href="/test-page/records" className="flex gap-2 items-center font-medium">
                <House className="size-4" /> Main Menu
              </BreadcrumbLink>
            </BreadcrumbItem>
            <BreadcrumbSeparator />
            <BreadcrumbItem>
              <BreadcrumbPage className="font-medium">Resident Records</BreadcrumbPage>
            </BreadcrumbItem>
          </BreadcrumbList>
        </Breadcrumb>

        <AnimatePresence>
          {selectedItems.length > 0 && (
            <motion.div
              initial={{ opacity: 0, y: -5 }}
              animate={{ opacity: 1, y: 0 }}
              exit={{ opacity: 0, y: -5 }}
              transition={{ duration: 0.1, ease: "linear" }}
              className="fixed top-4 left-1/2 transform -translate-x-1/2 z-50"
            >
              <div className="bg-background border rounded-lg shadow-lg px-3 p-2 flex items-center justify-between gap-4 min-w-xl">
                <div className="flex items-center gap-2">
                  <span className="text-sm flex items-center gap-2 font-medium">
                    <Check className="size-4" /> {selectedItems.length} item{selectedItems.length > 1 ? "s" : ""}{" "}
                    selected
                  </span>
                </div>
                <div className="flex items-center gap-2">
                  <Button
                    variant="outline"
                    size="sm"
                    className="flex items-center gap-2 text-destructive hover:text-destructive bg-transparent"
                  >
                    <Trash2 className="size-4" />
                    Archive
                  </Button>
                </div>
              </div>
            </motion.div>
          )}
        </AnimatePresence>

        <div className="flex flex-col items-start">
          <div className="flex items-center gap-4">
            <div id="header-page" className="p-5 rounded-xl bg-gradient-to-t from-red-500 to-red-400 overflow-hidden">
              <Users className="size-8 stroke-white" />
            </div>
            <div className="inline-flex flex-col">
              <h1 className="text-2xl font-semibold leading-10 tracking-tighter">Residents List</h1>
              <p className="text-sm font-medium text-muted-foreground">See the demographic profiles.</p>
            </div>
          </div>
        </div>

        <div className="flex flex-col md:flex-row items-center justify-between gap-4">
          <div className="flex flex-wrap items-center gap-2">
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="outline" className="flex items-center gap-1 bg-transparent">
                  Name <ChevronDown className="ml-1 size-4" />
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="start">
                <DropdownMenuItem onClick={() => setSelectedNameSort("Ascending")}>
                  <Check
                    className={selectedNameSort === "Ascending" ? "mr-2 size-4 opacity-100" : "mr-2 size-4 opacity-0"}
                  />
                  Ascending
                </DropdownMenuItem>
                <DropdownMenuItem onClick={() => setSelectedNameSort("Descending")}>
                  <Check
                    className={selectedNameSort === "Descending" ? "mr-2 size-4 opacity-100" : "mr-2 size-4 opacity-0"}
                  />
                  Descending
                </DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>

            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="outline" className="flex items-center gap-1 bg-transparent">
                  Monthly <ChevronDown className="ml-1 size-4" />
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="start">
                <DropdownMenuItem onClick={() => setSelectedMonthlyFilter("Monthly")}>
                  <Check
                    className={
                      selectedMonthlyFilter === "Monthly" ? "mr-2 size-4 opacity-100" : "mr-2 size-4 opacity-0"
                    }
                  />
                  Monthly
                </DropdownMenuItem>
                <DropdownMenuItem onClick={() => setSelectedMonthlyFilter("Weeks")}>
                  <Check
                    className={selectedMonthlyFilter === "Weeks" ? "mr-2 size-4 opacity-100" : "mr-2 size-4 opacity-0"}
                  />
                  Weeks
                </DropdownMenuItem>
                <DropdownMenuItem onClick={() => setSelectedMonthlyFilter("3 days")}>
                  <Check
                    className={selectedMonthlyFilter === "3 days" ? "mr-2 size-4 opacity-100" : "mr-2 size-4 opacity-0"}
                  />
                  3 days
                </DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>

            <Button variant="outline" size="icon" className="hidden bg-transparent">
              <Filter className="size-4" />
              <span className="sr-only">Filter</span>
            </Button>
          </div>

          <div className="flex items-center gap-2 w-full md:w-auto">
            <div className="relative flex-1">
              <Search className="absolute left-2.5 top-1/2 -translate-y-1/2 size-4 text-muted-foreground" />
              <Input placeholder="Search..." className="pl-8" />
            </div>
            <Button className="flex items-center gap-2">
              <Download className="size-4" /> Export
            </Button>
          </div>
        </div>

        <div className="rounded-lg border overflow-hidden">
          <Table>
            <TableHeader>
              <TableRow className="bg-muted/50">
                <TableHead className="w-[40px] text-center">
                  <Checkbox
                    checked={selectedItems.length === sortedRecords.length && sortedRecords.length > 0}
                    onCheckedChange={handleSelectAll}
                  />
                </TableHead>
                <TableHead>ID No.</TableHead>
                <TableHead>Resident (LN, FN, MI)</TableHead>
                <TableHead>Date Created</TableHead>
                <TableHead>Email</TableHead>
                <TableHead>Phone Number</TableHead>
                <TableHead>Previous Transaction</TableHead>
              </TableRow>
            </TableHeader>
            <TableBody>
              {sortedRecords.map((record) => (
                <TableRow key={record.id}>
                  <TableCell className="text-center">
                    <Checkbox
                      checked={selectedItems.includes(record.id)}
                      onCheckedChange={() => handleItemSelect(record.id)}
                    />
                  </TableCell>
                  <TableCell className="font-medium">{record.id}</TableCell>
                  <TableCell>
                    <div className="flex items-center gap-3">
                      <Avatar className="h-8 w-8">
                        <AvatarImage src={record.avatar || "/placeholder.svg"} alt={record.residentName} />
                        <AvatarFallback>
                          {record.residentName
                            .split(" ")
                            .map((n) => n[0])
                            .join("")}
                        </AvatarFallback>
                      </Avatar>
                      <HoverCard>
                        <HoverCardTrigger>
                          <Link to="profile/13256">
                            <span className="cursor-pointer hover:underline">{record.residentName}</span>
                          </Link>
                        </HoverCardTrigger>
                        <HoverCardContent className="p-4 font-geist space-y-2">
                          <div id="tooltip-details" className="w-64 break-words">
                            <span className="text-sm font-medium">{record.residentName}</span>
                            <p className="text-xs font-medium text-muted-foreground">Address: {record.address}</p>
                          </div>
                          <div id="summary" className="flex gap-1.5">
                            <div className="w-24 break-words">
                              <span className="font-bold">{record.transactionCount}</span>
                              <p className="text-sm">Transactions</p>
                            </div>
                            <div className="w-24 break-words">
                              <span className="font-bold">{record.violationCount}</span>
                              <p className="text-sm">Violations</p>
                            </div>
                          </div>
                        </HoverCardContent>
                      </HoverCard>
                    </div>
                  </TableCell>
                  <TableCell>{record.dateCreated}</TableCell>
                  <TableCell>{record.email}</TableCell>
                  <TableCell>{record.phoneNumber}</TableCell>
                  <TableCell className="max-w-xs truncate">{record.transactionHistory}</TableCell>
                </TableRow>
              ))}
            </TableBody>
          </Table>
        </div>
      </div>
    </section>
  )
}
