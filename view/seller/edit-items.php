<div class="page-items">
  <h3 class="title is-inline">Uredi artikle</h3>
  <a class="button is-primary is-pulled-right is-inline button-new-item">Dodaj artikel</a>
  <table class="table is-hoverable is-striped is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ime</th>
        <th>Kategorija</th>
        <th>Opis</th>
        <th>Cena</th>
        <th>Akcije</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($items as $item): ?>
      <tr>
        <th><?php echo $item["id"];?></th>
        <th><?php echo $item["name"];?></th>
        <th><?php echo $item["tag"];?></th>
        <th><?php echo $item["description"]; ?></th>
        <th><?php echo $item["price"];?>€</th>
        <td>
          <a class="button is-primary is-small" href="/index.php/seller/editItem/<?php echo $item["id"];?>"><i class="fa fa-pencil-square"></i>Uredi</a>
          <form action="/index.php/seller/deleteItem/<?php echo $item["id"];?>" method="post">
            <button type="submit" class="button is-danger is-small"><i class="fa fa-minus-square"></i>Izbriši</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>