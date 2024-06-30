<script>
    //Event On Button add more(categories)
    $(document).on('click','.add_more',function () {
      $(".cate_block_img").html('');
    });


      // Function select data from database 
      function select(){
        $.ajax({
          type: "GET",
          url: "../categories/select.php",
          success: function (response) {
             $("#response_data").html(response);
          }
        });
      }

      select();


      //  Upload image for insert category
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

       //Upload image for update category
       $(document).on('click','.btn_cate_upload',function () {
          let allData = new FormData($("#formUpdateCategory")[0]);
          $.ajax({
            type: "POST",
            url: "../categories/upload-img.php",
            data: allData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
               if(response.status == 200){
                  $(".cate_img_id_respons").val(response.id);
                  $(".cate_img_respons_name").val(response.img);
                  $(".cate_img").val('');
                  var img = `
                   <img style=" width:100%;height:100%;" src="../temp/${response.img}" >
                   <button type="button" onclick="DeleteImage(${response.id})" id="btn_cancle_img" class=" btn btn-danger btn-sm rounded-0">Cancle</button>
                  `;

                  $(".cate_block_img").html(img);
               }
            }
          });
       });

       //Function for Cancle Iamge
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
                   $(".cate_img_respons_name").val('');
                   $(".cate_img_id_respons").val('');
                   $(".cate_block_img").html('');
                } 
            }
          });
          }
       }

      //Submit Category
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
                    select();
                }
            }
          });
       });

      //Event On Button Deleted Category 
       $(document).on('click','.btn_remove',function () {
           let id = $(this).attr('data-id');
           $(".get_id").val(id);
       });


      // Event for delete categories from dabase
      $(document).on('click','.btn_yes_remove',function () {
        let id = $(".get_id").val();
        $.ajax({
          type: "POST",
          url: "../categories/delete-category.php",
          data: {
            ID: id,
          },
          dataType: "json",
          success: function (response) {
             if(response.status == 200){
                $("#ModalDelete").modal('hide');
                select();
             }
          }
        });
        
      });

      //Event for click on button edit category
      $(document).on('click','.btn_edit_category',function () {
         let id = $(this).attr('data-id');
         $.ajax({
          type: "POST",
          url: "../categories/edit.php",
          data: {
            id : id,
          },
          dataType: "json",
          success: function (response) {
             if(response.status == 200){
                $("#get_id_update").val(response.data.cate_id);
                $(".cate_name").val(response.data.category_name);
                $("#old_image").val(response.data.image);
                var img = `
                  <img style=" width:100%;height:100%;" src="../uploads/${response.data.image}" >
                `;

                $(".cate_block_img").html(img);

             }
          }
         });
      });

      //Event for Update Category 
      $(document).on('submit','#formUpdateCategory',function (e) {
         e.preventDefault();
         let allData = new FormData($(this)[0]);
         $.ajax({
          type: "POST",
          url: "../categories/update.php",
          data: allData,
          dataType: "json",
          contentType:false,
          processData:false,
          success: function (response) {
             if(response.status == 200){
                    $("#formUpdateCategory").trigger('reset');
                    $(".cate_block_img").html('');
                    $("#modalUpdate").modal('hide');
                    select();
             }
          }
         });
      });

  </script>