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
                    <h1 class="text-dark">Submit your Authorization Letter</h1>
                    <p class="text-muted">For compliances and for our third validation.</p>
                </div>
                <form id="image-form" method="POST" action="">
                    <div class="image-input mb-4">
                        <label for="image-input" class="btn btn-secondary">Upload Document (PDF, DOCX)</label>
                        <input type="file" id="image-input" name="image" accept=".pdf, .docx" style="display: none;" onchange="validateFile(this)">
                        <img id="image-preview" src="#" alt="Image Preview">
                    </div>

                    <button type="submit" class="btn btn-danger w-100 mb-3" id="submit-button" disabled>
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
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- show test user creds ^^ -->
        <div class="principal-author">
            <a href="https://mail.google.com/" class="btn btn-link" target="_blank">
                Open your Gmail
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        function validateFile(input) {
            const file = input.files[0];
            const allowedExtensions = /(\.pdf|\.docx)$/i;

            // Check if file is selected
            if (!file) {
                alert("Please select a file.");
                return;
            }

            // Validate file type
            if (!allowedExtensions.exec(file.name)) {
                alert("Invalid file type. Please upload a PDF or DOCX file.");
                input.value = ''; // Clear the input
                document.getElementById('submit-button').disabled = true; // Disable submit button
                return;
            }

            // Enable the submit button if the file is valid
            document.getElementById('submit-button').disabled = false;
        }
    </script>
</body>

</html>
