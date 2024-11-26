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
         <div class="header-brand d-flex justify-content-center align-items-center" style="gap: 1rem;">
            <img src="../../../BADAC/templates/img/doh.webp" alt="" class="img-fluid">
            <h2>Department Of Health</h2>
         </div>
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
   <script>
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
   </script>
</body>

</html>