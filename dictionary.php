<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dictionary of Legal Terms</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f5f5f5;
    }

    header {
      background-color: #004085;
      color: white;
      padding: 15px;
      text-align: center;
      font-size: 20px;
    }

    main {
      max-width: 600px;
      margin: 40px auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    .search-container {
      display: flex;
      margin-bottom: 15px;
    }

    .search-container input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px 0 0 5px;
    }

    .search-container button {
      padding: 10px 15px;
      border: none;
      background-color: #004085;
      color: white;
      cursor: pointer;
      border-radius: 0 5px 5px 0;
    }

    .lang-buttons {
      margin-bottom: 20px;
      text-align: center;
    }

    .lang-buttons button {
      padding: 6px 12px;
      margin: 0 5px;
      border: 1px solid #ccc;
      background-color: #eee;
      cursor: pointer;
      border-radius: 4px;
    }

    .lang-buttons .active {
      background-color: #004085;
      color: white;
      border-color: #004085;
    }

    #result {
      display: none;
      background-color: #f9f9f9;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    #result p {
      margin: 10px 0;
    }
  </style>
</head>
<body>

  <header>Dictionary of Legal Terms</header>

  <main>
    <div class="search-container">
      <input type="text" id="searchTerm" placeholder="Enter legal term" />
      <button onclick="searchTerm()">Search</button>
    </div>

    <div class="lang-buttons">
      <button id="btn-en" class="active" onclick="changeLanguage('en')">English</button>
      <button id="btn-ms" onclick="changeLanguage('ms')">Malay</button>
    </div>

    <div id="result">
      <p><strong>File Name:</strong> <span id="fileName"></span></p>
      <p><strong>Definition:</strong> <span id="definition"></span></p>
    </div>
  </main>

  <script>
    let selectedLanguage = 'en';

    function changeLanguage(lang) {
      selectedLanguage = lang;
      document.getElementById('btn-en').classList.remove('active');
      document.getElementById('btn-ms').classList.remove('active');
      document.getElementById('btn-' + lang).classList.add('active');
    }

    function searchTerm() {
      const term = document.getElementById('searchTerm').value.trim().toLowerCase();
      if (!term) {
        alert("Please enter a term.");
        return;
      }

      fetch(`db.php?term=${encodeURIComponent(term)}&lang=${selectedLanguage}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById('fileName').innerText = data.file_name || 'N/A';
          document.getElementById('definition').innerText = data.definition || 'Definition not found.';
          document.getElementById('result').style.display = 'block';
        })
        .catch(error => {
          document.getElementById('fileName').innerText = term;
          document.getElementById('definition').innerText = 'Error connecting to server.';
          document.getElementById('result').style.display = 'block';
        });
    }
  </script>
</body>
</html>
