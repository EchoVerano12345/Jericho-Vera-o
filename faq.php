<?php
error_reporting(0);
include 'includes/dbcon.php';
include 'includes/session.php';


$query = "SELECT * FROM tblfaq WHERE status = 'active'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<?php include "includes/head.php";?>

<body>

    <div class="row">
        <?php include "includes/sidebar.php";?>
        <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
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
