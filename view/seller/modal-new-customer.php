
<div class="modal modal-new-customer">
  <div class="modal-background"></div>
  <form class="modal-card" action="/index.php/seller/addCustomer" method="POST">
    <header class="modal-card-head">
      <p class="modal-card-title">Dodaj stranko</p>
      <button class="delete button-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <span>Uporabniško ime:</span>
        <p class="control has-icons-left">
          <input name="username" class="input" type="text" placeholder="Uporabniško ime">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Email naslov:</span>
        <p class="control has-icons-left">
          <input name="email" class="input" type="email" placeholder="Email naslov">
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
          <input name="name" class="input" type="text" placeholder="Pravo ime">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Ulica in hišna številka:</span>
        <p class="control has-icons-left">
          <input name="address" class="input" type="text" placeholder="Ulica in hišna številka">
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Pošta:</span>
        <p class="control has-icons-left">
          <input name="postcode" class="input" type="text" placeholder="Pošta">
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