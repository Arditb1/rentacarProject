<?php
include "../checkSession.php";

// Check if user ID is provided in the query string
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Include the database connection file
    include "../connect.php";

    // Retrieve the user data from the database
    $sql = "SELECT * FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Process the form submission
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve the updated form data
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phone_number'];
            $userType = $_POST['user_type'];

            // Perform validation and sanitation of the form data

            // Update the user data in the database
            $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', email = '$email', 
                    phone_number = '$phoneNumber', user_type = '$userType' WHERE user_id = $userId";
            $result = mysqli_query($conn, $sql);

            // Check if the update was successful
            if ($result) {
                // Redirect to the users page with a success message
                header("Location: users.php?status=success&message=User updated successfully");
                exit;
            } else {
                // Redirect to the users page with an error message
                $errorMessage = mysqli_error($conn);
                header("Location: users.php?status=error&message=Failed to update user. Error: $errorMessage");
                exit;
            }
        }
    } else {
        // Redirect to the users page with an error message
        header("Location: users.php?status=error&message=User not found");
        exit;
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to the users page with an error message
    header("Location: users.php?status=error&message=Invalid user ID");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Management - Edit User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <header>
        <h2>Edit User</h2>
    </header>

    <div class="main">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?user_id=' . $userId; ?>">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>"
                required>

            <label for="user_type">User Type</label>
            <select id="user_type" name="user_type" required>
                <option value="1" <?php if ($user['user_type'] == 1)
                    echo 'selected'; ?>>Admin</option>
                <option value="2" <?php if ($user['user_type'] == 2)
                    echo 'selected'; ?>>Normal User</option>
            </select>

            <input type="submit" value="Update User">
        </form>
    </div>
</body>

</html>