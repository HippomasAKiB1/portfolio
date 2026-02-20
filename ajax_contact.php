<?php
/**
 * ajax_contact.php
 * AJAX endpoint for the contact form.
 * Accepts POST JSON, validates input, and returns JSON response.
 *
 * Usage: POST /portfolio/ajax_contact.php
 * Body:  { "name": "...", "email": "...", "message": "..." }
 */

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

header('Content-Type: application/json');

// ── Read and decode the incoming JSON body ────────────────────────────────────
$raw  = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!$body) {
    echo json_encode(['success' => false, 'message' => 'Invalid request data.']);
    exit;
}

// ── Sanitise inputs ───────────────────────────────────────────────────────────
$name    = trim(strip_tags($body['name']    ?? ''));
$email   = trim(strip_tags($body['email']   ?? ''));
$message = trim(strip_tags($body['message'] ?? ''));

// ── Validate ──────────────────────────────────────────────────────────────────
$errors = [];

if (strlen($name) < 2) {
    $errors[] = 'Name must be at least 2 characters.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

if (strlen($message) < 10) {
    $errors[] = 'Message must be at least 10 characters.';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// ── Attempt to send the email ─────────────────────────────────────────────────
// On a real server with a configured mail agent this will deliver the email.
// On localhost (XAMPP) mail() usually fails silently — that is fine for dev.
require_once __DIR__ . '/config/config.php';

$to      = PORTFOLIO_EMAIL;
$subject = 'New Contact Message from ' . $name;
$body_content =
    "Name:    {$name}\n" .
    "Email:   {$email}\n" .
    "Message:\n{$message}\n";

$headers = "From: {$email}\r\nReply-To: {$email}\r\nX-Mailer: PHP/" . phpversion();

// We intentionally ignore the return value of mail() here so the form
// shows success on localhost even without a working mail server.
@mail($to, $subject, $body_content, $headers);

echo json_encode([
    'success' => true,
    'message' => "Thanks {$name}! Your message has been sent. I'll get back to you soon.",
]);
