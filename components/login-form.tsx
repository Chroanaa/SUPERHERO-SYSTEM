"use client"

import { cn } from "@/lib/utils";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from "@/components/ui/alert-dialog";
import { useState, useEffect } from 'react';
import { useRouter } from "next/navigation";
import axios from "axios";

export function LoginForm({
  className,
  ...props
}: React.ComponentPropsWithoutRef<"form">) {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState<string | null>(null);
  const [success, setSuccess] = useState(false);

  const router = useRouter();

  useEffect(() => {
    // Check if user is already logged in
    const isLoggedIn = localStorage.getItem('isLoggedIn');
    if (isLoggedIn === 'true') {
      router.replace('/onboardings/head_admin/main');
    }
  }, [router]);

  const handleSubmit = async (event: React.FormEvent) => {
    event.preventDefault();

    if (email === "" || password === "") {
      setError("Please fill in both email and password.");
      setTimeout(() => setError(null), 3000);
      return;
    }

    try {
      // Debug: Log the environment URL
      console.log("Fetching accounts from:", process.env.NEXT_PUBLIC_BRGY_STAFF_ACCOUNTS);

      const accountsResponse = await axios.get(
        process.env.NEXT_PUBLIC_BRGY_STAFF_ACCOUNTS as string
      );

      const accounts = accountsResponse.data.bms_account_staffs;
      console.log("Fetched accounts data:", accounts);

      const matchingAccount = accounts.find((account: any) => {
        return (
          account.brgy_email === email &&
          account.brgy_password === password &&
          account.brgy_account_id
        );
      });


      if (!matchingAccount) {
        setError("Invalid email or password.");
        setTimeout(() => setError(null), 3000);
        return;
      }

      // Set success state for login form
      setSuccess(true);

      // Proceed to log the login attempt
      await axios.post(
        process.env.NEXT_PUBLIC_BRGY_STAFF_LOGIN_ATTEMPTS as string,
        {
          brgy_account_id: matchingAccount.brgy_account_id,
        },
        {
          headers: {
            "Content-Type": "application/json",
          },
        }
      );

      // Redirect on successful login
      router.push("/onboardings/head_admin/main");

      // Set login state in localStorage
      localStorage.setItem('isLoggedIn', 'true');
      router.replace("/onboardings/head_admin/main");
      
    } catch (error) {
      console.error("Error during login:", error);
      setError("Something went wrong. Please try again later.");
    }
  };

  return (
    <form className={cn("flex flex-col gap-6", className)} {...props} onSubmit={handleSubmit}>
      {/* Success Message */}
      {success && (
        <div className="w-full bg-green-500 p-4 text-white rounded-lg text-center">
          Success! Wait for authentication...
        </div>
      )}

      {/* Error Message */}
      {error && (
        <div className="w-full bg-red-500 p-4 text-white rounded-lg text-center">
          {error}
        </div>
      )}

      <div className="flex flex-col items-center gap-2 text-center">
        <h1 className="text-2xl font-bold">Login to your account</h1>
        <p className="text-balance text-sm text-muted-foreground">
          Enter your email below to login to your account
        </p>
      </div>
      <div className="grid gap-6">
        <div className="grid gap-2">
          <Label htmlFor="email">Email</Label>
          <Input
            id="email"
            type="email"
            placeholder="m@example.com"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
          />
        </div>
        <div className="grid gap-2">
          <div className="flex items-center">
            <Label htmlFor="password">Password</Label>
            <a
              href="#"
              className="ml-auto text-sm underline-offset-4 hover:underline"
            >
              Forgot your password?
            </a>
          </div>
          <Input
            id="password"
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
          />
        </div>
        {email === "" || password === "" ? (
          <AlertDialog>
            <AlertDialogTrigger asChild>
              <Button type="submit">Login</Button>
            </AlertDialogTrigger>
            <AlertDialogContent>
              <AlertDialogHeader>
                <AlertDialogTitle>Please fill in all fields!</AlertDialogTitle>
                <AlertDialogDescription>
                  Both email and password are required to login.
                </AlertDialogDescription>
              </AlertDialogHeader>
              <AlertDialogFooter>
                <AlertDialogAction>Close</AlertDialogAction>
              </AlertDialogFooter>
            </AlertDialogContent>
          </AlertDialog>
        ) : <Button type="submit">Login</Button>}
      </div>
      <div className="text-center text-sm">
        Don't have an account?{" "}
        <a href="#" className="underline underline-offset-4">
          Sign up
        </a>
      </div>
    </form>
  );
}