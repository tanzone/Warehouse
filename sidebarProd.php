<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(2);
$user = current_user();
$products = join_product_table();
?>


<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Products Management</h4>
      <p>View all products in stock.</p>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-outline-success" onclick="loadPage('add_product')">Add New Product</button>
    </div>
  </div>


  <div class="row">
    <div class="col-xl-12 col-md-12">
      <table class="table table-hover table-striped">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Product Title</th>
            <th scope="col">Categorie</th>
            <th scope="col">Instock</th>
            <th scope="col">Buying Price</th>
            <th scope="col">Selling Price</th>
            <th scope="col">Product Added</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) : ?>
            <tr>
              <th scope="row"><?php echo count_id(); ?></th>
              <td>
                  <?php if ($product['media_id'] === '0') : ?>
                    <img class="imgTableProd" src="uploads/products/no_image.jpg" alt="">
                  <?php else : ?>
                    <img class="imgTableProd" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                  <?php endif; ?>
                </td>
              <td><?php echo remove_junk($product['name']); ?></td>
              <td><?php echo remove_junk($product['categorie']); ?></td>
              <td><?php echo remove_junk($product['quantity']); ?></td>
              <td><?php echo remove_junk($product['buy_price']); ?></td>
              <td><?php echo remove_junk($product['sale_price']); ?></td>
              <td><?php echo read_date($product['date']); ?></td>
              <td>
              <?php if ($user['user_level'] <= '2') : ?>
                <a data-toggle="tooltip" title="Edit">
                  <button type="button" class="btn btn-warning" onclick="loadPageEdit('edit_product', <?php echo (int)$product['id']; ?>)"><i class="icon-pencil"></i></button>
                </a>
                <?php endif; ?>
                <?php if ($user['user_level'] <= '1') : ?>
                <a data-toggle="tooltip" title="Remove">
                  <button type="button" class="btn btn-danger" onclick="clickDelProd(<?php echo (int)$product['id']; ?>)"><i class="icon-trash"></i></button>
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