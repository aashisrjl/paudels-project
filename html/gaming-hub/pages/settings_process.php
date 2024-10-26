<?php
session_start();
include('../includes/database_connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (password_verify($old_password, $user['password'])) {
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_query = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param('si', $hashed_password, $user_id);

            if ($stmt->execute()) {
                echo "<script>alert('Password updated successfully. Please log in again.');</script>";

                session_unset();
                session_destroy(); 
                header("Location: login.php");
                exit();
            } else {
                echo "Error updating password.";
            }
        } else {
            echo "New password and confirm password do not match.";
        }
    } else {
        echo "Old password is incorrect.";
    }
}
?>
