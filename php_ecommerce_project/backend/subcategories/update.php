<?php 
header("Content-Type:application/json");
include "config.php";

try{
    
$id = $_POST['sub_edit_id'];
$category_id = $_POST['categories'];
$name = $_POST['name'];
$status =  $_POST['status'];

$sql = "UPDATE `sub_categories` SET `sub_name`='$name',`status`='$status',`category_id`='$category_id' WHERE `sub_id` = $id";
$result = mysqli_query($conn,$sql);

echo json_encode([
    'status' => 200,
    'message' => 'Updated Sub Category Success.'
]);

}catch(Exception){
    echo json_encode([
       'status' => 500,
       'message' => 'An error occurred while updating the sub category.'
    ]);
}


?>