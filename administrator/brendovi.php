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
            <li class="active"><a href="#!/brendovi">Brendovi</a></li>
            <li><a href="#!/korisnici">Korisnici</a></li>
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
          <div id="brandss" class="col-md-10">
            <h1 class="page-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Brendovi</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="#!/">Dashboard</a></li>
          <li class="active">Brendovi</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="#!/" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="#!/uredaji" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Uređaji <span class="badge">{{products.length}}</span></a>
              <a href="#!/brendovi" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Brendovi <span class="badge">{{brands.length}}</span></a>
              <a href="#!/korisnici" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Korisnici <span class="badge">{{users.length}}</span></a>
            </div>

            
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Brendovi</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" ng-model="findBrand" type="text" placeholder="pronađi brend...">
                      </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                      <tr>
                        <th><h3>Lista brendova</h3></th>
                      </tr>
                      <tr ng-repeat="phone in brands | filter: findBrand">
                        <td>{{phone.uredaj_brend | uppercase}}</td>
                      </tr>
                      
                    </table>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

   

