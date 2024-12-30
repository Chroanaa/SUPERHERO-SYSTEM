"use client"

import { FormGroup, FormParagraph } from "@/components/gform_clone/content_form";
import {
    HeaderContainerBackground,
    ContainerHeaderText,
    ContainerBackground
} from "@/components/gform_clone/header_form";
import { Fragment } from "react";
import { Button, buttonVariants } from "@/components/ui/button";
import { Camera, RefreshCcw, SwitchCamera } from "lucide-react";
import { FaceRecognitionWebCam } from "@/components/gform_clone/face_recognition";
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/components/ui/dialog"
import { Label } from "@/components/ui/label";
import { Input } from "@/components/ui/input";
import { useCallback, useEffect, useState } from 'react'
import Link from "next/link";

type MediaDeviceInfoType = {
    deviceId: string;
    label: string;
    kind: string;
};

export default function StaffRegistration() {
    const [deviceId, setDeviceId] = useState<string | undefined>();
    const [devices, setDevices] = useState<MediaDeviceInfoType[]>([]);
    const [hasCameraPermission, setHasCameraPermission] = useState(true);
    const [isCameraAvailable, setIsCameraAvailable] = useState(true);

    // Function to handle devices
    const handleDevices = useCallback((mediaDevices: MediaDeviceInfo[]) => {
        const videoDevices = mediaDevices.filter(({ kind }) => kind === "videoinput");
        const isFirefox = navigator.userAgent.toLowerCase().includes('firefox');

        setDevices(
            videoDevices.map((device, index) => {
                let label = device.label || `Device ${index + 1}`;

                // Fallback for Firefox if label is missing or too generic
                if (isFirefox && label === `Device ${index + 1}`) {
                    label = `Webcam ${index + 1}`;
                }

                return {
                    deviceId: device.deviceId,
                    label,
                    kind: device.kind,
                };
            })
        );
    }, []);

    // Fetch available devices
    useEffect(() => {
        navigator.mediaDevices.enumerateDevices().then(handleDevices);
    }, [handleDevices]);

    // Check for camera access permissions using getUserMedia API
    const checkCameraPermissions = useCallback(async () => {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            const videoTrack = stream.getVideoTracks()[0];
            if (videoTrack) {
                setIsCameraAvailable(true);
                setHasCameraPermission(true);
                stream.getTracks().forEach(track => track.stop());
            }
        } catch (err) {
            const error = err as Error; // type assertion checks
            if (error.name === "NotAllowedError") {
                setHasCameraPermission(false);
            } else {
                setIsCameraAvailable(false);
            }
        }
    }, []);

    useEffect(() => {
        checkCameraPermissions();
    }, [checkCameraPermissions]);

    return (
        <Fragment>
            <FormGroup>
                <HeaderContainerBackground>
                    <ContainerHeaderText>
                        Face Recognition
                    </ContainerHeaderText>
                    <FormParagraph>
                        Final step ahead before we proceed to the authorization process.
                    </FormParagraph>
                </HeaderContainerBackground>
                <ContainerBackground>
                    <FaceRecognitionWebCam deviceId={deviceId} />
                </ContainerBackground>
                <Dialog>
                    <div className="flex items-end justify-end space-x-2">
                        <DialogTrigger asChild>
                            <Button variant="outline" disabled={!isCameraAvailable || !hasCameraPermission}>
                                <SwitchCamera /> Switch
                            </Button>
                        </DialogTrigger>
                        <Button variant="outline" disabled={!isCameraAvailable || !hasCameraPermission}>
                            <RefreshCcw /> Retake Image
                        </Button>
                        <Button type="submit" disabled={!isCameraAvailable || !hasCameraPermission}>
                            <Camera /> Capture
                        </Button>
                    </div>
                    <DialogContent className="max-w-[540px]">
                        <DialogHeader>
                            <DialogTitle className="font-bold tracking-tight text-2xl">
                                Detected Cameras
                            </DialogTitle>
                            <DialogDescription>
                                Please specify your favorite camera given by our automated detection.
                            </DialogDescription>
                        </DialogHeader>
                        <div className="grid gap-4 py-2">
                            {devices.map((device, index) => (
                                <Button
                                    variant="default"
                                    key={device.deviceId}
                                    onClick={() => setDeviceId(device.deviceId)}
                                >
                                    {device.label || `Device ${index + 1}`}
                                </Button>
                            ))}
                        </div>
                        <DialogFooter className="sm:justify-start">
                            <DialogDescription>
                                Please make sure that you use the default or first camera in order to detect
                                other cameras as well.
                                <Link
                                    href="https://imgur.com/gallery/tutorial-bms-sta-lucia-archive-s199nzz"
                                    target="_blank"
                                    className={`${buttonVariants({ variant: "link" })} px-0 py-0 ms-2`}
                                >
                                    Learn More
                                </Link>
                            </DialogDescription>
                        </DialogFooter>
                    </DialogContent>
                </Dialog>
            </FormGroup>
        </Fragment>
    );
}
