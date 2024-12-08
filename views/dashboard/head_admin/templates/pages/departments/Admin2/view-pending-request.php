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
                <h2 class="text-danger">View Pending Request</h2>
                <p>This contains the streamlined processing made by other departments and also from residents.</p>
            </div>

            <div class="view-pending-page shadow bg-light rounded-3 py-5 px-4 container-fluid">
                <div class="view-pending-header d-flex justify-content-between align-items-center">
                    <h5>View  Pending Request (0 Unread)</h5>
                    <button class="btn text-light" style="background-color: #FF5D5D;">Reload</button>
                </div>
                <div class="container">

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
                                <label for="pendingRequest">Pending Request ID:</label>
                                <input type="text" id="id" name="pendingRequest" class="form-control" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="requester">Requester:</label>
                                <input type="text" id="name" class="form-control" name="requester" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="department">Department:</label>
                                <input type="text" id="department" class="form-control" name="department" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="submitted">Submitted</label>
                                <input type="text" id="submitted" class="form-control" name="submitted" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" readonly></textarea>
                            </div>
                           
                            <div class="form-group mt-2 d-flex justify-content-end align-items center wrap" style="gap:5px;">
                                <button class="btn text-light" 
                                        style="background-color:#BF3033;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#disregard">Disregard</button>
                                <button class="btn text-light" 
                                        style="background-color:#04D73D;" onclick="approvedItem()">Approve</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Disregard Modal -->
         <div class="modal" id="disregard">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border: 1px solid red;">
                    <div class="modal-header" style="background-color:#FFE6E2;">
                        <h5>Disregard</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to disregard this request?</p>
                        <div class="disregard-btn d-flex justify-content-end">
                            <button class="btn btn-light border"
                                    data-bs-toggle="modal"
                                    data-bs-target="#notesForDisregarding">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
         </div>

         <!-- Notes for Disregarding Modal -->

         <div class="modal" id="notesForDisregarding">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border: 1px solid red;">
                        <div class="modal-header" style="background-color:#FFE6E2;">
                        <h5>Add notes for disregarding the request</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="reasonForDisregarding">Reason for disregarding:</label>
                                <textarea name="reasonForDisregarding" class="form-control"></textarea>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="button" class="mt-3 btn bg-light border" onclick="disregardItem()">Save</button>
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
    <script src="../../../diff-sidebar.js" type="module"></script>
    <script>
    // Sample data for testing pending requests
    const samplePendingData = {
        "REQ001": {
            "title": "Document Verification",
            "requester": "John Doe",
            "department": "Records Department",
            "submitted": "2024-12-01 10:30 AM",
            "description": "Verification of birth certificate for processing a passport."
        },
        "REQ002": {
            "title": "Barangay Clearance",
            "requester": "Jane Smith",
            "department": "Barangay Office",
            "submitted": "2024-12-01 11:00 AM",
            "description": "Requesting barangay clearance for job application."
        },
        "REQ003": {
            "title": "Community ID",
            "requester": "Michael Tan",
            "department": "Community Affairs",
            "submitted": "2024-12-02 09:15 AM",
            "description": "Issuance of a new community ID."
        }
    };

    // Initialize localStorage with sample data if not already present
    if (!localStorage.getItem("pendingData")) {
        localStorage.setItem("pendingData", JSON.stringify(samplePendingData));
    }

    // Approved and disregarded datasets initialization (empty by default)
    if (!localStorage.getItem("approvedData")) {
        localStorage.setItem("approvedData", JSON.stringify({}));
    }

    if (!localStorage.getItem("disregardedRequest")) {
        localStorage.setItem("disregardedRequest", JSON.stringify({}));
    }

    // Function to populate the modal with request details
    function populateModal(id, requester, department, submitted, description) {
        document.querySelector("#viewDetails input[name=pendingRequest]").value = id;
        document.querySelector("#viewDetails input[name=requester]").value = requester;
        document.querySelector("#viewDetails input[name=department]").value = department;
        document.querySelector("#viewDetails input[name=submitted]").value = submitted;
        document.querySelector("#viewDetails textarea[name=description]").value = description;
    }

    // Function to approve a pending request
    function approvedItem(key) {
        const pending = JSON.parse(localStorage.getItem("pendingData"));
        const approved = JSON.parse(localStorage.getItem("approvedData")) || {};

        // Get the details of the item to be approved
        const { requester, department, submitted, description } = pending[key];

        // Add the item to the approvedData object
        approved[key] = {
            requester,
            department,
            submitted,
            description,
            status: "Approved"
        };

        // Remove the item from pendingData
        delete pending[key];

        // Update localStorage
        localStorage.setItem("pendingData", JSON.stringify(pending));
        localStorage.setItem("approvedData", JSON.stringify(approved));

        // Refresh the displayed list of pending requests
        renderPendingRequests();
    }

    // Function to disregard a pending request
    function disregardItem() {
        const key = document.querySelector("#viewDetails input[name=pendingRequest]").value;
        const reasonForDisregarding = document.querySelector("#notesForDisregarding textarea[name=reasonForDisregarding]").value;
        const pending = JSON.parse(localStorage.getItem("pendingData"));
        const disregarded = JSON.parse(localStorage.getItem("disregardedRequest")) || {};

        // Get the details of the item to be disregarded
        const { requester, department, submitted, description } = pending[key];

        // Add the item to the disregardedRequest object
        disregarded[key] = {
            requester,
            department,
            submitted,
            description,
            reasonForDisregarding
        };

        // Remove the item from pendingData
        delete pending[key];

        // Update localStorage
        localStorage.setItem("pendingData", JSON.stringify(pending));
        localStorage.setItem("disregardedRequest", JSON.stringify(disregarded));

        // Refresh the displayed list of pending requests
        renderPendingRequests();
    }

    // Function to render the pending requests dynamically
    function renderPendingRequests() {
        const pending = JSON.parse(localStorage.getItem("pendingData"));
        let htmlContent = "";
        for (const key in pending) {
            htmlContent += `
                <div class="view-pending-body border mt-3">
                    <div class="view-pending-body-title">
                        <div class="view-pending-body-header d-flex justify-content-between align-items-center px-3 pt-4">
                            <h5>${key} - ${pending[key].title}</h5>
                            <p>${pending[key].submitted}</p>
                        </div>
                        <div class="view-pending-body-content px-3 pb-3">
                            <p>Requested by ${pending[key].department} staff ${pending[key].requester}.</p>
                            <button type="button" 
                                    class="btn text-light" 
                                    style="background-color: #FF5D5D"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewDetails" onclick="populateModal(
                                        '${key}',
                                        '${pending[key].requester}',
                                        '${pending[key].department}',
                                        '${pending[key].submitted}',
                                        '${pending[key].description}'
                                    )">See Details</button>
                            <button class="btn text-light" 
                                    style="background-color:#04D73D;" onclick="approvedItem('${key}')">Approve</button>
                        </div>
                    </div>
                </div>
            `;
        }
        document.querySelector(".container").innerHTML = htmlContent;
    }

    // Initial render of pending requests
    renderPendingRequests();
</script>

</body>
</html>