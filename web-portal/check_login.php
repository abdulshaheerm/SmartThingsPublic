<?php
/**
 * check_login.php
 * Handles user authentication for the HASIB Digital Card Portal
 */

session_start();

// Prevent direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

// Retrieve and sanitize input
$submitted_username = trim($_POST['submitted_username'] ?? '');
$submitted_password = $_POST['submitted_password'] ?? '';
$remember_me = isset($_POST['remember_me']);

// Basic validation
if (empty($submitted_username) || empty($submitted_password)) {
    $_SESSION['login_error'] = true;
    header('Location: login.php');
    exit;
}

// --------------------------------------------------------------------------------
// AUTHENTICATION LOGIC
// In a real application, you would:
// 1. Connect to a database
// 2. Look up the user by username/email
// 3. Verify the password using password_verify() against a hashed password
// 4. Check if the account is active, not locked, etc.
// --------------------------------------------------------------------------------

// For demonstration purposes, we'll use a simple hardcoded check
// REPLACE THIS WITH ACTUAL DATABASE AUTHENTICATION
$valid_credentials = false;

// Example: Admin user
if ($submitted_username === 'admin' && $submitted_password === 'admin123') {
    $valid_credentials = true;
    $user_role = 'admin';
    $user_id = 1;
}

// Example: Regular user (email-based)
if (strpos($submitted_username, '@') !== false) {
    // In production, validate against database
    // For now, accept any email with password "user123"
    if ($submitted_password === 'user123') {
        $valid_credentials = true;
        $user_role = 'user';
        $user_id = 2;
    }
}

// --------------------------------------------------------------------------------
// HANDLE AUTHENTICATION RESULT
// --------------------------------------------------------------------------------
if ($valid_credentials) {
    // Regenerate session ID to prevent session fixation attacks
    session_regenerate_id(true);
    
    // Set session variables
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $submitted_username;
    $_SESSION['user_role'] = $user_role;
    $_SESSION['login_time'] = time();
    
    // Handle "Remember Me" functionality
    if ($remember_me) {
        // Set a cookie that expires in 30 days
        setcookie(
            'remembered_email',
            $submitted_username,
            time() + (30 * 24 * 60 * 60), // 30 days
            '/',
            '',
            true, // Secure flag (requires HTTPS in production)
            true  // HttpOnly flag
        );
    } else {
        // Clear the remember me cookie if unchecked
        if (isset($_COOKIE['remembered_email'])) {
            setcookie('remembered_email', '', time() - 3600, '/');
        }
    }
    
    // Redirect to dashboard or home page
    header('Location: dashboard.php');
    exit;
    
} else {
    // Authentication failed
    $_SESSION['login_error'] = true;
    
    // Optional: Implement login attempt tracking/rate limiting here
    
    // Redirect back to login page
    header('Location: login.php');
    exit;
}
