<?php
require_once ("header.php")
?>

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-12">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Fiche de Frais</h1>
          </div>
          <form class="user" method="POST" action="script_BDD_2.php">
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="id" name="id" placeholder="id">
              </div>
              <div class="col-sm-6">
                <input type="number" class="form-control form-control-user" id="mois" name="mois" placeholder="mm" size="2">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="date" class="form-control form-control-user" id="datecrea" name="datecrea" placeholder="datecrea">
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="etat" name="etat" placeholder="created" value="created" readonly>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once ("footer.php")
?>