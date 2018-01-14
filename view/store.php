<?php echo '<script src="' . BASE_URL . 'static/js/store.js" type="text/javascript"></script>' ;?>

<?php
if (!isset($_COOKIE['first_time'])) {
  require_once('view/store/first-time-modal.php');
  setcookie("first_time", "false", time() + strtotime("+1 year"), '/');
}

require_once('header.php');
require_once('store/carousel.php');
require_once('store/item-list.php');