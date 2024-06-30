<?php
  header("Content-Type:application/json");
  include "../config.php";

  $category = $_POST['categories'];
  $name = $_POST['name'];
  $status = $_POST['status'];

  $SQL = "INSERT INTO `sub_categories`(`sub_name`, `status`, `category_id`) VALUES ('$name','$status','$category')";
  mysqli_query($conn,$SQL);

  echo json_encode([
    'status' => 200,
  ]);

?>