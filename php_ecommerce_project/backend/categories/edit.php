<?php
 header('Content-Type:application/json');
 include "../config.php";
 $id = $_POST['id'];

 if($id != ""){
    //Apply sql for single select from  cateogories table 
    $sql = "SELECT * FROM `categories` WHERE `cate_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    if($num > 0){
        echo json_encode([
            'status' => 200,
            'data' => $row,
        ]);
    }
 }else {
    echo json_encode([
        'status' => 400,
        'message' => "id not found.",
    ]);
 }
?>