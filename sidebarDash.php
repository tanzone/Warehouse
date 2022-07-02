<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(1);
?>
<?php
$user = current_user();
$c_categorie     = count_by_id('categories');
$c_product       = count_by_id('products');
$c_sale          = count_by_id('sales');
$c_user          = count_by_id('users');
$c_media         = count_by_id('media');
$c_accActive     = countAccActive();
$c_userType_ad   = count_by_typeUser('users', '1');
$c_userType_spec = count_by_typeUser('users', '2');
$c_userType_user = count_by_typeUser('users', '3');
$c_saleCurrMonth = countPriceCurrMonth('sales');
$sumSaleCurMonth = sumPriceCurrMonth('sales', 'price');
$sumSaleCurYear  = sumPriceCurrYear('sales', 'price');
$sumCostCurMonth = sumPriceCurrYear('products', 'buy_price');
$sumCostCurYear  = sumPriceCurrYear('products', 'buy_price');
$products_sold   = find_higest_saleing_product('5');
$recent_products = find_recent_product_added('5');
$recent_sales    = find_recent_sale_added('5')
?>


<div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">Dashboard</h4>
        <p>Principal card stats.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="warning"><?php echo $c_categorie['total']; ?></h3>
                  <span>Categories</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-book-open warning font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo (($c_categorie['total'] / 300) * 100); ?>%" aria-valuenow="<?php echo (($c_categorie['total'] / 300) * 100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="warning"><?php echo $c_product['total']; ?></h3>
                  <span>Products</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-bag warning font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo (($c_product['total'] / 1000) * 100); ?>%" aria-valuenow="<?php echo (($c_product['total'] / 1000) * 100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-calculator success font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="success"><?php echo $c_sale['total']; ?></h3>
                  <span>Total Sales</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-graph success font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="success"><?php echo $c_saleCurrMonth['total']; ?></h3>
                  <span>Sales this month</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="danger"><?php echo $c_accActive['total']; ?></h3>
                  <span>Groups active</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-badge danger font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="secondary"><?php echo $c_media['total']; ?></h3>
                  <span>Media</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-camera secondary font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if ($user['user_level'] <= '1') : ?>
      <div class="row">
        <div class="col-xl-4 col-sm-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="primary"><?php echo $c_user['total']; ?></h3>
                    <span>Users</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-users primary font-large-2 float-right"></i>
                  </div>
                </div>
                <div class="progress mt-1 mb-0" style="height: 7px;">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo (($c_user['total'] / 275) * 100); ?>%" aria-valuenow="<?php echo (($c_user['total'] / 275) * 100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="primary"><?php echo $c_userType_spec['total']; ?></h3>
                    <span>Special Users</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-user primary font-large-2 float-right"></i>
                  </div>
                </div>
                <div class="progress mt-1 mb-0" style="height: 7px;">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo (($c_userType_spec['total'] / 20) * 100); ?>%" aria-valuenow="<?php echo (($c_userType_spec['total'] / 20) * 100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="primary"><?php echo $c_userType_user['total']; ?></h3>
                    <span>Default Users</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-user primary font-large-2 float-right"></i>
                  </div>
                </div>
                <div class="progress mt-1 mb-0" style="height: 7px;">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo (($c_userType_user['total'] / 250) * 100); ?>%" aria-valuenow="<?php echo (($c_userType_user['total'] / 250) * 100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>


  <?php if ($user['user_level'] <= '1') : ?>
    <section id="stats-subtitle">
      <div class="row">
        <div class="col-12 mt-3 mb-1">
          <hr>
          <h4 class="text-uppercase">Money spent or gained</h4>
          <p>All expenses for Yearly &amp; Monthly.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6 col-md-12">
          <div class="card overflow-hidden">
            <div class="card-content">
              <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                  <div class="align-self-center">
                    <i class="icon-arrow-down warning font-large-2 mr-2"></i>
                  </div>
                  <div class="media-body">
                    <h4>Total Cost</h4>
                    <span>Yearly cost</span>
                  </div>
                  <div class="align-self-center">
                    <h1>€ <?php echo $sumCostCurYear['total']; ?></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="card overflow-hidden">
            <div class="card-content">
              <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                  <div class="align-self-center">
                    <i class="icon-fire danger font-large-2 mr-2"></i>
                  </div>
                  <div class="media-body">
                    <h4>Month Cost</h4>
                    <span>This monthly cost</span>
                  </div>
                  <div class="align-self-center">
                    <h1>€ <?php echo $sumCostCurMonth['total']; ?></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                  <div class="align-self-center">
                    <h1 class="mr-2">€ <?php echo $sumSaleCurYear['total']; ?></h1>
                  </div>
                  <div class="media-body">
                    <h4>Total Sales</h4>
                    <span>Yearly Sales Amount</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-wallet primary font-large-2"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body cleartfix">
                <div class="media align-items-stretch">
                  <div class="align-self-center">
                    <h1 class="mr-2">€ <?php echo $sumSaleCurMonth['total']; ?></h1>
                  </div>
                  <div class="media-body">
                    <h4>Month Sales</h4>
                    <span>This monthly sales</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-arrow-up success font-large-2"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section id="stats-subtitle">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <hr>
        <h4 class="text-uppercase">Tables stats</h4>
        <p>Just for watch utilities parameters</p>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6 col-md-12">
        <table class="table table-hover">
          <caption>Highest Saleing Products</caption>
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Total Sold</th>
              <th scope="col">Total Quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products_sold as  $product_sold) : ?>
              <tr>
                <th scope="row"><?php echo count_id(); ?></th>
                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                <td><?php echo (int)$product_sold['totalQty']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="col-xl-6 col-md-12">
        <table class="table table-hover">
          <caption>Latest Sales</caption>
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Name</th>
              <th scope="col">Date</th>
              <th scope="col">Total Sale</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($recent_sales as  $recent_sale) : ?>
              <tr>
                <th scope="row"><?php echo count_id1(); ?></th>
                <td>
                  <a onclick="loadPageEdit('edit_sale', <?php echo (int)$recent_sale['id']; ?>)">
                    <?php echo remove_junk(first_character($recent_sale['name'])); ?>
                  </a>
                </td>
                <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section id="stats-subtitle">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <hr>
        <h4 class="text-uppercase">Products</h4>
        <p>Recently Added Products</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-striped">
          <thead class="thead-light">
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Categoria</th>
              <th scope="col">Price Sales</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($recent_products as  $recent_product) : ?>
              <tr>
                <th scope="row">
                  <a onclick="loadPageEdit('edit_sale', <?php echo (int)$recent_product['id']; ?>)">
                    <?php if ($recent_product['media_id'] === '0') : ?>
                      <img class="imgTableProd" src="uploads/products/no_image.jpg" alt="">
                    <?php else : ?>
                      <img class="imgTableProd" src="uploads/products/<?php echo $recent_product['image']; ?>" alt="" />
                    <?php endif; ?>
                  </a>
                </th>
                <td><?php echo remove_junk(first_character($recent_product['name'])); ?></td>
                <td><?php echo remove_junk(first_character($recent_product['categorie'])); ?></td>
                <td>€<?php echo (int)$recent_product['sale_price']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>