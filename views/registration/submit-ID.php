<?php
session_start();
require_once '../../controllers/db_connection.php'; // Ensure this path is correct for your setup

// Define a directory to store uploaded images
$uploadDir = 'tmp/'; // Adjust the path if needed

// Initialize a success message variable
$successMessage = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];

    // Check if the upload was successful
    if ($image['error'] === UPLOAD_ERR_OK) {
        // Validate the image type (you can extend this validation)
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (in_array($image['type'], $allowedTypes)) {
            // Create a unique filename to avoid overwriting
            $fileName = uniqid() . '-' . basename($image['name']);
            $targetFilePath = $uploadDir . $fileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($image['tmp_name'], $targetFilePath)) {
                $successMessage = "Image uploaded successfully: $fileName";
                // Redirect to the next step (submit-selfie.php)
                echo "<script>window.location.href = 'submit-selfie.php';</script>";
                exit; // Ensure no further processing occurs
            } else {
                $successMessage = "Failed to move uploaded file.";
            }
        } else {
            $successMessage = "Invalid file type. Only JPG and PNG are allowed.";
        }
    } else {
        $successMessage = "Error uploading file: " . $image['error'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Validation - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../../../custom/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
    <!-- applicable for deployment -->
    <meta property="og:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Portal Registration - Brgy Sta. Lucia">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
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
            object-position: top;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div id="app">
        <section id="login-container" class="d-flex align-items-center justify-content-center vh-100">
            <div class="login-wrapper">
                <div class="login-header">
                    <h1 class="text-dark">Submit your Government issued ID</h1>
                    <p class="text-muted">For compliance and our first validation.</p>
                </div>
                <form id="image-form" method="POST" action="submit-ID.php" enctype="multipart/form-data">
                    <div class="image-input mb-4">
                        <label for="image-input" class="btn btn-secondary">Upload Image (ID)</label>
                        <input type="file" id="image-input" name="image" accept="image/*" capture="environment"
                            style="display: none;" onchange="previewImage(this)">
                        <img id="image-preview" src="#" alt="Image Preview">
                    </div>

                    <button type="submit" class="btn btn-danger w-100 mb-3" id="submit-button" disabled>
                        Submit
                    </button>

                    <!-- Show success or error message -->
                    <?php if ($successMessage): ?>
                        <div class="alert alert-info"><?= htmlspecialchars($successMessage) ?></div>
                    <?php endif; ?>

                    <!-- Loading Modal -->
                    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;" role="status">
                                        <span class="sr-only"></span>
                                    </div>
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
        document.getElementById('image-form').onsubmit = function(event) {
            event.preventDefault(); // Prevent default form submission

            // Show the loading modal
            const loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
            loadingModal.show();

            // Wait for the modal to display before redirecting
            setTimeout(() => {
                // Submit the form after showing the modal
                this.submit(); // Use this to submit the form programmatically
            }, 2000); // Adjust the time (2000 ms = 2 seconds) as needed
        };

        function previewImage(input) {
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.getElementById('image-preview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';

                // Enable the submit button once an image is selected
                document.getElementById('submit-button').disabled = false;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>