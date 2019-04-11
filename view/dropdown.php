<div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php echo (isset($_SESSION["login_user"])) ? $_SESSION["login_user"] : 'Guest'; ?> <i
                                    class="fas fa-user"></i> </a>

                            <?php 
      if(isset($_SESSION["login_user"])) {
        ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="model/logout.php">Odjavi se</a>
                            </div>

                            <?php }?>
                        </div>