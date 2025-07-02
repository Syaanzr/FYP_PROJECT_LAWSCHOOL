<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        header("Location: contact.php?error=All fields are required.");
        exit;
    }

    $conn = new mysqli("localhost", "root", "", "lawterm");

    if ($conn->connect_error) {
        header("Location: contact.php?error=Database connection failed.");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        header("Location: contact.php?success=1");
    } else {
        header("Location: contact.php?error=Failed to send message.");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: contact.php");
}
