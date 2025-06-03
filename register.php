<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement Chauffeurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        .header {
            background-color: #222;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            height: 40px;
        }
        nav button {
            margin-left: 10px;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-black {
            background-color: #444;
            color: white;
        }
        .btn-orange {
            background-color: orange;
            color: white;
        }
        .btn-grey {
            background-color: grey;
            color: white;
        }
        .main-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            flex-wrap: wrap;
        }
        .left-form, .right-form {
            flex: 1;
            margin: 10px;
            padding: 20px;
        }
        .left-form {
            max-width: 60%;
        }
        .right-form {
            background-color: #eee1e1;
            border: 1px solid #555;
            max-width: 30%;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form label {
            margin-top: 10px;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form input[type="tel"],
        form input[type="file"] {
            padding: 8px;
            margin-top: 5px;
        }
        .dob {
            display: flex;
            gap: 10px;
        }
        .phone {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .alert {
            background-color: #ffdede;
            color: red;
            padding: 5px;
            font-size: 14px;
            margin-top: 10px;
        }
        .btn-yellow {
            margin-top: 15px;
            background-color: #ffde59;
            border: 1px solid #ccc;
            padding: 10px;
            font-weight: bold;
            cursor: pointer;
        }
        .intro {
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>

</head>
<body>
     <header class="header">
        <img src="logo.png" alt="Logo ASH" class="logo">
        <nav>
            <button class="btn-black">Taxi</button>
            <button class="btn-orange">Covoiturage</button>
            <button class="btn-grey">FR</button>
            <button class="btn-grey">FAQ</button>
        </nav>
    </header>
    <main class="main-container">
        <section class="left-form">
            <p class="intro">
                Afin de pouvoir proposer vos services en tant que conducteur de covoiturage, il est nécessaire de vous enregistrer en tant que chauffeur. Cette étape nous permet de vérifier vos informations et de garantir la sécurité de nos passagers.
            </p>
            <form action="enregistrer_chauffeur.php" method="POST" enctype="multipart/form-data">
                <label>Nom :</label>
                <input type="text" name="nom" required>
                <label>Prénom :</label>
                <input type="text" name="prenom" required>
                <label>Adresse :</label>
                <input type="text" name="adresse" required>
                <label>Date de naissance :</label>
                <div class="dob">
                    <input type="text" name="jour" placeholder="JJ" maxlength="2" required>
                    <input type="text" name="mois" placeholder="MM" maxlength="2" required>
                    <input type="text" name="annee" placeholder="AA" maxlength="2" required>
                </div>
                <label>Numéro de téléphone :</label>
                <div class="phone">
                    <span>🇫🇷 +33</span>
                    <input type="tel" name="telephone" required>
                </div>
                <label>Adresse mail :</label>
                <input type="email" name="email" required>
                <label>Mot de passe :</label>
                <input type="password" name="password" required>
                <label>Permis de conduire :</label>
                <input type="file" name="permis" accept=".pdf,.jpg,.png" required>
                <p class="alert">ATTENTION!! Le fichier ne doit pas dépasser 10 Mo</p>
                <button type="submit" class="btn-yellow">Vérification</button>
            </form>
        </section>
        <section class="right-form">
            <form action="createtrajet.php" method="POST">
                <p><strong>Vous êtes déjà enregistré en tant que chauffeur ?<br>Connectez-vous à votre compte</strong></p>
                <label>Nom Prénom :</label>
                <input type="text" name="identifiant" required>
                <label>Mot de passe :</label>
                <input type="password" name="motdepasse" required>git
                <button type="submit" class="btn-yellow">Connexion</button>
            </form>
        </section>
    </main>
</body>
</html>
