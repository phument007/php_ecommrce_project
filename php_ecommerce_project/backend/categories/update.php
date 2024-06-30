<?php 
header('Content-Type:application/json');
include "../config.php";
$id = $_POST['id'];
$temp_id = $_POST['cate_img_id_respons'];
$name = $_POST['cate_name'];
$status = $_POST['cate_status'];

if($_POST['cate_img_respons_name'] == ""){  //New image 
    $image = $_POST['old_image']; //old image
}else{
    $image = $_POST['cate_img_respons_name']; //New Image 
    $temp_folder = "../temp/$image";
    $uploads = "../uploads/$image";

    if(file_exists($temp_folder)){
        copy($temp_folder, $uploads);  // Copy image from temp folder to   uploads folder
        unlink($temp_folder);  // Remove image from temp folder 

        // Apply SQL for delete image from temp table in database
        $sql = "DELETE FROM `temp` WHERE `temp_id` = $temp_id";
        mysqli_query($conn, $sql);

        // Apply Code for delete image from Uploads folder
        $old_image = $_POST['old_image'];
        $check = "../uploads/$old_image";
        if(file_exists($check)){
            unlink($check);
        }
    } 
}

// Apply SQL for update category in database
$sql = "UPDATE `categories` SET `category_name`='$name',`status`='$status',`image`='$image' WHERE `cate_id` = $id";
mysqli_query($conn, $sql);


echo json_encode([
    'status' => 200,
    'message' => 'Updated Category Success.',
]);




?>