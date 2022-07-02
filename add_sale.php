<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
//page_require_lever(1);_level(3);
?>

<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Add Sale</h4>
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Search Product</label>
      <div class="input-group mb-3">
        <input type="text" name="country" id="country" class="form-control" placeholder="Search for product name" aria-label="Search for product name" aria-describedby="basic-addon1" />
        <button type="button" class="btn btn-primary" onclick="clickFindIt()">Find It</button>
      </div>
      <div class="input-group mb-3">
        <div id="countryList"></div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12 mt-3 mb-1">
      <table class="table table-bordered">
        <thead>
          <th> Item </th>
          <th> Price </th>
          <th> Quantity </th>
          <th> Total </th>
          <th> Date</th>
          <th> Action</th>
        </thead>
        <tbody id="din_prods">
        </tbody>
      </table>
    </div>
  </div>

</section>


<script>
  $('#country').keyup(function() {
    var formData = {
      'product_name': $(this).val()
    };
    if ($(this).val() != '') {
      $.ajax({
        url: "search.php",
        method: "POST",
        data: formData,
        success: function(data) {
          $('#countryList').fadeIn();
          $('#countryList').html(data);
        }
      });
    }
  });
  $(document).on('click', 'li', function() {
    $('#country').val($(this).text());
    $('#countryList').fadeOut();
  });




  function clickFindIt() {
    var formData = {
      'findIt': 1,
      'p_name': $('input[id=country]').val(),
    };

    $.ajax({
      method: 'POST',
      url: 'search.php',
      data: formData,
      success: function(data) {
        console.log("ciao");
        $('#din_prods').html(data);
      }
    });
  }
</script>