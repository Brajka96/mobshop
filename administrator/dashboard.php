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
          <li class="active"><a href="#!/">Dashboard</a></li>
          <li><a href="#!/uredaji">Uređaji</a></li>
          <li><a href="#!/brendovi">Brendovi</a></li>
          <li><a href="#!/korisnici">Korisnici</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Dobrodošli,
              <?php echo $_SESSION["login_user"];?></a></li>
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
          <h1 class="page-title"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Unaprijedi stranicu</small></h1>
        </div>
        
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
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
            <a href="#!/uredaji" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              Uređaji <span class="badge">{{products.length}}</span></a>
            <a href="#!/brendovi" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              Brendovi <span class="badge">{{brands.length}}</span></a>
            <a href="#!/korisnici" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              Korisnici <span class="badge">{{users.length}}</span></a>
          </div>

          
        </div>
        <div class="col-md-9">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Pregled stranice</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{users.length}}</h2>
                  <h4>Korisnici</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{products.length}}</h2>
                  <h4>Uređaji</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{brands.length}}</h2>
                  <h4>Brendovi</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                  <h4>Posjetitelji</h4>
                </div>
              </div>
            </div>
          </div>

          <!-- Latest Users -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Posljednji korisnici</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <th>Ime</th>
                  <th>Email</th>
                  <th>Korisnicko ime</th>
                </tr>
                <tr ng-repeat="user in users | orderBy: '-ID' | limitTo: 4">
                  <td>{{user.IME}} {{user.PREZIME}}</td>
                  <td>{{user.EMAIL}}</td>
                  <td>{{user.KORISNICKO_IME}}</td>
                </tr>
                <!-- <tr>
                  <td>Korisnik2</td>
                  <td>Korisnik2@yahoo.com</td>
                  <td>Dec 13, 2016</td>
                </tr>
                <tr>
                  <td>Korisnik3</td>
                  <td>Korisnik3@gmail.com</td>
                  <td>Dec 13, 2016</td>
                </tr>
                <tr>
                  <td>Korisnik4</td>
                  <td>Korisnik4@yahoo.com</td>
                  <td>Dec 14, 2016</td>
                </tr>
                <tr>
                  <td>Korisnik5</td>
                  <td>Korisnik5@gmail.com</td>
                  <td>Dec 15, 2016</td>
                </tr> -->
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 