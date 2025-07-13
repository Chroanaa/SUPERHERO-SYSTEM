import { useState, useEffect } from "react";
import { Card, CardContent } from "@/components/ui/card"
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from "@/components/ui/carousel"
import { Progress } from "@/components/ui/progress"

export default function StaLuciaSlider() {
  const [api, setApi] = useState()
  const [current, setCurrent] = useState(0)
  const [count, setCount] = useState(0)

  useEffect(() => {
    if (!api) {
      return
    }

    setCount(api.scrollSnapList().length)
    setCurrent(api.selectedScrollSnap() + 1)

    api.on("select", () => {
      setCurrent(api.selectedScrollSnap() + 1)
    })
  }, [api])

  const progressValue = (current / count) * 100

  return (
    <div className="w-full max-w-5xl mx-auto">
      <Carousel setApi={setApi} className="w-full">
        <CarouselContent>
          {Array.from({ length: 5 }).map((_, index) => {
            const testData = [
              {
                title: "What a lazy dog",
                description: "A quick paragraph random content by the way ako ay isang batman so what if maging akin ka hahahahah joke lang i love you!",
                image: "https://barangaypoblacionpateros.com/wp-content/uploads/2025/01/barngay.jpg",
              },
              {
                title: "Beautiful Sunset",
                description: "Amazing colors painting the evening sky with warmth....",
                image: "https://barangaypoblacionpateros.com/wp-content/uploads/2025/01/barngay.jpg",
              },
              {
                title: "Mountain Adventure",
                description: "Exploring the peaks and valleys of nature's wonder....",
                image: "https://barangaypoblacionpateros.com/wp-content/uploads/2025/01/barngay.jpg",

              },
              {
                title: "Ocean Waves",
                description: "The rhythmic dance of water against the shore....",
                image: "https://barangaypoblacionpateros.com/wp-content/uploads/2025/01/barngay.jpg",

              },
              {
                title: "City Lights",
                description: "Urban landscape glowing in the darkness of night....",
                image: "https://barangaypoblacionpateros.com/wp-content/uploads/2025/01/barngay.jpg",
              },
            ]

            const item = testData[index]

            return (
              <CarouselItem key={index}>
                <Card className="border rounded-2xl overflow-hidden pl-0 py-0">
                  <CardContent className="relative xs:h-64 lg:h-90">
                    {/* Background Image */}
                    <img
                      src={item.image}
                      alt={item.title}
                      className="absolute inset-0 w-full h-full object-cover"
                    />

                    {/* Linear Gradient Overlay */}
                    <div className="absolute inset-0 bg-gradient-to-t from-black/100 via-black/60 to-transparent dark:from-black/100 dark:via-black/60" />

                    {/* Bottom Left Text */}
                    <div className="absolute bottom-0 left-0 p-6 text-white">
                      <h3 className="font-bold xs:text-2xl lg:text-4xl mb-2 tracking-tighter">{item.title}</h3>
                      <p className="xs:text-sm lg:text-md text-gray-200 leading-relaxed xs:max-w-[240px] sm:max-w-sm lg:max-w-2xl truncate break-words">{item.description}</p>
                    </div>
                  </CardContent>
                </Card>
              </CarouselItem>
            )
          })}
        </CarouselContent>

        {/* Navigation and Progress Container */}
        <div className="flex items-center justify-between mt-4 px-2">
          {/* Navigation Arrows */}
          <div className="flex items-center gap-2">
            <CarouselPrevious className="static translate-y-0 h-8 w-8" />
            <CarouselNext className="static translate-y-0 h-8 w-8" />
          </div>

          {/* Progress Bar */}
          <div className="flex-1 max-w-24 ml-4">
            <Progress value={progressValue} className="h-2" />
          </div>
        </div>
      </Carousel>

    </div>
  )
}
