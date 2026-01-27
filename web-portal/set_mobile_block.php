<?php
/**
 * set_mobile_block.php
 * This script is called by JavaScript when a small screen size is detected.
 * It sets a session flag to block access on the next page load.
 */

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['block_access'])) {
    $_SESSION['access_blocked_by_screen_size'] = true;
    http_response_code(200);
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
