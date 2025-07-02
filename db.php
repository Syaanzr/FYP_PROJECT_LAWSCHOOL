<?php
header('Content-Type: application/json');

// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "lawterm");

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

$term = strtolower(trim($_GET['term'] ?? ''));
$lang = $_GET['lang'] ?? 'en';

// Find the term (either English or Malay)
$stmt = $conn->prepare("SELECT * FROM legal_terms WHERE LOWER(file_name) = ?");
$stmt->bind_param("s", $term);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $input_lang = ($row['id'] % 2 == 1) ? 'en' : 'ms'; // assume odd = en, even = ms

    if ($lang === $input_lang) {
        // Same language as input
        echo json_encode([
            "file_name" => $row['file_name'],
            "definition" => $row['definition']
        ]);
    } else {
        // Find translation
        $translation_name = $row['translation'];
        $stmt2 = $conn->prepare("SELECT file_name, definition FROM legal_terms WHERE file_name = ?");
        $stmt2->bind_param("s", $translation_name);
        $stmt2->execute();
        $translated = $stmt2->get_result()->fetch_assoc();

        if ($translated) {
            echo json_encode([
                "file_name" => $translated['file_name'],
                "definition" => $translated['definition']
            ]);
        } else {
            echo json_encode([
                "file_name" => ucfirst($term),
                "definition" => "Translation not found."
            ]);
        }
    }
} else {
    echo json_encode([
        "file_name" => ucfirst($term),
        "definition" => "No definition found."
    ]);
}

$conn->close();
?>
