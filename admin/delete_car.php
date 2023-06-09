<?php
// Check if the car ID is provided
include "../checkSession.php";
if (isset($_GET['car_id'])) {
    $carId = $_GET['car_id'];

    // Delete the car record from the database
    include "../connect.php";

    $deleteQuery = "DELETE FROM cars WHERE id = '$carId'";
    mysqli_query($conn, $deleteQuery);

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the cars page after deleting the car
    header("Location: cars.php");
    exit();
}
?>