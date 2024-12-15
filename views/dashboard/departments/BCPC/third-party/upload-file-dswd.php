<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file to DOH</title>
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
    <header style="margin-top: 24px;" class="m-3">
        <div class="container">
            <div class="header-brand d-flex justify-content-center align-items-center flex-column" style="gap: 1rem;">
                <!-- <img src="../../../BADAC/templates/img/doh.webp" alt="" class="img-fluid"> -->
                <h2>Upload the Case</h2>
                <p>Here before you proceed to DSWD Portal</p>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <h2>Forwarded Case Details</h2>
        <div class="mb-3">
            <label for="forwardedDetails" class="form-label">Case Details:</label>
            <textarea id="forwardedDetails" class="form-control" rows="10" readonly></textarea>
        </div>
        <div class="mt-3">
            <button type="button" id="proceedButton" class="btn btn-primary w-100">Proceed</button>
        </div>
    </div>

    <!-- -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="./validation-file-doh.js"></script>
    <script>
        // Retrieve the forwarded case data from localStorage
        const forwardedCaseData = localStorage.getItem("forwardedCaseData");

        // Populate the textarea with the forwarded case data
        if (forwardedCaseData) {
            document.getElementById("forwardedDetails").textContent = forwardedCaseData;
        } else {
            document.getElementById("forwardedDetails").textContent = "No case data available.";
        }

        // Clear the forwarded data to avoid persisting after the session
        localStorage.removeItem("forwardedCaseData");

        document.getElementById("proceedButton").addEventListener("click", function() {
            // Simulate retrieved case data (replace this with your actual data)
            const caseDetails = {
                from: "BCPC of Brgy. Sta Lucia",
                case_number: "1732581892",
                case_time: "08:44:52 AM",
                case_created: "11/26/2024, 8:44:52 AM",
                case_description: "Test description",
                case_status: "Ongoing",
                complainants: ["Sumugal, Sitio 1"],
                respondents: ["Hindi ako cute, Sitio 2"]
            };

            // Save the case details to localStorage
            localStorage.setItem("forwardedCase", JSON.stringify(caseDetails));

            // Redirect to the DSWD page
            window.open(
                "http://localhost:3000/views/dashboard/departments/BCPC/third-party/dswd.php",
                "_blank"
            );
        });
    </script>
</body>

</html>