"use client"

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
import { Camera, RefreshCcw, SwitchCamera } from "lucide-react";
import { FaceRecognitionWebCam } from "@/components/gform_clone/face_recognition";

export default function StaffRegistration() {
    return (
        <Fragment>
            <FormGroup>
                <HeaderContainerBackground>
                    <ContainerHeaderText>
                        Face Recognition
                    </ContainerHeaderText>
                    <FormParagraph>
                        Final step a head before we proceed to authorization process.
                    </FormParagraph>
                </HeaderContainerBackground>
                <ContainerBackground>
                    {/* <StaffRegisterActualForm /> */}
                    <FaceRecognitionWebCam />
                </ContainerBackground>
                <div className="flex items-end justify-end space-x-2">
                    <Button variant="outline">
                        <SwitchCamera /> Switch
                    </Button>
                    <Button variant="outline">
                        <RefreshCcw /> Retake Image
                    </Button>
                    <Button type="submit">
                        <Camera /> Capture
                    </Button>
                </div>
            </FormGroup>
        </Fragment>
    );
}
