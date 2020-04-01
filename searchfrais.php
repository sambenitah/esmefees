<?php
   
   require_once('header.php');
   $mois = $_GET['id'];

    if(isset($mois)) {
        $_SESSION['mois'] = $mois;
        $fiche = $bdd->prepare("SELECT * FROM fichefrais WHERE mois = ? AND idVisiteur = ?");
        $fiche->execute(array($mois, $_SESSION['user']['id']));
        $resultfiche = $fiche->rowCount();

        if($resultfiche == 1) {

            $fichefrais = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
            $fichefrais->execute(array("ETP".$mois));
            $resultfichefrais = $fichefrais->rowCount();

            if($resultfichefrais == 1){

                $fichefraisetp = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
                $fichefraisetp->execute(array("ETP".$mois));
                $resultfichefraisetp = $fichefraisetp->fetch(PDO::FETCH_ASSOC);


                $fichefraiskm = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
                $fichefraiskm->execute(array("KM".$mois));
                $resultfichefraiskm = $fichefraiskm->fetch(PDO::FETCH_ASSOC);

                $fichefraisnui = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
                $fichefraisnui->execute(array("NUI".$mois));
                $resultfichefraisnui = $fichefraisnui->fetch(PDO::FETCH_ASSOC);

                $fichefraisrep = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
                $fichefraisrep->execute(array("REP".$mois));
                $resultfichefraisrep = $fichefraisrep->fetch(PDO::FETCH_ASSOC);

                $_SESSION['resultfrais'] = array($resultfichefraisrep,$resultfichefraisnui,$resultfichefraiskm,$resultfichefraisetp);
                header("Location: fraisnew.php");

            }
            else{
                $_SESSION['resultfrais'] = null;
                header("Location: fraisnew.php");
            }


        } else {
            $_SESSION['resultfrais'] = null;
            $_SESSION['errorfiche'] = "Il n'y a aucune fiche de frais qui existe pour ce mois veuillez en créer une";
            header("Location: fraisnew.php");
        }
    } else {
        header("Location: fraisnew.php");
    }

?>