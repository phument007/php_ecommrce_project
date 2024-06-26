 <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/backend/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/backend/assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="/backend/assets/js/shared/off-canvas.js"></script>
    <script src="/backend/assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/backend/assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="/backend/assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>

       $(document).on('click','#btn_cate_upload',function () {
          let allData = new FormData($("#formAddCategory")[0]);
          $.ajax({
            type: "POST",
            url: "../categories/upload-img.php",
            data: allData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
               if(response.status == 200){
                  $("#cate_img_id_respons").val(response.id);
                  $("#cate_img_respons_name").val(response.img);
                  $("#cate_img").val('');
                  var img = `
                   <img style=" width:100%;height:100%;" src="../temp/${response.img}" >
                   <button type="button" onclick="DeleteImage(${response.id})" id="btn_cancle_img" class=" btn btn-danger btn-sm rounded-0">Cancle</button>
                  `;

                  $(".cate_block_img").html(img);
               }
            }
          });
       });

       function DeleteImage(id){
          if(confirm("Do you want to delete ?")){
            $.ajax({
            type: "POST",
            url: "../categories/delete-img.php",
            data: {
              ID : id,
            },
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                   $(".cate_block_img").html('');
                } 
            }
          });
          }
       }

       $(document).on('submit','#formAddCategory',function (e) {
          e.preventDefault();
          let allData = new FormData($("#formAddCategory")[0]);
          $.ajax({
            type: "POST",
            url: "../categories/add-categories.php",
            data: allData,
            dataType: "json",
            contentType:false,
            processData:false,
            success: function (response) {
                if(response.status == 200){
                    $("#formAddCategory").trigger('reset');
                    $(".cate_block_img").html('');
                    $("#modalAdd").modal('hide');
                }
            }
          });
       });
    </script>
  </body>
</html>