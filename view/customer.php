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
        Pozdravljen(a), stranka_branka!
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

      <div class="page-orders">
        <h3 class="title is-inline">Uredi naročila</h3>
        <div class="control is-inline">
          <div class="select">
            <select>
              <option>Neobdelana</option>
              <option>Obdelana</option>
            </select>
          </div>
        </div>
        <table class="table is-hoverable is-striped is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Naročnik</th>
              <th>Status</th>
              <th>Število artiklov</th>
              <th>Cena</th>
              <th>Akcije</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>24</th>
              <th>DamjanMurko</th>
              <th><i class="fa fa-times has-text-danger"></i></th>
              <th>7</th>
              <th>80.21€</th>
              <td>
                <a class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Obdelaj</a>
              </td>
            </tr>
            <tr>
              <th>52</th>
              <th>BorutPahor</th>
              <th><i class="fa fa-times has-text-danger"></i></th>
              <th>20</th>
              <th>103.99€</th>
              <td>
                <a class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Obdelaj</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="page-account">
        <h3 class="title">Uredi svoje podatke</h3>
        <div class="field">
          <span>Uporabniško ime:</span>
          <p class="control has-icons-left">
            <input class="input" type="email" placeholder="Uporabniško ime">
            <span class="icon is-small is-left">
              <i class="fa fa-user"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <span>Email naslov:</span>
          <p class="control has-icons-left">
            <input class="input" type="email" placeholder="Email naslov">
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <span>Geslo:</span>
          <p class="control has-icons-left">
            <input class="input" type="password" placeholder="Geslo">
            <span class="icon is-small is-left">
              <i class="fa fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
            <span>Geslo (ponovno):</span>
            <p class="control has-icons-left">
              <input class="input" type="password" placeholder="Geslo (ponovno)">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </p>
          </div>
        <div class="field">
          <span>Pravo ime:</span>
          <p class="control has-icons-left">
            <input class="input" type="email" placeholder="Pravo ime">
            <span class="icon is-small is-left">
              <i class="fa fa-user"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <span>Ulica in hišna številka:</span>
          <p class="control has-icons-left">
            <input class="input" type="email" placeholder="Ulica in hišna številka">
            <span class="icon is-small is-left">
              <i class="fa fa-user"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <span>Pošta:</span>
          <p class="control has-icons-left">
            <input class="input" type="email" placeholder="Pošta">
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
      </div>

    </div>
  </div>
</div>

<script src="static/js/customer.js" type="text/javascript"></script>