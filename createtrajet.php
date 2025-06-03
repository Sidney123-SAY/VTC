<?php
session_start();
// Vérification d'accès
if (!isset($_SESSION['conducteur_enregistre']) || $_SESSION['conducteur_enregistre'] !== true) {
    header("Location: registerconduct.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Créer un trajet</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-image: url('https://www.izidrive.io/wp-content/uploads/2023/08/taxi-nuit.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: #333;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: rgba(0,0,0,0.6);
      z-index: -1;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.95);
      max-width: 500px;
      margin: 80px auto;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
    }

    input[type="text"],
    input[type="date"],
    select {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    .radio-group {
      text-align: left;
      margin-bottom: 15px;
    }

    .radio-group label {
      margin-right: 15px;
      font-size: 15px;
    }

    button {
      width: 100%;
      background-color: #f4ce42;
      color: black;
      border: none;
      padding: 12px;
      border-radius: 6px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #e6bd30;
    }

    @media (max-width: 600px) {
      .form-container {
        width: 90%;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Créer un trajet</h2>
    <form method="post" action="#">
      <input type="text" name="depart" placeholder="Ville de départ" required>
      <input type="text" name="arrivee" placeholder="Ville d'arrivée" required>

      <div class="radio-group">
        <label><input type="radio" name="type" value="occasionnel" checked> Occasionnel</label>
        <label><input type="radio" name="type" value="regulier"> Régulier</label>
      </div>

      <input type="date" name="date" required>
      <button type="submit">Créer</button>
    </form>
  </div>

</body>
</html>

