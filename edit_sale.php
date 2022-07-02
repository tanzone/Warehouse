<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(3);
?>
<?php
$sale = find_by_id('sales', (int)$_SESSION['session_edit']);
if (!$sale) {
  $session->msg("d", "Missing product id.");
  return false;
}
?>
<?php $product = find_by_id('products', $sale['product_id']); ?>



<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Edit Sale</h4>
      <p id="sale-id-edit" hidden><?php echo $sale["id"]; ?></p>
      <p id="prod-id-edit" hidden><?php echo $product["id"]; ?></p>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-primary" onclick="loadPage('sidebarSales')">Show All Sales</button>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 mt-3 mb-1">
      <table class="table table-bordered">
        <thead>
          <th> Product title </th>
          <th> Quantity </th>
          <th> Price </th>
          <th> Total </th>
          <th> Date</th>
          <th> Action</th>
        </thead>
        <tbody id="product_info">
          <tr>
            <td>
              <input id="sale-title-edit" type="text" class="form-control" value="<?php echo remove_junk($product['name']); ?>" placeholder="Product Title" aria-label="Product Title" aria-describedby="basic-addon1">
            </td>
            <td>
              <input id="sale-qty-edit" type="number" class="form-control product_info" value="<?php echo (int)$sale['qty']; ?>" placeholder="Quantity sales" aria-label="Quantity Sales" aria-describedby="basic-addon1">
            </td>
            <td>
              <input id="sale-price-edit" type="number" class="form-control product_info1" value="<?php echo remove_junk($product['sale_price']); ?>" placeholder="Price Selling" aria-label="Price Selling" aria-describedby="basic-addon1">
            </td>
            <td>
              <input id="sale-total-edit" type="number" class="form-control" value="<?php echo remove_junk($sale['price']); ?>" placeholder="Total Gained" aria-label="Total Gained" aria-describedby="basic-addon1">
            </td>
            <td>
              <input id="sale-date-edit" type="date" class="form-control datepicker" value="<?php echo remove_junk($sale['date']); ?>" placeholder="Date" aria-label="Date" aria-describedby="basic-addon1">
            </td>
            <td>
              <button type="button" class="btn btn-success" onclick="clickEditSale()">Update sale</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  const selectElement = document.querySelector('.product_info');

  selectElement.addEventListener('change', (event) => {
    console.log("ciao");
    var price = +$('input[id=sale-price-edit]').val() || 0;
    var qty = +$('input[id=sale-qty-edit]').val() || 0;
    var total = qty * price;
    $('input[id=sale-total-edit]').val(total.toFixed(2));
  });

  const selectElement1 = document.querySelector('.product_info1');

  selectElement1.addEventListener('change', (event) => {
    console.log("ciao");
    var price = +$('input[id=sale-price-edit]').val() || 0;
    var qty = +$('input[id=sale-qty-edit]').val() || 0;
    var total = qty * price;
    $('input[id=sale-total-edit]').val(total.toFixed(2));
  });
</script>