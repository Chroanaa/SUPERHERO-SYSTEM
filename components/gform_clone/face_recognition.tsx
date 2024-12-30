import Webcam from "react-webcam";
import { cn } from "@/lib/utils";
import { useCallback, useEffect, useState, useRef } from "react";

/* 
 * Learn more about camera handling APIs
 *
 * Camera and Microphone Permissions = https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
 * 
 * */

type FaceRecognitionWebCamProps = React.ComponentPropsWithoutRef<"div"> & {
  deviceId?: string;
};

export function FaceRecognitionWebCam({
  className,
  deviceId,
  ...props
}: FaceRecognitionWebCamProps) {
  const webcamRef = useRef<Webcam>(null);
  const [cameraError, setCameraError] = useState(false);
  const [hasCameraPermission, setHasCameraPermission] = useState(true);
  const [isCameraAvailable, setIsCameraAvailable] = useState(true);

  const videoConstraints = {
    width: 640,
    height: 400,
    deviceId: deviceId || undefined,
  };

  // Capture a screenshot
  const capture = useCallback(() => {
    const imageSrc = webcamRef.current?.getScreenshot();
    return imageSrc;
  }, [webcamRef]);

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
        setCameraError(true);
      }
  }, []);

  useEffect(() => {
    checkCameraPermissions();
  }, [checkCameraPermissions]);

  return (
    <div className={cn("w-full rounded-md overflow-hidden", className)} {...props}>
      {!hasCameraPermission ? (
        <div className="text-center text-red-600">
          <p>You need to enable your camera!</p>
        </div>
      ) : !isCameraAvailable ? (
        <div className="text-center text-red-600">
          <p>Camera not available. Please check your device or camera settings.</p>
        </div>
      ) : cameraError ? (
        <div className="text-center text-red-600">
          <p>There was an issue accessing your camera. Please try again.</p>
        </div>
      ) : (
        <Webcam
          audio={false}
          ref={webcamRef}
          screenshotFormat="image/png"
          videoConstraints={videoConstraints}
          mirrored
        />
      )}
    </div>
  );
}