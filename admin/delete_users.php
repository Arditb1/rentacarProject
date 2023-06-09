<?php
include "../checkSession.php";
// Check if user ID is provided in the query string
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Include the database connection file
    include "../connect.php";

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);

    // Check if the deletion was successful
    if ($result) {
        // Redirect to the users page with a success message
        header("Location: users.php?status=success&message=User deleted successfully");
        exit;
    } else {
        // Redirect to the users page with an error message
        $errorMessage = mysqli_error($conn);
        header("Location: users.php?status=error&message=Failed to delete user. Error: $errorMessage");
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