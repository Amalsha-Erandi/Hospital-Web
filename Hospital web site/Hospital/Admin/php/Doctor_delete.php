
<?php
session_start();
require_once "../../config.php"; 

$id = $_GET['id'];
$sql = "DELETE FROM doctors WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: manage_doctors.php");
} else {
    echo "Error: " . $conn->error;
}
