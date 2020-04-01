<?php
require_once('header.php');

$repas = $_POST["repas"];
$nuitees = $_POST["nuitees"];
$km = $_POST["km"];
$etapes = $_POST["etapes"];
$mois = $_SESSION['mois'];


   try {
       $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

       $stmt->execute(array("ETP".$mois, "Etapes",$etapes));

       $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

       $stmt->execute(array("KM".$mois, "kilometres",$km));

       $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

       $stmt->execute(array("NUI".$mois, "Nuit",$nuitees));

       $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

       $stmt->execute(array("REP".$mois, "Repas",$repas));

     header("Location: recap.php");
   }
   catch (PDOException $e) {
       die($e->getMessage());
   }




?>