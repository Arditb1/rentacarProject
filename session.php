<?php
// Start the session
session_start();

// include database connection file
include('connect.php');

// retrieve user data from database
function setSession($user_id, $conn)
{
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // set session variables
    $_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $row['email'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['phone'] = $row['phone'];
}

// Get a session variable
function getSession($key)
{
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

// Destroy the session
function destroySession()
{
    session_destroy();
}
?>