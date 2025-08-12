<?php
session_start();
require_once "../../config.php"; 

$id = $_GET['id'];

$sql = "DELETE FROM appointments WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: AppoinmentManage.php");
} else {
    echo "Error deleting record: " . $conn->error;
}



?>