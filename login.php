<?php
include 'includes/dbcon.php';
session_start();
$statusMsg = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $query = "SELECT * FROM tblclient WHERE email = '$email' AND password = '$password' ";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if ($num > 0) {
        $_SESSION['ClientId'] = $rows['CustId'];
        $_SESSION['firstName'] = $rows['firstName'];
        $_SESSION['middleName'] = $rows['middleName'];
        $_SESSION['lastName'] = $rows['lastName'];
        $_SESSION['email'] = $rows['email'];
        $_SESSION['gender'] = $rows['gender'];
        $_SESSION['mobilenumber'] = $rows['mobilenumber'];
        $chat_status = "Active now";
        $sql2 = mysqli_query($conn, "UPDATE tblclient SET chat_status = '{$chat_status}' WHERE CustId = {$rows['CustId']}");
        if ($sql2) {
            $_SESSION['ClientID'] = $rows['CustId'];
            $statusMsg = "<div class='alert alert-success' role='alert'>
                Success!
            </div>";
        } else {
            $statusMsg = "<div class='alert alert-danger'>An error occurred!</div>";
        }
        echo "<script type = \"text/javascript\">
        window.location = (\"customer/index.php\")
        </script>";
    } else {
        $statusMsg = "<div class='alert alert-danger' role='alert'>
            Invalid Username/Password or Contact the Administrator!
        </div>";
    }
}
?>

<!DOCTYPE html>
<html>
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
                                        <h2 class="mb-1">Log In</h2>
                                        <p>Please fill out the form and we'll get back to you</p>
                                        <p><?php echo $statusMsg ?></p>
                                    </div>
                                    <div class="booking-form-body">
                                        <div class="row">
                                            <div class="form-control">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" name="login" value="login" class="form-control">Log In</button>
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
    </div>
</body>
</html>
