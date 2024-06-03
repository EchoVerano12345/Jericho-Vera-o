<?php
error_reporting(0);
include 'includes/dbcon.php';
include 'includes/session.php';
if (!isset($_SESSION['ClientId'])) {
    echo "<script type=\"text/javascript\">window.location = \"./login.php\";</script>";
}


  $query = "SELECT * FROM tblclient WHERE CustId = ".$_SESSION['ClientId']."";
  $rs = $conn->query($query);
  $num = $rs->num_rows;
  $rows = $rs->fetch_assoc();
  $fullName = $rows['firstName']." " .$rows['middleName']. " ".$rows['lastName'];

?>


<!DOCTYPE html>

<html>
<?php include "includes/head.php";?>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="row">
        <?php include "includes/sidebar.php";?>
        <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
        <section class="hero-section d-flex justify-content-center align-items-center">
        
        <div class="container bootstrap snippets bootdey">
            <div class="panel">
                <div class="user-heading round">
                    <a href="">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                    </a>
                    <h5><?php echo $fullName?></h5>
                    <h6><?php echo $_SESSION['email']?> </h6>
                </div>
            </div>
        </div>
        <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
            <div class="custom-form booking-form">
                
                <div class="container bootstrap snippets bootdey">
                <div class="panel">
                    <div class="booking-form-body">
                        <div class="bio-row">
                        <h6>First Name: <?php echo $_SESSION['firstName']?></h6>
                        </div>
                        <div class="bio-row">
                            <h6><span>Middle Name </span>: <?php echo $_SESSION['middleName']?></h6>
                        </div>
                        <div class="bio-row">
                            <h6><span>Last Name </span>: <?php echo $_SESSION['lastName']?></h6>
                        </div>
                        <div class="bio-row">
                            <h6><span> Gender </span>: <?php echo $_SESSION['gender']?></h6>
                        </div>
                        <div class="bio-row">
                            <h6><span>Email </span>: <?php echo $_SESSION['email']?></h6>
                        </div>
                        <div class="bio-row">
                            <h6><span>Mobile Number </span>: <?php echo $_SESSION['mobilenumber']?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
        </div>
    </div>
</div>

</body>
<?php include "includes/footer.php";?>
</html>
