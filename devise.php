<?php 

include("includes/db.php");
include("fonctions/functions.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site E-commerce</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
    <?php 
    
    include("includes/top.php");
    
    ?>

    <?php 
    
        $wikipediaURL = 'http://fr.wikipedia.org/wiki/Megadeth';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $wikipediaURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Le blog de Samy Dindane (www.dinduks.com)');
        $resultat = curl_exec ($ch);
        curl_close($ch);
        echo $resultat;
    
    ?>


           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->






   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>