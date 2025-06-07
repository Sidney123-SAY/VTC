<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription Utilisateur</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-image: url('https://www.izidrive.io/wp-content/uploads/2023/08/taxi-nuit.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      font-family: Arial, sans-serif;
      color: white;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }


    header a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      margin-left: 20px;
    }

    main {
      max-width: 600px;
      margin: 40px auto;
      background: rgba(255, 255, 255, 0.1);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: none;
    }

    button {
      margin-top: 20px;
      background-color: #f5d77a;
      color: black;
      padding: 10px;
      border: none;
      width: 100%;
      font-weight: bold;
      border-radius: 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">ASIH</div>
    <div class="right-menu">
      <a href="Accueil.html">Accueil</a>
      <a href="FAQ.html">FAQ</a>
      <a href="login.html">Se connecter</a>
    </div>
  </header>

  <main>
    <h2>Créer un compte utilisateur</h2>
    <form action="inscription_utilisateur.php" method="POST">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required>

      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required>

      <label for="telephone">Téléphone :</label>
      <input type="tel" id="telephone" name="telephone" required>

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">S'inscrire</button>
    </form>
  </main>
</body>
</html>
