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
    <form class="container" action="/index.php/login/logUserIn" method="POST">
      <div class="columns animated fadeIn">
        <div class="column is-one-third"></div>
        <div class="column is-one-third">
          <div class="box">
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input name="email" class="input" type="email" placeholder="Email naslov">
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
                <input name="password" class="input" type="password" placeholder="Geslo">
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-text-centered	">
                <button class="button is-success button-login" type="submit">
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
          <?php if ($registered) : ?>
          <div class="column notification is-success has-text-centered animated flipInX notification-login-error">
              Uspešno ste se registrirali. Prosimo, prijavite se preko zgornjega obrazca.
          </div>
          <?php endif ?>
        </div>
        <div class="column is-one-third"></div>
      </div>
      <div class="columns animated flipInX">
          <div class="column is-one-third"></div>
          
          <div class="column is-one-third"></div>
      </div>
    </form>
  </section>