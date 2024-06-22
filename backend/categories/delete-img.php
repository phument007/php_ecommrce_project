<?php 
header('Content-Type:application/json');
include "../config.php";
$id = $_POST['ID'];
// Apply SQL for remove img form folder
$sql = "SELECT * FROM `temp` WHERE `temp_id` = $id";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num > 0){
    $row = mysqli_fetch_assoc($result);
    $check_img = "../temp/".$row['temp_name'];
    if(file_exists($check_img)){
        unlink($check_img);
    }
}

//Apply SQL for delete temp image from database
$sql = "DELETE FROM `temp` WHERE `temp_id` = $id";
$result = mysqli_query($conn,$sql);
if($result){
    echo json_encode([
        'status' => 200,
        'message' => 'Deleted image success.',
    ]);
}

?>