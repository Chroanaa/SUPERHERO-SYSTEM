"use client"

import { Fragment } from "react";
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { PhoneInput } from "@/components/registration/phone-input";
import { useState } from "react";

export function AddNewStaff() {
      const [phoneNumber, setPhoneNumber] = useState("");
    return (
        <Fragment>
            <form className="w-full space-y-6">
                <aside className="flex items-start justify-between">
                    <div className="">
                        <span className="font-medium">Email address</span>
                        <p className="text-sm text-muted-foreground">Provide the email address.</p>
                    </div>
                    <div id="last-row">
                        <Input type="email" placeholder="Email address" className="w-[640px]" />
                    </div>
                </aside>
                <aside className="flex items-start justify-between">
                    <div className="">
                        <span className="font-medium">Phone Number</span>
                        <p className="text-sm text-muted-foreground">Provide the phone number.</p>
                    </div>
                    <div id="last-row">
                        <PhoneInput
                            value={phoneNumber}
                            onChange={setPhoneNumber}
                            international
                            defaultCountry="PH"
                            className="w-[640px]"
                        />
                    </div>
                </aside>
                <aside className="flex items-start justify-between">
                    <div className="">
                        <span className="font-medium">First Name</span>
                        <p className="text-sm text-muted-foreground">Provide the first name.</p>
                    </div>
                    <div id="last-row">
                        <Input type="text" placeholder="First Name" className="w-[640px]" />
                    </div>
                </aside>
                <aside className="flex items-start justify-between">
                    <div className="">
                        <span className="font-medium">Middle Name (optional)</span>
                        <p className="text-sm text-muted-foreground">Provide the middle name.</p>
                    </div>
                    <div id="last-row">
                        <Input type="text" placeholder="Middle Name" className="w-[640px]" />
                    </div>
                </aside>
                <aside className="flex items-start justify-between">
                    <div className="">
                        <span className="font-medium">Last Name</span>
                        <p className="text-sm text-muted-foreground">Provide the last name.</p>
                    </div>
                    <div id="last-row">
                        <Input type="text" placeholder="Last Name" className="w-[640px]" />
                    </div>
                </aside>
                <aside className="flex items-start justify-between">
                    <div className="">
                        <span className="font-medium">Password</span>
                        <p className="text-sm text-muted-foreground">Provide the initial password.</p>
                    </div>
                    <div id="last-row">
                        <Input type="password" placeholder="Password" className="w-[640px]" />
                    </div>
                </aside>
            </form>
        </Fragment>
    )
}