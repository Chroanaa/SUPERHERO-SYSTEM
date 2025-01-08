import * as React from "react"

import { cn } from "@/lib/utils"

const HeaderColorHighlight = React.forwardRef<
    HTMLDivElement,
    React.HTMLAttributes<HTMLDivElement>
>(({className, ...props}, ref) => (
    <div
      ref={ref}
      className={cn(
       "bg-black w-full h-2 absolute top-0 left-0",
       className
      )}
      {...props}
    />
))
HeaderColorHighlight.displayName = "HeaderColorHighlight"

const HeaderContainerBackground = React.forwardRef<
    HTMLDivElement,
    React.HTMLAttributes<HTMLDivElement> & {children?: React.ReactNode}
>(({className, children, ...props}, ref) => (
    <div
      ref={ref}
      className={cn(
        "bg-white p-5 rounded-md border border-gray-300 relative overflow-hidden md:w-[640px]",
        className
      )}
      {...props}
    >
      <HeaderColorHighlight className="h-2" />
      <div className="mt-3 flex items-start flex-col">
        {children}
      </div>
    </div>
));

HeaderContainerBackground.displayName = "HeaderContainerBackground";

const ContainerHeaderText = React.forwardRef<
    HTMLSpanElement,
    React.HTMLAttributes<HTMLSpanElement>
>(({className, ...props}, ref) => (
    <span
      ref={ref}
      className={cn(
       "font-bold tracking-tight antialiased sm:text-xl md:text-2xl mb-2",
       className
      )}
      {...props}
    />
))
ContainerHeaderText.displayName = "ContainerHeaderText";

// This is for whole body field forms

const ContainerBackground = React.forwardRef<
    HTMLDivElement,
    React.HTMLAttributes<HTMLDivElement> & {children?: React.ReactNode}
>(({className, children, ...props}, ref) => (
    <div
      ref={ref}
      className={cn(
        "bg-white p-5 rounded-md border border-gray-300 relative overflow-hidden w-[calc(100%-0rem)] md:w-[640px]"
      )}
      {...props}
    >
      <div className="flex items-start flex-col">
        {children}
      </div>
    </div>
));

ContainerBackground.displayName = "ContainerBackground";

export { HeaderContainerBackground, ContainerHeaderText, 
HeaderColorHighlight, ContainerBackground }