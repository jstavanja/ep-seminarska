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

<div class="container">
<form class="modal-card" action="/index.php/seller/editCustomer/<?php echo $customer["id"];?>" method="POST">
  <input type="hidden" name="id" value="<?php echo $customer["id"];?>">
  <header class="modal-card-head">
    <p class="modal-card-title">Uredi stranko</p>
    <button class="delete customer-close button-modal-close" aria-label="close"></button>
  </header>
  <section class="modal-card-body">
  <div class="field">
    <span>Uporabniško ime:</span>
    <p class="control has-icons-left">
      <input name="username" class="input" type="text" value="<?php echo $customer["username"];?>" placeholder="Uporabniško ime">
      <span class="icon is-small is-left">
        <i class="fa fa-user"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <span>Email naslov:</span>
    <p class="control has-icons-left">
      <input name="email" class="input" type="email" value="<?php echo $customer["email"];?>" placeholder="Email naslov">
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
      <span>Pravo ime:</span>
      <p class="control has-icons-left">
        <input name="name" class="input" type="text" value="<?php echo $customer["name"];?>" placeholder="Pravo ime">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <span>Ulica in hišna številka:</span>
      <p class="control has-icons-left">
        <input name="address" class="input" type="text" value="<?php echo $customer["address"];?>" placeholder="Ulica in hišna številka">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
    <div class="field">
      <span>Pošta:</span>
      <p class="control has-icons-left">
        <input name="postcode" class="input" value="<?php echo $customer["postcode"];?>" type="text" placeholder="Pošta">
        <span class="icon is-small is-left">
          <i class="fa fa-user"></i>
        </span>
      </p>
    </div>
    </section>
    <footer class="modal-card-foot">
      <button type="submit" class="button is-success">Shrani</button>
      <button class="button customer-close button-modal-close">Prekliči</button>
    </footer>
  </form>
</div>

<script src="/static/js/seller-edit-customer.js" type="text/javascript"></script>