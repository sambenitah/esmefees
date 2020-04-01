<?php
require_once("header.php");
?>

    <center>
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Mois
        </button>
        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="searchfrais.php?id=01">Janvier</a>
            <a class="dropdown-item" href="searchfrais.php?id=02">Février</a>
            <a class="dropdown-item" href="searchfrais.php?id=03">Mars</a>
            <a class="dropdown-item" href="searchfrais.php?id=04">Avril</a>
            <a class="dropdown-item" href="searchfrais.php?id=05">Mai</a>
            <a class="dropdown-item" href="searchfrais.php?id=06">Juin</a>
            <a class="dropdown-item" href="searchfrais.php?id=07">Juillet</a>
            <a class="dropdown-item" href="searchfrais.php?id=08">Aout</a>
            <a class="dropdown-item" href="searchfrais.php?id=09">Septembre</a>
            <a class="dropdown-item" href="searchfrais.php?id=10">Octobre</a>
            <a class="dropdown-item" href="searchfrais.php?id=11">Novembre</a>
            <a class="dropdown-item" href="searchfrais.php?id=12">Décembre</a>
        </div>
    </center>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Fiche <?php if(!empty($_SESSION['mois'])) echo "du mois : ".$_SESSION['mois']; ?></h1>
                        </div>
                        <?php if(!empty($_SESSION['errorfiche'])): ?>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?php echo $_SESSION['errorfiche']; ?></h1>
                            </div>
                        <?php endif; ?>
                        <form class="user" method="POST" action="script_BDD_3.php">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="repas" name="repas"
                                           placeholder="Repas" value="<?php  if(!empty($_SESSION['resultfrais'])) echo $_SESSION['resultfrais'][0]["montant"]/25; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="nuitees"
                                           name="nuitees" placeholder="Nuitées" value="<?php  if(!empty($_SESSION['resultfrais'])) echo $_SESSION['resultfrais'][1]['montant']/80; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="km" name="km"
                                           placeholder="KM" value="<?php  if(!empty($_SESSION['resultfrais'])) echo $_SESSION['resultfrais'][2]['montant']/0.62; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="etapes"
                                           name="etapes" placeholder="Etapes" value="<?php  if(!empty($_SESSION['resultfrais'])) echo $_SESSION['resultfrais'][3]['montant']/110; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" <?php if(!empty($_SESSION['errorfiche']) || empty($_SESSION['mois'])) echo "disabled"; $_SESSION['errorfiche'] = null;?>>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once("footer.php")
?>