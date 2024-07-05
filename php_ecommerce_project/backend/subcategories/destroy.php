<?php 
header('Content-Type:application/json');
include "../config.php";
$id = $_POST['id'];
try{
    $sql = "DELETE FROM `sub_categories` WHERE `sub_id` = $id ";
    mysqli_query($conn,$sql);

    echo json_encode([
        'status' => 200,
        'message' => 'Sub category deleted successfully'
    ]);
}catch(Exception){
    echo json_encode([
       'status' => 500,
       'message' => 'An error occurred while deleting sub category'
    ]);
}


?>