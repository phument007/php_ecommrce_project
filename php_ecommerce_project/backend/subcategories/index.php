<?php include "../layout/header.php" ?>
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <?php include "./message/modal-add.php"; ?>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Sub Categories</h3>
                    <button data-bs-toggle="modal" data-bs-target="#modalAddSubCategory"
                        class=" btn btn-primary btn-sm rounded-0 add_more">add more</button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="subcategory_response">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../layout/footer.php" ?>