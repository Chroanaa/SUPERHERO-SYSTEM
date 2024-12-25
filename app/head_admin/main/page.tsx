"use client"

import { Button } from "@/components/ui/button"
import {
  Card,
  CardBanner,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card"
import Image from "next/image"

// Static data all the way..
const cardData = [
  {
    id: 1,
    title: "Handle accounts",
    description: "As an administrator, the account management is crucial for those who are new users in this system.",
    imageSrc: "/assets/cards/handle-accounts-hero.png",
    imageAlt: "Card 1",
    actions: [
      { label: "Learn More", variant: "outline" },
      { label: "Account Management", variant: "default" },
    ],
  },
  {
    id: 2,
    title: "Activity Logs",
    description: "As an administrator, any forms of user activities is being recorded a head of time you may wanted to explore it.",
    imageSrc: "/assets/cards/activity-log-hero.png",
    imageAlt: "Card 2",
    actions: [
      { label: "Learn More", variant: "outline" },
      { label: "Transactions", variant: "default" },
    ],
  },
  {
    id: 3,
    title: "Case Records",
    description: "All of those pending, unresolved and forwarded cases from BPSO, LUPON, BADAC and BCPC / VAWC here are visible.",
    imageSrc: "/assets/cards/case-records.png",
    imageAlt: "Card 3",
    actions: [
      { label: "Learn More", variant: "outline" },
      { label: "Get Started", variant: "default" },
    ],
  },
]

export default function Page() {
  return (
    <section className="px-8">
      <aside className="mt-4 mb-8 space-y-2">
        <span className="font-medium">Greetings, Head Admin!</span>
        <div className="font-bold text-3xl">
          Good Morning / Magandang Umaga!
        </div>
      </aside>
      <div className="font-medium text-gray-400 mb-6">
        As a head administrator here's your responsibilities...
      </div>
      <aside className="grid grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 pb-6">
        {cardData.map((card) => (
          <Card key={card.id}>
            <CardBanner>
              <Image
                src={card.imageSrc}
                width={1920}
                height={1080}
                alt={card.imageAlt}
                className="h-full object-cover"
              />
            </CardBanner>
            <CardHeader>
              <CardTitle className="text-xl">{card.title}</CardTitle>
              <CardDescription>{card.description}</CardDescription>
            </CardHeader>
            <CardFooter className="flex justify-between">
              {card.actions.map((action, index) => (
                <Button key={index} variant={action.variant}>
                  {action.label}
                </Button>
              ))}
            </CardFooter>
          </Card>
        ))}
      </aside>
    </section>
  )
}
