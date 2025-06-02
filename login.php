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
                <input type="text" name="identifiant" placeholder="Mot de passe" required>
                <button type="submit" class="btn primary">Connexion</button>
            </form>

            
            

            
        </div>