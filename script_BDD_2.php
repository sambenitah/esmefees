<?php
require_once('header.php');


$id = $_POST["id"];
$mois = $_POST["mois"];
$datecrea = $_POST["datecrea"];
$etat = $_POST["etat"];
$idVisit = $_SESSION['user']['id'];


   try {

	$stmt = $bdd->prepare("INSERT INTO fichefrais (id, mois,dateModif,idVisiteur,etat) VALUES (?, ?, ?, ?, ?)");

  	$stmt->execute(array($id, $mois,$datecrea,$idVisit,$etat));

  	$_SESSION['mois'] = $mois;

     header("Location: recap.php");
   }
   catch (PDOException $e) {
       die($e->getMessage());
   }




?>