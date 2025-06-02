<?php
session_start();
// Vérification d'accès
if (!isset($_SESSION['passager_enregistre']) || $_SESSION['passager_enregistre'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Rejoindre un trajet</title>
</head>
<body>
  <h2>Bienvenue ! Voici les trajets disponibles</h2>
  <p>Fonction à implémenter : affichage des trajets ouverts au passager.</p>
</body>
</html>
