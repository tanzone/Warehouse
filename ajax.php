<?php
require_once('includes/load.php');
if (!$session->isUserLoggedIn(true)) {
  redirect('index.php', false);
}
?>

<?php
// Add Categories
if (isset($_POST['cat_name'])) {
  $req_field = array('cat_name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['cat_name']));
  if (empty($errors)) {
    $sql  = "INSERT INTO categories (name)";
    $sql .= " VALUES ('{$cat_name}')";
    if ($db->query($sql))
      $session->msg("s", "Successfully Added Categorie");
    else
      $session->msg("d", "Sorry Failed to insert.");
  } else
    $session->msg("d", $errors);

  unset($_POST['cat_name']);
}

?>


<?php
// Delete Categories
if (isset($_POST['del_cat'])) {
  $categorie = find_by_id('categories', (int)$_POST['id']);
  if (!$categorie)
    $session->msg("d", "Missing Categorie id.");

  $delete_id = delete_by_id('categories', (int)$categorie['id']);
  if ($delete_id)
    $session->msg("s", "Categorie deleted.");
  else
    $session->msg("d", "Categorie deletion failed.");


  unset($_POST['del_cat']);
}
?>



<?php
// Delete group
if (isset($_POST['del_group'])) {
  $delete_id = delete_by_id('user_groups', (int)$_POST['id']);
  if ($delete_id)
    $session->msg("s", "Group has been deleted.");
  else
    $session->msg("d", "Group deletion failed Or Missing Prm.");

  unset($_POST['del_group']);
}
?>


<?php
// Delete Media
if (isset($_POST['del_media'])) {
  $find_media = find_by_id('media', (int)$_POST['id']);
  $photo = new Media();
  if ($photo->media_destroy($find_media['id'], $find_media['file_name']))
    $session->msg("s", "Photo has been deleted.");
  else
    $session->msg("d", "Photo deletion failed Or Missing Prm.");

  unset($_POST['del_media']);
}
?>


<?php
// Delete Product
if (isset($_POST['del_prod'])) {
  $product = find_by_id('products', (int)$_POST['id']);
  if (!$product)
    $session->msg("d", "Missing Product id.");

  $delete_id = delete_by_id('products', (int)$product['id']);
  if ($delete_id)
    $session->msg("s", "Products deleted.");
  else
    $session->msg("d", "Products deletion failed.");


  unset($_POST['del_prod']);
}
?>


<?php
// Delete Sales
if (isset($_POST['del_sales'])) {
  $d_sale = find_by_id('sales', (int)$_POST['id']);
  if (!$d_sale)
    $session->msg("d", "Missing sale id.");

  $delete_id = delete_by_id('sales', (int)$d_sale['id']);
  if ($delete_id)
    $session->msg("s", "sale deleted.");
  else
    $session->msg("d", "sale deletion failed.");

  unset($_POST['del_sales']);
}
?>


<?php
// Delete User
if (isset($_POST['del_user'])) {
  $delete_id = delete_by_id('users', (int)$_POST['id']);
  if ($delete_id)
    $session->msg("s", "User deleted.");
  else
    $session->msg("d", "User deletion failed Or Missing Prm.");


  unset($_POST['del_user']);
}
?>

<?php
if (isset($_POST['add_group'])) {

  $req_fields = array('group-name', 'group-level');
  validate_fields($req_fields);

  if (find_by_groupName($_POST['group-name']) === false) {
    $session->msg('d', '<b>Sorry!</b> Entered Group Name already in database!');
    return false;
  } elseif (find_by_groupLevel($_POST['group-level']) === false) {
    $session->msg('d', '<b>Sorry!</b> Entered Group Level already in database!');
    return false;
  }
  if (empty($errors)) {
    $name = remove_junk($db->escape($_POST['group-name']));
    $level = remove_junk($db->escape($_POST['group-level']));
    $status = remove_junk($db->escape($_POST['status']));

    $query  = "INSERT INTO user_groups (";
    $query .= "group_name,group_level,group_status";
    $query .= ") VALUES (";
    $query .= " '{$name}', '{$level}','{$status}'";
    $query .= ")";
    if ($db->query($query)) {
      $session->msg('s', "Group has been creted! ");
      return true;
    } else {
      $session->msg('d', ' Sorry failed to create Group!');
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }

  unset($_POST['add_group']);
}
?>


<?php
if (isset($_POST['add_user'])) {

  $req_fields = array('full-name', 'username', 'password', 'level');
  validate_fields($req_fields);

  if (empty($errors)) {
    $name   = remove_junk($db->escape($_POST['full-name']));
    $username   = remove_junk($db->escape($_POST['username']));
    $password   = remove_junk($db->escape($_POST['password']));
    $user_level = (int)$db->escape($_POST['level']);
    $password = sha1($password);
    $query = "INSERT INTO users (";
    $query .= "name,username,password,user_level,status";
    $query .= ") VALUES (";
    $query .= " '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
    $query .= ")";
    if ($db->query($query)) {
      //sucess
      $session->msg('s', "User account has been creted! ");
      return true;
    } else {
      //failed
      $session->msg('d', ' Sorry failed to create account!');
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }

  unset($_POST['add_user']);
}
?>


<?php
if (isset($_POST['edit_group'])) {

  $req_fields = array('group-name', 'group-level');
  validate_fields($req_fields);
  if (empty($errors)) {
    $name = remove_junk($db->escape($_POST['group-name']));
    $level = remove_junk($db->escape($_POST['group-level']));
    $status = remove_junk($db->escape($_POST['status']));
    $id = remove_junk($db->escape($_POST['id']));

    $query  = "UPDATE user_groups SET ";
    $query .= "group_name='{$name}',group_level='{$level}',group_status='{$status}' ";
    $query .= "WHERE ID='{$id}'";
    $result = $db->query($query);
    if ($result && $db->affected_rows() === 1) {
      //sucess
      $session->msg('s', "Group has been updated! ");
      return true;
    } else {
      //failed
      $session->msg('d', ' Sorry failed to updated Group!');
      $session->msg('s', $query);
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }

  unset($_POST['edit_group']);
}
?>

<?php
//Update User basic info
if (isset($_POST['edit_user'])) {
  $req_fields = array('user-name', 'user-username', 'user-level');
  validate_fields($req_fields);
  if (empty($errors)) {
    $name = remove_junk($db->escape($_POST['user-name']));
    $username = remove_junk($db->escape($_POST['user-username']));
    $level = (int)$db->escape($_POST['user-level']);
    $status   = remove_junk($db->escape($_POST['user-status']));
    $id = (int)$db->escape($_POST['id']);

    $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='{$level}',status='{$status}' WHERE id='{$id}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg('s', "Acount Updated ");
      return true;
    } else {
      $session->msg('d', ' Sorry failed to updated!');
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }
}
?>


<?php
// Update user password
if (isset($_POST['edit_pass'])) {
  $req_fields = array('user-password');
  validate_fields($req_fields);
  if (empty($errors)) {
    $id = (int)$db->escape($_POST['id']);
    $password = remove_junk($db->escape($_POST['user-password']));
    $h_pass   = sha1($password);
    $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg('s', "User password has been updated ");
      return true;
    } else {
      $session->msg('d', ' Sorry failed to updated user password!');
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }
}

?>



<?php
if (isset($_POST['edit_cat'])) {
  $req_field = array('categorie-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['categorie-name']));
  $id = (int)$db->escape($_POST['id']);
  if (empty($errors)) {
    $sql = "UPDATE categories SET name='{$cat_name}'";
    $sql .= " WHERE id='{$id}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      $session->msg("s", "Successfully updated Categorie");
      return true;
    } else {
      $session->msg("d", "Sorry! Failed to Update");
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }
}
?>


<?php
if (isset($_POST['add_media'])) {
  $photo = new Media();
  $photo->upload($_FILES['file_upload']);
  if ($photo->process_media()) {
    $session->msg('s', 'photo has been uploaded.');
    return true;
  } else {
    $session->msg('d', join($photo->errors));
    return false;
  }
}

?>



<?php
if (isset($_POST['edit_prod'])) {
  $req_fields = array('product-title', 'product-categorie', 'product-quantity', 'buying-price', 'saleing-price');
  validate_fields($req_fields);

  if (empty($errors)) {
    $p_id = $_POST['product-id'];
    $p_name  = remove_junk($db->escape($_POST['product-title']));
    $p_cat   = (int)$_POST['product-categorie'];
    $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
    $p_buy   = remove_junk($db->escape($_POST['buying-price']));
    $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
    if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
      $media_id = '0';
    } else {
      $media_id = remove_junk($db->escape($_POST['product-photo']));
    }
    $query   = "UPDATE products SET";
    $query  .= " name ='{$p_name}', quantity ='{$p_qty}',";
    $query  .= " buy_price ='{$p_buy}', sale_price ='{$p_sale}', categorie_id ='{$p_cat}',media_id='{$media_id}'";
    $query  .= " WHERE id ='{$p_id}'";
    $result = $db->query($query);
    if ($result && $db->affected_rows() === 1) {
      $session->msg('s', "Product updated ");
      return true;
    } else {
      $session->msg('d', ' Sorry failed to updated!');
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }
}

?>


<?php
if (isset($_POST['add_product'])) {
  $req_fields = array('product-title', 'product-categorie', 'product-quantity', 'buying-price', 'saleing-price');
  validate_fields($req_fields);
  if (empty($errors)) {
    $p_name  = remove_junk($db->escape($_POST['product-title']));
    $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
    $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
    $p_buy   = remove_junk($db->escape($_POST['buying-price']));
    $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
    if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
      $media_id = '0';
    } else {
      $media_id = remove_junk($db->escape($_POST['product-photo']));
    }
    $date    = make_date();
    $query  = "INSERT INTO products (";
    $query .= " name,quantity,buy_price,sale_price,categorie_id,media_id,date";
    $query .= ") VALUES (";
    $query .= " '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}'";
    $query .= ")";
    $query .= " ON DUPLICATE KEY UPDATE name='{$p_name}'";
    if ($db->query($query)) {
      $session->msg('s', "Product added ");
      return true;
    } else {
      $session->msg('d', ' Sorry failed to added!');
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }
}

?>

<?php

if (isset($_POST['edit_sale'])) {
  $req_fields = array('title', 'quantity', 'price', 'total', 'date');
  validate_fields($req_fields);
  if (empty($errors)) {
    $p_id      = $db->escape((int)$_POST['prod-id']);
    $s_qty     = $db->escape((int)$_POST['quantity']);
    $s_total   = $db->escape($_POST['total']);
    $date      = $db->escape($_POST['date']);
    $s_date    = date("Y-m-d", strtotime($date));
    $s_id      = $db->escape((int)$_POST['sale-id']);

    $sql  = "UPDATE sales SET";
    $sql .= " product_id= '{$p_id}',qty={$s_qty},price='{$s_total}',date='{$s_date}'";
    $sql .= " WHERE id ='{$s_id}'";
    $result = $db->query($sql);
    if ($result && $db->affected_rows() === 1) {
      update_product_qty($s_qty, $p_id);
      $session->msg('s', "Sale updated.");
      return true;
    } else {
      $session->msg('d', ' Sorry failed to updated!');
      $session->msg('d', $sql);
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return true;
  }
}

?>


<?php
if (isset($_POST['add_sale'])) {
  $req_fields = array('s_id', 'quantity', 'price', 'total', 'date');
  validate_fields($req_fields);
  if (empty($errors)) {
    $p_id      = $db->escape((int)$_POST['s_id']);
    $s_qty     = $db->escape((int)$_POST['quantity']);
    $s_total   = $db->escape($_POST['total']);
    $date      = $db->escape($_POST['date']);
    $s_date    = make_date();

    $sql  = "INSERT INTO sales (";
    $sql .= " product_id,qty,price,date";
    $sql .= ") VALUES (";
    $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
    $sql .= ")";

    if ($db->query($sql)) {
      update_product_qty($s_qty, $p_id);
      $session->msg('s', "Sale added. ");
      return true;
    } else {
      $session->msg('d', ' Sorry failed to add!');
      return false;
    }
  } else {
    $session->msg("d", $errors);
    return false;
  }
}

?>