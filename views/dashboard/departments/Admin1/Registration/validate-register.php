<?php
// Receive raw POST data (Base64 encoded image)
$imageData = file_get_contents("php://input");

// Check if data is not empty
if (!empty($imageData)) {
    // Remove the Base64 encoding prefix (data:image/png;base64,)
    $imageData = explode(",", $imageData)[1];

    // Decode the Base64 image
    $decodedImage = base64_decode($imageData);

    // Set the file name and upload directory
    $fileName = "captured_image_" . time() . ".png";
    $uploadDir = "uploads/";

    // Ensure the uploads directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Save the image to a file in the uploads directory
    $filePath = $uploadDir . $fileName;
    if (file_put_contents($filePath, $decodedImage)) {
        // Return a success message
        echo "Image saved successfully: " . $filePath;
    } else {
        // Return an error if the image couldn't be saved
        echo "Failed to save image.";
    }
} 
// else {
//     echo "No image data received.";
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Recognition</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .camera-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px auto;
        }

        video,
        canvas {
            border: 2px solid #ccc;
            border-radius: 10px;
            max-width: 100%;
        }

        .button-container {
            margin-top: 15px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-confirm {
            background-color: #007bff;
            color: white;
        }

        .btn-retake {
            background-color: #ffc107;
            color: black;
        }
    </style>
</head>

<body>
    <div class="camera-container">
        <h2>Face Recognition</h2>
        <p>For compliances and for our last validation.</p>
        <video id="video" autoplay></video>
        <canvas id="canvas" style="display: none;"></canvas>
        <div class="button-container">
            <button id="captureButton" class="btn-confirm">Capture Image</button>
            <button id="retakeButton" class="btn-retake" style="display: none;">Retake Image</button>
            <button id="submitButton" class="btn-confirm" style="display: none;" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm Capture</button>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Submission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit this captured image?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="confirmSubmitButton" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureButton = document.getElementById('captureButton');
        const retakeButton = document.getElementById('retakeButton');
        const submitButton = document.getElementById('submitButton');
        const confirmSubmitButton = document.getElementById('confirmSubmitButton');
        const context = canvas.getContext('2d');

        // Get access to the webcam
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then((stream) => {
                video.srcObject = stream;
            })
            .catch((err) => {
                console.error("Error accessing the camera: ", err);
            });

        // Event listener for Capture Image button
        captureButton.addEventListener('click', () => {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            video.style.display = 'none';
            canvas.style.display = 'block';
            captureButton.style.display = 'none';
            retakeButton.style.display = 'inline-block';
            submitButton.style.display = 'inline-block';
        });

        // Event listener for Retake Image button
        retakeButton.addEventListener('click', () => {
            video.style.display = 'block';
            canvas.style.display = 'none';
            captureButton.style.display = 'inline-block';
            retakeButton.style.display = 'none';
            submitButton.style.display = 'none';
        });

        confirmSubmitButton.addEventListener('click', () => {
            const imageData = canvas.toDataURL('image/png'); // Convert canvas image to Base64

            fetch('validate-register.php', {
                    method: 'POST',
                    body: imageData, // Send the raw Base64 image data directly
                    headers: {
                        'Content-Type': 'application/json', // Keep the content type as JSON since we're sending a Base64 string
                    },
                })
                .then((response) => response.text()) // Expecting plain text response from the server
                .then((data) => {
                    if (data.includes("Image saved successfully")) {
                        // If the image was saved successfully, redirect to success.php
                        window.location.href = "success.php";
                    } else {
                        alert("Error: " + data); // Show the error message from the server
                    }
                })
                .catch((error) => console.error('Error:', error));
        });
    </script>
</body>

</html>