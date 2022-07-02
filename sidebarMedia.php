<?php
require_once('includes/load.php');
//page_require_lever(1);_level(2);
$user = current_user();
?>
<?php $media_files = find_all('media'); ?>


<section id="stats-subtitle">
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase">Upload Medias</h4>
      <hr>
    </div>
  </div>


  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <i class="icon-camera secondary font-large-2 float-left"></i>
      <div class="input-group mb-3">
        <input id="file_upload" type="file" name="file_upload" multiple="multiple" class="btn btn-secondary btn-file" />
        </span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <button type="button" class="btn btn-primary" onclick="clickAddMedia()">Upload Media</button>
    </div>
  </div>
</section>



<section id="stats-subtitle">
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <hr>
      <h4 class="text-uppercase">Media Table</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12 col-md-12">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Photo Name</th>
            <th scope="col">Photo type</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($media_files as $media_file) : ?>
            <tr>
              <th scope="row"><?php echo count_id(); ?></th>
              <td><img src="uploads/products/<?php echo $media_file['file_name']; ?>" class="imgTableProd" /></td>
              <td><?php echo $media_file['file_name']; ?></td>
              <td><?php echo $media_file['file_type']; ?></td>
              <td>
                <?php if ($user['user_level'] <= '1') : ?>
                  <a data-toggle="tooltip" title="Remove">
                    <button type="button" class="btn btn-danger" onclick="clickDelMedia(<?php echo (int)$media_file['id']; ?>)"><i class="icon-trash"></i></button>
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