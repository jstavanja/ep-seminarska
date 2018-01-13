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

<div class="container">
<form class="modal-card" action="/administrator/editSeller/<?php echo $seller["id"];?>" method="POST">
  <input type="hidden" name="id" value="<?php echo $seller["id"];?>">
  <header class="modal-card-head">
    <p class="modal-card-title">Uredi prodajalca</p>
    <button class="delete seller-close button-modal-close" aria-label="close"></button>
  </header>
  <section class="modal-card-body">
  <div class="field">
    <span>Uporabniško ime:</span>
    <p class="control has-icons-left">
      <input name="username" class="input" type="text" value="<?php echo $seller["username"];?>" placeholder="Uporabniško ime">
      <span class="icon is-small is-left">
        <i class="fa fa-user"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <span>Email naslov:</span>
    <p class="control has-icons-left">
      <input name="email" class="input" type="email" value="<?php echo $seller["email"];?>" placeholder="Email naslov">
      <span class="icon is-small is-left">
        <i class="fa fa-envelope"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <span>Geslo:</span>
    <p class="control has-icons-left">
      <input name="password" class="input" type="password" placeholder="Geslo">
      <span class="icon is-small is-left">
        <i class="fa fa-lock"></i>
      </span>
    </p>
  </div>
  <div class="field">
      <span>Geslo (ponovno):</span>
      <p class="control has-icons-left">
        <input name="password-repeat" class="input" type="password" placeholder="Geslo (ponovno)">
        <span class="icon is-small is-left">
          <i class="fa fa-lock"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <span>Ime:</span>
      <p class="control has-icons-left">
        <input name="name" class="input" type="text" value="<?php echo $seller["name"];?>" placeholder="Ime">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <span>Priimek:</span>
      <p class="control has-icons-left">
        <input name="surname" class="input" type="text" value="<?php echo $seller["surname"];?>" placeholder="Priimek">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <span>Ulica in hišna številka:</span>
      <p class="control has-icons-left">
        <input name="address" class="input" type="text" value="<?php echo $seller["address"];?>" placeholder="Ulica in hišna številka">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <span>Pošta:</span>
      <p class="control has-icons-left">
        <input name="postcode" class="input" value="<?php echo $seller["postcode"];?>" type="text" placeholder="Pošta">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <span>Telefonska številka:</span>
      <p class="control has-icons-left">
        <input name="phone" class="input" value="<?php echo $seller["phone"];?>" type="text" placeholder="Telefonska številka">
        <span class="icon is-small is-left">
          <i class="fa fa-phone"></i>
        </span>
      </p>
    </div>
    </section>
    <footer class="modal-card-foot">
      <button type="submit" class="button is-success">Shrani</button>
      <button class="button seller-close button-modal-close">Prekliči</button>
    </footer>
  </form>
</div>

<script src="/static/js/administrator-edit-seller.js" type="text/javascript"></script>