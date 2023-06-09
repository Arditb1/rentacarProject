<?php
include "../connect.php";
include "../checkSession.php";

// Assuming you have a database connection established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $bookingId = $_POST['bookingId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $carType = $_POST['carType'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Update the booking details in the bookings table
    $updateBookingQuery = "UPDATE bookings SET first_name = '$firstName', last_name = '$lastName', email = '$email', phone_number = '$phoneNumber', whichcar = '$carType', start_date = '$startDate', end_date = '$endDate' WHERE booking_id = $bookingId";
    mysqli_query($conn, $updateBookingQuery);

    // Redirect to a success page or perform any other necessary actions
    header("Location: bookings.php");
    exit();
}

// Retrieve the booking ID from the query string
if (isset($_GET['bookingId'])) {
    $bookingId = $_GET['bookingId'];

    // Retrieve the booking details from the database
    $bookingQuery = "SELECT * FROM bookings WHERE booking_id = $bookingId";
    $bookingResult = mysqli_query($conn, $bookingQuery);

    // Check if the booking details are found
    if (mysqli_num_rows($bookingResult) > 0) {
        $booking = mysqli_fetch_assoc($bookingResult);
    } else {
        // Handle the case when no booking details are found
        // Redirect to an error page or perform any other necessary actions
        header("Location: bookings.php");
        exit();
    }
} else {
    // Handle the case when no booking ID is provided
    // Redirect to an error page or perform any other necessary actions
    header("Location: bookings.php");
    exit();
}
?>

<!-- Update booking form -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Update Booking</title>
    <!-- Include any necessary stylesheets or scripts -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .button-container {
            text-align: right;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Update Booking</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="hidden" name="bookingId" value="<?php echo $bookingId; ?>">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName"
            value="<?php echo isset($booking['first_name']) ? $booking['first_name'] : ''; ?>" required>
        <br>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName"
            value="<?php echo isset($booking['last_name']) ? $booking['last_name'] : ''; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($booking['email']) ? $booking['email'] : ''; ?>"
            required>
        <br>
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" name="phoneNumber"
            value="<?php echo isset($booking['phone_number']) ? $booking['phone_number'] : ''; ?>" required>
        <br>
        <label for="carType">Car Type:</label>
        <input type="text" name="carType" value="<?php echo isset($booking['whichcar']) ? $booking['whichcar'] : ''; ?>"
            required>
        <br>
        <label for="startDate">Start Date:</label>
        <input type="date" name="startDate"
            value="<?php echo isset($booking['start_date']) ? $booking['start_date'] : ''; ?>" required>
        <br>
        <label for="endDate">End Date:</label>
        <input type="date" name="endDate" value="<?php echo isset($booking['end_date']) ? $booking['end_date'] : ''; ?>"
            required>
        <br>
        <div class="button-container">
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>