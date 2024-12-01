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
    <link href="../../../../../../../custom/css/index.css" rel="stylesheet">
    <link rel="icon" href="../../dist/images/favicon.ico" type="image/x-icon">
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
    <style>
        .record-item {
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .record-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .record-item.selected {
            background-color: #007bff;
            color: white;
        }
        .record-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div id="app">
        <header class="header">
            
        </header>

        <div class="main-content">
            <div class="welcome-message">
                <h2 class="text-danger">View Approval Process</h2>
                <p>This contains the streamlined processing made by other departments.</p>
            </div>

            <div class="view-approval-action d-flex justify-content-end align-items-center" style="gap: 5px">
                <div class="sort>
                    <label for="">Sort by:</label>
                    <input type="text">
                </div>
                <div class="search">
                    <label for="">Search:</label>
                    <input type="text">
                </div>
            </div>
            <div class="view-approval-page shadow  bg-light rounded-3 py-5 px-4 container-fluid mt-2">
                <div class="view-approval-header d-flex justify-content-between align-items-center">
                    <h5>Approved Request (0 Unread)</h5>
                    <button class="btn text-light" style="background-color: #FF5D5D;">Reload</button>
                </div>
                <div class="view-approval-body border mt-3">
                    <div class="view-approval-body-title">
                        <div class="view-approval-body-header d-flex justify-content-between align-items-center px-3 pt-4">
                                <h5>0001 - Drug Testing</h5>
                                <p>11/27/20024  &nbsp; 7:40 PM</p>
                        </div>
                        <div class="view-approval-body-content px-3 pb-3">
                            <p>Requested by BADAC staff John Santos.</p>
                            <button type="button" 
                                    class="btn text-light" 
                                    style="background-color: #FF5D5D"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewDetails">See Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Details Modal -->

        <div class="modal" id="viewDetails">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content" style="border: 1px solid red;">
                    <div class="modal-header" style="background-color:#FFE6E2;">
                        <h5>View Details</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-3">
                        <form action="#">
                            <div class="form-group">
                                <label for="pendingRequest">Request ID:</label>
                                <input type="text" name="pendingRequest" class="form-control" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="requester">Requester:</label>
                                <input type="text" class="form-control" name="requester" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="department">Department:</label>
                                <input type="text" class="form-control" name="department" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="submitted">Submitted</label>
                                <input type="text" class="form-control" name="submitted" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control">

                                </textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="files">Files</label>
                                <input type="files" class="form-control" name="files" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="files">Status</label>
                                <select name="files" class="text-success form-control">
                                    <option value="">Approved</option>
                                </select>
                            </div>
                            <div class="form-group mt-2 d-flex justify-content-end align-items center wrap" style="gap:5px;">
                                <button class="btn text-light" 
                                        style="background-color:#FF5D5D;">Edit</button>
                            </div>
                        </form>
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
    <!-- <script src="../../../user_data.js"></script> -->
    <script src="../../../diff-sidebar.js" type="module"></script>
</body>

</html>