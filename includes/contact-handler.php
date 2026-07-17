<?php
/**
 * AJAX contact form handler.
 * Receives a POST request from js/contact.js, validates it, sends an
 * email via PHPMailer/SMTP, and responds with JSON.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// --- Honeypot spam check ---
// "website" is a hidden field real users never fill in. If it has a
// value, silently pretend success so bots don't learn to avoid it.
if (!empty($_POST['website'])) {
    echo json_encode(['success' => true, 'message' => 'Thank you! Your message has been sent.']);
    exit;
}

// --- Collect + sanitize input ---
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if ($name === '') {
    $errors[] = 'Please enter your name.';
}

if ($email === '') {
    $errors[] = 'Please enter your email address.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

if ($message === '') {
    $errors[] = 'Please enter a message.';
}

if ($phone !== '' && !preg_match('/^[0-9+\-\s().]{7,20}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number.';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// --- Load dependencies ---
$autoload = __DIR__ . '/../vendor/autoload.php';
$configFile = __DIR__ . '/mailer-config.php';

if (!file_exists($autoload)) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Email is not set up yet. Run "composer install" on the server.',
    ]);
    exit;
}

if (!file_exists($configFile)) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Email is not configured yet. Copy includes/mailer-config.sample.php to includes/mailer-config.php and fill in your SMTP details.',
    ]);
    exit;
}

require $autoload;
$config = require $configFile;

if (($config['host'] ?? '') === 'smtp.example.com') {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Email is not configured yet. Update includes/mailer-config.php with your real SMTP details.',
    ]);
    exit;
}

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = $config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['username'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = $config['encryption'] === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $config['port'];

    // Recipients
    $mail->setFrom($config['from_email'], $config['from_name']);
    $mail->addAddress($config['to_email'], $config['to_name']);
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission from ' . $name;

    $safeName    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safeEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $safePhone   = htmlspecialchars($phone !== '' ? $phone : 'Not provided', ENT_QUOTES, 'UTF-8');
    $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

    $mail->Body = "
        <h3>New Contact Form Submission</h3>
        <p><strong>Name:</strong> {$safeName}</p>
        <p><strong>Email:</strong> {$safeEmail}</p>
        <p><strong>Phone:</strong> {$safePhone}</p>
        <p><strong>Message:</strong><br>{$safeMessage}</p>
    ";
    $mail->AltBody = "New Contact Form Submission\n\n"
        . "Name: {$name}\n"
        . "Email: {$email}\n"
        . "Phone: " . ($phone !== '' ? $phone : 'Not provided') . "\n"
        . "Message:\n{$message}\n";

    $mail->send();

    echo json_encode([
        'success' => true,
        'message' => "Thank you, {$safeName}! Your message has been received. We'll get back to you soon.",
    ]);
} catch (PHPMailerException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Sorry, your message could not be sent. Please try again later or contact us directly.',
    ]);
}
