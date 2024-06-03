<?php
error_reporting(0);
include 'includes/dbcon.php';
include 'includes/session.php';
?>
<!doctype html>
<html lang="en">
<?php include "includes/head.php";?>
<body>
    <?php include "includes/sidebar.php";?>
    <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
        <section class="hero-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <?php
                        $font_size = "75px"; 
                        echo '<h1 class="text-white mb-lg-3 mb-4" style="font-size: ' . $font_size . ';"><strong>Maureen <em> Salon</em></strong></h1>';
                        ?>
                        <p class="text-black">Get the most professional services for you</p>
                        <br>
                        <a class="btn custom-btn custom-border-btn custom-btn-bg-white smoothscroll me-2 mb-2" href="story.php">About Us</a>
                        <a class="btn custom-btn smoothscroll mb-2" href="services.php">What we do</a>
                    </div>
                </div>
            </div>
            <div class="custom-block d-lg-flex flex-column justify-content-center align-items-center">
                <img src="images/vintage-chair-barbershop.jpg" class="custom-block-image img-fluid" alt="">
                <h4><strong class="text-white">Hurry Up! Get good services.</strong></h4>
                <a href="book.php" class="smoothscroll btn custom-btn custom-btn-italic mt-3">Book a seat</a>
            </div>
        </section>
        <?php include "includes/footer.php";?>
    </div>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
