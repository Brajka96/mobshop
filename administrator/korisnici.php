<?php
include('../model/session.php');
?>

<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
            <li><a href="#!/uredaji">Uređaji</a></li>
            <li><a href="#!/brendovi">Brendovi</a></li>
            <li class="active"><a href="#!/korisnici">Korisnici</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dobrodošli, <?php echo $_SESSION['login_user']; ?></a></li>
            <li><a href="../model/logout.php">Odjavi se</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1 class="page-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Korisnici</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="#!/">Dashboard</a></li>
          <li class="active">Korisnici</li>
        </ol>
      </div>
    </section>

   <div ng-show="msg" class="container alert alert-{{msgType}}" role="alert">
    {{msg}} - {{}}<span ng-click="msg = ''" class="close">x</span>
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
          <div class="admin-sidebar col-md-3">
            <div class="list-group">
              <a href="#!/" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="#!/uredaji" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Uređaji <span class="badge">{{products.length}}</span></a>
              <a href="#!/brendovi" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Brendovi <span class="badge">{{brands.length}}</span></a>
              <a href="#!/korisnici" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Korisnici <span class="badge">{{users.length}}</span></a>
            </div>
<button class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#addUser">+ Dodaj Korisnika </button>
            
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Korisnici</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" ng-model="search" type="text" placeholder="Potraži korisnika...">
                      </div>
                </div>
                <br>
                <div class="table-responsive">
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Ime</th>
                        <th>e-mail</th>
                        <th>Korisnicko ime</th>
                        <th>Sifra</th>
                        <th>Tip korisnika</th>
                        <th></th>
                      </tr>
                      <tr ng-repeat="user in users | filter: search">
                        <td>{{user.IME}} {{user.PREZIME}}</td>
                        <td>{{user.EMAIL}}</td>
                        <td>{{user.KORISNICKO_IME}}</td>
                        <td>{{user.SIFRA}}</td>
                        <td>{{user.USER_TYPE}}</td>
                        <td><button class="btn btn-default" data-toggle="modal" data-target="#editUser" ng-click="editUser(user)">Edit</button> <button class="btn btn-danger" ng-click="deleteUser(user)">Delete</button></td>
                      </tr>
                     
                    </table>
                    </div>
              </div>
              </div>

          </div>
        </div>
      </div>
          <!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserLabel">Unesite novog korisnika</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="dodaj_korisnika_admin.php" method="post">
			  <div class="form-group">
				<label for="ime">Ime</label>
				<input type="text" name="ime" class="form-control" placeholder="Ime">
			  </div>
			  <div class="form-group">
				<label for="prez">Prezime</label>
				<input type="text" name="prez" class="form-control"  placeholder="Prezime">
			  </div>
			  <div class="form-group">
				<label for="kori">Korisničko ime</label>
				<input type="text" name="kori" class="form-control"  placeholder="Korisničko ime">
        </div>
        <div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control"  placeholder="Email">
			  </div>
			  <div class="form-group">
				<label for="pass">Šifra</label>
				<input type="password" name="pass" class="form-control"  placeholder="Šifra">
			  </div>
        <div class="form-group">
				<label for="user_type">Tip korisnika</label>
				<select name="user_type" id="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
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

<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserLabel">Unesite novog korisnika</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="izmjeni_korisnika.php" method="post">
			  <div class="form-group">
				<label for="newIme">Ime</label>
				<input type="text" name="newIme" value="{{editingUser.IME}}" class="form-control" placeholder="Ime">
			  </div>
			  <div class="form-group">
				<label for="newPrez">Prezime</label>
				<input type="text" name="newPrez" value="{{editingUser.PREZIME}}" class="form-control"  placeholder="Prezime">
			  </div>
			  <div class="form-group">
				<label for="newKori">Korisničko ime</label>
				<input type="text" name="newKori" value="{{editingUser.KORISNICKO_IME}}" class="form-control"  placeholder="Korisničko ime">
        </div>
        <div class="form-group">
				<label for="newEmail">Email</label>
				<input type="email" name="newEmail" value="{{editingUser.EMAIL}}" class="form-control"  placeholder="Email">
			  </div>
			  <div class="form-group">
				<label for="newPass">Šifra</label>
				<input type="password" name="newPass" value="{{editingUser.SIFRA}}" class="form-control"  placeholder="Šifra">
			  </div>
        <div class="form-group">
				<label for="ID">ID</label>
				<input type="text" name="ID" value="{{editingUser.ID}}" class="form-control"  placeholder="ID">
			  </div>
        <div class="form-group">
        <label for="user_type">Tip korisnika</label>
          <select name="user_type" id="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
			  <button type="submit" class="btn btn-primary btn-block">Ažuriraj</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </section>

    

    