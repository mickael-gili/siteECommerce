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

                   <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
            </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div ><!-- carousel slide Begin -->

                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product"></center>
                                   </div>

                               </div>
                               
 
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"><?php echo $pro_title; ?></h1>
                           
                           <form action="index.php?add_cart=<?php echo $pro_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Quatité</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               
                               <p class="price"><?php echo $pro_price; ?> €</p>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Ajouter au panier</button></p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           

                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4>Détails du produit</h4>
                   
                   <p>
                       
                        <?php echo $pro_desc; ?>
                       
                   </p>
                   
 
                       
                       <hr>
                   
               </div><!-- box Finish -->
               
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Produit que vous pourriez aimer</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                    <?php 
                   
                    $get_products = "select * from products order by 1 DESC LIMIT 1,3";
                  
                    $run_products = mysqli_query($con,$get_products);
                  
                    while($row_products=mysqli_fetch_array($run_products)){
                      
                      $pro_id = $row_products['product_id'];
                      
                      $pro_title = $row_products['product_title'];
                      
                      $pro_img1 = $row_products['product_img1'];
                      
                      $pro_price = $row_products['product_price'];
                      
                      echo "
                      
                       <div class='col-md-3 col-sm-6 center-responsive'>
                       
                           <div class='product same-height'>
                           
                               <a href='details.php?pro_id=$pro_id'>
                               
                                   <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                               
                               </a>
                               
                               <div class='text'>
                               
                                   <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                   
                                   <p class='price'> $pro_price € </p>
                               
                               </div>
                           
                           </div>
                       
                       </div>
                      
                      ";
                      
                    }
                  
                    ?>
                   
               </div><!-- #row same-heigh-row Finish -->
               
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