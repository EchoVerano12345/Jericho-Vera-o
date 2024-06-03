<?php 
include "includes/dbcon.php";
?>
<!doctype html>
<html lang="en">
<?php include "includes/head.php";?>
    <body>
    <?php include "includes/sidebar.php";?>
    <div class="col-md-8 ms-sm-auto col-lg-9 p-0">     
    <section class="services-section section-padding" >
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 col-12">
                                    <h2 class="mb-5">Services</h2>
                                </div>

                                <?php
                                    // Assuming you have already established a database connection.

                                    // Query to fetch service information from the database.
                                    $sql = "SELECT * FROM tblservices";
                                    $result = mysqli_query($conn, $sql);

                                    // Check if there are any services in the database.
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $service_name = $row['serviceName'];
                                            $service_price = $row['price'];
                                            $picture = $row['picture'];
                                            $description = $row['description'];

                                            // Generating the HTML dynamically for each service.
                                            echo '<div class="col-lg-6 col-12 mb-4">';
                                            echo '<div class="services-thumb"> ';
                                            echo '<img src="admin/' . $picture . '" class="services-image img-fluid" style="height: 400px;width: 800px;" alt=""> ';

                                            echo '<div class="services-info d-flex align-items-end"> ';
                                            echo '<strong class="services-thumb-price">'.$description.'</strong>';
                                            echo '<h4 class="mb-0">' . $service_name . '</h4>';
                                            echo '<strong class="services-thumb-price">₱' . number_format($service_price, 2) . '</strong>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                          
                                        }
                                    }
                                    ?>

                            </div>
                        </div>
                    </section>
                    
                    </div>
                    <?php include "includes/footer.php";?>
    </body>
</html>
