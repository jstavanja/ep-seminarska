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
        Pozdravljen, prodajemDrva123!
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

      <div class="page-default">
        <h3 class="title">Pozdravljen, prodajemDrva123!</h3>
        <article class="message is-danger">
            <div class="message-header">
              <p>Neobdelana naročila</p>
              <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
              Imate <b>69</b> neobdelanih naročil.
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

      <div class="page-items">
        <h3 class="title is-inline">Uredi artikle</h3>
        <a class="button is-primary is-pulled-right is-inline">Dodaj artikel</a>
        <table class="table is-hoverable is-striped is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Ime</th>
              <th>Kategorija</th>
              <th>Cena</th>
              <th>Akcije</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>0</th>
              <th>Mankini</th>
              <th>Oblačila</th>
              <th>10.69€</th>
              <td>
                <a class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Uredi</a>
                <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Izbriši</a>
              </td>
            </tr>
            <tr>
              <th>1</th>
              <th>Tangice</th>
              <th>Oblačila</th>
              <th>13.37€</th>
              <td>
                <a class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Uredi</a>
                <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Izbriši</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="page-customers">
        <h3 class="title is-inline">Uredi stranke</h3>
        <a class="button is-primary is-pulled-right is-inline button-new-customer">Dodaj stranko</a>
        <table class="table is-hoverable is-striped is-fullwidth">
          <thead>
            <tr>
              <th>Uporabniško ime</th>
              <th>Akcije</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th width="70%">stranka_branka (Aktiviran)</th>
              <td width="30%">
                <a class="button is-primary is-small"><i class="fa fa-check-square"></i>Aktiviraj</a>
                <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Deaktiviraj</a>
                <a class="button is-info is-small"><i class="fa fa-pencil-square"></i>Uredi</a>
              </td>
            </tr>
            <tr>
              <th>lepotec (Deaktiviran)</th>
              <td>
                <a class="button is-primary is-small"><i class="fa fa-check-square"></i>Aktiviraj</a>
                <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Deaktiviraj</a>
                <a class="button is-info is-small"><i class="fa fa-pencil-square"></i>Uredi</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-new-customer">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Dodaj stranko</p>
      <button class="delete button-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
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

    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Shrani</button>
      <button class="button button-modal-close">Prekliči</button>
    </footer>
  </div>
</div>

<script src="/static/js/seller.js" type="text/javascript"></script>