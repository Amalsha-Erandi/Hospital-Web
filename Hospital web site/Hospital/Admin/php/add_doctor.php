<?php
session_start();
require_once "../../config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $s_name = $_POST['s_name'];
    $s_position = $_POST['s_position'];
    $s_email = $_POST['s_email'];
    $s_phone = $_POST['s_phone'];

    $sql = "INSERT INTO staff (s_name, s_position, s_email, s_phone) VALUES ('$s_name', '$s_position', '$s_email', '$s_phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Staff member added successfully!";
        header("Location: manage_staff.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
