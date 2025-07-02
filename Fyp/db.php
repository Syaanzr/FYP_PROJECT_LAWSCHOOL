<?php
header('Content-Type: application/json');

// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "lawterm");

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

$term = strtolower(trim($_GET['term'] ?? ''));
$lang = $_GET['lang'] ?? 'en';

// Query for matching file_name (case-insensitive)
$stmt = $conn->prepare("SELECT file_name, translation, definition FROM legal_terms WHERE LOWER(file_name) = ?");
$stmt->bind_param("s", $term);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Flip data if Malay is selected
    if ($lang === 'ms') {
        echo json_encode([
            "file_name" => $row['translation'],
            "definition" => $row['definition']
        ]);
    } else {
        echo json_encode([
            "file_name" => $row['file_name'],
            "definition" => $row['definition']
        ]);
    }
} else {
    echo json_encode([
        "file_name" => ucfirst($term),
        "definition" => "No definition found."
    ]);
}

$conn->close();
?>
