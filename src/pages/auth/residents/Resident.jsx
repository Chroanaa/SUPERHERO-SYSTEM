import { useState } from "react"
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
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"
import { HomeIcon as House, Info, CalendarIcon, ChevronDownIcon } from "lucide-react"
import { Switch } from "@/components/ui/switch"
import { Label } from "@/components/ui/label"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { Popover, PopoverContent, PopoverTrigger } from "@/components/ui/popover"
import { Calendar } from "@/components/ui/calendar"
import { format } from "date-fns"
import { cn } from "@/lib/utils"
import { RadioGroup, RadioGroupItem } from "@/components/ui/radio-group"

// dynamic page guru
export default function Resident() {
  const [birthdate, setBirthdate] = useState();

  return (
    <div id="profile-page" className="container mx-auto max-w-4xl space-y-6 pb-6">
      <Breadcrumb>
        <BreadcrumbList>
          <BreadcrumbItem>
            <BreadcrumbLink href="/test-page/records" className="flex gap-2 items-center font-medium">
              <House className="size-4" /> Main Menu
            </BreadcrumbLink>
          </BreadcrumbItem>
          <BreadcrumbSeparator />
          <BreadcrumbItem>
            <BreadcrumbLink href="/test-page/records/residents" className="font-medium">
              Resident Records
            </BreadcrumbLink>
          </BreadcrumbItem>
          <BreadcrumbSeparator />
          <BreadcrumbItem>
            <BreadcrumbPage className="font-medium">132900002</BreadcrumbPage>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
      <div id="profile-information" className="flex flex-col items-start gap-4">
        <div className="bg-input/40 border rounded-lg p-3.5 px-4 w-full flex justify-between items-center">
          <div className="flex items-center gap-2.5">
            <Info className="size-4" />
            <p className="text-sm">To update resident information, just enable edit toggle.</p>
          </div>
          <div></div>
        </div>
        <div className="flex justify-between items-center w-full">
          <div className="flex flex-col">
            <h1 className="font-semibold text-2xl tracking-tighter leading-8">Profile Information</h1>
            <p className="font-medium text-muted-foreground">Fill out details for this resident profile.</p>
          </div>
          <div className="flex gap-4">
            <Label htmlFor="edit-mode" className="text-blue-500 dark:text-red-400">
              Edit Mode
            </Label>
            <Switch id="edit-mode" className="data-[state=checked]:bg-blue-500 dark:data-[state=checked]:bg-red-400" />
          </div>
        </div>
        <form id="resident-information" className="flex flex-col gap-4 w-full">
          <Label className="uppercase text-xs text-muted-foreground font-medium">Profile Picture</Label>
          <div className="border border-dashed bg-card rounded-xl p-4">
            <div className="flex items-center justify-between h-full">
              <div className="flex items-center justify-center h-full gap-4">
                <Avatar className="size-20 rounded-lg pointer-events-none">
                  <AvatarImage src="https://github.com/lash0000.png" />
                  <AvatarFallback>CN</AvatarFallback>
                </Avatar>
                {/* show this in case the new resident profile added */}
                {/*<ImageIcon className="size-10 stroke-blue-500" />*/}
                <Label className="text-md font-medium">Updated as of 03:20 PM (12/08/25)</Label>
              </div>
              <div className="flex gap-2">
                <Button variant="outline">View</Button>
                <Button variant="outline" disabled>
                  Browse
                </Button>
              </div>
            </div>
          </div>
          <Label className="uppercase text-xs text-muted-foreground font-medium">demographics</Label>
          <div className="grid grid-cols-4 gap-2 w-full">
            <div className="space-y-2">
              <Label className="font-medium">First Name</Label>
              <Input
                type="text"
                defaultValue="Test"
                placeholder="Write your name"
                className="border rounded-lg"
                disabled
              />
            </div>
            <div className="space-y-2">
              <Label className="font-medium">Middle Name</Label>
              <Input
                type="text"
                defaultValue="Test"
                placeholder="Write your name"
                className="border rounded-lg"
                disabled
              />
            </div>
            <div className="space-y-2">
              <Label className="font-medium">Last Name</Label>
              <Input
                type="text"
                defaultValue="Test"
                placeholder="Write your name"
                className="border rounded-lg"
                disabled
              />
            </div>
            <div className="space-y-2">
              <Label className="font-medium">Suffix</Label>
              <Select disabled>
                <SelectTrigger className="w-full">
                  <SelectValue placeholder="Add suffix" />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem value="none">None</SelectItem>
                  <SelectItem value="Jr">Jr.</SelectItem>
                  <SelectItem value="Sr">Sr.</SelectItem>
                  <SelectItem value="II">II</SelectItem>
                  <SelectItem value="III">III</SelectItem>
                  <SelectItem value="IV">IV</SelectItem>
                  <SelectItem value="V">V</SelectItem>
                  <SelectItem value="VI">VI</SelectItem>
                  <SelectItem value="VII">VII</SelectItem>
                  <SelectItem value="VIII">VIII</SelectItem>
                </SelectContent>
              </Select>
            </div>
            <div className="space-y-2 col-span-4">
              <Label className="font-medium">Birthdate</Label>
              <Popover>
                <PopoverTrigger asChild>
                  <Button
                    variant={"outline"}
                    className={cn("w-full justify-between text-left font-normal", !birthdate && "text-muted-foreground")}
                    disabled
                  >
                    <div className="flex items-center gap-3">
                      <CalendarIcon className="size-4" />
                      {birthdate ? format(birthdate, "PPP") : <span>Provide birthdate</span>}
                    </div>
                    <ChevronDownIcon className="size-4" />
                  </Button>
                </PopoverTrigger>
                <PopoverContent className="w-auto p-0" side="bottom" align="start">
                  <Calendar
                    mode="single"
                    selected={birthdate}
                    onSelect={setBirthdate}
                    captionLayout="dropdown"
                  />
                </PopoverContent>
              </Popover>
            </div>
          </div>
          <Label className="uppercase text-xs text-muted-foreground font-medium">Type of Residency</Label>
          <RadioGroup className="col-span-4 flex w-full gap-4" defaultValue="option-one">
            <div className="flex items-center gap-2">
              <RadioGroupItem value="option-one" id="option-one" />
              <Label htmlFor="option-one">Bonafide</Label>
            </div>
            <div className="flex items-center gap-2">
              <RadioGroupItem value="option-two" id="option-two" />
              <Label htmlFor="option-two">Non Resident</Label>
            </div>
          </RadioGroup>
          <div className="bg-input/40 border rounded-lg p-3.5 px-4 w-full flex justify-between items-center">
            <div className="flex items-center gap-2.5">
              <Info className="size-4" />
              <p className="text-sm">Sa mismong barangay, kung matagal na naninirahan ang residente mula 6 months o higit pa pwede ito gawing bonafide.</p>
            </div>
            <div></div>
          </div>
          <Label className="uppercase text-xs text-muted-foreground font-medium">exact address</Label>
          <div className="grid grid-cols-2 gap-2 w-full">
            <div className="space-y-2">
              <Label className="font-medium">Sitio</Label>
              <Select disabled>
                <SelectTrigger className="w-full">
                  <SelectValue placeholder="Provide sitio number." />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem value="none">None</SelectItem>
                  <SelectItem value="sitio-1">Sitio 1</SelectItem>
                  <SelectItem value="sitio-2">Sitio 2</SelectItem>
                  <SelectItem value="sitio-3">Sitio 3</SelectItem>
                  <SelectItem value="sitio-4">Sitio 4</SelectItem>
                  <SelectItem value="sitio-5">Sitio 5</SelectItem>
                  <SelectItem value="sitio-6">Sitio 6</SelectItem>
                  <SelectItem value="sitio-7">Sitio 7</SelectItem>
                </SelectContent>
              </Select>
            </div>
            <div className="space-y-2">
              <Label className="font-medium">Addresses</Label>
              <Select disabled>
                <SelectTrigger className="w-full">
                  <SelectValue placeholder="Sitio number required." />
                </SelectTrigger>
                <SelectContent>
                  <SelectItem value="none">None</SelectItem>
                  <SelectItem value="sitio-1">Sitio 1</SelectItem>
                  <SelectItem value="sitio-2">Sitio 2</SelectItem>
                </SelectContent>
              </Select>
            </div>
            <div className="space-y-2 col-span-2">
              <Label className="font-medium">Full Address</Label>
              <Input
                type="text"
                defaultValue="Test Address"
                placeholder="Write your name"
                className="border rounded-lg"
                disabled
              />
            </div>
            <div></div>
          </div>
        </form>
      </div>
    </div>
  )
}

