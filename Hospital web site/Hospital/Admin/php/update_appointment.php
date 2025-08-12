<?php
session_start();
require_once "../../config.php"; 

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];

$sql = "UPDATE appointments SET 
        name='$name', email='$email', phone='$phone', doctor='$doctor', 
        appointment_date='$appointment_date', appointment_time='$appointment_time' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: AppoinmentManage.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>
