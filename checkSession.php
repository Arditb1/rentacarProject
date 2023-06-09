<?php
// Check if a session is not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is not logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: testLogin.php");
    exit();
}
?>