import Webcam from 'react-webcam'
import { cn } from "@/lib/utils"
import { useCallback, useRef, useState } from 'react'

const videoConstraints = {
    width: 640,
    height: 400
}

const FACING_MODE_USER = "user";
const FACING_MODE_ENVIRONMENT = "environment";

export function FaceRecognitionWebCam({
    className,
    ...props
}: React.ComponentPropsWithoutRef<"div">) {
    const webcamRef = useRef<Webcam>(null);
    const [facingMode, setFacingMode] = useState(FACING_MODE_USER);

    // Call this function to take a screenshot
    const capture = useCallback(() => {
        const imageSrc = webcamRef.current?.getScreenshot()
        return imageSrc
    }, [webcamRef])

    const handleClick = useCallback(() => {
        setFacingMode(
          prevState =>
            prevState === FACING_MODE_USER
              ? FACING_MODE_ENVIRONMENT
              : FACING_MODE_USER
        );
    }, []);

    return (
        <div className={cn("w-full rounded-md overflow-hidden", className)} {...props}>
            <Webcam
                audio={false}
                ref={webcamRef}
                screenshotFormat="image/png"
                videoConstraints={videoConstraints}
                mirrored
            />
        </div>
    )
}