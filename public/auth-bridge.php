<?php
// Auth bridge - connects raw PHP login with Laravel authentication
session_start();

// Check if we have a valid auth token
if (isset($_COOKIE['auth_token'])) {
    $token = $_COOKIE['auth_token'];
    $decoded = base64_decode($token);
    $parts = explode('|', $decoded);
    
    if (count($parts) === 2) {
        $email = $parts[0];
        $timestamp = $parts[1];
        
        // Check if token is not expired (1 hour)
        if (time() - $timestamp < 3600) {
            // Set Laravel session data
            $_SESSION['laravel_session'] = [
                'auth' => [
                    'web' => [
                        'id' => 1, // Admin user ID
                        'email' => $email,
                        'name' => 'TheFinestGroup Admin'
                    ]
                ]
            ];
            
            // Redirect to Laravel app with session
            header('Location: /events');
            exit;
        }
    }
}

// If no valid token, redirect to login
header('Location: /standalone-login.html');
exit;
?>

