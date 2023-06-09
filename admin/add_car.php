<?php
include "../checkSession.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the car data from the form
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $rental_price = $_POST['rental_price'];

    // Perform any necessary validation on the data

    // Insert the car data into the database
    include "../connect.php";
    $sql = "INSERT INTO cars (make, model, year, color, rental_price) VALUES ('$make', '$model', '$year', '$color', '$rental_price')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Car added successfully
        mysqli_close($conn); // Close the database connection
        header("Location: cars.php"); // Redirect to cars.php
        exit(); // Terminate the script
    } else {
        // Error occurred while adding car
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect back to the cars.php page if accessed directly
    header("Location: cars.php");
    exit();
}
?>