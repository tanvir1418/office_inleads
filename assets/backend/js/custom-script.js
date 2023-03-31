$(document).ready(function() {
    
    // Qualification Dynamic Input in Add Employee Form Section
    let qual_row_id = 1;
    $('#qualification_table #qualification_add').click(function() {
        qual_row_id++;

        $('#qualification_table tbody').append(`
        <tr id="row_qual_${qual_row_id}">
            <td><input type="text" class="form-control" name="qual_degree[]" required></td>
            <td><input type="text" class="form-control" name="qual_institution[]" required></td>
            <td><input type="text" class="form-control" name="qual_subject[]" required></td>
            <td><input type="text" class="form-control" name="qual_result[]" required></td>
            <td><input type="number" class="form-control" name="qual_completion[]" required></td>
            <td><button type="submit" class="btn btn-danger qual_remove" id="qual_${qual_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#qualification_table .qual_remove', function() {
        let qual_btn_id = $(this).attr("id");
        $(`#row_${qual_btn_id}`).remove();
    });


    // Children Details Input in Add Employee Form Section
    let child_row_id = 1;
    $('#children_table #children_add').click(function() {
        child_row_id++;

        $('#children_table tbody').append(`
        <tr id="row_child_${child_row_id}">
            <td><input type="text" class="form-control" name="children_name[]" required></td>
            <td>
                <select class="form-control" name="children_gender[]" required>
                    <option value="" selected="" disabled="" hidden="">Choose here</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </td>
            <td><input type="date" class="form-control" name="children_dob[]" required></td>
            <td><button type="submit" class="btn btn-danger child_remove" id="child_${child_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#children_table .child_remove', function() {
        let child_btn_id = $(this).attr("id");
        $(`#row_${child_btn_id}`).remove();
    });


    // Training Details Input in Add Employee Form Section
    let train_row_id = 1;
    $('#training_table #training_add').click(function() {
        train_row_id++;

        $('#training_table tbody').append(`
        <tr id="row_train_${train_row_id}">
            <td><input type="text" class="form-control" name="train_title[]"></td>
            <td><input type="text" class="form-control" name="train_institution[]"></td>
            <td><input type="date" class="form-control" name="train_start_date[]"></td>
            <td><input type="date" class="form-control" name="train_end_date[]"></td>
            <td><button type="submit" class="btn btn-danger train_remove" id="train_${train_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#training_table .train_remove', function() {
        let train_btn_id = $(this).attr("id");
        $(`#row_${train_btn_id}`).remove();
    });

    // Professional Certification Details Input in Add Employee Form Section
    let pro_cerf_row_id = 1;
    $('#pro_certification_table #certification_add').click(function() {
        pro_cerf_row_id++;

        $('#pro_certification_table tbody').append(`
        <tr id="row_cerf_${pro_cerf_row_id}">
            <td><input type="text" class="form-control" name="pro_cerf_certificate[]" required></td>
            <td><input type="text" class="form-control" name="pro_cerf_institution[]" required></td>
            <td><input type="date" class="form-control" name="pro_cerf_start_date[]" required></td>
            <td><input type="date" class="form-control" name="pro_cerf_end_date[]" required></td>
            <td><input type="number" class="form-control" name="pro_cerf_completion[]" required></td>
            <td><button type="submit" class="btn btn-danger cerf_remove" id="cerf_${pro_cerf_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#pro_certification_table .cerf_remove', function() {
        let cerf_btn_id = $(this).attr("id");
        $(`#row_${cerf_btn_id}`).remove();
    });

    // Employment History in Add Employee Form Section
    let emp_his_row_id = 1;
    $('#emp_history_table #emp_history_add').click(function() {
        emp_his_row_id++;

        $('#emp_history_table tbody').append(`
        <tr id="row_emp_history_${emp_his_row_id}">
            <td><input type="text" class="form-control" name="emp_his_organization[]" required></td>
            <td><input type="text" class="form-control" name="emp_his_designation[]" required></td>
            <td><input type="date" class="form-control" name="emp_his_start_date[]" required></td>
            <td><input type="date" class="form-control" name="emp_his_end_date[]" required></td>
            <td><button type="submit" class="btn btn-danger emp_history_remove" id="emp_history_${emp_his_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#emp_history_table .emp_history_remove', function() {
        let emp_his_btn_id = $(this).attr("id");
        $(`#row_${emp_his_btn_id}`).remove();
    });

    // Membership In Societies in Add Employee Form Section
    let mem_soc_row_id = 1;
    $('#mem_society_table #mem_society_add').click(function() {
        mem_soc_row_id++;

        $('#mem_society_table tbody').append(`
        <tr id="row_mem_society_${mem_soc_row_id}">
            <td><input type="text" class="form-control" name="mem_soc_association[]" required></td>
            <td><input type="text" class="form-control" name="mem_soc_activities[]" required></td>
            <td><input type="date" class="form-control" name="mem_soc_start_date[]" required></td>
            <td><input type="date" class="form-control" name="mem_soc_end_date[]" required></td>
            <td><button type="submit" class="btn btn-danger mem_society_remove" id="mem_society_${mem_soc_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#mem_society_table .mem_society_remove', function() {
        let mem_soc_btn_id = $(this).attr("id");
        $(`#row_${mem_soc_btn_id}`).remove();
    });

    // References in Add Employee Form Section
    let ref_row_id = 1;
    $('#reference_table #reference_add').click(function() {
        ref_row_id++;

        $('#reference_table tbody').append(`
        <tr id="row_ref_${ref_row_id}">
            <td><input type="text" class="form-control" name="ref_name[]" required></td>
            <td><input type="text" class="form-control" name="ref_occupation[]" required></td>
            <td><input type="text" class="form-control" name="ref_mobile[]" required></td>
            <td><input type="text" class="form-control" name="ref_email[]" required></td>
            <td>
                <textarea class="form-control" cols="5" name="ref_address[]" required></textarea>
            </td>
            <td><button type="submit" class="btn btn-danger ref_remove" id="ref_${ref_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#reference_table .ref_remove', function() {
        let ref_btn_id = $(this).attr("id");
        $(`#row_${ref_btn_id}`).remove();
    });

    // Emergency Contact in Add Employee Form Section
    let emerg_row_id = 1;
    $('#emergency_table #emergency_add').click(function() {
        emerg_row_id++;

        $('#emergency_table tbody').append(`
        <tr id="row_emerg_${emerg_row_id}">
            <td><input type="text" class="form-control" name="emerg_name[]" required></td>
            <td><input type="text" class="form-control" name="emerg_relation[]" required></td>
            <td><input type="text" class="form-control" name="emerg_mobile[]" required></td>
            <td>
                <textarea class="form-control" cols="5" name="emerg_address[]" required></textarea>
            </td>
            <td><button type="submit" class="btn btn-danger emerg_remove" id="emerg_${emerg_row_id}"><i class="fas fa-times-circle"></i></button></td>
        </tr>`);
    });
    $(document).on('click', '#emergency_table .emerg_remove', function() {
        let emerg_btn_id = $(this).attr("id");
        $(`#row_${emerg_btn_id}`).remove();
    });

    // Enable Form to Enter Data (for All Checkbox)
    $(document).on('click', '.checkboxEnable',function() {
        let target = $(this).data('target');    
        if ($(this).is(':checked')) {
            $('#' + target).removeClass('disable-entry');
            $(`#${target} input`).prop("required", true);
            $(`#${target} textarea`).prop("required", true);
            $(`#${target} select`).prop("required", true);
        }
        else {
            $('#' + target).addClass('disable-entry');
            $(`#${target} input`).removeAttr("required");
            $(`#${target} textarea`).removeAttr("required");
            $(`#${target} select`).removeAttr("required");
        }
    });

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
        let slry_type_id = $(this).data('id');
        $.ajax({
            url: `${base_url}super_admin/edit_modal_salary_type_ajx`,
            type: "POST",
            data: {
                slry_type_id: slry_type_id
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

    // Employee salary payment ajax request
    $("#select_emp_userid").on('change', function() {
        var emp_user_id = this.value;
        $.ajax({
            url: `${base_url}super_admin/get_employee_salary_data_ajx`,
            type: "POST",
            data: {
                emp_user_id: emp_user_id
            },
            cache: false,
            success: function(result) {
                $("#dynamic_employee_data").html(result);
            }
        });
    });

    // Employee Leave Management ajax request
    $("#leave_emp_userid").on('change', function() {
        let emp_user_id = this.value;
        // console.log("Selected Employee User ID: " + emp_user_id);
        $.ajax({
            url: `${base_url}super_admin/get_employee_leave_data_ajx`,
            type: "POST",
            data: {
                emp_user_id: emp_user_id
            },
            cache: false,
            success: function(result) {
                $("#employee_leave_info").html(result);
            }
        });
    });

    // Employee Leave Application
    $(document).on('change', '#leave_date_from', function() {
        let leave_date_from = this.value;
        let leave_date_to = $("#leave_date_to").val();

        if(leave_date_to != ""){
            // To set two dates to two variables
            let dateFrom = new Date(leave_date_from);
            let dateTo = new Date(leave_date_to);

            // To calculate the time difference of two dates
            let Difference_In_Time = dateTo.getTime() - dateFrom.getTime();

            // To calculate the no. of days between two dates
            let Difference_In_Days = Number(Difference_In_Time / (1000 * 3600 * 24));

            if(Difference_In_Days >= 0){
                leave_total = Difference_In_Days + 1;
                $("#leave_total_days").val(leave_total);
            }else{
                $("#leave_date_to").val("");
                $("#leave_total_days").val("");
            }
        }
    });

    $(document).on('change', '#leave_date_to', function() {
        let leave_date_to = this.value;
        let leave_date_from = $("#leave_date_from").val();

        if(leave_date_from != ""){
            let dateFrom = new Date(leave_date_from);
            let dateTo = new Date(leave_date_to);

            let Difference_In_Time = dateTo.getTime() - dateFrom.getTime();

            let Difference_In_Days = Number(Difference_In_Time / (1000 * 3600 * 24));

            if(Difference_In_Days >= 0){
                leave_total = Difference_In_Days + 1;
                $("#leave_total_days").val(leave_total);
            }else{
                $("#leave_date_from").val("");
                $("#leave_total_days").val("");
            }
        }
    });

});