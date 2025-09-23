<?php
// Raw PHP login endpoint - bypasses Laravel completely
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Log the request for debugging
error_log('Raw PHP login called - Method: ' . $_SERVER['REQUEST_METHOD']);
error_log('Raw PHP login called - Headers: ' . print_r(getallheaders(), true));

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get POST data
$input = json_decode(file_get_contents('php://input'), true);
$email = $input['email'] ?? '';
$password = $input['password'] ?? '';

error_log('Raw PHP login - Email: ' . $email . ', Password: ' . $password);

// Simple hardcoded credentials for testing
$valid_credentials = [
    'calendar@thefinestgroup.co.uk' => 'admin'
];

if (isset($valid_credentials[$email]) && $valid_credentials[$email] === $password) {
    // Set a simple authentication cookie
    $token = base64_encode($email . '|' . time());
    setcookie('auth_token', $token, time() + 3600, '/', '', true, true); // 1 hour, secure, httponly
    
    echo json_encode([
        'success' => true,
        'message' => 'Login successful',
        'redirect' => 'https://sss.thefinestgroup.co.uk/events'
    ]);
} else {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid credentials'
    ]);
}
?>
