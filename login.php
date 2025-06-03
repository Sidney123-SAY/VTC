<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion / Inscription</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: black;
    }
    header {
      background-color: black;
      padding: 10px 0;
      text-align: left;
    }
    .logo {
      margin-left: 10px;
      color: white;
      font-weight: bold;
      background: none;
      border: none;
      font-size: 18px;
      cursor: pointer;
    }
    header a {
      margin-left: 20px;
      color: white;
      text-decoration: none;
      font-weight: bold;
    }
    .container {
      text-align: center;
      margin-top: 80px;
    }
    .form-box {
      display: inline-block;
      text-align: center;
      background-color: skyblue;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    input[type="text"],
    input[type="password"] {
      width: 250px;
      padding: 10px;
      margin: 10px 0;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 20px;
    }
    .btn {
      padding: 10px 20px;
      width: 250px;
      font-size: 16px;
      background-color: black;
      color: white;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      margin-top: 10px;
    }
    .divider {
      margin: 20px 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .divider::before, .divider::after {
      content: '';
      height: 1px;
      width: 100px;
      background-color: #ccc;
      margin: 0 10px;
    }
    .social-btn {
      width: 250px;
      padding: 10px;
      font-size: 16px;
      background-color: black;
      color: white;
      border: none;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      cursor: pointer;
      margin: 10px auto 0;
    }
    .social-btn img {
      height: 20px;
    }
  </style>
</head>
<body>

<header>
  <button class="logo">ASIH</button>
  <a href="Accueil.php">&larr; Retour</a>
</header>

<div class="container">
  <div class="form-box">
    <p><strong>
      Entrez votre numéro de téléphone<br>
      ou votre adresse e-mail<br>
      pour vous connecter ou vous inscrire
    </strong></p>

    <form action="login.php" method="POST">
      <input type="text" name="identifiant" placeholder="Numéro ou E-mail" required><br>
      <input type="password" name="password" placeholder="Mot de passe" required><br>
      <button type="submit" class="btn">Connexion</button>
    </form>
</div>

</body>
</html>
