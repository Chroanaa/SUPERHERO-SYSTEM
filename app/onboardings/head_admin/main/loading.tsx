import { Progress } from "@/components/ui/progress"

export default function Loading() {
    return (
        <div className="flex justify-center items-center h-screen">
            <Progress value={88} className="w-[60%]" />
        </div>
    )
}