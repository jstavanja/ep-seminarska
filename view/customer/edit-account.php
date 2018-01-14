<div class="page-account">
  <h3 class="title">Uredi svoje podatke</h3>
    <form action="<?php echo BASE_URL . "customer/editOwnData"?>" method="post">
  <div class="field">
    <span>Uporabniško ime:</span>
    <p class="control has-icons-left">
      <input class="input" type="text" name="username" value="<?php echo $_SESSION["username"] ?>" placeholder="Uporabniško ime">
      <span class="icon is-small is-left">
        <i class="fa fa-user"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <span>Email naslov:</span>
    <p class="control has-icons-left">
      <input class="input" type="email" name="email" value="<?php echo $_SESSION["user"] ?>" placeholder="Email naslov">
      <span class="icon is-small is-left">
        <i class="fa fa-envelope"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <span>Geslo:</span>
    <p class="control has-icons-left">
      <input class="input" type="password" name="password" placeholder="Geslo">
      <span class="icon is-small is-left">
        <i class="fa fa-lock"></i>
      </span>
    </p>
  </div>
  <div class="field">
      <span>Geslo (ponovno):</span>
      <p class="control has-icons-left">
        <input class="input" type="password" name="password-repeat" placeholder="Geslo (ponovno)">
        <span class="icon is-small is-left">
          <i class="fa fa-lock"></i>
        </span>
      </p>
    </div>
  <div class="field">
    <span>Pravo ime:</span>
    <p class="control has-icons-left">
      <input class="input" name="name" value="<?php echo $_SESSION["name"] ?>" type="text" placeholder="Pravo ime">
      <span class="icon is-small is-left">
        <i class="fa fa-user"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <span>Ulica in hišna številka:</span>
    <p class="control has-icons-left">
      <input class="input" type="text" name="address" value="<?php echo $_SESSION["address"] ?>" placeholder="Ulica in hišna številka">
      <span class="icon is-small is-left">
        <i class="fa fa-user"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <span>Pošta:</span>
    <p class="control has-icons-left">
      <input class="input" type="text" name="postcode" value="<?php echo $_SESSION["postcode"] ?>" placeholder="Pošta">
      <span class="icon is-small is-left">
        <i class="fa fa-user"></i>
      </span>
    </p>
  </div>
  <div class="field">
    <p class="control has-text-centered	">
      <button class="button is-success">
        Shrani spremembe
      </button>
    </p>
  </div>
    </form>
</div>
