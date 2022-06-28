
$(document).on('click','#btn-add',function() {
    var data = $("#employee_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "backend/api-create-php",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#addEmployeeModal').modal('hide');
                alert('Data added successfully !');
                location.reload();
            }
            else if(dataResult.statusCode==201){
                alert(dataResult);
            }
        }
    });
});
$(document).on('click','.update',function() {
    var emp_id=$(this).attr("data-emp_id");
    var end_date=$(this).attr("data-end_date");
    var first_name=$(this).attr("data-first_name");
    var last_name=$(this).attr("data-last_name");
    var start_date=$(this).attr("data-start_date");
    var title=$(this).attr("data-title");
    var assigned_branch_id=$(this).attr("data-assigned_branch_id");
    var dept_id=$(this).attr("data-dept_id");
    var superior_emp_id=$(this).attr("data-superior_emp_id");
    $('#emp_id_u').val(emp_id);
    $('#end_date_u').val(end_date);
    $('#first_name_u').val(first_name);
    $('#last_name_u').val(last_name);
    $('#start_date_u').val(start_date);
    $('#title_u').val(title);
    $('#assigned_branch_id_u').val(assigned_branch_id);
    $('#dept_id_u').val(dept_id);
    $('#superior_emp_id_u').val(superior_emp_id);
});

$(document).on('click','#update',function() {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "backend/api-update.php",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#editEmployeeModal').modal('hide');
                alert('Data updated successfully !');
                location.reload();
            }
            else if(dataResult.statusCode==201){
                alert(dataResult);
            }
        }
    });
});
$(document).on("click", ".delete", function() {
    var emp_id=$(this).attr("data-emp_id");
    $('#emp_id_d').val(emp_id);

});
$(document).on("click", "#delete", function() {
    $.ajax({
        url: "backend/api-delete.php",
        type: "GET",
        cache: false,
        data:{
            type:3,
            emp_id: $("#emp_id_d").val()
        },
        success: function(dataResult){
            $('#deleteEmployeeModal').modal('hide');
            $("#"+dataResult).remove();
            location.reload();

        }
    });
});
$(document).on("click", "#delete_multiple", function() {
    var user = [];
    $(".user_checkbox:checked").each(function() {
        user.push($(this).data('user-emp_id'));
    });
    if(user.length <=0) {
        alert("Please select records.");
    }
    else {
        WRN_PROFILE_DELETE = "Are you sure you want to delete "+(user.length>1?"these":"this")+" row?";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            var selected_values = user.join(",");
            console.log(selected_values);
            $.ajax({
                type: "POST",
                url: "backend/index.php",
                cache:false,
                data:{
                    type: 4,
                    emp_id : selected_values
                },
                success: function(response) {
                    var emp_ids = response.split(",");
                    for (var i=0; i < emp_ids.length; i++ ) {
                        $("#"+emp_ids[i]).remove();
                    }
                }
            });
        }
    }
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;
            });
        } else{
            checkbox.each(function(){
                this.checked = false;
            });
        }
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });
});