$(document).ready(function() {
    // base_url variable is declared in footer_js.php file so that we can access the variable here
    $('.edit_department_modal').on('click', function() {
        let dept_id = $(this).data('id');
        $.ajax({
            url: `${base_url}super_admin/edit_modal_department_ajx`,
            type: "POST",
            data: {
                dept_id: dept_id
            },
            cache: false,
            success: function(result) {
                $("#edit_department_input").html(result);
                $('.edit_department').modal('show');
            }
        });
    });

    $('.edit_designation_modal').on('click', function() {
        let dsgn_id = $(this).data('id');
        $.ajax({
            url: `${base_url}super_admin/edit_modal_designation_ajx`,
            type: "POST",
            data: {
                dsgn_id: dsgn_id
            },
            cache: false,
            success: function(result) {
                $("#edit_designation_input").html(result);
                $('.edit_designation').modal('show');
            }
        });
    });

    $('.edit_employment_type_modal').on('click', function() {
        let empl_id = $(this).data('id');
        $.ajax({
            url: `${base_url}super_admin/edit_modal_employment_type_ajx`,
            type: "POST",
            data: {
                empl_id: empl_id
            },
            cache: false,
            success: function(result) {
                $("#edit_employment_type_input").html(result);
                $('.edit_employment_type').modal('show');
            }
        });
    });
    
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