<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data if the request method is POST
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone_number'], $_POST['password'], $_POST['user_type'])) {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone_number'];
        $password = $_POST['password'];
        $userType = $_POST['user_type'];

        // Perform validation and sanitation of the form data

        // Include the database connection file
        include "../connect.php";

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the user data into the database
        $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password, user_type)
                VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$hashedPassword', '$userType')";
        $result = mysqli_query($conn, $sql);

        // Check if the insertion was successful
        if ($result) {
            // Redirect to the users page with a success message
            header("Location: users.php?status=success&message=User added successfully");
            exit;
        } else {
            // Redirect to the users page with an error message
            $errorMessage = mysqli_error($conn);
            header("Location: users.php?status=error&message=Failed to add user. Error: $errorMessage");
            exit;
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Handle the case when required form fields are not set
        header("Location: users.php?status=error&message=Incomplete form data");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Management - Add User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include "../checkSession.php"; ?>
    <header>
        <h2>Add User</h2>
    </header>

    <div class="main">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="user_type">User Type</label>
            <select id="user_type" name="user_type" required>
                <option value="1">Admin</option>
                <option value="2">Normal User</option>
            </select>

            <input type="submit" value="Add User">
        </form>
    </div>
</body>

</html>