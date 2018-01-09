<?php require_once("header.php"); ?>


<div class="container cart-container">
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        Košarica
      </p>
      <a href="#" class="card-header-icon" aria-label="more options">
        <span class="icon">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
        </span>
      </a>
    </header>
    <div class="card-content">
      <div class="cart-items">
        <a class="button is-danger is-pulled-right is-inline">Izprazni košarico</a>
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
                <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Izbriši</a>
              </td>
            </tr>
            <tr>
              <th>1</th>
              <th>Tangice</th>
              <th>Oblačila</th>
              <th>13.37€</th>
              <td>
                <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Izbriši</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <footer class="card-footer">
      <a href="#" class="card-footer-item is-success">Zaključi nakup</a>
      <a href="#" class="card-footer-item">Skupaj: 69.69$</a>
    </footer>
  </div>
</div>