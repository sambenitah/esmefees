<?php
require_once('header.php');

$repas = $_POST["repas"];
$nuitees = $_POST["nuitees"];
$km = $_POST["km"];
$etapes = $_POST["etapes"];
$mois = $_SESSION['mois'];


   try {

       $fichefrais = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
       $fichefrais->execute(array("ETP".$mois));
       $resultfichefrais = $fichefrais->rowCount();

       if($resultfichefrais == 1){

           $stmt = $bdd->prepare("UPDATE fraisforfait set montant = ? where id = ?");

           $stmt->execute(array($etapes,"ETP".$mois));

           $stmt = $bdd->prepare("UPDATE fraisforfait set montant = ? where id = ?");

           $stmt->execute(array($km,"KM".$mois));

           $stmt = $bdd->prepare("UPDATE fraisforfait set montant = ? where id = ?");

           $stmt->execute(array($nuitees,"NUI".$mois));

           $stmt = $bdd->prepare("UPDATE fraisforfait set montant = ? where id = ?");

           $stmt->execute(array($repas,"REP".$mois));
       }



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