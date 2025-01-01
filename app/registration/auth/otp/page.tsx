import { VerifyOTPForm } from "@/components/registration/otp-verify";

export default function VerifyOTPPage() {
  return (
    <div className="flex min-h-screen flex-col items-center justify-center p-6 md:p-10">
      <div className="w-full max-w-md">
        <VerifyOTPForm />
      </div>
    </div>
  )
}