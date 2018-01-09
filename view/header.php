<div class="navbars animated fadeIn" style="z-index: 1000;">
      <nav class="navbar main-navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="/">
            <img src="static/images/logo.png" width="112" height="28">
          </a>
          <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      
        <div id="navbarExampleTransparentExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="/kategorija.html">
              Moški
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Ženske
            </a>
          </div>
          <div class="navbar-center">
            <div class="navbar-item">
              <div class="control has-icons-left">
                <input class="input is-rounded" type="text" placeholder="Išči po izdelkih ...">
                <span class="icon is-small is-left">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="navbar-end">
            <div class="navbar-item">
              <a class="navbar-item" href="/index.php/cart">
                Košarica
              </a>
              <?php if (isset($_SESSION["user"])) :?>
              <a class="navbar-item" href="/logout.php">
                Odjava
              </a>
              <?php else: ?>
              <a class="navbar-item" href="/index.php/login">
                Prijava
              </a>
              <a class="navbar-item" href="/index.php/registration">
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
                  <a class="navbar-item" href="/index.php/customer">
                    Nadzorna plošča
                  </a>
                  <hr class="navbar-divider">
                  <a class="navbar-item" href="/index.php/administrator">
                    Administrator
                  </a>
                  <a class="navbar-item" href="/index.php/seller">
                    Prodajalec
                  </a>
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
            <a class="navbar-item" href="/kategorija.html">
              Kratke majice
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Srajce
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Dolge majice in puloverji
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Suknjiči in obleke
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Jakne in plašči
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Kratke hlače
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Hlače
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Kavbojke
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Kopalke
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Spodnje perilo
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Čevlji
            </a>
            <a class="navbar-item" href="/kategorija.html">
              Dodatki
            </a>
          </div>
        </div>
      </nav>
</div>