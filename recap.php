<?php
require_once ("header.php");

$mois = $bdd->prepare("SELECT mois FROM fichefrais WHERE idVisiteur = ?");
$mois->execute(array($_SESSION['user']['id']));
$count = $mois->rowCount();
$resultmois = $mois->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach ($resultmois as $result) :?>



<?php

    $fichefraisetp = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
    $fichefraisetp->execute(array("ETP".$result["mois"]));
    $resultfichefraisetp = $fichefraisetp->fetch(PDO::FETCH_ASSOC);


    $fichefraiskm = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
    $fichefraiskm->execute(array("KM".$result["mois"]));
    $resultfichefraiskm = $fichefraiskm->fetch(PDO::FETCH_ASSOC);

    $fichefraisnui = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
    $fichefraisnui->execute(array("NUI".$result["mois"]));
    $resultfichefraisnui = $fichefraisnui->fetch(PDO::FETCH_ASSOC);

    $fichefraisrep = $bdd->prepare("SELECT montant FROM fraisforfait WHERE id = ?");
    $fichefraisrep->execute(array("REP".$result["mois"]));
    $resultfichefraisrep = $fichefraisrep->fetch(PDO::FETCH_ASSOC);


    $total = $resultfichefraisetp['montant'] + $resultfichefraiskm['montant'] + $resultfichefraisnui['montant'] + $resultfichefraisrep['montant'];


?>

<center><h1 class="h3 mb-0 text-gray-800"><?= $result["mois"]." total ".$total."€" ?></h1></center>
</br>
<div class="container-fluid">
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Étapes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $resultfichefraisetp['montant']."€"." qty : ".$resultfichefraisetp['montant']/110 ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kilomètres</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $resultfichefraiskm['montant']."€"." qty : ".$resultfichefraiskm['montant']/0.62 ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nuits</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $resultfichefraisnui['montant']."€"." qty : ".$resultfichefraisnui['montant']/80 ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Repas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $resultfichefraisrep['montant']."€"." qty : ".$resultfichefraisrep['montant']/25 ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach ?>
<?php
require_once ("footer.php")
?>

