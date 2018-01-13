<?php require_once('header.php'); ?>

<div class="container item-container">
  <div class="columns">
    <div class="column is-two-thirds">
      <div class="box">
        <article class="media">
          <div class="media-content">
            <div class="content">
              <h1><?php echo $item["name"];?></h1>
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg"></img>
              <p>
                <small><?php echo $item["tag"];?></small>
                <br>
                <?php echo $item["description"];?>
              </p>
            </div>
          </div>
        </article>
      </div>
    </div>
    <div class="column is one-third">
      <div class="card">
        <div class="card-content">
          <p class="title">
          <?php echo $item["price"];?>$
          </p>
        </div>
        <footer class="card-footer">
          <p class="card-footer-item">
            <span>
              <a onclick="document.getElementById('cart-add-form').submit();">V košarico</a>
            </span>
          </p>
        </footer>
      </div>
    </div>
  </div>
</div>

<form id="cart-add-form" action="/cart/addToCart" method="post" style="display:none;">
  <input type="hidden" name="id" value="<?php echo $item["id"];?>">
  <input type="hidden" name="do" value="add_into_cart">
</form>