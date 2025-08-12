<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO feedback_queries (name, email, type, message) VALUES ('$name', '$email', '$type', '$message')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Your submission was successful!');</script>";
    } else {
        echo "<script>alert('Error submitting your response');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback or Query</title>
    

    <style>
        body {
            
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    padding: 20px;
}

.container {
    max-width: 700px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2, h3 {
    text-align: center;
    color: #2C3E50;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    font-weight: bold;
}

input, select, textarea {
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 100%;
}

button {
    margin-top: 15px;
    padding: 10px;
    border: none;
    background: #3498DB;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #2980B9;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background: #3498DB;
    color: white;
}

td a {
    color: red;
    text-decoration: none;
}



    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Feedback or Query</h2>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name" required>
            
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Type:</label>
            <select name="type" required>
                <option value="feedback">Feedback</option>
                <option value="query">Query</option>
            </select>

            <label>Message:</label>
            <textarea name="message" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
