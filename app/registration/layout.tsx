import type { Metadata } from "next";

export const metadata: Metadata = {
    title: "Registration - Brgy. Sta Lucia Portal",
    description: "Generated and empowered by Next app",
};

export default function RegistrationLayout({
    children,
}: Readonly<{
    children: React.ReactNode;
}>) {
    return (
        <main id="sta-lucia-container">
            {children}
        </main>
    );
}
