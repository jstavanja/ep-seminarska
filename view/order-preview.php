<div class="container cart-container">
  <div class="card">
    <header class="card-header">
      <p class="card-header-title title is-1">
        Predračun
      </p>
      <a href="#" class="card-header-icon" aria-label="more options">
        <span class="icon">
          <i class="fa fa-angle-down" aria-hidden="true"></i>
        </span>
      </a>
    </header>
    <div class="card-content">
      <div class="cart-items">
        <table class="table is-striped is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Ime</th>
              <th>Kategorija</th>
              <th>Cena</th>
              <th>Količina</th>
            </tr>
          </thead>
          <tbody id="items-body">
            <?php foreach($items as $item): ?>
            <tr>
              <th><?php echo $item["id"]; ?></th>
              <th><?php echo $item["name"]; ?></th>
              <th><?php echo $item["tag"]; ?></th>
              <th><?php echo $item["price"]; ?>€</th>
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

<script src="/static/js/order-preview.js"></script>