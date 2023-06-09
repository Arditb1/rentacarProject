<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "INSERT INTO users (first_name, last_name, email, password,phone_number) VALUES ('$first_name', '$last_name', '$email', '$password',$phone_number)";



    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
    } else {
        echo "Error: Could not connect to server";
    }

    $conn->close();
}
?>