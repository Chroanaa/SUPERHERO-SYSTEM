import * as React from "react"

import { cn } from "@/lib/utils"

// Change background if you like

const BackgroundForm = React.forwardRef<
    HTMLDivElement,
    React.HTMLAttributes<HTMLDivElement>
>(({className, ...props}, ref) => (
    <div
      ref={ref}
      className={cn(
       "bg-gray-200 min-h-screen p-4",
       className
      )}
      {...props}
    />
))
BackgroundForm.displayName = "BackgroundForm"

// This already sets by default unless if you hate their `container`

const MarginSpaceForm = React.forwardRef<
    HTMLDivElement,
    React.HTMLAttributes<HTMLDivElement>
>(({className, ...props}, ref) => (
    <div
      ref={ref}
      className={cn(
       "lg:container mx-auto flex items-center justify-center",
       className
      )}
      {...props}
    />
))
MarginSpaceForm.displayName = "MarginSpaceForm"

// Container spacing

const FormGroup = React.forwardRef<
    HTMLDivElement,
    React.HTMLAttributes<HTMLDivElement>
>(({className, ...props}, ref) => (
    <div
      ref={ref}
      className={cn(
       "flex flex-col space-y-4",
       className
      )}
      {...props}
    />
))
FormGroup.displayName = "FormGroup"

// Actual paragraph (Form Body)

const FormParagraph = React.forwardRef<
    HTMLParagraphElement,
    React.HTMLAttributes<HTMLParagraphElement>
>(({className, ...props}, ref) => (
    <p
      ref={ref}
      className={cn(
        "antialiased text-sm break-words w-full",
        className
      )}
      {...props}
    />
))

FormParagraph.displayName = "FormParagraph";

export { BackgroundForm, MarginSpaceForm, FormGroup, FormParagraph }