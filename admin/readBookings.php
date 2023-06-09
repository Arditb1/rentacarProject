<?php
include "../connect.php";

// Assuming you have a database connection established

// Retrieve all bookings
$bookingsQuery = "SELECT * FROM bookings";
$bookingsResult = mysqli_query($conn, $bookingsQuery);
$bookings = mysqli_fetch_all($bookingsResult, MYSQLI_ASSOC);
?>

<!-- Display bookings table -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bookings</title>
    <!-- Include any necessary stylesheets or scripts -->
</head>

<body>
    <?php include "../checkSession.php"; ?>
    <h2>Bookings</h2>
    <table>
        <tr>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Car Type</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td>
                    <?= $booking['booking_id']; ?>
                </td>
                <td>
                    <?= $booking['first_name'] . ' ' . $booking['last_name']; ?>
                </td>
                <td>
                    <?= $booking['email']; ?>
                </td>
                <td>
                    <?= $booking['phone_number']; ?>
                </td>
                <td>
                    <?= $booking['whichcar']; ?>
                </td>
                <td>
                    <?= $booking['start_date']; ?>
                </td>
                <td>
                    <?= $booking['end_date']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>