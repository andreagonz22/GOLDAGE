<?php
include("connection.php");

$firstName = trim($_POST['first_name']);
$lastName = trim($_POST['last_name']);
$password = trim($_POST['password']);
$contact = trim($_POST['contact']);
$email = trim($_POST['email']);

// Validate required fields
if (empty($firstName) || empty($lastName) || empty($password) || empty($email)) {
    die("All required fields must be completed.");
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, "@") === false) {
    die("Please enter a valid email address with @.");
}

// Validate password length
if (strlen($password) < 8) {
    die("Password must contain at least 8 characters.");
}

// Encrypt password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insert user
$stmt = $conn->prepare("INSERT INTO USER (FIRST_NAME, LAST_NAME, PASSWORD, USER_CONTACT, USER_EMAIL) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssss", $firstName, $lastName, $passwordHash, $contact, $email);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit();
} else {
    if ($conn->errno == 1062) {
        echo "Email is already registered.";
    } else {
        echo "An error occurred while registering the user.";
    }
}

$stmt->close();
$conn->close();
?>