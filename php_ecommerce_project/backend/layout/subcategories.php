<script>

    // function for select subcategories from database
    function selectSubCategories(){
        $.ajax({
            type: "GET",
            url: "../subcategories/select.php",
            success: function (response) {
                $("#subcategory_response").html(response);
            }
        });
    }

    selectSubCategories();

    //Event for submit subcategories
    $(document).on('submit','#formAddSubCategory',function (e) {
        e.preventDefault();
        let allData = new FormData($("#formAddSubCategory")[0]);
        $.ajax({
            type: "POST",
            url: "../subcategories/store.php",
            data: allData,
            dataType: "json",
            contentType:false,
            processData: false,
            success: function (response) {
                if(response.status == 200){
                    $("#formAddSubCategory").trigger('reset');
                    $("#modalAddSubCategory").modal('hide');
                    selectSubCategories()
                }
            }
        });
    });


    $(document).on('click','.edit_subcate',function () {
        let id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "../subcategories/edit.php",
            data: {
                id : id,
            },
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    $(".edit_subname").val(response.data.sub_name);
                    $(".get_sub_id").val(response.data.sub_id);
                }
            }
        });
    });


    //Event submit for subcategory 
    $(document).on('submit','#formUpdateSubCategory',function (e) {
        e.preventDefault();
        let allData = new FormData($("#formUpdateSubCategory")[0]);
        $.ajax({
            type: "POST",
            url: "../subcategories/update.php",
            data: allData,
            dataType: "json",
            contentType:false,
            processData: false,
            success: function (response) {
                if(response.status == 200){
                    $("#formUpdateSubCategory").trigger('reset');
                    $("#modalEditSubCategory").modal('hide');
                    selectSubCategories()
                }
            }
        });
    });


    function DeleteSubCategory(id){
        $(".get_editsub_id").val(id);
    }


    $(document).on('click','.btn_remove_subcate',function () {
        let id =  $(".get_editsub_id").val();
        $.ajax({
            type: "POST",
            url: "../subcategories/destroy.php",
            data: {
                id : id,
            },
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                   $("#ModalDeleteSubCate").modal('hide');
                    selectSubCategories()
                }
            }
        });
    });

</script>