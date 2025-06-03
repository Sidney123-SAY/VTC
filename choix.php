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
      margin: 0;
      padding: 0;
      text-align: center;
      color: white;
      background-image: url('https://www.izidrive.io/wp-content/uploads/2023/08/taxi-nuit.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }

    .container {
      margin-top: 80px;
    }

    h2 {
      font-size: 32px;
    }

    .warning {
      color: #ff4d4d;
      font-weight: bold;
      margin-top: 20px;
    }

    .options {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 40px;
    }

    .option {
      border-radius: 12px;
      background: #f5d77a;
      padding: 20px 30px;
      width: 180px;
      text-align: center;
      text-decoration: none;
      color: black;
      font-weight: bold;
      font-size: 18px;
      box-shadow: 0 0 12px rgba(255, 255, 255, 0.2);
      border: none;
      transition: 0.3s ease;
      cursor: pointer;
    }

    .option:hover {
      background-color: #e6c865;
      transform: scale(1.05);
    }

    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.85);
      padding: 10px 20px;
      display: flex;
      justify-content: center;
      gap: 20px;
      z-index: 10;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .navbar a:hover {
      color: orange;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>CHOISISSEZ UNE OPTION</h2>
    <p class="warning">
      Attention !!!<br>
      Pour être conducteur, vous devez être enregistré.
    </p>

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
