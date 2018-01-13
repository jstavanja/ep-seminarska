<div class="page-orders" id="#app">
  <h3 class="title is-inline">Uredi naročila</h3>
  <div class="control is-inline">
    <div class="select">
      <select>
        <option>Neobdelana</option>
        <option>Obdelana</option>
      </select>
    </div>
  </div>
  <table class="table is-hoverable is-striped is-fullwidth">
    <thead>
      <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Število artiklov</th>
        <th>Cena</th>
        <th>Akcije</th>
      </tr>
    </thead>
    <tbody class="tbody-orders">
      <tr>
        <th>24</th>
        <th><i class="fa fa-times has-text-danger"></i></th>
        <th>7</th>
        <th>80.21€</th>
        <td>
          <a class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Obdelaj</a>
        </td>
      </tr>
      <tr>
        <th>52</th>
        <th><i class="fa fa-times has-text-danger"></i></th>
        <th>20</th>
        <th>103.99€</th>
        <td>
          <a class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Obdelaj</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<script src="https://unpkg.com/vue"></script>