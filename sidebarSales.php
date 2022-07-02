<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(3);
$user = current_user();
?>
<?php
$sales = find_all_sale();
?>


<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Sales</h4>
      <p>View all sales registred.</p>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-outline-success" onclick="loadPage('add_sale')">Add New Sales</button>
    </div>
  </div>


  <div class="row">
    <div class="col-xl-12 col-md-12">
      <table class="table table-hover table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($sales as $sale) : ?>
            <tr>
              <th scope="row"><?php echo count_id(); ?></th>
              <td><?php echo remove_junk($sale['name']); ?></td>
              <td><?php echo (int)$sale['qty']; ?></td>
              <td><?php echo remove_junk($sale['price']); ?></td>
              <td><?php echo $sale['date']; ?></td>
              <td>
                <a data-toggle="tooltip" title="Edit">
                  <button type="button" class="btn btn-warning" onclick="loadPageEdit('edit_sale', <?php echo (int)$sale['id']; ?>)"><i class="icon-pencil"></i></button>
                </a>
                <?php if ($user['user_level'] <= '2') : ?>
                <a data-toggle="tooltip" title="Remove">
                  <button type="button" class="btn btn-danger" onclick="clickDelSale(<?php echo (int)$sale['id']; ?>)"><i class="icon-trash"></i></button>
                </a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>