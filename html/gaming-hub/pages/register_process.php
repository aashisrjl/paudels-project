<?php
session_start();  
include '../includes/database_connection.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id);
        $stmt->fetch();

        $stmt_username = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt_username->bind_param("s", $username);
        $stmt_username->execute();
        $stmt_username->store_result();

        $stmt_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt_email->bind_param("s", $email);
        $stmt_email->execute();
        $stmt_email->store_result();
        
        if ($stmt_username->num_rows > 0) {
            $_SESSION['error'] = "Username already exists. Please choose a different username.";
        } elseif ($stmt_email->num_rows > 0) {
            $_SESSION['error'] = "Email already exists. Please use a different email.";
        }

        header("Location: register.php");
        exit();
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            header("Location: register.php?status=success");
            exit();
        } else {
        $_SESSION['error'] = "An error occurred during registration. Please try again.";
            header("Location: register.php");
            exit();
        }
    }
    $stmt->close();
    $stmt_username->close();
    $stmt_email->close();
    $conn->close();
}
