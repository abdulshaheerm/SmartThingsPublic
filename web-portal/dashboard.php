<?php
/**
 * dashboard.php
 * Main dashboard for authenticated users
 */

session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Get user information from session
$username = htmlspecialchars($_SESSION['username'] ?? 'User');
$user_role = htmlspecialchars($_SESSION['user_role'] ?? 'user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <title>Dashboard - HASIB Digital Card Portal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f5f8;
            min-height: 100vh;
        }
        
        .header {
            background-color: #49499d;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .header h1 {
            font-size: 1.8em;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .logout-btn {
            background-color: white;
            color: #49499d;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        
        .logout-btn:hover {
            background-color: #f0f0f0;
        }
        
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .welcome-card {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .welcome-card h2 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .welcome-card p {
            color: #666;
            font-size: 1.1em;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .info-card {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .info-card h3 {
            color: #49499d;
            margin-bottom: 10px;
        }
        
        .info-card p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>HASIB Digital Card Portal</h1>
        <div class="user-info">
            <span>Welcome, <?php echo $username; ?> (<?php echo $user_role; ?>)</span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="welcome-card">
            <h2>Welcome to Your Dashboard</h2>
            <p>You have successfully logged in to the HASIB Digital Card Management Portal.</p>
        </div>
        
        <div class="info-grid">
            <div class="info-card">
                <h3>Digital Cards</h3>
                <p>Manage your digital business cards and view analytics.</p>
            </div>
            
            <div class="info-card">
                <h3>Profile Settings</h3>
                <p>Update your profile information and preferences.</p>
            </div>
            
            <div class="info-card">
                <h3>Reports</h3>
                <p>View detailed reports and statistics.</p>
            </div>
            
            <div class="info-card">
                <h3>Support</h3>
                <p>Get help and access documentation.</p>
            </div>
        </div>
    </div>
</body>
</html>
