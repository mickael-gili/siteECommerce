<?php 

include("includes/header.php");


?>
   
    <script>

    document.getElementById('index').className = 'active';

    </script>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Accueil</a>
                   </li>
                   <li>
                       S'inscrire
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> S'inscrire</h2>
                           
                       </center><!-- center Finish -->
                       
                       <!--<form action="customes_register.php" method="post" enctype="multipart/form-data">--><!-- form Begin -->
                        <form action="do_recherche_relais.php" method="post" enctype="multipart/form-data">   
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre nom</label>
                               
                               <input type="text" class="form-control" name="votre_name" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label> Votre email</label>
                               
                               <input type="text" class="form-control" name="votre_email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre mot de passe</label>
                               
                               <input type="password" class="form-control" name="votre_mp" required>
                               
                           </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre pays</label>
                               
                               <input type="text" class="form-control" name="votre_pays" required>
                               
                           </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre ville</label>
                               
                               <input type="text" class="form-control" name="votre_ville" required>
                               
                           </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre code postal</label>
                               
                               <input type="text" class="form-control" name="votre_cp" required>
                               
                           </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre numéro de téléphone</label>
                               
                               <input type="text" class="form-control" name="votre_tel" required>
                               
                           </div><!-- form-group Finish -->
                           

                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre adresse</label>
                               
                               <input type="text" class="form-control" name="votre_adresse" required>
                               
                           </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Votre avatar</label>
                               
                               <input type="file" class="form-control" name="votre_avatar">
                               
                           </div><!-- form-group Finish -->

                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="register" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i>s'inscrire
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
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