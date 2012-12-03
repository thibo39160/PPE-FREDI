

<?php
session_start();
include ("class_Frais.php");
$pdo = new class_Frais();


$lesKilometre=$pdo->GetNombreKilometre();
$lesCoutPeage=$pdo->GetNombreCoutPeage();
$lesCoutRepas=$pdo->GetNombreCoutRepas();
$lesCoutHebergement=$pdo->GetNombreCoutHebergement();

echo $lesKilometre;
echo '<p>';
echo $lesCoutPeage;
echo '<p>';
echo $lesCoutRepas;
echo '<p>';
echo $lesCoutHebergement;
?>
