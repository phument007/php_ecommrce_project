<?php 
  include "../config.php";
  $sql = "SELECT * FROM `categories` ";
  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_assoc($result)){
    ?>
<tr>
    <td><?php echo $row['cate_id'] ?></td>
    <td><?php echo $row['category_name'] ?></td>
    <td>
        <?php 
           if($row['status'] == 0){
            ?>
              <button class=" btn btn-danger btn-sm rounded-0"><i class="bi bi-x"></i></button>
            <?php
           }else{
            ?>
              <button class="btn btn-success btn-sm rounded-0"><i class="bi bi-check2"></i></button>
            <?php
           }
        ?>
    </td>
    <td>
      
        <button data-id="<?php echo $row['cate_id'] ?>" data-bs-toggle="modal" data-bs-target="#modalUpdate" class=" btn btn-info btn-sm rounded-0 btn_edit_category"><i class="bi bi-pen-fill"></i></button>


        <button data-id="<?php echo $row['cate_id']; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete" class=" btn btn-danger btn-sm rounded-0 btn_remove"><i class="bi bi-trash3"></i></button>
    </td>
</tr>
<?php
  }

?>