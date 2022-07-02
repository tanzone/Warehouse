<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_lever(1);_level(1);
?>
<?php
  //Display all catgories.
  $categorie = find_by_id('categories',(int)$_SESSION['session_edit']);
  if(!$categorie){
    $session->msg("d","Missing categorie id.");
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
      <h4 class="text-uppercase">Editing <?php echo remove_junk(ucfirst($categorie['name']));?></h4>
      <p id="cat-id-edit" hidden><?php echo (int)$categorie['id'];?></p>
      <hr>
    </div>
  </div>


  <div class="row">
    <div class="col-6 mt-3 mb-1">
      <label for="name" class="control-label">Group Name</label>
      <div class="input-group mb-3">
        <input id="categorie-name" type="text" class="form-control" name="categorie-name" value="<?php echo remove_junk(ucfirst($categorie['name']));?>" placeholder="Categoria Name" aria-label="Categoria Name" aria-describedby="basic-addon1">
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-primary" onclick="clickEditCat()">Update categorie</button>
    </div>
  </div>
</section>


