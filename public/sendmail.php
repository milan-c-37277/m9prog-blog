<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
 
// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}
 
// Get POST data
$input = json_decode(file_get_contents('php://input'), true);
 
// If JSON decode fails, try regular POST data
if (!$input) {
    $input = $_POST;
}
 
// Validate required fields
$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$message = trim($input['message'] ?? '');
 
$errors = [];
 
if (empty($name)) {
    $errors[] = 'Name is required';
}
 
if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Valid email is required';
}
 
if (empty($message)) {
    $errors[] = 'Message is required';
}
 
// Check for spam (basic protection)
if (strlen($message) > 2000) {
    $errors[] = 'Message is too long';
}
 
if (!empty($errors)) {
    header('location: /index.php');
    exit;
}
 
// Sanitize input
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
 
// Email configuration
$to = 'milan.carati@gmail.com';
$subject = 'New Contact Form Message from ' . $name;
 
// Create email content
$email_body = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #3b82f6, #06b6d4); color: white; padding: 20px; border-radius: 8px 8px 0 0; }
        .content { background: #f9fafb; padding: 20px; border-radius: 0 0 8px 8px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #374151; }
        .value { margin-top: 5px; padding: 10px; background: white; border-radius: 4px; border-left: 4px solid #3b82f6; }
        .message-content { white-space: pre-wrap; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Message from Portfolio Contact Form</h2>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>Name:</div>
                <div class='value'>{$name}</div>
            </div>
            <div class='field'>
                <div class='label'>Email:</div>
                <div class='value'>{$email}</div>
            </div>
            <div class='field'>
                <div class='label'>Message:</div>
                <div class='value message-content'>{$message}</div>
            </div>
            <hr>
            <p><small>Sent from your portfolio website on " . date('Y-m-d H:i:s') . "</small></p>
        </div>
    </div>
</body>
</html>
";
 
// Email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: Portfolio Contact Form <noreply@' . $_SERVER['HTTP_HOST'] . '>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion()
];
 
// Attempt to send email
if (mail($to, $subject, $email_body, implode("\r\n", $headers))) {
    session_start();
    $_SESSION['success_message'] = "Je bericht is succesvol verzonden!";
    header('Location: /index.php');
    exit;
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to send message. Please try again later.'
    ]);
}
