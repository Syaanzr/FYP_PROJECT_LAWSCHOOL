<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LAWSCHOOL Legal Terms</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --bg: #f2f2f2;
      --text: #004085;
      --header-bg: #004085;
      --header-text: #fff;
      --active-bg: #004085;
      --active-text: #fff;
    }

    body.dark {
      --bg: #121212;
      --text: #f0f0f0;
      --header-bg: #1a1a1a;
      --header-text:rgb(0, 0, 0);
      --active-bg: #333;
      --active-text: #ffffff;
    }

    body {
      background-color: var(--bg);
      color: var(--text);
      margin: 0;
      font-family: Arial, sans-serif;
      transition: 0.3s;
    }

    header {
      background-color: var(--header-bg);
      color: var(--header-text);
      padding: 15px 20px;
      text-align: center;
    }

    .navbar {
      background-color: var(--bg);
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .navbar .nav-links {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .navbar a {
      color: var(--text);
      text-decoration: none;
      font-weight: bold;
      display: flex;
      align-items: center;
    }

    .navbar a i {
      margin-right: 6px;
    }

    .navbar a.active {
      background-color: var(--active-bg);
      color: var(--active-text);
      padding: 6px 12px;
      border-radius: 5px;
    }

    .navbar-toggle {
      display: none;
      font-size: 24px;
      cursor: pointer;
    }

    .toggle-darkmode {
      background: none;
      border: none;
      font-size: 20px;
      color: var(--text);
      cursor: pointer;
    }

    @media (max-width: 600px) {
      .navbar .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
      }

      .navbar .nav-links.show {
        display: flex;
      }

      .navbar-toggle {
        display: block;
        color: var(--text);
      }
    }
  </style>
</head>
<body>

<header>
  <h1>LAWSCHOOL Legal Terms</h1>
</header>

<nav class="navbar">
  <div class="navbar-toggle" onclick="toggleNav()">☰</div>
  <div class="nav-links" id="navLinks">
    <a href="home.php" class="<?= basename($_SERVER['PHP_SELF']) === 'home.php' ? 'active' : '' ?>"><i class="bi bi-house-door-fill"></i> Home</a>
    <a href="dictionary.php" class="<?= basename($_SERVER['PHP_SELF']) === 'dictionary.php' ? 'active' : '' ?>"><i class="bi bi-book-half"></i> Dictionary</a>
    <a href="about.php" class="<?= basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : '' ?>"><i class="bi bi-info-circle-fill"></i> About</a>
    <a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : '' ?>"><i class="bi bi-envelope-fill"></i> Contact</a>
  </div>
  <button class="toggle-darkmode" onclick="toggleDarkMode()" title="Toggle dark mode">
    <i class="bi bi-moon-stars-fill"></i>
  </button>
</nav>

<script>
  function toggleNav() {
    document.getElementById("navLinks").classList.toggle("show");
  }

  function toggleDarkMode() {
    const body = document.body;
    body.classList.toggle('dark');
    localStorage.setItem('darkmode', body.classList.contains('dark'));
  }

  // Load dark mode preference on page load
  window.onload = function () {
    if (localStorage.getItem('darkmode') === 'true') {
      document.body.classList.add('dark');
    }
  };
</script>
