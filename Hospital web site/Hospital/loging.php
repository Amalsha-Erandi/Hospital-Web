<?php 
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Care Compass Hospital</title>
    <link rel="stylesheet" type="text/css" href="loging.css" />
    
</head>

<body>
    <section>
        <div class="container">
            <div id="loginForm" class="form-box <?= isActiveForm('login', $activeForm); ?>">
                <legend>Login</legend>
                <form action="login_register.php" method="post">
                    <br>
                    <?php echo showError($errors['login']); ?>
                    <div class="dropdown-container">
                        <label for="options">User type</label>
                        <select name="user_type" required>
                            <option value="admin">Administrator</option> 
                            <option value="staff">Staff Member</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <br>
                    <button type="submit" name="login">Login</button>
                    <div class="register-link">
                        <p>Don't have an account? <a href="#" onclick="showRegisterForm()">Register</a></p>
                    </div>
                </form>
            </div>

            <div id="registrationForm" class="form-box <?= isActiveForm('register', $activeForm); ?>" style="display: none;">
                <legend>Register</legend>
                <br>
                <form action="login_register.php" method="post">
                    <?php echo showError($errors['register']); ?>
                    <div class="form-group">
                        <label for="FullName">Full Name</label>
                        <input type="text" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <label for="options">User type</label>
                        <select name="user_type" required>
                            <option value="admin">Administrator</option>
                            <option value="staff">Staff Member</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" name="register" class="submit-btn">Register</button>
                    <div class="register-link">
                        <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="login.js"></script>
</body>

</html>
