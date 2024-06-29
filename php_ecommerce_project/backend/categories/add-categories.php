<?php 
header('Content-Type:application/json');
include "../config.php";
// Apply Sql for add categories
$id_img = $_POST['cate_img_id_respons'];
$name = $_POST['cate_name'];
$status = $_POST['cate_status'];
$img_name = $_POST['cate_img_respons_name'];
if($name !="" && $status !=""){
    $sql = "INSERT INTO `categories`(`category_name`, `status`, `image`) 
    VALUES ('$name','$status','$img_name')";
    $result = mysqli_query($conn,$sql);

    if($result){
        //App remove image from folder here...
        $old_folder = "../temp/$img_name";
        $new_folder = "../uploads/$img_name";
        if(file_exists($old_folder)){
            if(copy($old_folder,$new_folder)){
                unlink($old_folder);
                $sql = "DELETE FROM `temp` WHERE `temp_id` = $id_img ";
                $result = mysqli_query($conn,$sql);

                echo json_encode([
                    'status' => 200,
                    'message' => 'Added Category Success.',
                ]);
            }
            
         
        }

    }
}

?>