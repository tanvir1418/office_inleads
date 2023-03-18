<?php
include "inc/header_links.php";
include "inc/left_sidebar.php";
include "inc/top_bar.php";
include "inc/add_employee_content.php";
include "inc/footer.php";
include "inc/footer_js.php";
include "inc/modal/create_pro_name.php";
?>

<script type="text/javascript">
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

    });
</script>