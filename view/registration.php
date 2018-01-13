<section class="hero is-primary is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title animated fadeInLeft">
          Registracija
        </h1>
        <h2 class="subtitle animated fadeInLeft">
          Ustvarite si svoj račun!
        </h2>
      </div>
    </div>
  </section>
  <section class="section animated fadeIn">
    <div class="container">
      <div class="columns box">
        <form action="/registration/registerUser" method="post" class="column is-two-thirds">
          <?php if ($missing_parameters) : ?>
          <div class="column notification is-danger has-text-centered animated flipInX notification-login-error">
              Prosimo, pravilno izpolnite vsa polja.
          </div>
          <?php endif ?>
          <div class="field">
            <span>Uporabniško ime:</span>
            <p class="control has-icons-left">
              <input class="input" name="username" type="text" placeholder="Uporabniško ime">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <span>Email naslov:</span>
            <p class="control has-icons-left">
              <input class="input" name="email" type="email" placeholder="Email naslov">
              <span class="icon is-small is-left">
                <i class="fa fa-envelope"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <span>Geslo:</span>
            <p class="control has-icons-left">
              <input class="input" name="password" type="password" placeholder="Geslo">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </p>
          </div>
          <div class="field">
              <span>Geslo (ponovno):</span>
              <p class="control has-icons-left">
                <input class="input" name="password-repeat" type="password" placeholder="Geslo (ponovno)">
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </p>
            </div>
          <div class="field">
            <span>Ime:</span>
            <p class="control has-icons-left">
              <input class="input" name="name" type="text" placeholder="Pravo ime">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <span>Priimek:</span>
            <p class="control has-icons-left">
              <input class="input" name="surname" type="text" placeholder="Pravo ime">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <span>Ulica in hišna številka:</span>
            <p class="control has-icons-left">
              <input class="input" name="address" type="text" placeholder="Ulica in hišna številka">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <span>Pošta:</span>
            <p class="control has-icons-left">
              <input class="input" name="postcode" type="text" placeholder="Pošta">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <span>Telefonska številka:</span>
            <p class="control has-icons-left">
              <input class="input" name="phone" type="number" placeholder="041123123">
              <span class="icon is-small is-left">
                <i class="fa fa-phone"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <div class="control has-text-centered">
              <div class="g-recaptcha" data-sitekey="6LeknUAUAAAAAEdmQLSzK1pu8X0seAmRJCDz757T"></div>
            </div>
          </div>
          <div class="field">
            <p class="control has-text-centered	">
              <button class="button is-success" type="submit">
                Registriraj se
              </button>
            </p>
          </div>
      </form>
      <div class="column is-one-third has-text-centered">
          <br>
          <i class="fa fa-user is-size-1"></i>
          <br><br>
          <p>Ali ste vedeli, da registracija na naši trgovini v povprečju traja manj kot nekaj minut?</p>
      </div>
    </div>
  </div>
</section>