<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('images/logo-du-site.jpg',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(40);
    // Titre
    $this->Cell(50,10,'Numero de serie : ','LTR',0,'L');
//Cell(Largeur, Hauteur , Chaîne à imprimer, border , où se déplace après l'appel, string align, boolean coloré , URL)

    $this->Ln();
    $this->Cell(40);
    $this->Cell(50,10,'Coordonnee : ','LRB',0,'L');
    // Saut de ligne
    $this->Ln(20);

    //Données client
    $this->Cell(120);
    $this->Cell(70,30,'Donnees client : ',1,0,'L');

    $this->Ln(50);
}

// Pied de page
function Footer()
{
    // Positionnement à 4 cm du bas
    $this->SetY(-100);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    //Somme Montant Prix
    $this->Cell(120);
    $this->Cell(70,10,'Somme HT : ','LTR',0,'L');
    $this->Ln();
    $this->Cell(120);
    $this->Cell(70,10,'Montant TVA : ','LR',0,'L');
    $this->Ln();
    $this->Cell(120);
    $this->Cell(70,10,'Prix TTC : ','LRB',0,'L');

    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
// Chargement des données
function LoadData($file)
{
    // Lecture des lignes du fichier
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Tableau simple
function BasicTable($colTitle, $data)
{
    // En-tête
    foreach($colTitle as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}


}

// Instanciation de la classe dérivée
$pdf = new PDF();
// Titres des colonnes
$colTitle = array('Designation', 'Qte', 'PU', 'HT');
// Chargement des données
$data = $pdf->LoadData('article.txt');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->BasicTable($colTitle,$data);
$pdf->Output();

?>

<?php

//test génération PDF

/*
    require('fpdf/fpdf.php');

    $pdf = new FPDF('P','mm','A4');//portrait A4 et l'unité de mesure est le millimètre
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);//définir la police 
    $pdf->Cell(40,10,'images\logo-du-site.jpg');//spécifie ses dimensions, le texte (centré ou aligné), si des bords doivent être tracés, et si la position courant doit être déplacé
    $pdf->Ln();
    $pdf->Cell(40,10,'Hello World !',1);//encadre le texte
    $pdf->Ln();
    $pdf->Cell(60,10,'Powered by FPDF.',0,1,'C');//ajouter une nouvelle cellule à droite avec du texte centré et retourner à la ligne
    $pdf->Output();//document est terminé et envoyé au navigateur
*/
?>