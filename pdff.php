<?php
require('fpdf.php');
require('class_connexionBDD.php');

$bdd = new connexion();

class PDF extends FPDF
{

	 function LoadData($bdd)
{
	$host = "localhost";
        $user = "root";
        $bdd = "fredi";
        $passwd  = "";

         mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
         mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
                        
        $query = "Select date, motif, trajet,`km-valide`,`peage-valide`,`repas-valide`,`hebergement-valide` from ligne_frais";
	$result = mysql_query($query);
        $data = array();
	$i = 0;
	while($data = $result->fetch())
	{
		$ress[$i] = $data;
		$i++;
	}
	return $ress;
}

	function Header()
	{
		// Logo
		$this->Image('fredi.jpg',10,6,30);
		$this->Ln(20);
		// Police Arial gras 15
		$this->SetFont('Arial','B',16);
		
		// cellule du Titre
		$this->Cell(5,10,'Note de frais des bénévoles','C');
		
		// Décalage à droite
		$this->Cell(140);
		
		// cellule de l'année
		$an='Année civile '.Date("Y");
		$w = $this->GetStringWidth($an)+6;
		//$this->SetX(10);
		$this->SetFillColor(175,255,192);
		$this->SetLineWidth(1);
		
		$this->Cell($w,10,$an,5,5,'C',true);
		// Saut de ligne
		$this->Ln(20);
	}
	
	// Chargement des données


// Tableau coloré
function FancyTable($header, $ress)
{
	
    // Couleurs, épaisseur du trait et police grasse
    $this->SetFillColor(204,255,204);
    $this->SetTextColor(0);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // En-tête
	$l = array(182,10);
    $w = array(20, 42, 35, 10, 20, 15, 15, 25, 10);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauration des couleurs et de la police
    $this->SetFillColor(175,255,192);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Données
    $fill = false;
	$total = 0;
    foreach($ress as $row)
    {
	
		$row['total']= ($row['km_valide']*0.28) + ($row['peage_valide']) + ($row['repas_valide']) + ($row['heberg_valide']);
		
        $this->Cell($w[0],6,$row['date'],'LR',0,'C',$fill);
        $this->Cell($w[1],6,$row['motif'],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row['trajet'],'LR',0,'L',$fill);
		$this->SetTextColor(0,119,116);
        $this->Cell($w[3],6,number_format($row['km_valide'],0,',',' '),'LR',0,'C',$fill);
	$this->SetTextColor(0);
		$this->Cell($w[4],6,number_format($row['km_valide']*0.28,0,',',' '),'LR',0,'C',$fill);
		$this->Cell($w[5],6,number_format($row['peage_valide'],0,',',' '),'LR',0,'C',$fill);
		$this->Cell($w[6],6,number_format($row['repas_valide'],0,',',' '),'LR',0,'C',$fill);
        $this->Cell($w[7],6,number_format($row['heberg_valide'],0,',',' '),'LR',0,'C',$fill);
    $this->SetTextColor(0,119,116);
		$this->Cell($w[8],6,number_format($row['total'],0,',',' '),'LR',0,'C',$fill);
    $this->SetTextColor(0);
        $this->Ln();
        $fill = !$fill;
		$total+=$row['total'];
    }
	$this->Cell(array_sum($l),0,'','T');
		$this->Ln();
		$this->SetFont('','B');
		$this->Cell($l[0],6,"Montant total de frais de deplacement",'LR',0,'C',$fill);
		$this->SetTextColor(0,119,116);
		$this->Cell($l[1],6,number_format($total,0,',',' '),'LR',0,'C',$fill);
		$this->SetFont('','');
		$this->SetTextColor(0);
		$this->Ln();
    // Trait de terminaison
    $this->Cell(array_sum($l),0,'','T');
	
	return $total;
}
	
	function caseC($txt)
	{
		// Arial gras 15
		$this->SetFont('Arial','',11);
		// Calcul de la largeur du titre et positionnement
		$w = $this->GetStringWidth($txt)+6;
		$this->SetX(10);
		// Couleurs du fond et du texte
		// cadre ->  $this->SetDrawColor(0,80,180);
		$this->SetFillColor(175,255,192);
		$this->SetTextColor(0,0,0);
		// Epaisseur du cadre (1 mm)
		$this->SetLineWidth(1);
		// cellule : position et texte
		$this->Cell(200,7,$txt,5,5,'C',true);
		// Saut de ligne
		$this->Ln(2);
	}
	
	function caseBG($txt)
	{		
		// Arial gras 10
		$this->SetFont('Arial','B',10);
		// Couleur du texte
		$this->SetTextColor(0,0,0);
		// cellule : position et texte
		$this->Cell(5,7,$txt,'C',true);
		// Saut de ligne
		$this->Ln(2);
	}
	
	function caseBI($txt)
	{	
		$this->Cell(10);
		$this->SetFont('Arial','I',10);
		$this->SetTextColor(0,0,0);
		$this->Cell(5,7,$txt,'C',true);
		$this->Ln(2);
	}
	
	function deplacement($txt1,$txt2)
	{		
		//cellule 1
			// Arial gras 15
			$this->SetFont('Arial','B',10);
			// Couleur du texte
			$this->SetTextColor(0,0,0);
			// Titre
			$this->Cell(5,5,$txt1,'C');
		//cellule 2
			$this->Cell(50);
			$this->SetFont('Arial','',10);		
			$this->SetTextColor(0,0,0);
			$this->Cell(5,5,$txt2,'C',true);
			$this->Ln(2);
	}
	
	function don($txt1,$txt2)
	{		
		//cellule 1
			$this->SetFont('Arial','B',10);
			$this->SetTextColor(0,0,0);
			$this->Cell(5,5,$txt1,'C');
		//cellule 2
			$this->Cell(50);
			$this->SetFont('Arial','',10);
			$this->SetFillColor(170,255,255);
			$this->SetTextColor(0,0,0);
			$this->SetLineWidth(1);
			$this->Cell(35,5,$txt2,'C',5,5,true);
			$this->Ln(2);
	}
	
	function lieuDate($txt1,$txt2)
	{		
		//cellule 1
			$this->Cell(55);
			$this->SetFont('Arial','',10);
			$this->SetTextColor(0,0,0);
			$this->Cell(10,5,$txt1,'C');
		//cellule 2 couleur
			$this->Cell(1);
			$this->SetFont('Arial','',10);
			$this->SetFillColor(175,255,192);
			$this->SetTextColor(0,0,0);
			$this->SetLineWidth(1);
			$this->Cell(30,8,'','C',0,5,true);
		//cellule 3
			$this->Cell(3);
			$this->SetFont('Arial','',10);
			$this->SetTextColor(0,0,0);
			$this->Cell(8,5,$txt2,'C');
		//cellule 4 couleur
			$this->Cell(1);
			$this->SetFont('Arial','',10);
			$this->SetFillColor(175,255,192);
			$this->SetTextColor(0,0,0);
			$this->SetLineWidth(1);
			$this->Cell(30,8,'','C',5,10,true);
			$this->Ln(4);
	}
	
	function signature($txt1)
	{		
		//cellule 1
			$this->Cell(48);
			$this->SetFont('Arial','',10);
			$this->SetTextColor(0,0,0);
			$this->Cell(8,5,$txt1,'C');
		//cellule 2 couleur
			$this->Cell(40);
			$this->SetFont('Arial','',10);
			$this->SetFillColor(175,255,192);
			$this->SetTextColor(0,0,0);
			$this->SetLineWidth(1);
			$this->Cell(40,11,'','C',5,5,true);
			$this->Ln(4);
	}
	
	function partAssoc($resso)
	{
		
		// Arial gras 15
		$this->SetFont('Arial','B',10);
		// Calcul de la largeur du titre et positionnement
		$this->SetX(10);
		// Couleurs du fond et du texte
		// cadre ->  
		$this->SetDrawColor(0,0,0);
		
		$this->SetFillColor(247,155,235);
		$this->SetTextColor(0,0,0);
		// Epaisseur du cadre (1 mm)
		$this->SetLineWidth(1);
		// cellule : position et texte
		$this->Cell(100,5,"Partie réservée à l'association",5,5,'C',true);
		$this->Cell(100,5,'',5,5,'C',true);
		$this->SetFont('Arial','',10);
		$texte="N° d'ordre du Reçu :       ".Date("Y")."-".$resso;
		$this->Cell(100,5,$texte,5,5,'L',true);
		$this->Cell(100,5,'',5,5,'C',true);
		$this->Cell(100,5,"Remis le :",5,5,'L',true);
		$this->Cell(100,5,'',5,5,'C',true);
		$this->Cell(100,5,"Signature du Trésorier : ",5,5,'L',true);
		$this->Cell(100,5,'',5,5,'C',true);
	}

	// Pied de page
	function Footer()
	{
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Arial','I',8);
		// Numéro de page
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->caseBG("Je soussigné(e)");
$pdf->caseC("Jean-Christophe Berbier");
$pdf->caseBG("demeurant");
$pdf->caseC("12, rue de Marron, 54600 Villers lès Nancy");
$pdf->caseBG("certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association");
$pdf->caseC("Salle d'Armes de Villers lès Nancy, 1 rue Rodin - 54600 Villers lès Nancy");
$pdf->caseBG("en tant que don.");
$pdf->Ln(8);
$pdf->deplacement("Frais de déplacement","Tarif kilométrique appliqué pour le remboursement : 0,28 €");


// Titres des colonnes
$header = array('Date', 'Motif', 'trajet', 'Kms', 'Coût trajet', 'Péage', 'Repas','Hébergement', 'Total');
// Chargement des données
$ress = $pdf->LoadData($bdd);
$pdf->SetFont('Arial','',9);
$total=$pdf->FancyTable($header,$ress);
$pdf->Ln(2);
$pdf->caseBG("Je suis le représentant légal des adhérents suivants :");

//copier et modifier la fonction caseC
//pour adapter l'affichage des adhérents selon leur nombre
$pdf->caseC("Théo Berbier, licence n° 170540010338 ");

$pdf->don("Montant total des dons",$total.' €');
$pdf->caseBI("Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de toutes les justificatifs correspondants");
$pdf->lieuDate("A","Le");
$pdf->signature("Signature du bénévole");
/*$resso = $pdf->LoadDataa($bdd);
$pdf->partAssoc($resso);*/

$pdf->Output();
?>