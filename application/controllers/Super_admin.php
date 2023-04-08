<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Super_admin extends CI_Controller {

    function __construct() {
        parent::__construct();

        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        // $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function session_data() {
        $this->load->model('Employee_management_model', 'emm');
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect("login");
        }
    }

    public function index() {
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect("login");
        } else {
            $this->load->model('Employee_management_model', 'emm');
            $this->load->model('Admin_management_model', 'amm');
            $this->load->view('super_admin/index');
        }
    }

    public function employee_list() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/employee_list');
    }

    public function previous_employees() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/previous_employees');
    }

    public function employee_profile() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/employee_profile');
    }

    public function employee_full_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/employee_full_details');
    }

    public function add_employee() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/add_employee');
    }

    public function insert_employee() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->insert_employee();
    }

    public function employee_edit_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/employee_edit_details');
    }

    public function employee_change_status() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/employee_change_status');
    }

    public function employee_promotion() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->employee_promotion();
    }

    public function employee_depart() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->employee_depart();
    }

    public function update_employee_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_employee_details();
    }

    public function update_personal_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_personal_details();
    }

    public function create_employment_history() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_employment_history();
    }

    public function update_employment_history() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_employment_history();
    }

    public function delete_employment_history() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_employment_history();
    }

    public function create_academic_qualification() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_academic_qualification();
    }

    public function update_academic_qualification() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_academic_qualification();
    }

    public function delete_academic_qualification() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_academic_qualification();
    }

    public function create_training_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_training_details();
    }

    public function update_training_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_training_details();
    }

    public function delete_training_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_training_details();
    }

    public function create_prof_certification() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_prof_certification();
    }

    public function update_prof_certification() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_prof_certification();
    }

    public function delete_prof_certification() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_prof_certification();
    }

    public function create_emergency_contact() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_emergency_contact();
    }

    public function update_emergency_contact() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_emergency_contact();
    }

    public function delete_emergency_contact() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_emergency_contact();
    }

    public function create_reference() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_reference();
    }

    public function update_reference() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_reference();
    }

    public function delete_reference() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_reference();
    }

    public function create_children_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_children_details();
    }

    public function update_children_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_children_details();
    }

    public function delete_children_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_children_details();
    }

    public function create_society_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_society_details();
    }

    public function update_society_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_society_details();
    }

    public function delete_society_details() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_society_details();
    }

    // Salary Functions Starts
    public function salary_details() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/salary_details');
    }

    public function add_employee_salary() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/add_employee_salary');
    }

    public function employee_salary_status() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/employee_salary_status');
    }

    public function insert_single_employee_salary() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');

        $this->amm->insert_single_employee_salary();
    }


    // Salary Functions Ends

    // Department Types Starts
    public function department_list() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/department_list');
    }

    public function create_new_department() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_department();
    }

    public function active_department() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_department();
    }

    public function deactive_department() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_department();
    }

    public function edit_modal_department_ajx() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $dept_id = $this->input->post('dept_id');

        foreach ($this->cmm->get_single_department($dept_id) as $row) {
            echo "<input type='hidden' name='dept_id' value='$row->dept_id'>
            <label for='dept_name' class='control-label'>Department Name</label>
            <input type='text' class='form-control' id='dept_name' name='dept_name' value='$row->dept_name' required>";
        }
    }

    public function edit_department() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_department();
    }
    // Department Types Ends


    // Designation Types Starts
    public function designation_list() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/designation_list');
    }

    public function create_new_designation() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_designation();
    }

    public function active_designation() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_designation();
    }

    public function deactive_designation() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_designation();
    }

    public function edit_modal_designation_ajx() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $dsgn_id = $this->input->post('dsgn_id');

        foreach ($this->cmm->get_single_designation($dsgn_id) as $row) {
            echo "<input type='hidden' name='dsgn_id' value='$row->dsgn_id'>
            <label for='dsgn_name' class='control-label'>Designation Name</label>
            <input type='text' class='form-control' id='dsgn_name' name='dsgn_name' value='$row->dsgn_name' required>";
        }
    }

    public function edit_designation() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_designation();
    }
    // Designation Types Ends

    // ID Card Types Starts
    public function idcard_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/idcard_type');
    }

    public function create_new_idcard_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_idcard_type();
    }

    public function active_idcard_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_idcard_type();
    }

    public function deactive_idcard_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_idcard_type();
    }

    public function edit_modal_idcard_type_ajx() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $idcard_id = $this->input->post('idcard_id');

        foreach ($this->cmm->get_single_idcard_type($idcard_id) as $row) {
            echo "<input type='hidden' name='idcard_id' value='$row->idcard_id'>
            <label for='idcard_name' class='control-label'>Id-Card Type</label>
            <input type='text' class='form-control' id='idcard_name' name='idcard_name' value='$row->idcard_name' required>";
        }
    }

    public function edit_idcard_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_idcard_type();
    }
    // ID Card Types Ends


    // Employment Type Starts
    public function employment_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/employment_type');
    }

    public function create_new_employment_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_employment_type();
    }

    public function active_employment_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_employment_type();
    }

    public function deactive_employment_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_employment_type();
    }

    public function edit_modal_employment_type_ajx() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $empl_id = $this->input->post('empl_id');

        foreach ($this->cmm->get_single_employment_type($empl_id) as $row) {
            echo "<input type='hidden' name='empl_id' value='$row->empl_id'>
            <label for='empl_name' class='control-label'>Employment Type</label>
            <input type='text' class='form-control' id='empl_name' name='empl_name' value='$row->empl_name' required>";
        }
    }

    public function edit_employment_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_employment_type();
    }
    // Employment Type Ends

    // Salary Types Functions Starts
    public function salary_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/salary_type');
    }

    public function create_new_salary_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_salary_type();
    }

    public function active_salary_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_salary_type();
    }

    public function deactive_salary_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_salary_type();
    }

    public function edit_modal_salary_type_ajx() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $slry_type_id = $this->input->post('slry_type_id');

        foreach ($this->cmm->get_single_salary_type($slry_type_id) as $row) {
            echo "<input type='hidden' name='slry_type_id' value='$row->slry_type_id'>
            <label for='slry_type_name' class='control-label'>Salary Type</label>
            <input type='text' class='form-control' id='slry_type_name' name='slry_type_name' value='$row->slry_type_name' required>";
        }
    }

    public function edit_salary_type() {
        $this->session_data();
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_salary_type();
    }
    // Salary Types Functions Ends

    // Leave Application Functionality Starts
    public function leave_application() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/leave_application');
    }

    public function manage_paid_leave() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/manage_paid_leave');
    }

    public function add_paid_leave() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->add_paid_leave();
    }

    public function get_employee_leave_data_ajx() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');

        $emp_user_id = $this->input->post('emp_user_id');

        $this->db->where('emp_user_id', $emp_user_id);
        $employee_name = $this->db->get("employee_info")->row('employee_name');
        $employee_id = $this->db->get("employee_info")->row('employee_id');
        $idcard_id = $this->db->get("employee_info")->row('idcard_id');

        $this->db->where('idcard_id', $idcard_id);
        $idcard_name = $this->db->get("idcard_type_list")->row('idcard_name');

        $employee_id_card = $idcard_name.'-'.$employee_id;

        foreach ($this->amm->get_single_emp_paid_leave_details($emp_user_id) as $row) {

            echo "<div class='row mt-4'>
            <div class='col-md-4'>
                <div class='text-center mb-4'>
                    <h5 style='text-decoration: underline;'>Employment Details</h5>
                </div>

                <form action='".base_url()."super_admin/add_leave_application' method='post' enctype='multipart/form-data'>
                    <input type='hidden' name='emp_user_id' value='$row->emp_user_id'>
                    <div class='form-group'>
                        <label for='employee_name'>Employee Name:</label>
                        <input type='text' class='form-control' id='employee_name' value='$employee_name (ID: $employee_id_card)' readonly>
                    </div>
                    <div class='form-group'>
                        <label for='leave_type'>Leave Type:</label>
                        <select class='form-control' name='leave_type' id='leave_type' required>
                            <option value='' selected='' disabled='' hidden=''>Choose here</option>
                            <option value='casual_leave'>Casual Leave</option>
                            <option value='sick_leave'>Sick Leave</option>
                            <option value='maternal_leave'>Maternal Leave</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='leave_date_from'>Leave From:</label>
                        <input type='date' class='form-control' name='leave_date_from' id='leave_date_from' required>
                    </div>
                    <div class='form-group'>
                        <label for='leave_date_to'>Leave To:</label>
                        <input type='date' class='form-control' name='leave_date_to' id='leave_date_to' required>
                    </div>
                    <div class='form-group'>
                        <label for='leave_total_days'>Leave For (Days):</label>
                        <input type='number' class='form-control' name='leave_total_days' id='leave_total_days' readonly required>
                    </div>
                    <div class='form-group form-check mt-4'>
                        <input type='checkbox' class='form-check-input' name='leave_check' id='leave_check' required>
                        <label class='form-check-label' for='leave_check'><strong>Make sure submit</strong></label>
                    </div>
                    <div class='form-group col-12 mt-4 text-center'>
                        <button type='submit' class='btn btn-dark btn-lg'>Submit Application</button>
                    </div>
                </form>
            </div>
            <div class='col-md-8'>
                <div class='text-center mb-4'>
                    <h5 style='text-decoration: underline;'>Leave Details (<strong>$row->leave_year</strong>)</h5>
                </div>
                <table class='table'>
                    <thead class='thead-light'>
                        <tr>
                            <th class='col-2'>#</th>
                            <th class='col-2'>Casual Leave</th>
                            <th class='col-3'>Sick Leave</th>
                            <th class='col-3'>Maternal Leave</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total</td>
                            <td>$row->casual_leave</td>
                            <td>$row->sick_leave</td>
                            <td>$row->maternal_leave</td>
                        </tr>
                        <tr>
                            <td>Consumed</td>
                            <td>$row->casual_consumed</td>
                            <td>$row->sick_consumed</td>
                            <td>$row->maternal_consumed</td>
                        </tr>
                        <tr>
                            <td>Remaining</td>
                            <td>".((int)$row->casual_leave - (int)$row->casual_consumed)."</td>
                            <td>".((int)$row->sick_leave - (int)$row->sick_consumed)."</td>
                            <td>".((int)$row->maternal_leave - (int)$row->maternal_consumed)."</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>";
        }
    }

    public function add_leave_application() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->add_leave_application();
    }

    public function leave_list() {
        $this->session_data();
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/leave_list');
    }
    // Leave Application Functionality Ends

    // Report Generation Functionality Starts
    public function report_generation() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/report_generation');
    }

    public function showing_current_month_report() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->showing_current_month_report();
    }

    public function custom_report_generation() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/custom_report_generation');
    }

    public function custom_date_range_report() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->custom_date_range_report();
    }
    // Report Generation Functionality Ends

    public function update_profile() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/update_profile');
    }

    public function update_admin_data() {
        $this->session_data();
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->update_admin_data();
    }
}