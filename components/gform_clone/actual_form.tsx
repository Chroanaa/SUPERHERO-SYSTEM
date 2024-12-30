import { cn } from "@/lib/utils"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select"
import { z } from "zod"
import { Paperclip } from 'lucide-react'

export function StaffRegisterActualForm({
    className,
    ...props
}: React.ComponentPropsWithoutRef<"div">) {
    return (
        <div className={cn("w-full", className)} {...props}>
            <div className="space-y-3">
                <div id="input-field" className="space-y-2">
                    <Label htmlFor="firstName">First Name</Label>
                    <Input
                        id="firstName"
                        type="text"
                        placeholder="Enter details.."
                        required
                    />
                </div>
                <div id="input-field" className="space-y-2">
                    <Label htmlFor="middleName">Middle Name (type N/A if none)</Label>
                    <Input
                        id="middleName"
                        type="text"
                        placeholder="Enter details.."
                        required
                    />
                </div>
                <div id="input-field" className="space-y-2">
                    <Label htmlFor="lastName">Last Name</Label>
                    <Input
                        id="lastName"
                        type="text"
                        placeholder="Enter details.."
                        required
                    />
                </div>
                <div id="input-field" className="space-y-2">
                    <Label htmlFor="lastName">Password</Label>
                    <Input
                        id="lastName"
                        type="password"
                        placeholder="Enter details.."
                        required
                    />
                </div>
                <div id="input-field" className="space-y-2">
                    <div className="space-y-2">
                        <Label htmlFor="lastName">Confirm Password</Label>
                        <Input
                            id="lastName"
                            type="password"
                            placeholder="Enter details.."
                            required
                        />
                    </div>
                    <div className="space-y-2">
                        <Label
                            htmlFor="confirmPassword"
                            id="passwordValidator"
                            className="text-red-500"
                        >
                            Passwords do not match.
                        </Label>
                    </div>
                </div>
                <div id="input-field" className="space-y-2">
                    <Label htmlFor="lastName">Affiliated Department</Label>
                    <Select>
                        <SelectTrigger className="w-full">
                            <SelectValue placeholder="Please specify your workplace..." />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="admin1">Clerical - Administrator 1</SelectItem>
                            <SelectItem value="admin2">Secretary & Treasurer - Administrator 2</SelectItem>
                            <SelectItem value="bpso">Brgy. Public Safety Officer (BPSO)</SelectItem>
                            <SelectItem value="badac">Brgy. Anti Drug Abuse Council (BADAC)</SelectItem>
                            <SelectItem value="bcpc">Brgy. Council for the Protection of Children (VAWC)</SelectItem>
                            <SelectItem value="lupon">LUPON Tagapamayapa</SelectItem>
                        </SelectContent>
                    </Select>
                </div>
                <div className="space-y-2">
                    <Label htmlFor="picture">Submit your Government-issued ID (Picture)</Label>
                    <div className="relative">
                        <Input
                            id="picture"
                            type="file"
                            accept="image/*"
                            className="cursor-pointer"
                        />
                        <Paperclip className="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground h-4 w-4" />
                    </div>
                </div>
            </div>
        </div>
    )
}