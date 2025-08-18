import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { MoveUpRight, Megaphone, ShieldPlus } from "lucide-react";

import StaLuciaSlider from "./CarouselMedia";

/** about us test data **/

const aboutUsItems = [
  {
    id: 1,
    image: "https://barangaypoblacionpateros.com/wp-content/uploads/2025/01/barngay.jpg",
    title: "Our Community",
    description:
      "Building stronger connections and fostering growth within our vibrant community through collaborative initiatives and shared experiences.",
  },

]

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
          className="relative w-full xs:h-[320px] lg:h-[540px] overflow-hidden"
        >
          <div className="grid grid-cols-1 gap-4 h-full">
            {aboutUsItems.map((item, index) => (
              <div
                key={item.id}
                className={`relative overflow-hidden rounded-2xl border ${index === 0 ? "row-span-1 lg:row-span-2" : ""}`}
              >
                {/* Background Image */}
                <img
                  src={item.image || "/placeholder.svg"}
                  alt={item.title}
                  className="absolute inset-0 w-full h-full object-cover"
                />
                {/* Linear Gradient Overlay */}
                <div className="absolute inset-0 bg-gradient-to-t from-black/100 via-black/60 to-transparent dark:from-black/100 dark:via-black/60" />
                {/* Bottom Left Text */}
                <div className="absolute bottom-0 left-0 p-8 text-white max-w-2xl leading-loose">
                  <h3 className="font-bold xs:text-2xl lg:text-4xl mb-2 tracking-tighter">{item.title}</h3>
                  <p className="xs:text-sm lg:text-md text-gray-200 leading-relaxed line-clamp-3">{item.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* services */}
        <div id="services">
          <div className="max-w-5xl">
            <h1 className="font-bold text-4xl leading-relaxed tracking-tighter text-center my-8">Services we provide</h1>
            <div className="grid xs:grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 relative">
              <div className="border p-6 rounded-xl space-y-4">
                <h3 className="font-semibold text-lg mb-2">Brgy. Clearance</h3>
                <p className="text-sm text-muted-foreground break-words">
                  An official document issued by the Barangay Office that certifies a resident's good
                  standing and absence of any legal or administrative issues within the community.
                </p>
                <Button>
                  Proceed <MoveUpRight />
                </Button>
              </div>
              <div className="border p-6 rounded-xl space-y-4">
                <h3 className="font-semibold text-lg mb-2">Cedula</h3>
                <p className="text-sm text-muted-foreground break-words">
                  A Cedula, or Community Tax Certificate (CTC), is an official document issued to individuals or businesses upon payment of the community tax.
                </p>
                <Button>
                  Proceed <MoveUpRight />
                </Button>
              </div>
              <div className="border p-6 rounded-xl space-y-4">
                <h3 className="font-semibold text-lg mb-2">Brgy. Complaint</h3>
                <p className="text-sm text-muted-foreground break-words">
                  A formal report of a dispute or issue within the community, handled by the Barangay and also LUPON Tagapamayapa. It aims to resolve conflicts peacefully before involving higher authorities.
                </p>
                <Button>
                  Proceed <MoveUpRight />
                </Button>
              </div>
              <div className="border p-6 rounded-xl space-y-4">
                <h3 className="font-semibold text-lg mb-2">Other Services</h3>
                <p className="text-sm text-muted-foreground break-words">
                  Other related services you may wanted to proceed here.
                </p>
                <Button>
                  Proceed <MoveUpRight />
                </Button>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  )
}

export default LandingPage;
