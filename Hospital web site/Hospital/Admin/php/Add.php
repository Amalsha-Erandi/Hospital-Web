<?php
session_start();
require_once "../../config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO doctors (name, specialty, email, phone) VALUES ('$name', '$specialty', '$email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Doctor added successfully!";
        header("Location: manage_doctors.php");
    } else {
        echo "Error: " . $conn->error;
    }
}


//Add Staff




