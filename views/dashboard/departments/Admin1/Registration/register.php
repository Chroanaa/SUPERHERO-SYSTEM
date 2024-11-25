<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registration for Residents</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
</head>
<body class="bg-gradient-primary" style="background: rgb(255,255,255);padding-top: 100px;">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background: url('assets/img/dogs/brgy-captain.jpg') center / cover;"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5" style="border-radius: 12px;">
                            <div class="text-center">
                                <h4 class="text-dark mb-4"><strong><span style="color: rgb(0, 0, 0);">Account Registration</span></strong></h4>
                            </div>
                            <!-- insert here -->
                            <form class="user" method="post" action="./registration-process.php">
                                <div class="row mb-3">
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
                                <div class="mb-3">
                                    <small style="color: rgb(0,0,0);font-weight: bold;">Current Home Address:</small>
                                    <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="text" placeholder="Address" name="address" style="width: 636px;color: rgb(0,0,0);border-radius: 12px;" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Email:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="text" placeholder="Email" name="Email" style="width: 300px;color: rgb(0,0,0);border-radius: 12px;" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small style="color: rgb(0,0,0);font-weight: bold;">Contact Number:</small>
                                        <input class="border-dark-subtle focus-ring focus-ring-dark form-control form-control-user" type="text" placeholder="Contact Number" name="Contact_number" style="width: 300px;color: rgb(0,0,0);border-radius: 12px;" required>
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
                            <!-- <div class="text-center"><a class="small" href="login.html" style="color: rgb(0,0,0);">Already have an account? Login!</a></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>

