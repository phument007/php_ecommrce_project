<?php 
header('Content-Type:application/json');
include "../config.php";
if($_FILES['cate_img']['name'] != ""){
    $fileName = $_FILES['cate_img']['name'];
    $fileTmp = $_FILES['cate_img']['tmp_name'];

    //img.jpg => ['img','jpg']
    $arr = explode('.',$fileName);
    $newName = time() .'.'. end($arr);

    move_uploaded_file($fileTmp,"../temp/$newName");
    $SQL = "INSERT INTO `temp`(`temp_name`) VALUE('$newName') ";
    $result = mysqli_query($conn,$SQL);

    if($result){
        echo json_encode([
            'status' => 200,
            'img' => $newName,
            'id'  => mysqli_insert_id($conn),
        ]);
    }
}

?>