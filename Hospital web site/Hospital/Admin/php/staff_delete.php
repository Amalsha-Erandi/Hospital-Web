<?php
session_start();
require_once "../../config.php"; 

$id = $_GET['id'];
$sql = "DELETE FROM staff WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: manage_staff.php");
} else {
    echo "Error: " . $conn->error;
}
?>