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
    <?php foreach($sellers as $seller): ?>
      <tr>
        <th width="70%"><?php echo $seller['email'] ?> <?php echo $seller['status'] ? "(Aktiviran)" : "(Deaktiviran)" ?></th>
        <td width="30%">
          <form id="seller-activate-form-<?php echo $seller["id"]; ?>" style="display: none;" action="<?php echo BASE_URL . "administrator/activateSeller"?>" method="post">
            <input type="hidden" name="id" value="<?php echo $seller["id"]; ?>">
          </form>
          <form id="seller-deactivate-form-<?php echo $seller["id"]; ?>" style="display: none;" action="<?php echo BASE_URL . "administrator/deactivateSeller"?>" method="post">
            <input type="hidden" name="id" value="<?php echo $seller["id"]; ?>">
          </form>
          <a class="button is-primary is-small" onclick="document.getElementById('seller-activate-form-<?php echo $seller["id"]; ?>').submit()"><i class="fa fa-check-square"></i>Aktiviraj</a>
          <a class="button is-danger is-small" onclick="document.getElementById('seller-deactivate-form-<?php echo $seller["id"]; ?>').submit()"><i class="fa fa-minus-square"></i>Deaktiviraj</a>
          <a class="button is-info is-small" href="<?php echo BASE_URL . "administrator/editSeller/" . $seller["id"];?>"><i class="fa fa-pencil-square"></i>Uredi</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
