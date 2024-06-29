<?php include "../layout/header.php" ?>
<div class="content-wrapper">
    
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Categories</h3>
                    <button data-bs-toggle="modal" data-bs-target="#modalAdd" class=" btn btn-primary btn-sm rounded-0">add more</button>
                </div>
                <?php include "./message/add.php"; ?>
                <?php include "./message/delete.php";?>
                <?php include "./message/edit.php";?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="response_data">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../layout/footer.php" ?>