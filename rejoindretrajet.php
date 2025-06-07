<?php
session_start();

// Rediriger si l'utilisateur n'est pas connecté
if (!isset($_SESSION['passager_enregistre']) || $_SESSION['passager_enregistre'] !== true) {
    header("Location: login.html");
    exit();
}

// Trajets fictifs (normalement, ça viendra de la base de données)
$trajets = [
    ['id' => 1, 'depart' => 'Paris', 'destination' => 'Lyon', 'date' => '2025-06-10', 'heure' => '08:00', 'prix' => 25.00],
    ['id' => 2, 'depart' => 'Marseille', 'destination' => 'Nice', 'date' => '2025-06-12', 'heure' => '14:30', 'prix' => 18.50],
    ['id' => 3, 'depart' => 'Bordeaux', 'destination' => 'Toulouse', 'date' => '2025-06-11', 'heure' => '10:15', 'prix' => 15.00],
    ['id' => 4, 'depart' => 'Lille', 'destination' => 'Bruxelles', 'date' => '2025-06-09', 'heure' => '09:45', 'prix' => 20.00]
];

// Traitement de la "réservation"
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['trajet_id'])) {
    $trajet_id = intval($_POST['trajet_id']);
    $trajet_choisi = null;
    foreach ($trajets as $trajet) {
        if ($trajet['id'] === $trajet_id) {
            $trajet_choisi = $trajet;
            break;
        }
    }

    if ($trajet_choisi) {
        $message = "✅ Vous avez rejoint le trajet de <strong>{$trajet_choisi['depart']}</strong> à <strong>{$trajet_choisi['destination']}</strong> prévu le <strong>{$trajet_choisi['date']}</strong> à <strong>{$trajet_choisi['heure']}</strong>.";
    } else {
        $message = "❌ Erreur : trajet non trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rejoindre un trajet - ASIH VTC</title>
  <link rel="stylesheet" href="style.css">
  <style>
    #book-now {
      background: #f5d77a;
      padding: 10px 20px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 20px;
      text-decoration: none;
      color: black;
    }
    table {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f5d77a;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    h2 {
      text-align: center;
      margin-top: 40px;
    }
    .btn-join {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 12px;
      cursor: pointer;
    }
    .btn-join:hover {
      background-color: #45a049;
    }
    .message {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
      font-size: 1.1em;
      color: #333;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">ASIH</div>
    <div class="right-menu">
      <button class="lang">🌍 FR</button>
      <a href="FAQ.html">FAQ</a>
      <a href="login.html">Se connecter</a>
      <a href="register.php" class="signup">S’inscrire</a>
    </div>
  </header>

  <main>
    <h2>Bienvenue ! Voici les trajets disponibles</h2>

    <?php if ($message): ?>
      <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <?php if (!empty($trajets)): ?>
      <table>
        <tr>
          <th>Départ</th>
          <th>Destination</th>
          <th>Date</th>
          <th>Heure</th>
          <th>Prix (€)</th>
          <th>Action</th>
        </tr>
        <?php foreach ($trajets as $trajet): ?>
          <tr>
            <td><?= htmlspecialchars($trajet['depart']) ?></td>
            <td><?= htmlspecialchars($trajet['destination']) ?></td>
            <td><?= htmlspecialchars($trajet['date']) ?></td>
            <td><?= htmlspecialchars($trajet['heure']) ?></td>
            <td><?= number_format($trajet['prix'], 2, ',', ' ') ?></td>
            <td>
              <form method="POST">
                <input type="hidden" name="trajet_id" value="<?= $trajet['id'] ?>">
                <button type="submit" class="btn-join">Rejoindre</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p style="text-align: center;">Aucun trajet disponible pour le moment.</p>
    <?php endif; ?>
  </main>
</body>
</html>


