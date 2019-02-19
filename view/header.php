<div class="header2">
        <div class="wrapper">
            <nav id="navbar">
                <div class="logo">
                    <h1>Mob<span id="logo-span">Shop</span> </h1>
                </div>
                <ul id="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="#services">O nama</a></li>
                    <li><a href="#contact">Kontakt</a></li>
                    <li><a href="sign-in.php">Prijava</a></li>
                    <li id="list-cart"><a href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-badge" class="badge badge-light">0</span></a></li>
                    <li>
                    <div class="dropdown">
  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <?php echo (isset($_SESSION["login_user"])) ? $_SESSION["login_user"] : 'Guest'; ?> <i class="fas fa-user"></i>  </a>

  <?php 
      if(isset($_SESSION["login_user"])) {
        ?> <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="logout.php">Odjavi se</a>
      </div>

     <?php }?>
</div>
                    </li>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
    </div>

    