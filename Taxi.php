<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxi</title>
    <link rel="stylesheet" href="stylepagetaxi.css">
</head>
    <header>
    <button class="logo">ASIH</button>
    <a href="Accueil.php"><-Retour</a>
</header>

<body>
 <div class="container"> 
     <div class="left">
     <h3>Commandez ou planifiez un taxi</h3>
       
     <form action="Voirprix.php" method="post">
       <input type="text" name="depart" placeholder="Lieu de départ" required>
       <input type="text" name="destination" placeholder="Destination" required>
       <button type="submit" class="voir-prix">Voir prix</button>
      </form>

     </div>
       <div class="right">
         <p class="explore">Explorer d'autres moyens de transports</p>
         <img src="C:\xampp\htdocs\VTC\images\Travel like a VIP in Detroit – experience the excellence of VIP RideWay chauffeur services!.jpg" alt="taxi">
        </div> 
 </div>



    
    
