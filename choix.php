<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Choisissez une option</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      text-align: center;
      margin: 0;
      padding: 0;
    }
    .container {
      margin-top: 50px;
    }
    .warning {
      color: red;
      font-weight: bold;
    }
    .options {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 30px;
    }
    .option {
      border-radius: 10px;
      background: #eee;
      padding: 20px;
      width: 200px;
      text-align: center;
      text-decoration: none;
      color: black;
      font-weight: bold;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .option:hover {
      background-color: #ddd;
      transform: scale(1.05);
    }
  </style>
  <header>
     <a href="createtrajet.php">Conducteur</a>
     <a href="conduct.html">Conducteur</a>
     <a href="rejoindretrajet.php">Passager</a>
     <a href="login.php">Passager</a>
  </header>
</head>
<body>
  <div class="container">
    <h2>CHOISISSEZ UNE OPTION</h2>
    <p class="warning">Attention !!!<br>Pour être conducteur, vous devez être enregistré.</p>

    <div class="options">
      <form method="post">
        <button name="conducteur" class="option">Conducteur</button>
      </form>
      <form method="post">
        <button name="passager" class="option">Passager</button>
      </form>
    </div>
  </div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['conducteur'])) {
        if (isset($_SESSION['conducteur_enregistre']) && $_SESSION['conducteur_enregistre'] === true) {
            header("Location: createtrajet.php");
        } else {
            header("Location: conduct.html");
        }
        exit();
    }

    if (isset($_POST['passager'])) {
        if (isset($_SESSION['passager_enregistre']) && $_SESSION['passager_enregistre'] === true) {
            header("Location: rejoindretrajet.php");
        } else {
            header("Location: login.php");
        }
        exit();
    }
}
?>
</body>
</html>
