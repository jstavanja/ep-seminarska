<div class="page-customers">
  <h3 class="title is-inline">Uredi stranke</h3>
  <a class="button is-primary is-pulled-right is-inline button-new-customer">Dodaj stranko</a>
  <table class="table is-hoverable is-striped is-fullwidth">
    <thead>
      <tr>
        <th>Uporabniško ime</th>
        <th>Akcije</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($customers as $customer): ?>
      <tr>
        <th width="70%"><?php echo $customer['email'] ?> <?php echo $customer['status'] ? "(Aktiviran)" : "(Deaktiviran)" ?></th>
        <td width="30%">
          <a class="button is-primary is-small"><i class="fa fa-check-square"></i>Aktiviraj</a>
          <a class="button is-danger is-small"><i class="fa fa-minus-square"></i>Deaktiviraj</a>
          <a href="/index.php/seller/editCustomer/<?php echo $customer["id"];?>" class="button is-info is-small"><i class="fa fa-pencil-square"></i>Uredi</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>