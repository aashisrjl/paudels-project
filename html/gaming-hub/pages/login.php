<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include '../includes/header.php'; ?>

   <div class="container">
   <div class="form-container">
        <h2>Login</h2>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']); 
        }
        ?>

        <form id="login-form" action="login_process.php" method="POST" class="login-form">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <div id="email-error" class="error-message"></div>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <div id="password-error" class="error-message"></div>

            <button type="submit" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php" class="register-link">Register</a></p>
    </div>
   </div>

   <script src="../js/scripts.js"></script>

<?php include '../includes/footer.php'; ?>

</body>
</html>
