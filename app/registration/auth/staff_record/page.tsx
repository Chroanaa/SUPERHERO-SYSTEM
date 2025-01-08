import { FormGroup, FormParagraph } from "@/components/gform_clone/content_form";
import {
    HeaderContainerBackground,
    ContainerHeaderText,
    HeaderColorHighlight,
    ContainerBackground
} from "@/components/gform_clone/header_form";
import { Fragment } from "react";
import { StaffRegisterActualForm } from "@/components/gform_clone/actual_form";
import { Button } from "@/components/ui/button";
import { RefreshCcw } from "lucide-react";

export default function StaffRegistration() {
    return (
        <Fragment>
            <FormGroup>
                <HeaderContainerBackground>
                    <ContainerHeaderText>
                        Please fill out form
                    </ContainerHeaderText>
                    <FormParagraph>
                        Please fill out form for simultaneously registration of providing your personal information.
                    </FormParagraph>
                </HeaderContainerBackground>
                <ContainerBackground>
                    <StaffRegisterActualForm />
                </ContainerBackground>
                <div className="flex items-end justify-end space-x-2">
                    <Button variant="outline">
                        <RefreshCcw /> Clear
                    </Button>
                    <Button type="submit">
                        Proceed
                    </Button>
                </div>
            </FormGroup>
        </Fragment>
    );
}
