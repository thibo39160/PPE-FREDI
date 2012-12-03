<?php
require('fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo1
    $this->Image('logo-cerfa.png',50,6,100);
	$this->Ln(10);
        
    // Logo2
    $this->Image('logo-cerfa2.png',50,16,100);
	$this->Ln(10);
        
    // Logo3
    $this->Image('logo-cerfa3.png',50,30,100);
	$this->Ln(10);
    
    // Logo4
    $this->Image('logo-cerfa4.png',50,80,100);
	$this->Ln(10);
        
        
        
        
}





}



$pdf = new PDF();	
$pdf->Output();









?>