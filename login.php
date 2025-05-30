<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
         body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
        }
        header {
            background-color: black;
            padding: 10px 0;
            text-align: left;
        }
        .logo {
            margin-left: 10px;
            cursor: pointer;
        }
        .container {
            text-align: center;
            margin-top: 80px;
        }
        .form-box {
            display: inline-block;
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        input[type="text"] {
            width: 250px;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
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
            display: inline-block;
        }
        .btn-grey {
            background-color: #b3b3b3;
            color: white;
            border-radius: 20px;
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
<header>
    <button class="logo">ASIH</button>
    <a href="Accueil.php"><--</a>
</header>

<body>
    
    </header>
    <div class="container">
    <div class="form-box">
        <p style="font-weight: bold;">
            Entrer votre numéro de téléphone<br>
            ou votre adresse e-mail<br>
            pour vous connecté ou vous inscrire
        </p>

        <form method="post" action="traitement.php">
            <input type="text" name="identifiant" placeholder="Numéro ou E-mail" required class="btn-grey"><br>
            <button type="submit" class="btn">Connexion</button>
        </form>

        <div class="divider">ou</div>

        <form action="connexion_google.php" method="post">
            <button class="btn social-btn">
                <img src="https://cdn2.hubspot.net/hubfs/53/image8-2.jpg" alt="Google Logo">
                Avec Google
            </button>
        </form>

        <form action="connexion_apple.php" method="post">
            <button class="btn social-btn">
                <img src="https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.jpg" alt="Apple Logo">
                Apple
            </button>
        </form>
    </div>
</div>

 </body>
</html>