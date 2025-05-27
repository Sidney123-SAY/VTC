<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <button class="logo">ASIH</button>
    <a href="Accueil.php"><-</a>
</header>

<body>
    <div class="container">
            <p class="intro">
                Entrer votre numéro de téléphone<br>
                ou votre adresse e-mail<br>
                pour vous connecté ou vous inscrire
            </p>
            <form action="login.php" method="POST">
                <input type="text" name="identifiant" placeholder="Numéro ou E-mail" required>
                <button type="submit" class="btn primary">Connexion</button>
            </form>

            <div class="separator">
                <span>OU</span>
            </div>

            <button class="btn google">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google logo">
            </button>

            <button class="btn apple">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple logo">
            </button>
        </div>
    </div>