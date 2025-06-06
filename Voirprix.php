<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande de Taxi - ASIH VTC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Si tu en utilises un -->
    <style>
        body {
            background-image: url('https://www.izidrive.io/wp-content/uploads/2023/08/taxi-nuit.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            background: black;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .right-menu a, .right-menu button {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
        }

        .main {
            padding: 40px;
            max-width: 900px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .option {
            background-color: rgba(255, 255, 255, 0.9);
            color: black;
            padding: 20px;
            margin: 15px 0;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .option:hover {
            background-color: #ffe08a;
        }

        @media (max-width: 768px) {
            .main {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="logo">ASIH</div>
    <div class="right-menu">
        <button class="lang">🌍 FR</button>
        <a href="FAQ.php">FAQ</a>
        <a href="login.php">Se connecter</a>
        <a href="register.php" class="signup">S’inscrire</a>
    </div>
</header>

<div class="main">
    <h2>Choisissez votre taxi</h2>

    <!-- Prix fictifs avec temps estimé -->
    <div class="option">🚕 12 € — à 2 min (Standard)</div>
    <div class="option">🚖 22 € — à 4 min (Confort)</div>
    <div class="option">🚗 35 € — à 6 min (Van ou Famille)</div>
    <div class="option">🚕 45 € — à 10 min (Taxi VIP)</div>
</div>

</body>
</html>
