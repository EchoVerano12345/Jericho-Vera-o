<?php
error_reporting(0);
include 'includes/dbcon.php';

if (!isset($_SESSION['ClientId'])) {
    echo "<script type=\"text/javascript\">window.location = \"./login.php\";</script>";
}


  $query = "SELECT * FROM tblclient WHERE CustId = ".$_SESSION['ClientId']."";
  $rs = $conn->query($query);
  $num = $rs->num_rows;
  $rows = $rs->fetch_assoc();
  $fullName = $rows['firstName']." ".$rows['lastName'];

?>
<?php include "includes/head.php";?>
<body>
    
        <div class="container-fluid">
        
        <div class="row">
       
        <?php include "includes/sidebar.php";?>

                    <section class="booking-section section-padding" id="booking-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
                            <div class="card-body">
                                <form  method="post" class="custom-form booking-form" id="bb-booking-form" role="form">
                                    <div class="text-center mb-5">
                                        <h2 class="mb-1">Book a seat</h2>
                                        <p>Please fill out the form and we get back to you</p>
                                    </div>

                                    <div class="booking-form-body">
                                        <div class="row">
                                        <div class="form-group row mb-3">
                                            <div class="col-lg-6 col-12">
                                                <input type="text" name="clientName" id="clientName" class="form-control" placeholder="<?php echo $fullName ?> " readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-lg-6 col-12">
                                                <input type="number" class="form-control" name="mobile" placeholder="Mobile Number"  required="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <span>Time</span>
                                            <div class="col-lg-6 col-12">
                                                <input class="form-control" type="time" name="time" placeholder="Time"/>
                                            </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                            <div class="col-lg-6 col-12">
                                                <select class="form-select form-control" name="branch" id="branch" aria-label="Default select example">
                                                    <option selected="">Select Branches</option>
                                                    <option value="SM Gensan">SM Gensan</option>
                                                    
                                                </select>

                                            </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <select class="form-select form-control" name="service" id="service" aria-label="Default select example">
                                                    <option selected="">Select Service</option>
                                                    <option value="Rebond">Rebond</option>
                                                    
                                                </select>

                                            </div>
                                            <div class="form-group row mb-3">
                                            <div class="col-lg-6 col-12">
                                                <input type="date" name="date" id="date" class="form-control" placeholder="Date" required>
                                            </div>
                                            </div>

                                        </div>
                                        <div class="form-group row mb-3">
                                            <span>Select Hairstylist</span>
                                            <div class="col-lg-6 col-12">
                                            <?php
                                            $qry= "SELECT * FROM tblhairstylist WHERE status= 'available'  ORDER BY hairstylistId ASC";
                                            $result = $conn->query($qry);
                                            $num = $result->num_rows;		
                                            if ($num > 0){
                                            echo ' <select required name="hairstylistId" onchange="hairstylistDropdown(this.value)" class="form-control mb-3">';
                                            echo'<option value="">--Select Hairstylist--</option>';
                                            while ($rows = $result->fetch_assoc()){
                                            echo'<option value="'.$rows['hairstylistId'].'" >'.$rows['hairstylistName'].'</option>';
                                                }
                                                    echo '</select>';
                                                }
                                                ?>  
                                            </div>
                                            </div>
                                        

                                    
                                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                            <button type="submit" class="form-control">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    
                 </div>
                
                </section>
                
                <?php include "includes/footer.php";?>
                

              
            </div>
            

       </body>     
       

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>


        