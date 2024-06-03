<?php
error_reporting(0);
include 'includes/dbcon.php';
include 'includes/session.php';
$statusMsg = '';

if (isset($_POST['save'])) {
    $CustId = $_POST['CustId'];
    $firstName = $_POST['Firstname'];
    $middleName = $_POST['Middlename'];
    $lastName = $_POST['Lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobilenumber = $_POST['mobilenumber'];
    $datecreated = date('Y-m-d H:i:s');
    
    $query = mysqli_query($conn, "SELECT * FROM tblclient WHERE email ='$email'");
    $ret = mysqli_fetch_array($query);

    $sampPass_2 = md5($password);

    if ($ret) {
        $statusMsg = "<div class='alert alert-danger' >This Email Address Already Exists!</div>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO tblclient (CustId, firstName, middleName, lastName,gender, email, password, mobilenumber, date_created) 
        VALUES ('$CustId', '$firstName', '$middleName', '$lastName','$gender', '$email', '$sampPass_2', '$mobilenumber', '$datecreated')");
        
        if ($query) {
            $statusMsg = "<div class='alert alert-success' >Successfully account created!</div>";
        } else {
            $statusMsg = "<div class='alert alert-danger' >Failed to create account. Please try again.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <!-- Add your head section CSS and JS here -->
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <?php include "includes/sidebar.php"; ?>

            <section class="booking-section section-padding" id="booking-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
                            <div class="col-lg-10 col-12 mx-auto">
                                <form method="post" class="custom-form booking-form">
                                    <div class="text-center mb-5">
                                        <h2 class="mb-1">Register</h2>

                                        <p>Please fill out the form and we'll get back to you</p>
                                        <h6><?php echo $statusMsg; ?></h6>
                                    </div>

                                    <div class="booking-form-body">
    <div class="row">
        <div class="col-lg-6 col-12">First Name
            <input type="text" name="Firstname" id="Firstname" class="form-control" placeholder="First Name" required maxlength="50">
        </div>
        <div class="col-lg-6 col-12">Middle Name
            <input type="text" name="Middlename" id="Middlename" class="form-control" placeholder="Middle Name" maxlength="50">
        </div>
        <div class="col-lg-6 col-12">Last Name
            <input type="text" name="Lastname" id="Lastname" class="form-control" placeholder="Last Name" required maxlength="50">
        </div>
        <div class="col-lg-6 col-12">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-select" aria-label="Select your gender" required>
                <option value="" selected disabled hidden>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="col-lg-6 col-12">
            Email
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="col-lg-6 col-12">
            Password
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required maxlength="20">
        </div>
        <div class="col-lg-6 col-12">
            Phone Number
            <input type="tel" class="form-control" name="mobilenumber" placeholder="Mobile Number" required maxlength="15">
        </div>
    </div>
    <div class="col-lg-4 col-md-10 col-8 mx-auto">
        <button type="submit" name="save" class="form-control">Register</button>
    </div>
</div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

</html>
