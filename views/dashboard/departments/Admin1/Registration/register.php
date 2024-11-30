<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registration for Residents</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <style>
        .resident-type-address {
            display: none;
        }
    </style>
</head>

<body class="bg-gradient-primary" style="background: rgb(255,255,255);padding-top: 100px;">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row justify-content-center align-items-center">
                    <!-- <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background: url('assets/img/dogs/brgy-captain.jpg') center / cover;"></div>
                    </div> -->
                    <div class="col-lg-7">
                        <div class="p-5 d-flex items-center justify-content-center flex-column" style="border-radius: 12px;">
                            <div class="text-center">
                                <h4 class="text-dark mb-4"><strong><span style="color: rgb(0, 0, 0);">Resident Registration For Requesting</span></strong></h4>
                            </div>
                            <!-- insert here -->
                            <form class="user" method="post" action="./registration-process.php">
                                <div class="row mb-3">
                                    <div class="col-12 mb-3">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Resident Type:</small>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="resident_type" id="resident" value="Resident" required>
                                            <label class="form-check-label" for="resident" style="color: rgb(0,0,0);">Resident</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="resident_type" id="non_resident" value="Non-Resident" required>
                                            <label class="form-check-label" for="non_resident" style="color: rgb(0,0,0);">Non-Resident</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4 mb-3 mb-sm-0">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Last Name:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="text" placeholder="Last Name" name="last_name" style="width: 196px;color: rgb(0,0,0);border-radius: 12px;" required>
                                    </div>
                                    <div class="col-sm-6 col-xxl-4">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">First Name:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="text" placeholder="First Name" name="given_name" style="width: 196px;color: rgb(0,0,0);border-radius: 12px;" required>
                                    </div>
                                    <div class="col-sm-6 col-xxl-4">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Middle Name:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="text" placeholder="Middle Name" name="middle_name" style="width: 196px;color: rgb(0,0,0);border-radius: 12px;" required>
                                    </div>
                                </div>

                                <!-- Sitio Dropdowns for Resident -->
                                <div id="sitio-dropdown-container" class="resident-type-address" style="display: none;">
                                    <div class="mb-3">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Specify your Sitio Number:</small>
                                        <select class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" name="sitio" style="width: 636px;color: rgb(0,0,0);border-radius: 12px;">
                                            <option value="" selected>Unknown</option>
                                            <option value="Sitio 1">Sitio 1</option>
                                            <option value="Sitio 2">Sitio 2</option>
                                            <option value="Sitio 3">Sitio 3</option>
                                            <option value="Sitio 4">Sitio 4</option>
                                            <option value="Sitio 5">Sitio 5</option>
                                            <option value="Sitio 6">Sitio 6</option>
                                            <option value="Sitio 7">Sitio 7</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Specify your Sitio Street Address:</small>
                                        <select class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" name="street" style="width: 636px;color: rgb(0,0,0);border-radius: 12px;">
                                            <!-- Sitio addresses go here (truncated for brevity) -->
                                        </select>
                                    </div>
                                </div>

                                <!-- Hidden Home Address Field for Non-Resident -->
                                <div id="home-address-container" class="mb-3" style="display: none;">
                                    <small style="color: rgb(0,0,0);font-weight: bold;">Current Home Address:</small>
                                    <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="text" placeholder="Address" name="address" style="width: 636px;color: rgb(0,0,0);border-radius: 12px;">
                                </div>

                                <div class="row mb-3">
                                    <!-- Sex / Gender -->
                                    <small style="color: rgb(0,0,0);font-weight: bold;">Gender:</small>
                                    <select id="sex" name="sex"
                                        class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" required>
                                        <option value="" selected>Please specify:</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class="row mb-3">
                                    <!-- Civil Status -->
                                    <small style="color: rgb(0,0,0);font-weight: bold;">Civil Status:</small>
                                    <select id="civil_status" name="civil_status"
                                        class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" required>
                                        <option value="" selected>Please specify:</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>

                                <div class="row mb-3" id="year-of-stay-container">
                                    <!-- Year of Stay -->
                                    <small style="color: rgb(0,0,0);font-weight: bold;" id="year-of-stay-label">Year of Stay:</small>
                                    <input type="number" id="year_of_stay" name="year_of_stay"
                                        class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" min="1">
                                </div>


                                <div class="row mb-3">
                                    <!-- Birth Place -->
                                    <small style="color: rgb(0,0,0);font-weight: bold;">Birth Place:</small>
                                    <input type="text" id="birth_place" name="birth_place"
                                        class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" required>
                                </div>

                                <div class="row mb-3">
                                    <!-- Blood Type -->
                                    <small style="color: rgb(0,0,0);font-weight: bold;">Blood Type:</small>
                                    <select id="blood_type" name="blood_type"
                                        class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" required>
                                        <option value="" selected>Please specify:</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="Unidentified">Unknown / Hindi tukoy</option>
                                    </select>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Email:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="email" placeholder="Email" name="Email" style="width: 300px;color: rgb(0,0,0);border-radius: 12px;" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Contact Number:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="number" placeholder="Contact Number" name="Contact_number" style="width: 300px;color: rgb(0,0,0);border-radius: 12px;" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Birth Date:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control" type="date" name="birth_date" style="width: 306px;border-radius: 12px;" required>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Upload Valid ID:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control" type="file" style="border-radius: 12px;">
                                    </div> -->
                                </div>
                                <button class="btn btn-danger border-dark-subtle focus-ring focus-ring-dark d-block btn-user w-100" type="submit" style="margin-top: 30px; margin-bottom: 30px;"><strong>Proceed</strong></button>
                            </form>
                            <div class="text-center">
                                <a class="small" href="../../../../../" style="color: rgb(0,0,0);">Already have an record? Back to Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="./assets/js/dynamicAddress.js"></script>
</body>

</html>