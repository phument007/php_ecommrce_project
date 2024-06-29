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
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Clothing Ment</td>
                            <td>
                                <button class="btn btn-success btn-sm rounded-0"><i class="bi bi-check2"></i></button>
                            </td>
                            <td>
                                <button class=" btn btn-info btn-sm rounded-0"><i class="bi bi-pen-fill"></i></button>
                                <button class=" btn btn-danger btn-sm rounded-0"><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../layout/footer.php" ?>