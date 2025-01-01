import { BackgroundForm, MarginSpaceForm } from "@/components/gform_clone/content_form";
import type { Metadata } from "next";

export const metadata: Metadata = {
    title: "Fill up this form! - Brgy. Sta Lucia Portal",
    description: "Generated and empowered by Next app",
};

export default function StaffRegistrationLayout({
    children,
}: Readonly<{
    children: React.ReactNode;
}>) {
    return (
        <BackgroundForm>
            <MarginSpaceForm>
                {children}
            </MarginSpaceForm>
        </BackgroundForm>
    );
}
