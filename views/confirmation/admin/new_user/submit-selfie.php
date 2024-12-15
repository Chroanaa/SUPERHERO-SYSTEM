<?php
// Set the target directory
$targetDir = "tmp/"; // Adjust the path if necessary

// Check if the directory exists, if not, create it
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// Check if the file is uploaded
if (isset($_FILES['selfie'])) {
    $fileName = basename($_FILES['selfie']['name']); // Get the original file name
    $filePath = $targetDir . $fileName; // Full path where the file will be saved

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['selfie']['tmp_name'], $filePath)) {
        // Success message
        echo json_encode(["status" => "success", "message" => "File uploaded successfully."]);
    } else {
        // Error handling
        echo json_encode(["status" => "error", "message" => "There was an error uploading the file."]);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Face Recognition - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../../../custom/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <style>
        .image-input {
            margin-top: 20px;
        }

        .image-input label {
            width: 100%;
        }

        #image-preview {
            display: none;
            margin-top: 10px;
            width: 100%;
            height: 300px;
            object-fit: cover;
            object-position: middle;
            border: 1px solid #ccc;
        }

        canvas {
            display: none;
            width: 100%;
            max-height: 300px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        #video {
            display: block;
            width: 100%;
            height: 300px;
            border: 2px solid #ccc;
        }
    </style>
</head>

<body>
    <div id="app">
        <section id="login-container" class="d-flex align-items-center justify-content-center vh-100">
            <div class="login-wrapper">
                <div class="login-header">
                    <h1 class="text-dark">Face Recognition</h1>
                    <p class="text-muted">For compliances and for our second validation.</p>
                </div>
                <form id="image-form" method="POST" action="submit-selfie.php" enctype="multipart/form-data">
                    <div class="image-input mb-4">
                        <canvas id="canvas"></canvas>
                        <video id="video" autoplay></video> <!-- Live video feed -->
                        <button type="button" class="btn btn-secondary mt-2 w-100" id="capture-button"
                            data-bs-toggle="modal" data-bs-target="#captureModal">Capture Image</button>
                        <img id="image-preview" src="#" alt="Image Preview" style="display: none;">
                    </div>

                    <button type="button" class="btn btn-danger w-100 mb-3" id="submit-button" disabled>
                        Submit
                    </button>

                    <!-- Loading Modal -->
                    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body d-flex justify-content-center align-items-center"
                                    style="height: 200px;">
                                    <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;"
                                        role="status">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Capture Image Modal -->
                    <div class="modal fade" id="captureModal" tabindex="-1" aria-labelledby="captureModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="captureModalLabel">Captured Image</h5>
                                </div>
                                <div class="modal-body">
                                    <canvas id="canvas-display"></canvas>
                                    <img id="image-preview-modal" src="#" alt="Image Preview"
                                        style="display: none; margin-top: 10px; width: 100%; border: 2px solid #28a745;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="confirm-button">Confirm Capture</button>
                                    <button type="button" class="btn btn-warning" id="retake-button">Retake Image</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        // Get elements
        const canvas = document.getElementById('canvas');
        const imagePreview = document.getElementById('image-preview');
        const imagePreviewModal = document.getElementById('image-preview-modal');
        const submitButton = document.getElementById('submit-button');
        const captureButton = document.getElementById('capture-button');
        const confirmButton = document.getElementById('confirm-button');
        const retakeButton = document.getElementById('retake-button');
        const video = document.getElementById('video');

        // Access the user's camera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
                video.play();
                video.onloadedmetadata = () => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                };
            })
            .catch(err => {
                console.error("Error accessing the camera: ", err);
            });

        // Capture the image when button is clicked
        captureButton.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height); // Draw video frame to canvas

            // Show the captured image in the modal
            const imageData = canvas.toDataURL('image/png');
            imagePreviewModal.src = imageData;
            imagePreviewModal.style.display = 'block'; // Display image preview in modal

            // Hide video and show the modal
            video.style.display = 'none'; // Hide video
        });

        // Confirm capture and enable submit button
        confirmButton.addEventListener('click', () => {
            const imageData = canvas.toDataURL('image/png');
            imagePreview.src = imageData; // Show the captured image in the main form preview
            imagePreview.style.display = 'block'; // Show the main image preview
            submitButton.disabled = false; // Enable the submit button
            const captureModal = bootstrap.Modal.getInstance(document.getElementById('captureModal'));
            captureModal.hide(); // Hide the capture modal
        });

        // Retake button functionality
        retakeButton.addEventListener('click', () => {
            // Show video again
            video.style.display = 'block'; // Show video again
            
            // Clear previous captures
            imagePreview.src = ''; // Clear the main image preview
            imagePreview.style.display = 'none'; // Hide the main image preview
            imagePreviewModal.src = ''; // Clear the modal image preview
            imagePreviewModal.style.display = 'none'; // Hide the modal image preview
            
            const captureModal = bootstrap.Modal.getInstance(document.getElementById('captureModal'));
            captureModal.hide(); // Hide the capture modal
        });

        // Handle submit button click
        submitButton.addEventListener('click', () => {
            const imageData = canvas.toDataURL('image/png');

            // Convert the data URL to a blob
            fetch(imageData)
                .then(res => res.blob())
                .then(blob => {
                    // Create a FormData object to send the image as file
                    const formData = new FormData();
                    const fileName = `selfie-${Date.now()}.png`; // Generate a file name
                    formData.append('selfie', blob, fileName);

                    // Send the image data to the server
                    const loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
                    loadingModal.show(); // Show loading modal

                    fetch('submit-selfie.php', { // Adjust to your backend handler
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        loadingModal.hide(); // Hide loading modal
                        if (response.ok) {
                            alert('Image submitted successfully!');

                            // Redirect after 3 seconds
                            setTimeout(() => {
                                window.location.href = 'validation-request.php'; // Redirect to validation request page
                            }, 3000); // 3000 milliseconds = 3 seconds
                        } else {
                            alert('Image submission failed.');
                        }
                    })
                    .catch(error => {
                        loadingModal.hide(); // Hide loading modal
                        console.error('Error during submission:', error);
                    });
                });
        });
    </script>
</body>

</html>
