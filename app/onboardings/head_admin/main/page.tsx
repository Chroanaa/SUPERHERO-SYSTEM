"use client";

import { useState, useEffect } from "react";
import { Button } from "@/components/ui/button";
import {
  Card,
  CardBanner,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import Image from "next/image";
import { Progress } from "@/components/ui/progress"
import { useRouter } from "next/navigation";

// Static data all the way (I could consider strapi next time for production hihi)..
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
      { label: "Explore", variant: "default" },
    ],
  },
];

export default function Page() {
  const [isLoading, setIsLoading] = useState(true);
  const [progress, setProgress] = useState(33);
  const router = useRouter();

  useEffect(() => {
    // Check if user is logged in
    const isLoggedIn = localStorage.getItem('isLoggedIn');
    if (isLoggedIn !== 'true') {
      router.replace('/');
      return;
    }

    const timer = setTimeout(() => {
      setProgress(80);
      setTimeout(() => {
        setIsLoading(false);
      }, 500);
    }, 1000);

    return () => clearTimeout(timer);
  }, []);

  return ( 
    <section className="px-8">
      {isLoading ? (
        <div className="flex justify-center items-center h-screen">
          <Progress value={progress} className="w-[60%]" />
        </div>
      ) : (
        <>
          <aside className="mt-4 mb-8 space-y-2">
            <span className="font-medium">Greetings, Head Admin!</span>
            <div className="font-bold text-3xl">
              Good Morning / Magandang Umaga!
            </div>
          </aside>
          <div className="font-medium text-gray-400 mb-6">
            As a head administrator here's your responsibilities...
          </div>
          <aside className="grid md:grid-cols-2 sm:grid-cols-1 gap-4 pb-6">
            {cardData.map((card) => (
              <Card key={card.id}>
                <CardBanner>
                  <Image
                    src={card.imageSrc}
                    width={1920}
                    height={1080}
                    alt={card.imageAlt}
                    className="h-full object-cover select-none pointer-events-none"
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
        </>
      )}
    </section>
  );
}