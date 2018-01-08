<section class="hero is-warning is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-pulled-left animated fadeInLeft is-inline-block">
        Nadzorna plošča prodajalca
      </h1>
      <h2 class="is-pulled-right is-inline-block animated fadeInRight">
        <span class="icon">
          <i class="fa fa-home"></i>
        </span>
        Pozdravljen, <?php echo $_SESSION['user'] ?>!
      </h2>
    </div>
  </div>
</section>
<div class="container is-fluid admin-panel">
  <div class="columns">
    <div class="container box column animated fadeInLeft">
      <aside class="menu">
        <p class="menu-label">
          Upravljanje poslovanja in artiklov
        </p>
        <ul class="menu-list">
          <li><a class="button-orders">Naročila</a></li>
          <li><a class="button-items">Artikli</a></li>
        </ul>
        <p class="menu-label">
          Upravljanje računov
        </p>
        <ul class="menu-list">
          <li><a class="button-customers">Stranke</a></li>
        </ul>
        <p class="menu-label">
          Ostalo
        </p>
        <ul class="menu-list">
          <li><a href="/">Nazaj na domačo stran</a></li>
        </ul>
      </aside>
    </div>
    <div class="container is-fluid box column is-three-quarters animated fadeInRight">

      <?php require_once("view/seller/default.php"); ?>

      <?php require_once("view/seller/orders.php"); ?>

      <?php require_once("view/seller/edit-items.php"); ?>

      <?php require_once("view/seller/edit-customers.php"); ?>
    </div>
  </div>
</div>

<div class="modal modal-new-customer">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Dodaj stranko</p>
      <button class="delete button-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <span>Uporabniško ime:</span>
        <p class="control has-icons-left">
          <input class="input" type="email" placeholder="Uporabniško ime">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Email naslov:</span>
        <p class="control has-icons-left">
          <input class="input" type="email" placeholder="Email naslov">
          <span class="icon is-small is-left">
            <i class="fa fa-envelope"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Geslo:</span>
        <p class="control has-icons-left">
          <input class="input" type="password" placeholder="Geslo">
          <span class="icon is-small is-left">
            <i class="fa fa-lock"></i>
          </span>
        </p>
      </div>
      <div class="field">
          <span>Geslo (ponovno):</span>
          <p class="control has-icons-left">
            <input class="input" type="password" placeholder="Geslo (ponovno)">
            <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
          </p>
        </div>
      <div class="field">
        <span>Pravo ime:</span>
        <p class="control has-icons-left">
          <input class="input" type="email" placeholder="Pravo ime">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Ulica in hišna številka:</span>
        <p class="control has-icons-left">
          <input class="input" type="email" placeholder="Ulica in hišna številka">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Pošta:</span>
        <p class="control has-icons-left">
          <input class="input" type="email" placeholder="Pošta">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>

    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Shrani</button>
      <button class="button button-modal-close">Prekliči</button>
    </footer>
  </div>
</div>

<script src="/static/js/seller.js" type="text/javascript"></script>