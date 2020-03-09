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

    <script>

    document.getElementById('shop').className = 'active';

    </script>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Accueil</a>
                   </li>
                   <li>
                       Shop
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
        </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
                <?php
                
                if (!isset($_GET['p_cat'])){

                    if (!isset($_GET['cat'])){

                        echo"
                        <div class='box'><!-- box Begin -->
                        <h1>Shop</h1>
                        <p>
                            Les meilleurs huiles du marché à petit prix!
                        </p>
                        </div><!-- box Finish -->
                        ";
                    }
                }
               
               ?>
               
               <div class="row"><!-- row Begin -->

               <?php
                
                if (!isset($_GET['p_cat'])){

                    if (!isset($_GET['cat'])){


                    }
                }
               
               ?>

               </div><!-- row Finish -->
               
               <center>
                   <ul class="pagination">

                   <?php
                
                    if (!isset($_GET['p_cat'])){

                        if (!isset($_GET['cat'])){

                            $per_page=6;
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                                
                                else{

                                    $page=1;

                                }
                                $start_from = ($page=1)* $per_page;

                            }
                        }
                    }
                
                    ?>

                   </ul>
               </center>
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>