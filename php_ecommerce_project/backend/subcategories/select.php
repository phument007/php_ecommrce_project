<?php 
  include "../config.php";
  $sql = "SELECT sub.sub_id,sub.sub_name,sub.status,sub.category_id,cate.cate_id,cate.category_name
  FROM `sub_categories` as sub INNER JOIN `categories` as cate ON sub.category_id = cate.cate_id";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    ?>
<tr>
    <td><?php echo $row['sub_id'] ?></td>
    <td><?php echo $row['sub_name'] ?></td>
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

        <button class=" btn btn-info btn-sm rounded-0"><i class="bi bi-pen-fill"></i></button>
        <button class=" btn btn-danger btn-sm rounded-0 "><i class="bi bi-trash3"></i></button>
    </td>
</tr>
<?php
  }
?>