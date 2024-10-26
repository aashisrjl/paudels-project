<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


include('../includes/database_connection.php');

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script defer src="../js/profile.js"></script>
</head>
<body>

<?php include '../includes/header.php'; ?>
    <div class="profile-container">

        <div class="sidebar">
            <div class="profile-header">
                <h3><?php echo htmlspecialchars($user['username']); ?></h3>
                <p><?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <ul class="sidebar-links">
                <li><a href="#" id="dashboard-link" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#" id="orders-link"><i class="fas fa-box"></i> Orders</a></li>
                <li><a href="#" id="settings-link"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

       
        <div class="main-content">
        
            <div id="dashboard-content" class="content-section active">
                <div class="dashboard-header">
                    <h2>My Dashboard</h2>
                    <p>Hello, <strong><?php echo htmlspecialchars($user['username']); ?></strong></p>
                    <div class="dashboard-stats">
                        <div class="stat-item">
                            <i class="fas fa-shopping-cart"></i>
                            <div>
                                <p>Total Orders</p>
                                <h4>0</h4> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="account-info">
                    <div class="personal-info">
                        <h4>Personal Information</h4>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                </div>
            </div>

         
            <div id="orders-content" class="content-section">
                <h2>My Orders</h2>
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        
                    </tbody>
                </table>
            </div>

            <div id="settings-content" class="content-section">
                <h2>Account Settings</h2>
                <p>Manage your account settings here.</p>
                
                <form id="account-settings-form" action="settings_process.php" method="POST">
                    <div class="form-group">
                        <label for="old_password">Old Password*</label>
                        <input type="password" id="old_password" name="old_password" required placeholder="Old Password">

                        <label for="new_password">New Password*</label>
                        <input type="password" id="new_password" name="new_password" required placeholder="New Password">

                        <label for="confirm_password">Confirm Password*</label>
                        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
