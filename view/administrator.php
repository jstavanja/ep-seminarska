<section class="hero is-danger is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-pulled-left animated fadeInLeft is-inline-block">
        Administracija
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
          Upravljanje računov
        </p>
        <ul class="menu-list">
          <li><a class="button-sellers">Prodajalci</a></li>
        </ul>
        <p class="menu-label">
          Ostalo
        </p>
        <ul class="menu-list">
          <li><a href="<?php echo BASE_URL;?>">Nazaj na domačo stran</a></li>
        </ul>
      </aside>
    </div>
    <div class="container is-fluid box column is-three-quarters animated fadeInRight">

      <?php require_once("view/administrator/default.php"); ?>

      <?php require_once("view/administrator/sellers.php"); ?>
    </div>
  </div>
</div>

<?php require_once("view/administrator/modal-new-seller.php"); ?>

<?php echo '<script src="' . BASE_URL . 'static/js/administrator.js" type="text/javascript"></script>' ;?>