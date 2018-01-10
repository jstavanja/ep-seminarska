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

<?php require_once("view/seller/modal-new-customer.php"); ?>
<?php require_once("view/seller/modal-new-item.php"); ?>

<script src="/static/js/seller.js" type="text/javascript"></script>