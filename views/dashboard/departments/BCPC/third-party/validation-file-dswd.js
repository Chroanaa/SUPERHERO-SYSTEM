document.addEventListener("DOMContentLoaded", function () {
    const caseFileInput = document.getElementById("caseFile");
    const proceedButton = document.getElementById("proceedButton");

    // Enable the "Proceed" button only when a file is selected
    caseFileInput.addEventListener("change", function () {
        if (caseFileInput.files.length > 0) {
            proceedButton.disabled = false;
        } else {
            proceedButton.disabled = true;
        }
    });

    // Handle the "Proceed" button click event
    proceedButton.addEventListener("click", function () {
        if (caseFileInput.files.length > 0) {
            alert("File uploaded successfully! Proceeding to DSWD Portal...");
            // Add your logic here to handle the file upload or redirection
        }
    });
});

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