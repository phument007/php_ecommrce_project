<?php
  header('Content-Type:application/json');
  include "../config.php";

  $id = $_POST['id'];


  $sql = "SELECT * FROM `sub_categories` WHERE `sub_id` = $id ";
  $reuslt = mysqli_query($conn,$sql);
  $data = mysqli_fetch_assoc($reuslt);


  echo json_encode([
    'status' => 200,
    'data'  => $data,
  ]);
 
?>