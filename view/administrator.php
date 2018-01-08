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
        Pozdravljen, Administrator!
      </h2>
    </div>
  </div>
</section>
<div class="container is-fluid admin-panel">
  <div class="columns">
    <div class="container box column animated fadeInLeft">
      <aside class="menu">
        <p class="menu-label">
          Upravljanje računov
        </p>
        <ul class="menu-list">
          <li><a class="button-sellers">Prodajalci</a></li>
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
        <h3 class="title">Dobrodošli, administrator!</h3>
        <article class="message is-dark">
          <div class="message-header">
            <p>Urejanje prodajalcev</p>
          </div>
          <div class="message-body">
            Če v meniju na levi strani izberete možnost Prodajalci, lahko tam ustvarite nove, aktivirate in deaktivirate že obstoječe, ali
            pa urejate njihove podatke.
          </div>
        </article>
      </div>

      <div class="page-sellers">
        <h3 class="title is-inline">Uredi prodajalce</h3>
        <a class="button is-primary is-pulled-right is-inline button-new-seller">Dodaj prodajalca</a>
        <table class="table is-hoverable is-striped is-fullwidth">
          <thead>
            <tr>
              <th>Prodajalec (status)</th>
              <th>Akcije</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th width="70%">kefir_rupee (Aktiviran)</th>
              <td width="30%">
                <a class="button is-primary is-small"><i class="fa fa-check-square"></i>Aktiviraj</a>
                <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Deaktiviraj</a>
                <a class="button is-info is-small"><i class="fa fa-pencil-square"></i>Uredi</a>
              </td>
            </tr>
            <tr>
              <th>seniorescobar (Deaktiviran)</th>
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

<div class="modal modal-new-seller">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Dodaj prodajalca</p>
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

<script src="static/js/administrator.js" type="text/javascript"></script>