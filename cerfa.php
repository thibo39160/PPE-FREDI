<?php
require('fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('logo-cerfa.png',10,6,30);
	$this->Ln(10);
}
}
$pdf = new PDF();	
$pdf->Output();









?>