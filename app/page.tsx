import { Building } from "lucide-react"
import { LoginForm } from "@/components/login-form"
import Image from "next/image"

export default function LoginPage() {
  return (
    <div className="grid min-h-svh lg:grid-cols-2">
      <div className="flex flex-col gap-4 p-6 md:p-10">
        <div className="flex justify-center gap-2 md:justify-start">
          <a href="#" className="flex items-center gap-2 font-medium">
            <div className="flex h-6 w-6 items-center justify-center rounded-md bg-primary text-primary-foreground">
              <Building className="size-4" />
            </div>
            Brgy. Sta Lucia
          </a>
        </div>
        <div className="flex flex-1 items-center justify-center">
          <div className="w-full max-w-xs">
            <LoginForm />
          </div>
        </div>
        <div className="flex justify-center gap-2 text-sm">
          This portal is only for staffs and employees in Brgy. Sta Lucia.
        </div>
      </div>
      <div className="relative hidden bg-muted lg:block">
        <Image
          src="/assets/login-banner.jpg"
          alt="Image"
          width={1920}
          height={1080}
          className="absolute inset-0 h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
        />
      </div>
    </div>
  )
}
