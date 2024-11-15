<!-- // STANDARD (DON'T MAKE ANY CHANGES) -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, user! - Brgy Sta. Lucia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <link href="../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../../dist/images/favicon.ico" type="image/x-icon">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Onboarding as Super Admin for Brgy. Management">
    <meta property="og:description" content="Still in development phase.">
    <meta property="og:image" content="URL_to_your_image.jpg">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Onboarding as Super Admin for Brgy. Management">
    <meta name="twitter:description" content="Still in development phase.">
    <meta name="twitter:image" content="URL_to_your_image.jpg">
    <meta name="twitter:url" content="https://yourwebsite.com">
</head>

<body>
    <div id="app">
        <header class="header">

        </header>

        <div class="main-content">
            <div class="welcome-message">
                <h2 class="text-danger">Authorization Request / Process</h2>
                <p>This contains streamline processing of incoming request made by Brgy. Staffs inside online portal.</p>
            </div>

            <div class="auth-tab-container">
                <div class="auth-divide">
                    <aside class="notifications-container" style="max-height: 320px; overflow-y: auto;">
                        <!-- Client Side operation starts here -->
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h2>Login Attempts (0 unread)</h2>
                            </div>
                            <button type="button" class="btn btn-danger">
                                <i class="fa-solid fa-rotate-right"></i> Reload
                            </button>
                        </div>
                        <!-- per rounded notifs data -->
                        <div class="mt-3 rounded d-flex flex-column" style="border: 1px solid #d9d9d9; padding: 16px;">
                            <section id="notifications-tab">
                                <span class="text-decoration-underline">#0001 - Someone is attempting to login!</span>
                                <p class="text-secondary">A new-user login attempt made from Barangay Public Safety Office (BPSO)</p>
                            </section>
                            <div class="">
                                <button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#detailsModal">View details</button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#declineRequest">Decline Request</button>
                            </div>
                        </div>

                        <div class="mt-3 rounded d-flex flex-column" style="border: 1px solid #d9d9d9; padding: 16px;">
                            <section id="notifications-tab">
                                <span class="text-decoration-underline">#0001 - Someone is attempting to login!</span>
                                <p class="text-secondary">A new-user login attempt made from Barangay Public Safety Office (BPSO)</p>
                            </section>
                            <div class="">
                                <button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#detailsModal">View details</button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#declineRequest">Decline Request</button>
                            </div>
                        </div>
                        <!-- no notif found -->
                        <div class="mt-3 rounded d-flex text-center flex-column" style="color: #c4c4c4; padding: 12px;">
                            <p class="m-0">Your notifications will appear here.</p>
                        </div>
                    </aside>

                </div>
            </div>

        </div>

        <!-- View Per Notification Details -->
        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsModalLabel">View Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Content -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Brgy. Staff's Image Capture</label>
                            <img src="https://i1.sndcdn.com/artworks-000133617614-ywuyai-t500x500.jpg" alt="Brgy. Staff Face Capture" class="img-fluid w-100 rounded object-fit-cover" style="height: 300px; object-position: center;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Brgy. Staff's Email Address</label>
                            <span class="d-block">johndoe@email.com</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Brgy. Staff's First Name</label>
                            <span class="d-block">John</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Brgy. Staff's Last Name</label>
                            <span class="d-block">Doe</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Brgy. Staff's Office</label>
                            <span class="d-block">Barangay Public Safety Office</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Date Issued</label>
                            <span class="d-block">14/11/2024, 02:30 PM (GMT+8)</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmButton" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#successModal">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Modal to grant new user -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-check-circle fa-3x text-success"></i>
                        <h5 class="mt-2">New User Access Granted.</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decline Request Modal -->
        <div class="modal fade" id="declineRequest" tabindex="-1" aria-labelledby="declineRequestLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered here -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="declineRequestLabel">Confirm Action</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure to decline this request? This action can be repeated immdiately.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDeclineForm" data-bs-dismiss="modal">Proceed</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sign Out Confirmation Modal -->
        <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered here -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signOutModalLabel">Confirm Sign Out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to sign out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmSignOutBtn" data-bs-dismiss="modal">Sign
                            Out</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="../diff-sidebar.js" type="module"></script>
    <script src="">

    </script>
</body>

</html>