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
        .status {
            font-size: 1.5rem;
            font-weight: bold;
            background-color: green;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
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
               
            </div>
            <div class="container"></div>
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
                                <textarea name="description" class="form-control" readonly></textarea>
                            </div>
                           
                           <div class="form-group mt-2">
                                <p class="status"></p>
                           </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sign Out Confirmation Modal -->
        <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
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
</body>
<script>

    const approved = JSON.parse(localStorage.getItem("approvedData"));
    let htmlContent = "";
    for(const key in approved) {
      htmlContent += `
        <div class="view-approval-body border bg-white mt-3">
                    <div class="view-approval-body-title">
                        <div class="view-approval-body-header d-flex justify-content-between align-items-center px-3 pt-4">
                                <h5>${key} - ${approved[key].title} </h5>
                                <p>${approved[key].submitted}</p>
                        </div>
                        <div class="view-approval-body-content px-3 pb-3">
                            <p>Requested by ${approved[key].department} staff ${approved[key].requester}.</p>
                            <button type="button" 
                                    class="btn text-light" 
                                    style="background-color: #FF5D5D"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewDetails" onclick="populateModal(
                                        '${key}',
                                        '${approved[key].requester}',
                                        '${approved[key].department}',
                                        '${approved[key].submitted}',
                                        '${approved[key].description}',
                                        '${approved[key].status}'
                                    )">See Details</button>
                        </div>
                    </div>
        </div>
      `;
    }
    document.querySelector(".container").innerHTML = htmlContent;

    function populateModal(requestId, requester, department, submitted, description, status) {
        document.querySelector("#viewDetails input[name=pendingRequest]").value = requestId;
        document.querySelector("#viewDetails input[name=requester]").value = requester;
        document.querySelector("#viewDetails input[name=department]").value = department;
        document.querySelector("#viewDetails input[name=submitted]").value = submitted;
        document.querySelector("#viewDetails textarea[name=description]").value = description;
        document.querySelector("#viewDetails .status").innerHTML = status;
    }
</script>
</html>