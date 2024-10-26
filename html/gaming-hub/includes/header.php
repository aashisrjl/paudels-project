<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Hub</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script defer src="../js/script.js"></script>
</head>
<body>
<header>
      <nav class="navbar">
          <div class="logo">
            <a href="/gaming-hub">Gaming HUB</a>
          </div>
          <ul class="nav-links" id="nav-links">
            <li><a href="/gaming-hub">Home</a></li>
            <li><a href="/gaming-hub/pages/tiktok_coin.php">Tiktok Coins</a></li>
            <li><a href="/gaming-hub/pages/gift_cards.php">Gift Card</a></li>
            <li><a href="/gaming-hub/pages/mobile_game_topup.php">Mobile Games Top Up</a></li>
            <li><a href="/gaming-hub/pages/gaming_gears.php">Gaming Gears</a></li>
            <li><i class="fas fa-search" id="search-icon"></i></li>
            
            <?php if (isset($_SESSION['username'])): ?>
            <li><a href="/gaming-hub/pages/cart.php"><i class="fas fa-shopping-cart"></i></a></li>
            <li class="profile-dropdown">
                <a href="#" id="profile-menu"><?php echo htmlspecialchars($_SESSION['username']); ?>
                    <i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li><a href="/gaming-hub/pages/profile.php"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="/pages/orders.php"><i class="fas fa-box"></i> Orders</a></li>
                    <li><a href="/pages/settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                    <li><a href="/gaming-hub/pages/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </li>
            <?php else: ?>
            <li><a href="/gaming-hub/pages/login.php" class="login-btn">Login</a></li>
            <?php endif; ?>
          </ul>
          
          <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
          </div>
      </nav>

      <div id="search-overlay" class="overlay">
        <div class="overlay-content">
          <span class="close-btn" id="close-btn">&times;</span>
          <h2>Start typing...</h2>
          <input type="text" placeholder="Search..." class="search-box">
        </div>
      </div>
  </header>
</body>
</html>
