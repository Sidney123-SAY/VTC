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
    body { font-family: Arial; text-align: center; margin-top: 50px; }
    input, select { margin: 10px; padding: 8px; }
  </style>
</head>
<body>
  <h2>Créer un trajet</h2>
  <form method="post" action="#">
    <input type="text" name="depart" placeholder="Ville de départ" required><br>
    <input type="text" name="arrivee" placeholder="Ville d'arrivée" required><br>
    <label><input type="radio" name="type" value="occasionnel" checked> Occasionnel</label>
    <label><input type="radio" name="type" value="regulier"> Régulier</label><br>
    <input type="date" name="date" required><br>
    <button type="submit">Créer</button>
  </form>
</body>
</html>
