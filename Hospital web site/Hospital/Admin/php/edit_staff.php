<?php
session_start();
require_once "../../config.php"; 

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM staff WHERE id=$id");
$staff = $result->fetch_assoc();

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM staff WHERE id=$id");
$staff = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_name = $_POST['s_name'];
    $s_position = $_POST['s_position'];
    $s_email = $_POST['s_email'];
    $s_phone = $_POST['s_phone'];

    $sql = "UPDATE staff SET s_name='$s_name', s_position='$s_position', s_email='$s_email', s_phone='$s_phone' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_staff.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Staff</title>
   <link rel="stylesheet" type="text/css"  href="../css/editstaff.css">

   
</head>
<body>
   <div class="container">
       <h2>Edit Staff</h2>
       <form method="POST">
           <div class="form-group">
               <label for="s_name">Staff Name</label>
               <input type="text" id="s_name" name="s_name" value="<?= $staff['s_name'] ?>" required>
           </div>

           <div class="form-group">
               <label for="s_position">Position</label>
               <input type="text" id="s_position" name="s_position" value="<?= $staff['s_position'] ?>" required>
           </div>

           <div class="form-group">
               <label for="s_email">Email</label>
               <input type="email" id="s_email" name="s_email" value="<?= $staff['s_email'] ?>" required>
           </div>

           <div class="form-group">
               <label for="s_phone">Phone</label>
               <input type="text" id="s_phone" name="s_phone" value="<?= $staff['s_phone'] ?>" required>
           </div>

           <button type="submit">Update Staff</button>
       </form>
   </div>
</body>
</html>
