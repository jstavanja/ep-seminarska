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
        Pozdravljen, <?php echo $_SESSION['user'] ?>!
      </h2>
    </div>
  </div>
</section>

<div class="container">
<div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Obdelaj naročilo</p>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <span>Id:</span>
        <p class="control has-icons-left">
          <h3><?php echo $order["id"]; ?></h3>
        </p>
      </div>
      <div class="field">
        <span>Stranka:</span>
        <div class="control">
          <h3><?php echo $customer["email"]; ?></h3>
        </div>
      </div>
      <div class="field">
        <span>Artikli:</span>
        <div class="content">
          <ul>
            <?php foreach ($items as $item): ?>
              <li>
                <span>Izdelek: </span><?php echo($item[0]["name"]); ?> |
                <span>Število: </span><b><?php echo($item["amount"]) ?></b>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-info customer-close button-modal-close">Nazaj</button>
      <form action="/seller/order/approve/<?php echo $order["id"];?>" method="post">
        <button type="submit" class="button is-success"><i class="fa fa-minus-square"></i>Odobri naročilo</button>
      </form>
      <form action="/seller/order/cancel/<?php echo $order["id"];?>" method="post">
        <button type="submit" class="button is-danger"><i class="fa fa-minus-square"></i>Prekliči naročilo</button>
      </form>
    </footer>
  </div>
</div>

<script src="/static/js/custom-edit-order.js" type="text/javascript"></script>