<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Department Of Health</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
</head>
<style>
   img {
      width: 100px;
      height: 100px;
   }
</style>

<body>
   <header class="m-3">
      <div class="container">
         <a href="../" class="header-brand d-flex justify-content-center align-items-center" style="gap: 1rem;">
            <img src="../../../BADAC/templates/img/doh.webp" alt="" class="img-fluid">
            <h2>Department Of Health</h2>
         </a>
      </div>
   </header>
   <div class="container h2">
      Inbox:
   </div>
   <div class="container">
      <table class="table table-bordered table-striped shadow">
         <thead class="table-success">
            <tr>
               <th>From</th>
               <th>Description</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody id="fileTableBody">
            <!-- Rows will be added here dynamically -->
         </tbody>
      </table>
   </div>



   <!-- Modal for Viewing Details -->
   <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="viewDetailsModalLabel">Case Details</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
               <p><strong>Case Number:</strong> <span id="modal-case-number"></span></p>
               <p><strong>Incident Date:</strong> <span id="modal-incident-date"></span></p>
               <p><strong>Case Type:</strong> <span id="modal-case-type"></span></p>
               <p><strong>Case Status:</strong> <span id="modal-case-status"></span></p>
               <p><strong>Complainants:</strong> <span id="modal-complainants"></span></p>
               <p><strong>Respondents:</strong> <span id="modal-respondents"></span></p>
               <p><strong>Description:</strong> <span id="modal-case-description"></span></p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
   <script>
       document.addEventListener("DOMContentLoaded", function() {
         // Fetch the forwarded case details from localStorage
         const forwardedCase = JSON.parse(localStorage.getItem("forwardedCase"));

         // Populate the table if data exists
         if (forwardedCase) {
            const tableBody = document.getElementById("fileTableBody");

            const row = document.createElement("tr");

            // From cell
            const fromCell = document.createElement("td");
            fromCell.textContent = forwardedCase.from;
            row.appendChild(fromCell);

            // Description cell
            const descriptionCell = document.createElement("td");
            descriptionCell.textContent = forwardedCase.case_description;
            row.appendChild(descriptionCell);

            // Action cell with "View Details" button
            const actionCell = document.createElement("td");
            const viewDetailsButton = document.createElement("button");
            viewDetailsButton.classList.add("btn", "btn-info");
            viewDetailsButton.textContent = "View Details";
            viewDetailsButton.setAttribute("data-bs-toggle", "modal");
            viewDetailsButton.setAttribute("data-bs-target", "#viewDetailsModal");

            // Add event listener to open the modal and display the details
            viewDetailsButton.addEventListener("click", function() {
               document.getElementById("modal-case-number").textContent = forwardedCase.case_number || "N/A";
               document.getElementById("modal-incident-date").textContent = forwardedCase.case_created || "N/A";
               document.getElementById("modal-case-type").textContent = forwardedCase.case_type || "N/A";
               document.getElementById("modal-case-status").textContent = forwardedCase.case_status || "N/A";
               document.getElementById("modal-complainants").textContent = forwardedCase.case_complainants ? forwardedCase.case_complainants.map(c => c.name).join(", ") : "N/A";
               document.getElementById("modal-respondents").textContent = forwardedCase.case_respondents ? forwardedCase.case_respondents.map(r => r.name).join(", ") : "N/A";
               document.getElementById("modal-case-description").textContent = forwardedCase.case_description || "N/A";
            });

            actionCell.appendChild(viewDetailsButton);
            row.appendChild(actionCell);

            // Append row to table body
            tableBody.appendChild(row);
         }
      });
   </script>
   <!-- <script>
      // Retrieve forwarded cases from localStorage
      const forwardedCases = JSON.parse(localStorage.getItem("forwardedCases")) || [];
      const tableBody = document.getElementById("fileTableBody");

      // Create a row for each forwarded case
      forwardedCases.forEach((caseItem) => {
         const row = document.createElement("tr");

         // From cell
         const fromCell = document.createElement("td");
         fromCell.textContent = caseItem.from;
         row.appendChild(fromCell);

         // Description cell
         const descriptionCell = document.createElement("td");
         descriptionCell.textContent = caseItem.description;
         row.appendChild(descriptionCell);

         // Download cell
         const downloadCell = document.createElement("td");
         const downloadLink = document.createElement("a");
         downloadLink.href = caseItem.content; // Base64 data URL
         downloadLink.download = `${caseItem.description}.txt`; // Set file name for download
         downloadLink.textContent = "Download File";
         downloadCell.appendChild(downloadLink);
         row.appendChild(downloadCell);

         // Append row to table body
         tableBody.appendChild(row);
      });

      // Log for debugging
      console.log("Loaded forwarded cases:", forwardedCases);
   </script> -->
</body>

</html>