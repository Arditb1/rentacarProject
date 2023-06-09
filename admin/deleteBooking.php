<?php
include "../connect.php";
include "../checkSession.php";

// Assuming you have a database connection established

// Check if the booking ID is provided
if (isset($_GET['bookingId'])) {
    $bookingId = $_GET['bookingId'];

    // Delete the booking from the bookings table
    $deleteBookingQuery = "DELETE FROM bookings WHERE booking_id = $bookingId";
    mysqli_query($conn, $deleteBookingQuery);

    // Redirect to a success page or perform any other necessary actions
    header("Location: bookings.php");
    exit();
} else {
    // Handle the case when no booking ID is provided
    // Redirect to an error page or perform any other necessary actions
    header("Location: bookings.php");
    exit();
}
?>