<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
    <div class="form-container">
        <h2>Register</h2>

        <div id="error-message" class="error-message" style="display:none;"></div>

        <form id="register-form" action="register_process.php" method="POST" class="register-form">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <div id="username-error" class="error-message"></div>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <div id="email-error" class="error-message"></div>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <div id="password-error" class="error-message"></div>

            <button type="submit" class="btn">Register</button>
        </form>

        <p>Already have an account? <a href="login.php" class="login-link">Login</a></p>
    </div>
    </div>

    <?php
   
    if (isset($_SESSION['error'])) {
        echo '<div id="session-error" data-error="' . $_SESSION['error'] . '"></div>';
        unset($_SESSION['error']); 
    }
    ?>

    <?php include '../includes/footer.php'; ?>

    <script src="../js/scripts.js"></script>

</body>
</html>
