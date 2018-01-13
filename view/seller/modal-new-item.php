<div class="modal modal-new-item">
  <div class="modal-background"></div>
  <div class="modal-content">
    <form class="modal-card" action="/seller/addItem" method="POST">
      <header class="modal-card-head">
        <p class="modal-card-title">Dodaj artikel</p>
        <button class="delete button-modal-close" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="field">
          <span>Ime:</span>
          <p class="control has-icons-left">
            <input name="name" class="input" type="text" placeholder="Majca Star Wars XD">
            <span class="icon is-small is-left">
              <i class="fa fa-edit"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <span>Opis:</span>
          <p class="control has-icons-left">
            <input name="description" class="input" type="text" placeholder="Lepa majca">
            <span class="icon is-small is-left">
              <i class="fa fa-align-left"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <span>Cena:</span>
          <p class="control has-icons-left">
            <input name="price" class="input" type="number" placeholder="69">
            <span class="icon is-small is-left">
              <i class="fa fa-dollar"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <span>Tag:</span>
          <p class="control has-icons-left">
            <input name="tag" class="input" type="text" placeholder="men">
            <span class="icon is-small is-left">
              <i class="fa fa-tag"></i>
            </span>
          </p>
        </div>
      </section>
      <footer class="modal-card-foot">
        <button type="submit" class="button is-success">Shrani</button>
        <button class="button button-modal-close">Prekliči</button>
      </footer>
    </form>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>