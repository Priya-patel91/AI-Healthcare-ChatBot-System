<?php

include "db_connect.php";

function safePost(string $key): string {
    return isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

$name = safePost('name');
$email = safePost('email');
$phone = safePost('phone');
$age = safePost('age');
$subject = safePost('subject');
$message = safePost('message');
$preferred_contact = safePost('preferred_contact');

// Additional fields that may be submitted from specialized forms (e.g. consultation request)
$gender = safePost('gender');
$duration = safePost('duration');
$conditions = safePost('conditions');
$medications = safePost('medications');
$allergies = safePost('allergies');

$errors = [];
if ($name === '') {
    $errors[] = 'Name is required';
}
if ($email === '') {
    $errors[] = 'Email is required';
}
if ($message === '') {
    $errors[] = 'Message is required';
}

$redirectPage = safePost('redirect_page') ?: 'index.php';
if ($subject === 'General Health Consultation' && $redirectPage === 'index.php') {
    $redirectPage = 'General%20Health%20Consultation.php';
}

if (!empty($errors)) {
    $errorMsg = urlencode(implode('. ', $errors));
    header("Location: {$redirectPage}?error={$errorMsg}");
    exit;
}

$ageValue = ($age === '' ? null : (int) $age);

// Enhance message with extra details if available
$enhancedMessage = $message;
if ($gender !== '') {
    $enhancedMessage .= "\n\nGender: {$gender}";
}
if ($duration !== '') {
    $enhancedMessage .= "\nDuration: {$duration}";
}
if ($conditions !== '') {
    $enhancedMessage .= "\nExisting conditions: {$conditions}";
}
if ($medications !== '') {
    $enhancedMessage .= "\nCurrent medications: {$medications}";
}
if ($allergies !== '') {
    $enhancedMessage .= "\nAllergies: {$allergies}";
}

$stmt = $conn->prepare(
    "INSERT INTO contact_messages (name, email, phone, age, subject, message, preferred_contact)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);

if (!$stmt) {
    $errorMsg = urlencode('Database error: ' . $conn->error);
    header("Location: index.php?error={$errorMsg}");
    exit;
}

// Bind parameters (use 'i' for integer age, 's' for strings)
$stmt->bind_param(
    'ssissss',
    $name,
    $email,
    $phone,
    $ageValue,
    $subject,
    $enhancedMessage,
    $preferred_contact
);

if ($stmt->execute()) {
    header("Location: {$redirectPage}?success=1");
    exit;
}

$errorMsg = urlencode('Database error: ' . $stmt->error);
header("Location: {$redirectPage}?error={$errorMsg}");
exit;

?>