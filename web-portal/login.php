<?php
session_start();

// --- START MOBILE ACCESS CONTROL FUNCTIONS ---
/**
 * Simple function to check if the user agent string contains common mobile/tablet keywords.
 * This is the first-line defense but is easily spoofed.
 */
function is_mobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    // Common mobile/tablet keywords
    $mobile_agents = ['Mobi', 'Android', 'iPhone', 'iPad', 'BlackBerry', 'Windows Phone', 'Tablet', 'Silk'];
    foreach ($mobile_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            return true;
        }
    }
    return false;
}
// --- END MOBILE ACCESS CONTROL FUNCTIONS ---


// --------------------------------------------------------------------------------
// PRIORITY 1: SCREEN SIZE BLOCK (Defeats Desktop View Spoofing)
// This flag is set by JavaScript in login.js if the viewport is small.
// --------------------------------------------------------------------------------
if (isset($_SESSION['access_blocked_by_screen_size']) && $_SESSION['access_blocked_by_screen_size'] === true) {
    // Unset the session flag immediately after checking to prevent blocking the next non-mobile user
    unset($_SESSION['access_blocked_by_screen_size']); 
    
    // Fall through to the restriction message block below
    $is_blocked = true;

} else if (is_mobile()) {
    // --------------------------------------------------------------------------------
    // PRIORITY 2: USER AGENT BLOCK (Standard Mobile Check)
    // --------------------------------------------------------------------------------
    $is_blocked = true;

} else {
    $is_blocked = false;
}


if ($is_blocked) {
    // Stop the script and display the restriction message
    header('Content-Type: text/html; charset=utf-8');
    // Using inline styles matching your primary color scheme for the error page
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Access Restricted</title>
            <style>
                body { 
                    font-family: sans-serif; 
                    display: flex; 
                    flex-direction: column; 
                    justify-content: center; 
                    align-items: center; 
                    min-height: 100vh; 
                    text-align: center; 
                    background-color: #f3f5f8; 
                    margin: 0;
                }
                .message { 
                    background-color: #49499d; /* Primary color */
                    color: white; 
                    padding: 40px; 
                    border-radius: 15px; 
                    max-width: 90%;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                }
                .message h2 { margin-top: 0; }
            </style>
        </head>
        <body>
            <div class="message">
                <h2>Access Restricted</h2>
                <p>Please login in computer.</p>
                <small>This portal requires a desktop or large tablet screen for proper viewing.</small>
            </div>
        </body>
        </html>';
    exit;
}
// --- END NEW MOBILE ACCESS CONTROL ---


$error_message = "";
if (isset($_SESSION['login_error'])) {
    // Abstract error message for security
    $error_message = "Authentication failed. Please check your credentials.";
    // Unset the session variable so the error doesn't reappear on refresh
    unset($_SESSION['login_error']);
}

// Logic to check for the 'remembered_email' cookie and pre-fill the input field
$remembered_email = "";
if (isset($_COOKIE['remembered_email'])) {
    // Safely retrieve and display the cookie value
    $remembered_email = htmlspecialchars($_COOKIE['remembered_email']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline'; img-src 'self' data:;">
    
    <title>HASIB Digital Card Portal Login</title>
    
    <link rel="stylesheet" href="login.css">
    
</head>

<body> 
    
    <div class="header-logo-area">
        <img src="../hasib logo.png" alt="HASIB Logo" class="top-brand-logo-global">
    </div>

    <div class="split-container">

        <div class="left-panel">

            <div class="left-panel-content">
                <h2>HASIB</h2>
                <p>Digital Business Card <br> Management Portal</p>
            </div>

            <div class="single-logo-container">
                <img src="Hasib white logo.svg" alt="Hasib Partner Logo">
            </div>

            <div style="font-size: 0.8em; opacity: 0.6; margin-top: auto;">
                Empowering Modern Business Identity <br>
                © 2025 Applied Computer Services Company
            </div>
        </div>

        <div class="right-panel login-box">

            <div class="welcome-heading">Welcome Back</div>
            <div class="welcome-subtitle">Sign in using your corporate email or username to continue.</div>

            <?php if (!empty($error_message)): ?>
                <p class="error" id="error-message-box"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form action="check_login.php" method="POST">
                <input
                    type="text"
                    name="submitted_username"
                    placeholder=" Corporate Email ID or Username"
                    required
                    autocomplete="username"
                    value="<?php echo $remembered_email; ?>"
                    
                    pattern="^admin$|.+@.+\..+" 
                    title="Please enter a valid corporate email address (e.g., user@domain.com) or the admin username."
                >

                <div class="password-group">
                    <input 
                        type="password" 
                        name="submitted_password" 
                        id="password-field" 
                        placeholder=" Password" 
                        required 
                        autocomplete="current-password"
                        onpaste="return false;" oncopy="return false;"    >
                    <span class="toggle-password">
                        👁️
                    </span>
                </div>

                <div class="utility-links">
                    <label class="remember-me">
                        <input type="checkbox" name="remember_me"> Remember Me
                    </label>
                </div>

                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
