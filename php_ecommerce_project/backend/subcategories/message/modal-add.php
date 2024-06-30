
<!-- Modal -->
<div class="modal fade" id="modalAddSubCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="max-width: 50%;" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sub Category</h1>
      </div>
      <form id="formAddSubCategory" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="form-group">
             <label for="">Category</label>
             <select name="categories" class=" form-control categories">
                 <?php 
                    include "../config.php";
                    // Apply sql for select categories for database
                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                       ?>
                       <option value="<?php echo $row['cate_id'] ?>"><?php echo $row['category_name'] ?></option>
                       <?php
                    }
                 ?>
                 
             </select>
          </div>
          <div class="form-group">
             <label for="">Name</label>
             <input type="text" name="name" class=" form-control name">
          </div>
          <div class="form-group">
             <label for="">Status</label>
             <select name="status" class="form-control status">
                <option value="1">Active</option>
                <option value="0">Block</option>
             </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
     </form>
    </div>
  </div>
</div>