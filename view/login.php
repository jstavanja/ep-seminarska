<section class="hero is-info is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title animated fadeInLeft">
          Prijava
        </h1>
        <h2 class="subtitle animated fadeInLeft">
          Prijavite se v svoj račun!
        </h2>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="columns animated fadeIn">
        <div class="column is-one-third"></div>
        <div class="column is-one-third">
          <div class="box">
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input" type="email" placeholder="Email naslov">
                <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                  <i class="fa fa-check"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left">
                <input class="input" type="password" placeholder="Geslo">
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-text-centered	">
                <button class="button is-success button-login">
                  Prijavi se
                </button>
              </p>
            </div>
            <div class="ustvari-nov-racun has-text-centered">
              <a href="/index.php/registration" class="is-size-7">Ustvari nov račun.</a>
            </div>
          </div>
          <?php if ($displayError) : ?>
          <div class="column notification is-danger has-text-centered animated flipInX notification-login-error">
              Vnesli ste nepravilno kombinacijo uporabniškega imena in gesla.
          </div>
          <?php endif ?>
        </div>
        <div class="column is-one-third"></div>
      </div>
      <div class="columns animated flipInX">
          <div class="column is-one-third"></div>
          
          <div class="column is-one-third"></div>
      </div>
    </div>
  </section>