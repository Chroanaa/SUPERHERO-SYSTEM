import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Megaphone, ShieldPlus } from "lucide-react";
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from "@/components/ui/carousel"
import StaLuciaSlider from "./CarouselMedia";

function LandingPage() {
  return (
    <div className="lg:container lg:mx-auto p-6">
      <div className="flex items-center justify-center flex-col space-y-4 selection:bg-card-foreground selection:text-white dark:selection:bg-card-foreground dark:selection:text-black">
        <div id="staLucia-mainpage" className="space-x-2">
          <Badge>
            <Megaphone /> Announcement
          </Badge>
          <Badge variant="outline">
            <ShieldPlus /> Peace & Order
          </Badge>
        </div>

        <div className="text-center space-y-2 max-w-[768px] break-words">
          <h1 className="text-4xl tracking-tighter font-bold leading-relaxed">
            A quick lazy fox dog jump out on the rope.
          </h1>
          <p className="">
            Hinding-hindi na ako bibitaw Ngayong ikaw na ang kasayaw Kung mayro'n mang kulay ang aking nagsisilbing tanglaw Ikaw, ikaw ay dilaw
          </p>
        </div>
        <div className="flex items-center space-x-2">
          <Button>Explore</Button>
          <Button variant="outline">Read More</Button>
        </div>

        {/* carousel slides hehe */}
        <StaLuciaSlider />

        {/* about us */}

        <div
          id="about-us"
          className="relative w-full h-[540px] overflow-hidden"
        >
          <div className="absolute inset-0 before:absolute before:top-0 before:left-1/2 before:translate-x-[-50%] before:w-[540px] before:h-full before:bg-[url('./brgystalucia-kapitan.png')] before:bg-center before:bg-no-repeat before:bg-cover before:content-['']" />

          <div className="flex items-center justify-between flex-row h-full">
            <div className="relative z-10 text-card-foreground p-8">
              <h2 className="text-4xl font-bold">About Us</h2>
              <p className="mt-4 text-lg">
                Welcome to Barangay Sta. Lucia – your community, your voice.
              </p>
            </div>
            <div className="relative z-10 text-card-foreground p-8">
              <h2 className="text-4xl font-bold">About Us</h2>
              <p className="mt-4 text-lg">
                Welcome to Barangay Sta. Lucia – your community, your voice.
              </p>
            </div>

          </div>
        </div>

      </div>
    </div>
  )
}

export default LandingPage;
