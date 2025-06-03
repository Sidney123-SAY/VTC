<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande de Taxi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       body {
  background-image: url('https://www.izidrive.io/wp-content/uploads/2023/08/taxi-nuit.jpg');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  color:white;
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
            font-size: 20px;
            font-weight: bold;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .main {
            display: flex;
            justify-content: space-between;
            padding: 40px;
            flex-wrap: wrap;
        }

        .left-panel {
            flex: 1;
            max-width: 50%;
        }

        .left-panel h2 {
            margin-bottom: 20px;
        }

        .option {
            background-color: #e0e0e0;
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .option:hover {
            background-color: #c0dfff;
        }

        .right-panel {
            flex: 1;
            max-width: 45%;
            text-align: center;
        }

        .right-panel img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .main {
                flex-direction: column;
                align-items: center;
            }

            .left-panel, .right-panel {
                max-width: 100%;
            }

            .right-panel {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">ASIH</div>
        <a href="Accueil.php">&larr; Retour</a>
    </header>

    <div class="main">
        <div class="left-panel">
            <h2>Veuillez choisir un taxi :</h2>
            <div class="option">15€ à 1 min</div>
            <div class="option">30€ à 5 min - Taxi express</div>
        </div>

        <div class="right-panel">
            <img src="images/taxi-carte.png" alt="Taxi sur une carte">
        </div>
    </div>

</body>
</html>

