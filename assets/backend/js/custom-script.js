$(document).ready(function() {

    // base_url variable is declared in footer_js.php file so that we can access the variable here

    $('.edit_salary_modal').on('click', function() {
        let salary_id = $(this).data('id');
        $.ajax({
            url: `${base_url}super_admin/edit_modal_salary_type_ajx`,
            type: "POST",
            data: {
                salary_id: salary_id
            },
            cache: false,
            success: function(result) {
                $("#edit_salary_type_input").html(result);
                $('.edit_salary_type').modal('show');
            }
        });
    });

    $('.edit_idcard_modal').on('click', function() {
        let idcard_id = $(this).data('id');
        $.ajax({
            url: `${base_url}super_admin/edit_modal_idcard_type_ajx`,
            type: "POST",
            data: {
                idcard_id: idcard_id
            },
            cache: false,
            success: function(result) {
                $("#edit_idcard_type_input").html(result);
                $('.edit_idcard_type').modal('show');
            }
        });
    });
});