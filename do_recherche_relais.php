<!DOCTYPE html>
<html lang="en">
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

<!-- 
    "http://exapaq.pickupservices.
com/Exapaq/mypudofull.asmx/GetPudoList?address=20 rue
galilee&zipCode=67400&city=illkirch&request_id=43&date_from=04/01/2011"
-->

<?php
// On teste nos deux variables
if (isset($_POST['votre_name']) && isset($_POST['votre_mp'])) {

	// On fait ce que l'on veut ensuite 🙂
	echo 'Votre login est '.$_POST['votre_name'].' Et votre mot de passe est '.$_POST['votre_mp'];
}
else {
	'Les variables du formulaire ne sont pas déclarées.';
}
?>
<?php
    //    $ch = curl_init('http://exapaq.pickup-services.com/Exapaq/mypudofull.asmx/GetPudoList?address='.$_POST['votre_adresse'].'&zipCode='.$_POST['votre_cp'].'&city=illkirch&request_id=43&date_from=04/01/2011');
    $ch = curl_init("http://exapaq.pickup-services.com/Exapaq/mypudofull.asmx/GetPudoList?address=".urlencode($_POST['votre_adresse'])."&zipCode=".urlencode($_POST['votre_cp'])."&city=".urlencode($_POST['votre_ville'])."&request_id=43&date_from=04/01/2011");
    $fp = fopen("relais.xml", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    if(curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }
    curl_close($ch);
    fclose($fp);

    if (file_exists('relais.xml')) {
        $xml = simplexml_load_file ('relais.xml');
    } else {
        exit('Echec lors de l\'ouverture du fichier relais.xml');
    }

    foreach($xml ->PUDO_ITEMS ->PUDO_ITEM as $ITEM) {
        $RELAI[(String) $ITEM->PUDO_ID]["DISTANCE"]=$ITEM->DISTANCE;
        $RELAI[(String) $ITEM->PUDO_ID]["NAME"]=$ITEM->NAME;
        $RELAI[(String) $ITEM->PUDO_ID]["ADDRESS1"]=$ITEM->ADDRESS1;
        $RELAI[(String) $ITEM->PUDO_ID]["ZIPCODE"]=$ITEM->ZIPCODE;
        $RELAI[(String) $ITEM->PUDO_ID]["CITY"]=$ITEM->CITY;
        $RELAI[(String) $ITEM->PUDO_ID]["LONGITUDE"]=$ITEM->LONGITUDE;
        $RELAI[(String) $ITEM->PUDO_ID]["LATITUDE"]=$ITEM->LATITUDE;
        $i=0;
        foreach($ITEM ->OPENING_HOURS_ITEMS ->OPENING_HOURS_ITEM as $hours_item  ){
            
            $i++;
            
            $RELAI[(String) $ITEM->PUDO_ID]["OPENING_HOURS_ITEM"][$i]["DAY_ID"]=$hours_item->DAY_ID;
            $RELAI[(String) $ITEM->PUDO_ID]["OPENING_HOURS_ITEM"][$i]["START_TM"]=$hours_item->START_TM;
            $RELAI[(String) $ITEM->PUDO_ID]["OPENING_HOURS_ITEM"][$i]["END_TM"]=$hours_item->END_TM;
            
        }
    }
  
 
    foreach($RELAI as $cle=>$valeur){
        echo('
        <div class="container">
        <div class="col-sm-4">
        <div id="list-example" class="list-group">
        <a class="list-group-item list-group-item-action" href="#list-item-1">'.$valeur["NAME"].'
            <br/>
            <div href="#list-item-1">'.$valeur["ADDRESS1"].'</div>
            <div href="#list-item-1">'.$valeur["ZIPCODE"].'   '.$valeur["CITY"].' </div>
        </a>
        </div>
        </div>
        </div>');
        $i=0;

        for($i=1;$i<=14;$i++) {
            if (isset($valeur["OPENING_HOURS_ITEM"][$i]["DAY_ID"])){
                echo('
                <div class="container">
                <div class="col-sm-6 ">
                    <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                        <small><p> Jours : '.$valeur["OPENING_HOURS_ITEM"][$i]["DAY_ID"].' </p>
                        <p>De '.$valeur["OPENING_HOURS_ITEM"][$i]["START_TM"].' à '.$valeur["OPENING_HOURS_ITEM"][$i]["END_TM"].' </p></small>
                    </div>
                    </div>
                    </div>
                ');
            }
        }
    }


 
?>


</body>
</html>