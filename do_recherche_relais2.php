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

	// On fait ce que l'on veut ensuite :)
	echo 'Votre login est '.$_POST['votre_name'].' Et votre mot de passe est '.$_POST['votre_mp'];
}
else {
	'Les variables du formulaire ne sont pas déclarées.';
}
?>

<h1>Voici les points relais autour de vous</h1>

<?php
    $ch = curl_init("http://exapaq.pickup-services.com/Exapaq/mypudofull.asmx/GetPudoList?address=".urlencode($_POST['votre_adresse'])."&zipCode=".urlencode($_POST['votre_cp'])."&city=".urlencode($_POST['votre_ville'])."&request_id=44&date_from=04/01/2011");
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
    echo('<div class="container">');
    echo('<div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action" href="#list-item-1">'.$valeur["NAME"].'</a>
        </div>');

    echo('<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
        <h4 id="list-item-1">'.$valeur["NAME"].'</h4>
        <p>
        DISTANCE : '.$valeur["DISTANCE"].'<br>
        ADDRESS1 : '.$valeur["ADDRESS1"].'<br>
        ZIPCODE : '.$valeur["ZIPCODE"].'<br>
        CITY : '.$valeur["CITY"].'<br>
        LONGITUDE : '.$valeur["LONGITUDE"].'<br>
        LATITUDE : '.$valeur["LATITUDE"].'<br>');
    echo ($cle);

    $i=0;
    for($i=1;$i<=14;$i++) {
        if(isset ($valeur["OPENING_HOURS_ITEM"][$i]["DAY_ID"])){
            echo('
            DAY_ID : '.$valeur["OPENING_HOURS_ITEM"][$i]["DAY_ID"].'<br>
            START_TM : '.$valeur["OPENING_HOURS_ITEM"][$i]["START_TM"].'<br>
            END_TM : '.$valeur["OPENING_HOURS_ITEM"][$i]["END_TM"].'<br>
            </p>');
        }
        //var_dump($valeur["OPENING_HOURS_ITEM"]);
    }
    
    
            
    //echo ($RELAI["$store"]["OPENING_HOURS"]["$i"]["DAY_ID"]);
    echo('<br>');
    echo('<br>');

}       


?>
<!--
<h1>Voici les points relais autour de vous</h1>
<div id="list-example" class="list-group">
  <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
  <a class="list-group-item list-group-item-action" href="#list-item-2">Item2</a>
  <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
  <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
</div>
<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
  <h4 id="list-item-1">Item 1</h4>
  <p>...</p>
  <h4 id="list-item-2">Item 2</h4>
  <p>...</p>
  <h4 id="list-item-3">Item 3</h4>
  <p>...</p>
  <h4 id="list-item-4">Item 4</h4>
  <p>...</p>
</div>




<h1>Voici les points relais autour de vous</h1>
<div class="container">

<div class="card">
    <div class="card-body">


<h5 class="name" title="LE VICTOR HUGO BREST">
    LE VICTOR HUGO BREST</h5>
    <span class="street">
        48 RUE VICTOR HUGO
    </span>
    <br>
    <span class="zip">
        29200 
    </span>
    <span class="city">
        BREST
    </span>
    <br>
    <table cellpadding="5" cellspacing="0" border="0" class="tblOpenTimes">
    <tbody>
    <tr class="table-tr-odd">
        <td>
            <div class="wDays">
                Lun. - Jeu.:
            </div>
        </td>
        <td>
            <div class="times">
                07:30 - 20:00
            </div>
        </td>
    </tr>
    <tr class="">
        <td>
            <div class="wDays">
            Ven.:
            </div>
        </td>
        <td>
            <div class="times">
                07:30 - 23:00
            </div>
        </td>
    </tr>
    <tr class="table-tr-odd">
        <td>
            <div class="wDays">
                Sam.:
            </div>
        </td>
        <td>
            <div class="times">
                09:00 - 21:00
            </div>
        </td>
    </tr>
    <tr class="">
    <td>
    <div class="wDays">
    Dim.:
    </div>
    </td>
    <td>
    <div class="times">
    09:00 - 13:00
    </div>
    </td>
    </tr>
    </tbody>
    </table>
    <div class="ainfo">
    </div>
    <img src="./theme/gls/images/icon_paketshop_lt_fra.png">
    </div>
    <div class="proxDistance">
    0,8 km
    </div>
    <a class="details">
    Détails
    </a>
    <a class="routeto">
    Itinéraire
    </a>
    </li>
    <li rel="1" class="">
    <div class="address">
</div>
</div>
-->


</body>
</html>
