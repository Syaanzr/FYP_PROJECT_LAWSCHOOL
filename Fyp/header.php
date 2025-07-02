<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Terms Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>LAWSCHOOL Legal Terms</h1>
</header>
<nav>
    <a href="home.php<?= isset($_GET['lang']) ? '?lang=' . htmlspecialchars($_GET['lang']) : '' ?>">Home</a>
    <a href="dictionary.php<?= isset($_GET['lang']) ? '?lang=' . htmlspecialchars($_GET['lang']) : '' ?>">Dictionary</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
</nav>