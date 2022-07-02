<?php
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
    redirect('index.php', false);
}
?>

<?php
if (isset($_POST['product_name']) && strlen($_POST['product_name'])) {
    $result = find_product_by_title($_POST['product_name']);
    $output = '<ul class="list-group">';
    if ($result) {
        foreach ($result as $prod) {
            $output .= '<li class="list-group-item">' . $prod['name'] . '</li>';
        }
    } else
        $output .= '<li class="list-group-item active">Product Not Found</li>';

    $output .= '</ul>';
    echo $output;
    unset($_POST['product_name']);
}
?> 



<?php
if (isset($_POST['findIt'])) {
    $product_title = remove_junk($db->escape($_POST['p_name']));
    $results = find_all_product_info_by_title($product_title);
    if ($results) {
        $html = "<tr>";
        foreach ($results as $result) {
            $html .= "<td id=\"s_name\">" . $result['name'] . "</td>";
            $html .= "<input type=\"hidden\" id=\"s_id\" value=\"{$result['id']}\">";
            $html  .= "<td>";
            $html  .= "<input type=\"text\" class=\"form-control product_info1\" id=\"sale-price-add\" value=\"{$result['sale_price']}\">";
            $html  .= "</td>";
            $html .= "<td id=\"s_qty\">";
            $html .= "<input type=\"text\" class=\"form-control product_info\" id=\"sale-qty-add\" value=\"1\">";
            $html  .= "</td>";
            $html  .= "<td>";
            $html  .= "<input type=\"text\" class=\"form-control\" id=\"sale-total-add\" value=\"{$result['sale_price']}\">";
            $html  .= "</td>";
            $html  .= "<td>";
            $html  .= "<input type=\"date\" class=\"form-control datePicker\" id=\"sale-date-add\" data-date data-date-format=\"yyyy-mm-dd\">";
            $html  .= "</td>";
            $html  .= "<td>";
            $html  .= "<button type=\"submit\" onclick=\"clickAddSale()\" class=\"btn btn-primary\">Add sale</button>";
            $html  .= "</td>";
        }
        $html .= "</tr>";

        $html .= "<script>  const selectElement = document.querySelector('.product_info');

        selectElement.addEventListener('change', (event) => {
          var price = +$('input[id=sale-price-add]').val() || 0;
          var qty = +$('input[id=sale-qty-add]').val() || 0;
          var total = qty * price;
          $('input[id=sale-total-add]').val(total.toFixed(2));
        });
      
        const selectElement1 = document.querySelector('.product_info1');
      
        selectElement1.addEventListener('change', (event) => {
          var price = +$('input[id=sale-price-add]').val() || 0;
          var qty = +$('input[id=sale-qty-add]').val() || 0;
          var total = qty * price;
          $('input[id=sale-total-add]').val(total.toFixed(2));
        }); </script>";
    } else 
        $html = '<tr><td>product name not resgister in database</td></tr>';
    
    echo $html;
    unset($_POST['findIt']);
}
?> 