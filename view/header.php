<div class="navbars animated fadeIn" style="z-index: 1000;">
      <nav class="navbar main-navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="/">
            <img src="<?php echo IMAGES_URL . "logo.png"?>" width="112" height="28">
          </a>
          <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      
        <div id="navbarExampleTransparentExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="<?php echo BASE_URL . "store/men"?>">
              Moški
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/women"?>">
              Ženske
            </a>
          </div>
          <div class="navbar-end">
            <div class="navbar-item">
              <a class="navbar-item" href="/cart">
                Košarica
              </a>
              <?php if (isset($_SESSION["user"])) :?>
              <a class="navbar-item" href="/logout.php">
                Odjava
              </a>
              <?php else: ?>
              <a class="navbar-item" href="/login">
                Prijava
              </a>
              <a class="navbar-item" href="/registration">
                Registracija
              </a>
              <?php endif ?>
              <div class="navbar-item <?php if (isset($_SESSION["user"])) :?> has-dropdown is-hoverable <?php endif ?>">
                <a class="navbar-link" href="#">
                  <i class="fa fa-user"></i>
                  <?php if (isset($_SESSION["user"])) : ?>
                    <?php echo $_SESSION["user"] ?>
                  <?php else: ?>
                    Anonimnež
                  <?php endif ?>
                </a>
                <?php if (isset($_SESSION["user"])) :?>
                <div class="navbar-dropdown is-boxed">
                  <a class="navbar-item" href="/customer">
                    Nadzorna plošča
                  </a>
                  <hr class="navbar-divider">
                  <?php if (AdministratorDB::isAdmin(["id" => $_SESSION['userid']])): ?>
                  <a class="navbar-item" href="/administrator">
                    Administrator
                  </a>
                  <?php endif ?>
                  <?php if (SellerDB::isSeller(["id" => $_SESSION['userid']])): ?>
                  <a class="navbar-item" href="/seller">
                    Prodajalec
                  </a>
                  <?php endif ?>
                </div>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <!-- subnavigation -->

      <nav class="navbar is-dark">
        <div class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="<?php echo BASE_URL . "store/tshirt"?>">
              Kratke majice
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/shirt"?>">
              Srajce
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/sweater"?>">
              Dolge majice in puloverji
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/eveningwear"?>">
              Suknjiči in obleke
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/outerwear"?>">
              Jakne in plašči
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/shorts"?>">
              Kratke hlače
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/pants"?>">
              Hlače
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/jeans"?>">
              Kavbojke
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/swimwear"?>">
              Kopalke
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/underwear"?>">
              Spodnje perilo
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/shoes"?>">
              Čevlji
            </a>
            <a class="navbar-item" href="<?php echo BASE_URL . "store/accessory"?>">
              Dodatki
            </a>
          </div>
        </div>
      </nav>
</div>