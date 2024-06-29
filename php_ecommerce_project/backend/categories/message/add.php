
<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="max-width: 50%;" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formAddCategory" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cate_name">Name</label>
                    <input type="text" name="cate_name" id="cate_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cate_status">Status</label>
                    <select name="cate_status" id="cate_status" class=" form-control">
                        <option value="1">Active</option>
                        <option value="0">Block</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                     <input type="hidden" name="cate_img_respons_name" id="cate_img_respons_name">
                     <input type="hidden" name="cate_img_id_respons" id="cate_img_id_respons">
                    <label for="cate_img">Image</label>
                    <input type="file" name="cate_img" id="cate_img" class="form-control">
                    <button type="button" id="btn_cate_upload" class=" btn btn-info rounded-0">Upload</button>
                </div>
                <div class="cate_block_img">

                </div>
            </div>
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