<?php
session_start();
$chat_status = "Offline";

// Establish a connection to the database
$conn = mysqli_connect("localhost", "528193", "joshua", "528193");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['ClientId'])) {
    $clientId = $_SESSION['ClientId'];
    $sql = "UPDATE tblclient SET chat_status = '{$chat_status}' WHERE CustId = $clientId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        session_destroy(); // destroy session
        echo "<script type=\"text/javascript\">window.location = \"../index.php\";</script>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Something went wrong, please try again!</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>Session clientId is not set.</div>";
}

// Close the database connection
mysqli_close($conn);
?>
