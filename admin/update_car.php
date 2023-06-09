<?php
// Include the database connection file
include "../connect.php";
include "../checkSession.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the car ID and updated car details from the form
    $carId = $_POST['car_id'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $rentalPrice = $_POST['rental_price'];

    // Initialize the SQL variable
    $sql = '';

    // Check if a new car image is uploaded
    if ($_FILES['image']['name'] != '') {
        // Get the file name and temporary location
        $imageName = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];

        // Define the new file path
        $targetDirectory = '../car_images/Car Pictures/';
        $targetFile = $targetDirectory . $imageName;

        // Move the uploaded file to the new location
        if (move_uploaded_file($imageTemp, $targetFile)) {
            // File uploaded successfully, update the car details in the database
            $sql = "UPDATE cars SET make = '$make', model = '$model', year = '$year', color = '$color', rental_price = '$rentalPrice', image = '$targetFile' WHERE id = $carId";
        } else {
            // Error occurred while uploading the file
            echo "<p>Error uploading car image.</p>";
        }
    } else {
        // No new car image uploaded, update the car details in the database without changing the image field
        $sql = "UPDATE cars SET make = '$make', model = '$model', year = '$year', color = '$color', rental_price = '$rentalPrice' WHERE id = $carId";
    }

    // Execute the update query if the $sql variable is not empty
    if (!empty($sql) && mysqli_query($conn, $sql)) {
        // Car details updated successfully
        echo "<p>Car details updated successfully.</p>";
        header("Location: cars.php");
        exit;
    } elseif (!empty($sql)) {
        // Error occurred while updating car details
        echo "<p>Error updating car details: " . mysqli_error($conn) . "</p>";
    }
} else {
    // Redirect to the edit_car.php page if the form is not submitted
    $carId = $_GET['car_id'];
    header("Location: edit_car.php?car_id=$carId");
    exit;
}

// Close the database connection
mysqli_close($conn);
?>