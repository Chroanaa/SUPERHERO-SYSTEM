import { RegisterForm } from "@/components/register-form"

export default function RegistrationPage() {
  return (
    <div className="flex min-h-screen flex-col items-center justify-between p-6 md:p-10">
      <div className="flex-1" />
      <div className="w-full max-w-md">
        <RegisterForm />
      </div>
      <div className="flex-1 flex flex-col justify-end">
        <div className="text-center text-sm mt-6">
          This portal is only for staffs and employees in Brgy. Sta Lucia.
        </div>
      </div>
    </div>
  )
}