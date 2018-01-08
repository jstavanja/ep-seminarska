<section class="hero is-link is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-pulled-left animated fadeInLeft is-inline-block">
        Nadzorna plošča stranke
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
          Upravljanje računa
        </p>
        <ul class="menu-list">
          <li><a class="button-account">Lastni račun</a></li>
        </ul>
        <p class="menu-label">
          Upravljanje naročil
        </p>
        <ul class="menu-list">
          <li><a class="button-orders">Naročila</a></li>
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

      <div class="page-default">
        <h3 class="title">Pozdravljen(a), stranka_branka!</h3>
        
        <article class="message is-primary">
          <div class="message-header">
            <p>Urejanje lastnega računa</p>
          </div>
          <div class="message-body">
            Če si želite urejati podatke svojega računa, lahko to storite z izbiro možnosti Lastni račun v meniju na levi.
          </div>
        </article> 

        <article class="message is-dark">
          <div class="message-header">
            <p>Urejanje naročil</p>
          </div>
          <div class="message-body">
            Če v meniju na levi strani izberete možnost Naročila, lahko tam upravljate s svojimi naročili.
          </div>
        </article>
      </div>

      <?php require_once("view/customer/orders.php"); ?>

      <?php require_once("view/customer/edit-account.php"); ?>
    </div>
  </div>
</div>

<script src="static/js/customer.js" type="text/javascript"></script>