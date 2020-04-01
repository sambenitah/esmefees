<?php
require_once('header.php');

$repas = $_POST["repas"] * 25;
$nuitees = $_POST["nuitees"] * 80;
$km = $_POST["km"] * 0.62;
$etapes = $_POST["etapes"] * 110;
$mois = $_SESSION['mois'];

$typefrais = ["ETP","KM","NUI","REP"];


   try {

       $fichefrais = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
       $fichefrais->execute(array("ETP".$mois));
       $resultfichefrais = $fichefrais->rowCount();


       $fiche = $bdd->prepare("SELECT * FROM fichefrais WHERE mois = ? AND idVisiteur = ?");
       $fiche->execute(array($mois, $_SESSION['user']['id']));
       $resultfiche = $fiche->fetch(PDO::FETCH_ASSOC);

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

       else{
           $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

           $stmt->execute(array("ETP".$mois, "Etapes",$etapes));

           $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

           $stmt->execute(array("KM".$mois, "kilometres",$km));

           $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

           $stmt->execute(array("NUI".$mois, "Nuit",$nuitees));

           $stmt = $bdd->prepare("INSERT INTO fraisforfait (id, libelle,montant) VALUES (?, ?, ?)");

           $stmt->execute(array("REP".$mois, "Repas",$repas));

           $stmt = $bdd->prepare("INSERT INTO lignefraisforfait (id, idFraisForfait,idFF) VALUES (?, ?, ?)");

           $stmt->execute(array(rand(1,9999),"ETP".$mois,$resultfiche['id']));

           $stmt = $bdd->prepare("INSERT INTO lignefraisforfait (id, idFraisForfait,idFF) VALUES (?, ?, ?)");

           $stmt->execute(array(rand(1,9999),"KM".$mois,$resultfiche['id']));

           $stmt = $bdd->prepare("INSERT INTO lignefraisforfait (id, idFraisForfait,idFF) VALUES (?, ?, ?)");

           $stmt->execute(array(rand(1,9999),"NUI".$mois,$resultfiche['id']));

           $stmt = $bdd->prepare("INSERT INTO lignefraisforfait (id, idFraisForfait,idFF) VALUES (?, ?, ?)");

           $stmt->execute(array(rand(1,9999),"REP".$mois,$resultfiche['id']));



       }


     header("Location: recap.php");
   }
   catch (PDOException $e) {
       die($e->getMessage());
   }




?>