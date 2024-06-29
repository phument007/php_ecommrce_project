<?php 
header('Content-Type:application/json');
include "../config.php";

$id = $_POST['ID'];

if($id != ""){
    //Remove  image from folder
    $sql = "SELECT `image` FROM `categories` WHERE `cate_id` = $id";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $name = $row['image'];
    if($num > 0){
      
        $upload_folder = "../uploads/$name";

        if(file_exists($upload_folder)){
            unlink($upload_folder);
        }
    }

    $sql = "DELETE FROM `categories` WHERE `cate_id` = $id";
    mysqli_query($conn,$sql);
    
    echo json_encode([
        'status' => 200,
    ]);


}else{
    echo json_encode([
        'status' => 400,
    ]);
}

?>