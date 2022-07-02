<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(2);
?>
<?php
$product = find_by_id('products', (int)$_SESSION['session_edit']);
$all_categories = find_all('categories');
$all_photo = find_all('media');
if (!$product) {
  $session->msg("d", "Missing product id.");
  return false;
}
?>


<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Edit Product</h4>
      <p id="prod-id-edit" hidden><?php echo $product["id"]; ?></p>
      <hr>
    </div>
  </div>


  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Title Name</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="product-title" value="<?php echo remove_junk($product['name']); ?>" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Group name: </label>
        </div>
        <select class="custom-select" id="prod-cat-edit">
          <option value=""> Select a categorie</option>
          <?php foreach ($all_categories as $cat) : ?>
            <option value="<?php echo (int)$cat['id']; ?>" <?php if ($product['categorie_id'] === $cat['id']) : echo "selected";
                                                            endif; ?>>
              <?php echo remove_junk($cat['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Image: </label>
        </div>
        <select class="custom-select" id="product-photo">
          <option value=""> No Image</option>
          <?php foreach ($all_photo as $photo) : ?>
            <option value="<?php echo (int)$photo['id']; ?>" <?php if ($product['media_id'] === $photo['id']) : echo "selected";
                                                            endif; ?>>
              <?php echo $photo['file_name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="input-group mb-3">
        <label for="name" class="control-label">Quantity</label>
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="product-quantity" value="<?php echo remove_junk($product['quantity']); ?>" placeholder="Quantity" aria-label="Quantity" aria-describedby="basic-addon1">
        </div>
      </div>

      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Buying and Selling Price</span>
        </div>
        <input type="number" class="form-control" id="buying-price" value="<?php echo remove_junk($product['buy_price']); ?>" placeholder="Buying Price" aria-label="Buying Price" aria-describedby="basic-addon1">
        <input type="number" class="form-control" id="saleing-price" value="<?php echo remove_junk($product['sale_price']); ?>" placeholder="Selling Price" aria-label="Selling Price" aria-describedby="basic-addon1">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-success" onclick="clickEditProd()">Update Product</button>
    </div>
  </div>
</section>