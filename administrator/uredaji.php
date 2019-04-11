<?php
include('../model/session.php');
?>

<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Administrator</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="#!/">Dashboard</a></li>
          <li class="active"><a href="#!/uredaji">Uređaji</a></li>
          <li><a href="#!/brendovi">Brendovi</a></li>
          <li><a href="#!/korisnici">Korisnici</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Dobrodošli, <?php echo $_SESSION['login_user']; ?></a></li>
          <li><a href="../admins.php">Natrag na stranicu</a></li>
          <li><a href="../model/logout.php">Odjavi se</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Uređaji</h1>
        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="#!/">Dashboard</a></li>
        <li class="active">Uređaji</li>
      </ol>
    </div>
  </section>

 <div ng-show="msg" class="container alert alert-{{msgType}}" role="alert">
    {{msg}} <span ng-click="msg = ''" class="close">x</span>
</div>

<?php if(isset($_SESSION['msg'])){ ?>
         <div class="container alert alert-<?php echo $_SESSION['msgType'];?> myAlert" role="alert">
    <?php echo $_SESSION['msg'];?> <span class="close"></span>
   </div>
<?php unset($_SESSION['msg']);
         unset($_SESSION['msgType']); } ?>

  <section id="main">
    <div class="container">
      <div class="row">
        
        <div class="col-md-12">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Uređaji</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <input class="form-control" ng-model="search" type="text" placeholder="Pretražite uređaje...">
                </div>
              </div>
              <br>
              <div class="table-responsive">
              <table class="table table-striped table-hover">
                <tr>
                  <th>Naziv</th>
                  <th>Brend</th>
                  <th>Cijena</th>
                  <th>Ram</th>
                  <th>Kapacitet</th>
                  <th>Kamera</th>
                  <th>Slika</th>
                  <th></th>
                </tr>
                <tr ng-repeat="product in products | filter: search">
                  <td>{{product.uredaj_ime}}</td>
                  <td>{{product.uredaj_brend}}</td>
                  <td>{{product.uredaj_cijena}} KM</td>
                  <td>{{product.uredaj_ram}}</td>
                  <td>{{product.uredaj_kapacitet}}</td>
                  <td>{{product.uredaj_kamera}}</td>
                  <td>{{product.uredaj_slika}}</td>
                  <td><button class="btn btn-default" data-toggle="modal" data-target="#editDevice" ng-click="editDevice(product)">Edit</button> <button class="btn btn-danger" ng-click="deleteDevice(product)">Delete</button></td>
                </tr>

              </table>
              </div>
              <button class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#addDevice">+ Dodaj Uređaj </button>

            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="addDevice" tabindex="-1" role="dialog" aria-labelledby="addDeviceLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDeviceLabel">Unesite novi uređaj</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="dodaj_uredaj.php" method="post">
			  <div class="form-group">
				<label for="ime">Ime</label>
				<input type="text" name="ime" class="form-control" placeholder="Ime">
			  </div>
			  <div class="form-group">
				<label for="brend">Brend</label>
				<input type="text" name="brend" class="form-control"  placeholder="Brend">
			  </div>
			  <div class="form-group">
				<label for="cijena">Cijena*</label>
				<input type="number" step='any' name="cijena" class="form-control"  placeholder="Cijena (zaokruzi na dvije decimale)*">
			  </div>
			  <div class="form-group">
				<label for="ram">Ram</label>
				<input type="text" name="ram" class="form-control"  placeholder="Ram">
        </div>
        <div class="form-group">
				<label for="kapacitet">Kapacitet</label>
				<input type="text" name="kapacitet" class="form-control"  placeholder="Kapacitet">
        </div>
        <div class="form-group">
				<label for="kamera">Kamera</label>
				<input type="text" name="kamera" class="form-control"  placeholder="Kamera">
        </div>
        <div class="form-group">
				<label for="slika">Slika</label>
				<input type="text" name="slika" class="form-control"  placeholder="Slika">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Dodaj</button>

			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editDevice" tabindex="-1" role="dialog" aria-labelledby="editDeviceLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDeviceLabel">Izmjenite podatke</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="izmjeni_uredaje.php" method="post">
			  <div class="form-group">
				<label for="novoIme">Ime</label>
				<input type="text" name="novoIme" class="form-control" value="{{editing.uredaj_ime}}" placeholder="Ime">
			  </div>
			  <div class="form-group">
				<label for="noviBrend">Brend</label>
				<input type="text" name="noviBrend" class="form-control" value="{{editing.uredaj_brend}}" placeholder="Brend">
			  </div>
			  <div class="form-group">
				<label for="novaCijena">Cijena*</label>
				<input type="number" step='2' name="novaCijena" class="form-control" value="{{editing.uredaj_cijena}}" placeholder="Cijena (zaokruzi na dvije decimale)*">
			  </div>
			  <div class="form-group">
				<label for="noviRam">Ram</label>
				<input type="text" name="noviRam" class="form-control" value="{{editing.uredaj_ram}}" placeholder="Ram">
        </div>
        <div class="form-group">
				<label for="noviKapacitet">Kapacitet</label>
				<input type="text" name="noviKapacitet" class="form-control" value="{{editing.uredaj_kapacitet}}" placeholder="Kapacitet">
        </div>
        <div class="form-group">
				<label for="novaKamera">Kamera</label>
				<input type="text" name="novaKamera" class="form-control" value="{{editing.uredaj_kamera}}" placeholder="Kamera">
        </div>
        <div class="form-group">
				<label for="novaSlika">Slika</label>
				<input type="text" name="novaSlika" class="form-control" value="{{editing.uredaj_slika}}" placeholder="Slika">
        </div>
        <div class="form-group">
				<label for="id">Id</label>
				<input type="text" name="id" class="form-control" value="{{editing.uredaj_id}}" placeholder="Id">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Potvrdi</button>

			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  </section>

 