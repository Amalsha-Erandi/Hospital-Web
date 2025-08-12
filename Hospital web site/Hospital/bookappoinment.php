<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - Hospital</title>
    <link rel="stylesheet" type="text/css" href="bookappoinment.css">
</head>
<body>
    <div class="container">
        <h1>Book Your Appointment</h1>

        <form action="book_appointment.php" method="POST">
            <?php
            session_start();
            if (isset($_SESSION['success_message'])) {
                echo "<p class='success-message'>" . $_SESSION['success_message'] . "</p>";
                unset($_SESSION['success_message']);
            }
            ?>

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="doctor">Select Doctor:</label>
                <select id="doctor" name="doctor" required>
                    <option value="Dr. Gunasekara">Dr. Gunasekara</option>
                    <option value="Dr. jayarathna">Dr. jayarathna</option>
                    <option value="Dr. Nimal">Dr. Lee</option>
                    <option value="Dr. Namidu">Dr. Namidu</option>
                    <option value="Dr. Dinu">Dr. Dinu</option>
                    <option value="Dr. Amalsha">Dr. Amlasha</option>
                </select>
            </div>

            <div class="form-group">
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" required>
            </div>

            <div class="form-group">
                <label for="appointment_time">Appointment Time:</label>
                <input type="time" id="appointment_time" name="appointment_time" required>
            </div>

            <button type="submit">BOOK APPOINTMENT</button>
        </form>
    </div>
</body>
</html>