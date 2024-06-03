<?php
error_reporting(0);
include 'includes/dbcon.php';
include 'includes/session.php';


$query = "SELECT * FROM tblfaq WHERE status = 'active'";
$result = mysqli_query($conn, $query);
?>
<style>
.checked {
  color: orange;
}
</style>
<!DOCTYPE html>
<html>
<?php include "includes/head.php";?>

<body>

    <div class="row">
        <?php include "includes/sidebar.php";?>
        <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
                    <div class="custom-form booking-form">

                        <div class="container bootstrap snippets bootdey">
                            <div class="panel">
                                <div class="booking-form-body">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $question = $row['question'];
                                            $answer = $row['answer'];
                                            ?>
                                            <div class="bio-row">
                                                <h6 class="question"><strong>Question:</strong> <?php echo $question; ?></h6>
                                                <button class="btn btn-primary reveal-answer">Tap me</button>
                                                <div class="answer" style="display: none;">
                                                    <p><strong>Answer:</strong> <?php echo $answer; ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "<div class='bio-row'><p>No frequently asked questions found.</p></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <div class="col-md-8 ms-sm-auto col-lg-9 p-0">     
    <section class="about-section section-padding" >
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 col-12 mx-auto">
                                    <h2 class="mb-4">Best Services in town</h2>

                                    <div class="border-bottom pb-3 mb-5">
                                        <p>Unlock Your True Beauty at MAUREEN SALON: Where Style Meets Artistry!</p>
                                    </div>
                                </div>

                                    <h6 class="mb-5">Meet Our Employee</h6>

                                        

                                    <?php
function getEmployeeRating($conn, $employeeId)
{
    $query = "SELECT * FROM tblemployee WHERE employeeId = '$employeeId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fullName = $row['employeename'];
        $employeeId = $row['employeeId'];

        $ratings = 0;
        // Fetch only if the status is rated
        $query = "SELECT * FROM tbltransaction WHERE employeeId = '$employeeId' AND status = 'rated'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $ratings += $row['ratings'];
            }

            $finalRating = round($ratings / mysqli_num_rows($result), 2); // Round off to 2 decimal places
            $maxRating = 5;
            $ratingPercentage = ($finalRating / $maxRating) * 100;

            $query1 = mysqli_query($conn, "SELECT * FROM tbltransaction 
                                           INNER JOIN tblemployee se ON tbltransaction.employeeId = se.employeeId 
                                           WHERE se.employeeId = '$employeeId'");
            $request = mysqli_num_rows($query1);

            return array($fullName, $finalRating, $maxRating, $ratingPercentage, $request);
        } else {
            // If no ratings found, return default values
            return array($fullName, 0, 5, 0, 0);
        }
    } else {
        return array("Employee not found.", 0, 0, 0, 0);
    }
}

$query = "SELECT * FROM tblemployee";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $employeeId = $row['employeeId'];
        list($fullName, $finalRating, $maxRating, $ratingPercentage, $request) = getEmployeeRating($conn, $employeeId);
        
        echo '<div class="d-flex justify-content-between align-items-center mb-3">';
        // Employee name on the left
        echo '<h4 class="small font-weight-bold">' . $fullName . '</h4>';
        // Rating and stars on the right
        echo '<div class="d-flex align-items-center">';
        echo '<span class="mr-3">' . $finalRating . ' out of ' . $maxRating . ' (' . $request . ')</span>';
      
        echo '<div class="star-rating">';
        // Filled stars based on final rating
        for ($i = 0; $i < $finalRating; $i++) {
            // Apply class 'checked' for orange color
            echo '<span class="fa fa-star checked"></span>';
        }
        // Empty stars for remaining
        for ($i = $finalRating; $i < $maxRating; $i++) {
            echo '<span class="fa fa-star"></span>';
        }
        echo '</div>'; // Closing star-rating div
        echo '</div>'; // Closing d-flex div
        echo '</div>'; // Closing d-flex div for each employee
    }
} else {
    echo "No employees found.";
}
?>




                               

                            </div>
                        </div>
                        
                    </section>
                                </div>
       

                <div class="col-md-8 ms-sm-auto col-lg-9 p-0">     
    <section class="contact-section" id="section_5">

                    <div class="section-padding">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-6 col-12">
                                    <h5 class="mb-3"><strong>Contact</strong> Information</h5>

                                    <p class="text-white d-flex mb-1">
                                        <a href="tel: 120-240-3600" class="site-footer-link">
                                        09485657661
                                        </a>
                                    </p>

                                    <p class="text-white d-flex">
                                        <a href="MaureenSalon@gmail.com" class="site-footer-link">
                                        MaureenSalon@gmail.com
                                        </a>
                                    </p>

                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.facebook.com/pages/Tjen-Hairstudio/197905847019996" target="_blank" class="social-icon-link bi-facebook">
                                            </a>
                                        </li>
            
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter">
                                            </a>
                                        </li>
            
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-instagram">
                                            </a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-youtube">
                                            </a>    
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp">
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-lg-5 col-12 contact-block-wrap mt-5 mt-lg-0 pt-4 pt-lg-0 mx-auto">
                                    <div class="contact-block">
                                        <h6 class="mb-0">
                                            <i class="custom-icon bi-shop me-3"></i>

                                            <strong>Open Daily</strong>

                                            <span class="ms-auto">10:00 AM - 9:00 PM</span>
                                        </h6>
                                    </div>
                                </div>

                        

                            </div>
                        </div>
                    </div>
                </section>
                
                    </div>

            </section>
        </div>
    </div>
</div>

</body>
<?php include "includes/footer.php";?>

<script>
    // Button click to reveal answer functionality using JavaScript/jQuery
    $(document).ready(function() {
        $('.reveal-answer').click(function() {
            var answer = $(this).next('.answer');
            answer.slideToggle();
            if (answer.css('display') === 'block') {
                answer.addClass('fade-in');
            } else {
                answer.removeClass('fade-in');
            }
        });
    });
</script>

<style>
    .fade-in {
        animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>

</html>
