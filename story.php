<?php 
include "includes/dbcon.php";
?>
<!doctype html>
<html lang="en">
<?php include "includes/head.php";?>

    <body>

    <?php include "includes/sidebar.php";?>
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
                                       $query = "SELECT * FROM tbltransaction WHERE employeeId = '$employeeId'";
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
                                           return array($fullName, 0, 0, 0, 0);
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

                                        echo '<h4 class="small font-weight-bold">' . $fullName . '
                                            <span class="float-right">' . $finalRating . ' out of ' . $maxRating . ' (' . $request . ')</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: ' . $ratingPercentage . '%" aria-valuenow="' . $ratingPercentage . '" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>';

                                        $name = $row['employeename'];

                                        
                                    }
                                } else {
                                    echo "No employees found.";
                                }
                                ?>

                            </div>
                        </div>
                        
                    </section>
                  
                    </div>
                    <?php include "includes/footer.php";?>
            
    </body>
    
