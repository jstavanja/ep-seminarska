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
        <a class="button is-danger is-pulled-right is-inline" onclick="document.getElementById('empty-cart-form').submit();">Izprazni košarico</a>
        <table class="table is-hoverable is-striped is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Ime</th>
              <th>Kategorija</th>
              <th>Cena</th>
              <th>Količina</th>
              <th>Akcije</th>
            </tr>
          </thead>
          <tbody id="items-body">
            <?php foreach($items as $item): ?>
            <tr>
              <th><?php echo $item["id"]; ?></th>
              <th><?php echo $item["name"]; ?></th>
              <th><?php echo $item["tag"]; ?></th>
              <th><?php echo $item["price"]; ?>€</th>
              <th>
                <form class="is-inline" action="/index.php/cart/updateCart" method="post">
                  <input type="hidden" name="do" value="update_cart">
                  <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
                  <input class="is-inline" type="number" value="<?php echo $item["amount"]; ?>" name="amount">
                  <button class="is-success is-small is-inline">Posodobi</button>
                </form>
              </th>
              <td>
                <form style="display: none;" action="/index.php/cart/updateCart" id="delete-item-form" method="post">
                  <input type="hidden" name="do" value="update_cart">
                  <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
                  <input type="number" value="0" name="amount">
                </form>
                <a class="button is-danger is-small" onclick="document.getElementById('delete-item-form').submit()"><i class="fa fa-minus-square"></i>Izbriši</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <footer class="card-footer">
      <?php
        if (!(isset($_SESSION["userid"]))) {
          echo '<a href="#" class="card-footer-item is-danger" >Za nakup morate biti prijavljeni.</a>';
        }
        else {
          echo '<a href="#" class="card-footer-item is-success btn-complete-order" >Zaključi nakup</a>';
        }
      ?>
      <a href="#" class="card-footer-item">Skupaj: 
      <?php 
      $total_price = 0;
      foreach ($items as $item) {
        $total_price += $item["price"] * $item["amount"];
      }
      echo $total_price;
      ?>
      $</a>
    </footer>
  </div>
</div>

<form action="/index.php/cart/emptyCart" id="empty-cart-form" method="post">
  <input type="hidden" name="do" value="purge_cart">
</form>

<script src="/static/js/cart.js" type="text/javascript"></script>