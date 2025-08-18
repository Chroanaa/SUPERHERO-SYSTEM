import { HoverCard, HoverCardContent, HoverCardTrigger } from "@/components/ui/hover-card"
import { Progress } from "@/components/ui/progress"
import { Tooltip, TooltipContent, TooltipTrigger, TooltipProvider } from "@/components/ui/tooltip"
import { Bar, BarChart, XAxis, YAxis, LabelList } from "recharts"
import { ChartContainer, ChartTooltip, ChartTooltipContent } from "@/components/ui/chart"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/default-tabs"
import { TrendingUp, Tag, TrendingDown, BadgeCheck, Users, BadgeAlert, CircleDot, Search, PanelsTopLeft, Star, ChevronLeft, ChevronRight, Shield } from "lucide-react"
import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { useNavigate } from "react-router-dom"
import { Checkbox } from "@/components/ui/checkbox"

const chartData = [
  { casetypes: "Theft / Robbery", cases: 16 },
  { casetypes: "Drug Use", cases: 8 },
  { casetypes: "Child Abuse", cases: 6 },
  { casetypes: "Harassment", cases: 4 },
]

const chartData2 = [
  { document: "Business Permit", request: 16 },
  { document: "Complaints", request: 12 },
  { document: "Indigency", request: 10 },
  { document: "Brgy. Clearance", request: 8 },
]

const chartConfig = {
  cases: {
    label: "Related Cases",
    color: "var(--chart-6)",
  },
}

const chartConfig2 = {
  request: {
    label: "Requests",
    color: "var(--chart-1)",
  },
}

// Make a custom component in the case of aligning textLabel
const CustomYAxisTick = ({ x, y, payload }) => {
  return (
    <g transform={`translate(0, ${y})`}>
      <text x={0} y={0} textAnchor="start">
        {payload.value}
      </text>
    </g>
  );
};

export default function Overview() {
  const navigate = useNavigate();

  return (
    <div id="overview-page">
      <div className="flex items-start justify-start flex-col gap-6 px-6">
        <div id="user-profile" className="max-w-2xl space-y-2 break-words">
          <h1 className="tracking-tighter font-medium text-3xl">Greetings, Admin user!</h1>
          <p className="leading-6 text-md text-muted-foreground">
            Efficiently manage clerical records, complaints and other necessary things with ease.
          </p>
        </div>
        <div id="grid-selectors" className="w-full mb-6">
          <div className="grid grid-cols-12 gap-4">
            <div className="col-span-7 border rounded-2xl bg-card h-fit p-4">
              <div className="grid grid-cols-4 gap-2">
                <TooltipProvider>
                  <HoverCard>
                    <HoverCardTrigger className="dark:bg-neutral-900 border rounded-xl p-4 flex flex-col ">
                      <h1 className="text-xl font-bold">0</h1>
                      <p className="text-sm">Residents</p>
                    </HoverCardTrigger>
                    <HoverCardContent
                      align="start"
                      alignOffset={0}
                      sideOffset={8}
                      className="w-64 z-50"
                      avoidCollisions={true}
                    >
                      <div id="addresses">
                        <label className="text-md mb-2 tracking-tighter font-medium block">Mostly from</label>
                        <Tooltip id="first-top">
                          <h1 className="text-sm">Sitio 4</h1>
                          <TooltipTrigger className="w-full my-2">
                            <Progress value={66} className="w-full" />
                          </TooltipTrigger>
                          <TooltipContent>
                            <p>66% gathered via profiles</p>
                          </TooltipContent>
                        </Tooltip>
                        <Tooltip id="second">
                          <h1 className="text-sm">Sitio 2</h1>
                          <TooltipTrigger className="w-full my-2">
                            <Progress value={66} className="w-full" />
                          </TooltipTrigger>
                          <TooltipContent className="">
                            <p>66% gathered via profiles</p>
                          </TooltipContent>
                        </Tooltip>
                        <Tooltip id="third">
                          <h1 className="text-sm">Sitio 3</h1>
                          <TooltipTrigger className="w-full my-2">
                            <Progress value={66} className="w-full" />
                          </TooltipTrigger>
                          <TooltipContent>
                            <p>66% gathered via profiles</p>
                          </TooltipContent>
                        </Tooltip>
                      </div>
                    </HoverCardContent>
                  </HoverCard>
                </TooltipProvider>
                <TooltipProvider>
                  <HoverCard>
                    <HoverCardTrigger className="dark:bg-neutral-900 border rounded-xl p-4 flex flex-col ">
                      <h1 className="text-xl font-bold">0</h1>
                      <p className="text-sm">Recorded Cases</p>
                    </HoverCardTrigger>
                    <HoverCardContent
                      align="start"
                      alignOffset={0}
                      sideOffset={8}
                      className="w-90 z-50"
                      avoidCollisions={true}
                    >
                      <div id="addresses">
                        <label className="text-md mb-2 tracking-tighter font-medium block">Cases from</label>
                        <Tooltip id="first-top">
                          <h1 className="text-sm">Peace and Safety Office (BPSO)</h1>
                          <TooltipTrigger className="w-full">
                            <Progress value={66} className="w-full my-2" />
                          </TooltipTrigger>
                          <TooltipContent>
                            <p>66 recorded cases</p>
                          </TooltipContent>
                        </Tooltip>
                        <Tooltip id="second">
                          <h1 className="text-sm">Anti-Drug Abuse Council (BADAC)</h1>
                          <TooltipTrigger className="w-full">
                            <Progress value={24} className="w-full my-2" />
                          </TooltipTrigger>
                          <TooltipContent>
                            <p>24 recorded cases</p>
                          </TooltipContent>
                        </Tooltip>
                        <Tooltip id="third">
                          <h1 className="text-sm">Council for the Protection of Children (BCPC)</h1>
                          <TooltipTrigger className="w-full">
                            <Progress value={6} className="w-full my-2" />
                          </TooltipTrigger>
                          <TooltipContent>
                            <p>6 recorded cases</p>
                          </TooltipContent>
                        </Tooltip>
                      </div>
                    </HoverCardContent>
                  </HoverCard>
                </TooltipProvider>
              </div>
              {/* Chart section */}
              <Tabs defaultValue="resolved-cases" className="w-full mt-4">
                <TabsList>
                  <TabsTrigger value="resolved-cases">Resolved Cases</TabsTrigger>
                  <TabsTrigger value="clerical-record">Most Requests</TabsTrigger>
                </TabsList>
                <TabsContent value="resolved-cases">
                  <h1 className="font-semibold leading-8">Top Resolved Cases (This Month)</h1>
                  <ChartContainer config={chartConfig} className="aspect-auto h-[150px]">
                    <BarChart
                      accessibilityLayer
                      data={chartData}
                      layout="vertical"

                    >
                      <XAxis
                        type="number"
                        dataKey="cases"
                        hide
                        domain={[0, 80]}
                      />
                      <YAxis
                        dataKey="casetypes"
                        type="category"
                        tickLine={false}
                        tickMargin={10}
                        axisLine={false}
                        width={100}
                        tick={<CustomYAxisTick />}
                      />
                      <ChartTooltip
                        cursor={false}
                        content={
                          <ChartTooltipContent hideLabel className="w-48" />
                        }
                      />
                      <Bar dataKey="cases" fill={chartConfig.cases.color} radius={5}>
                        <LabelList
                          dataKey="cases"
                          position="right"
                          offset={8}
                          className="fill-foreground"
                          fontSize={12}
                        />
                      </Bar>
                      {/* Updated fill color */}
                    </BarChart>
                  </ChartContainer>
                  <div className="mt-1.5 flex flex-col items-start gap-2 text-sm">
                    <div className="flex gap-2 leading-none font-medium">
                      Margin of error: 2.4% <TrendingDown className="h-4 w-4" />
                    </div>
                    <div className="text-muted-foreground leading-none">
                      See Cases for more information.
                    </div>
                  </div>
                </TabsContent>
                <TabsContent value="clerical-record">
                  <h1 className="font-semibold leading-8">Top Requested Documents (This Month)</h1>
                  <ChartContainer config={chartConfig2} className="aspect-auto h-[150px]">
                    <BarChart
                      accessibilityLayer
                      data={chartData2}
                      layout="vertical"
                    >
                      <XAxis
                        type="number"
                        dataKey="request"
                        hide
                        domain={[0, 80]}
                      />
                      <YAxis
                        dataKey="document"
                        type="category"
                        tickLine={false}
                        tickMargin={10}
                        axisLine={false}
                        width={100}
                        tick={<CustomYAxisTick />}
                      />
                      <ChartTooltip
                        cursor={false}
                        content={
                          <ChartTooltipContent hideLabel className="w-48" />
                        }
                      />
                      <Bar dataKey="request" fill={chartConfig2.request.color} radius={5}>
                        <LabelList
                          dataKey="request"
                          position="right"
                          offset={8}
                          className="fill-foreground"
                          fontSize={12}
                        />
                      </Bar>
                      {/* Updated fill color */}
                    </BarChart>
                  </ChartContainer>
                  <div className="mt-1.5 flex flex-col items-start gap-2 text-sm">
                    <div className="flex gap-2 leading-none font-medium">
                      Margin of error: 0% <TrendingUp className="h-4 w-4" />
                    </div>
                    <div className="text-muted-foreground leading-none">
                      See Clerical Records for more information.
                    </div>
                  </div>

                </TabsContent>
              </Tabs>
            </div>
            <div className="relative col-span-5 border bg-card rounded-2xl p-4">
              <h1 className="font-medium text-2xl tracking-tighter my-1.5">Activity</h1>
              <p className="text-sm text-muted-foreground">All activity logs from all users.</p>
              <div className="space-y-2">
                <div className="flex flex-row gap-3 mt-4">
                  <Avatar className="size-10">
                    <AvatarImage src="https://github.com/shadcn.png" />
                    <AvatarFallback>CN</AvatarFallback>
                  </Avatar>
                  <div className="flex flex-col text-xs gap-1">
                    <div className="inline-flex items-center flex-row gap-2">
                      <span className="font-medium underline">Shadcn Simonyan</span>
                      <Badge variant="secondary" className="rounded-full">Clerical</Badge>
                      <Badge className="bg-chart-2 rounded-full">
                        <BadgeAlert /> Unverified
                      </Badge>
                    </div>
                    <p className="text-muted-foreground">Initiated requested document for&nbsp;
                      <span
                        onClick={() => navigate('/some-path')}
                        className="cursor-pointer underline text-primary font-medium"
                      >
                        1336645290
                      </span>&nbsp;
                      at 11:29 AM, July 31, 2025
                    </p>
                  </div>
                </div>
                <div className="flex flex-row gap-3 mt-4">
                  <Avatar className="size-10">
                    <AvatarImage src="https://github.com/shadcn.png" />
                    <AvatarFallback>CN</AvatarFallback>
                  </Avatar>
                  <div className="flex flex-col text-xs gap-1">
                    <div className="inline-flex items-center flex-row gap-2">
                      <span className="font-medium underline">Shadcn Simonyan</span>
                      <Badge variant="secondary" className="rounded-full">Clerical</Badge>
                      <Badge className="bg-chart-2 rounded-full">
                        <BadgeAlert /> Unverified
                      </Badge>
                    </div>
                    <p className="text-muted-foreground">Initiated requested document for&nbsp;
                      <span
                        onClick={() => navigate('/some-path')}
                        className="cursor-pointer underline text-primary font-medium"
                      >
                        1336645290
                      </span>&nbsp;
                      at 11:29 AM, July 31, 2025
                    </p>
                  </div>
                </div>
              </div>
              <Button className="absolute bottom-4 right-4">View All</Button>
            </div>
            <div className="col-span-4 border rounded-2xl overflow-hidden text-card-foreground">
              <div id="art-bg" className="relative p-4 pb-0 pointer-events-none select-none">
                <div id="drawing-art" className="border dark:border-green-400/40 rounded-lg p-4 space-y-2">
                  <div className="w-full border dark:border-green-400/40 bg-secondary/40 rounded-lg text-muted-foreground dark:text-green-400 text-sm p-2 px-4 relative">
                    <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-green-400 size-4" />
                    <span className="pl-5">Invite someone by email.</span>
                  </div>
                  <div className="border dark:border-green-400/40 w-full rounded-lg p-2 text-sm px-3 flex flex-row items-center gap-2">
                    <CircleDot className="size-4 stroke-green-400" />
                    <p className="text-muted-foreground dark:text-green-400">artme.sakamoto@proton.me</p>
                    <Badge variant="outline">Chairman</Badge>
                  </div>
                  <div className="border dark:border-green-400/40 w-full rounded-lg p-2 text-sm px-3 flex flex-row items-center gap-2">
                    <CircleDot className="size-4 stroke-green-400" />
                    {/*
                    <Avatar className="size-6">
                      <AvatarImage src="https://github.com/shadcn.png" />
                      <AvatarFallback>CN</AvatarFallback>
                    </Avatar>
                    */}
                    <p className="text-muted-foreground dark:text-green-400">brgystalucia@unofficial.gmail</p>
                    <Badge variant="outline">Secretary</Badge>
                  </div>
                </div>
                {/* Gradient Overlay for Bottom */}
                <div className="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-card to-transparent pointer-events-none" />
                {/* Gradient Overlay for Right Side */}
                <div className="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-card to-transparent pointer-events-none" />
              </div>
              <div id="label-card" className="bg-card w-full p-4">
                <span className="text-lg font-medium block leading-10">Role Based Access</span>
                <p className="text-muted-foreground text-sm">Ensure security compliance by inviting authorized personnels inside management.</p>
              </div>
            </div>
            <div className="col-span-4 border rounded-2xl overflow-hidden text-card-foreground">
              <div id="art-bg" className="relative p-4 pb-0 pointer-events-none select-none">
                <div id="drawing-art">
                  <div id="art-bg" className="border dark:border-green-400/40 rounded-lg">
                    <div id="gmail-tab" className="border-b p-3.5 pb-0 flex items-center gap-2">
                      <div id="tab" className="relative flex items-center flex-row gap-2 mb-2 mr-4 after:absolute after:-bottom-2 after:left-0 after:w-full after:h-[2px] after:bg-green-400 after:content-['']">
                        <PanelsTopLeft className="size-4" />
                        <span className="text-sm">Primary</span>
                      </div>
                      <div id="tab" className="flex items-center flex-row gap-2 mb-2 mr-4">
                        <Tag className="size-4" />
                        <span className="text-sm">Promotions</span>
                      </div>
                      <div id="tab" className="flex items-center flex-row gap-2 mb-2 mr-4">
                        <Users className="size-4" />
                        <span className="text-sm">Socials</span>
                      </div>
                    </div>
                    <div id="emails">
                      <div id="email-div" className="border-b py-2.5 pl-4 w-full flex items-center justify-start gap-4">
                        <Checkbox />
                        <Star className="size-4 dark:text-green-400" />
                        <span className="text-sm max-w-md truncate font-semibold">Brgy. Sta Lucia</span>
                        <span className="text-sm max-w-[160px] truncate font-semibold">Filed Complaint - Regarding sa ano...</span>
                      </div>
                      <div id="email-div" className="border-b py-2.5 pl-4 w-full flex items-center justify-start gap-4">
                        <Checkbox />
                        <Star className="size-4 dark:text-green-400" />
                        <span className="text-sm max-w-md truncate">Brgy. Sta Lucia</span>
                        <span className="text-sm max-w-[160px] truncate">RE: Cedula - Paki-claim na lang</span>
                      </div>
                      <div id="email-div" className="border-b py-2.5 pl-4 w-full flex items-center justify-start gap-4">
                        <Checkbox />
                        <Star className="size-4 dark:text-green-400" />
                        <span className="text-sm max-w-md truncate">Brgy. Sta Lucia</span>
                        <span className="text-sm max-w-[160px] truncate">RE: Indigency - Pa-verify ng profile...</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-card to-transparent pointer-events-none" />
                <div className="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-card to-transparent pointer-events-none" />

              </div>
              <div className="bg-card w-full p-4">
                <span className="text-lg font-medium block leading-10">Streamline Communicating</span>
                <p className="text-muted-foreground text-sm">Ensuring email to email basis can enhance searching for registered residents.</p>
              </div>
            </div>
            <div className="col-span-4 border rounded-2xl overflow-hidden text-card-foreground">
              <div id="art-bg" className="relative p-4 pb-0 pointer-events-none select-none">
                <div id="drawing-art">
                  <div id="art-bg" className="border rounded-lg">
                    <div id="bar" className="border-b p-4 flex items-center gap-4">
                      <div id="safari" className="flex gap-2">
                        <div id="circle" className="size-3 bg-green-400 rounded-full" />
                        <div id="circle" className="size-3 bg-green-400 rounded-full" />
                        <div id="circle" className="size-3 bg-green-400 rounded-full" />
                      </div>
                      <PanelsTopLeft className="size-4 stroke-muted-foreground" />
                      <div className="flex gap-1.5">
                        <ChevronLeft className="size-4 stroke-muted-foreground" />
                        <ChevronRight className="size-4 stroke-muted-foreground" />
                      </div>
                      <Shield className="size-4 stroke-muted-foreground" />
                    </div>
                    <div id="content-body" className="flex items-center justify-center w-full p-[1.35rem]">
                      <div className="flex-grow border-b border-dashed border-muted-foreground/40" />
                      <div className="border rounded-full p-6 bg-card">
                        <Users className="size-6 dark:stroke-green-400" />
                      </div>
                      <div className="flex-grow border-b border-dashed border-muted-foreground/40" />
                    </div>
                  </div>
                </div>

                <div className="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-card to-transparent pointer-events-none" />
                <div className="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-card to-transparent pointer-events-none" />

              </div>
              <div className="bg-card w-full p-4">
                <span className="text-lg font-medium block leading-10">Efficiency</span>
                <p className="text-muted-foreground text-sm">Ensuring essential features such as resident profiling, complaints, and analytics will prevail usability.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div >
  )
}
