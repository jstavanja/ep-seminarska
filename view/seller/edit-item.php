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
<form class="modal-card" action="/index.php/seller/editItem/<?php echo $item["id"];?>" method="POST">
    <header class="modal-card-head">
      <p class="modal-card-title">Uredi artikel</p>
      <button class="delete item-close button-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <span>Ime:</span>
        <p class="control has-icons-left">
          <input name="name" class="input" type="text" placeholder="Majca Star Wars XD" value="<?php echo $item["name"];?>">
          <span class="icon is-small is-left">
            <i class="fa fa-edit"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Opis:</span>
        <p class="control has-icons-left">
          <input name="description" class="input" type="text" placeholder="Lepa majca" value="<?php echo $item["description"];?>">
          <span class="icon is-small is-left">
            <i class="fa fa-align-left"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Cena:</span>
        <p class="control has-icons-left">
          <input name="price" class="input" type="number" placeholder="69" value="<?php echo $item["price"];?>">
          <span class="icon is-small is-left">
            <i class="fa fa-dollar"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <span>Tag:</span>
        <p class="control has-icons-left">
          <input name="tag" class="input" type="text" placeholder="men" value="<?php echo $item["tag"];?>">
          <span class="icon is-small is-left">
            <i class="fa fa-tag"></i>
          </span>
        </p>
      </div>
    </section>
    <footer class="modal-card-foot">
      <button type="submit" class="button is-success">Shrani</button>
      <button class="button item-close button-modal-close">Prekliči</button>
    </footer>
  </form>
</div>

<script src="/static/js/seller-edit-item.js" type="text/javascript"></script>