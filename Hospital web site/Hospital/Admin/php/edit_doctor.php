<?php
session_start();
require_once "../../config.php"; 

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM doctors WHERE id=$id");
$doctor = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE doctors SET name='$name', specialty='$specialty', email='$email', phone='$phone' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_doctors.php");
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
   <title>Edit Doctor</title>
   <style>
       body {
    font-family: 'Inter', system-ui, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    margin: 0;
    padding: 20px;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    width: 500px;
    backdrop-filter: blur(10px);
    overflow: hidden;
}

h2 {
    text-align: center;
    margin: 0;
    padding: 25px;
    background: linear-gradient(to right, #4a00e0, #8e2de2);
    color: white;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

form {
    padding: 35px;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

label {
    color: #4a5568;
    font-size: 14px;
    font-weight: 500;
    margin-left: 4px;
}

input {
    padding: 14px 16px;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.3s ease;
    background: white;
}

input:hover {
    border-color: #cbd5e0;
}

input:focus {
    outline: none;
    border-color: #4a00e0;
    box-shadow: 0 0 0 3px rgba(74, 0, 224, 0.1);
}

button {
    background: linear-gradient(to right, #4a00e0, #8e2de2);
    color: white;
    padding: 16px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    margin-top: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(74, 0, 224, 0.15);
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(74, 0, 224, 0.2);
}

button:active {
    transform: translateY(0);
}

@media (max-width: 768px) {
    .container {
        width: 90%;
        margin: 20px auto;
    }
    
    form {
        padding: 25px;
    }
    
    input {
        padding: 12px 14px;
        font-size: 14px;
    }
    
    button {
        padding: 14px;
        font-size: 15px;
    }
    
    h2 {
        padding: 20px;
        font-size: 22px;
    }
}

@media (max-width: 480px) {
    body {
        padding: 10px;
    }
    
    .container {
        width: 100%;
        border-radius: 15px;
    }
    
    form {
        padding: 20px;
        gap: 20px;
    }
}
   </style>
</head>
<body>
   <div class="container">
       <h2>Edit Doctor</h2>
       <form method="POST">
           <div class="form-group">
               <label for="name">Doctor Name</label>
               <input type="text" id="name" name="name" value="<?= $doctor['name'] ?>" required>
           </div>

           <div class="form-group">
               <label for="specialty">Specialty</label>
               <input type="text" id="specialty" name="specialty" value="<?= $doctor['specialty'] ?>" required>
           </div>

           <div class="form-group">
               <label for="email">Email</label>
               <input type="email" id="email" name="email" value="<?= $doctor['email'] ?>" required>
           </div>

           <div class="form-group">
               <label for="phone">Phone</label>
               <input type="text" id="phone" name="phone" value="<?= $doctor['phone'] ?>" required>
           </div>

           <button type="submit">Update Doctor</button>
       </form>
   </div>
</body>
</html>