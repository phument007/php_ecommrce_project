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
                }
            }
        });
    });
</script>