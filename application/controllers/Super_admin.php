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
            $this->load->view('super_admin/index');
        }
    }

    public function employee_list() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/employee_list');
    }

    public function previous_employees() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/previous_employees');
    }

    public function employee_profile() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/employee_profile');
    }

    public function employee_full_details() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/employee_full_details');
    }

    public function add_employee() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/add_employee');
    }

    public function insert_employee() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->insert_employee();
    }

    public function employee_edit_details() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/employee_edit_details');
    }

    public function employee_change_status() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/employee_change_status');
    }

    public function employee_promotion() {
        $this->load->library('session');
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->employee_promotion();
    }

    public function update_employee_details() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_employee_details();
    }

    public function update_personal_details() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_personal_details();
    }

    public function create_employment_history(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_employment_history();
    }

    public function update_employment_history(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_employment_history();
    }

    public function delete_employment_history(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_employment_history();
    }

    public function create_academic_qualification(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_academic_qualification();
    }

    public function update_academic_qualification(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_academic_qualification();
    }

    public function delete_academic_qualification(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_academic_qualification();
    }

    public function create_training_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_training_details();
    }

    public function update_training_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_training_details();
    }

    public function delete_training_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_training_details();
    }

    public function create_prof_certification(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_prof_certification();
    }

    public function update_prof_certification(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_prof_certification();
    }

    public function delete_prof_certification(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_prof_certification();
    }

    public function create_emergency_contact(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_emergency_contact();
    }

    public function update_emergency_contact(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_emergency_contact();
    }

    public function delete_emergency_contact(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_emergency_contact();
    }

    public function create_reference(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_reference();
    }

    public function update_reference(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_reference();
    }

    public function delete_reference(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_reference();
    }

    public function create_children_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_children_details();
    }

    public function update_children_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_children_details();
    }

    public function delete_children_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_children_details();
    }

    public function create_society_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_society_details();
    }

    public function update_society_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->update_society_details();
    }

    public function delete_society_details(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->delete_society_details();
    }
    
    // Salary Functions Starts
    public function add_salary() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/add_salary');
    }

    public function salary_details() {
        $this->load->library('session');
        $this->load->model('Admin_management_model', 'amm');
        $this->load->view('super_admin/salary_details');
    }

    public function insert_salary(){
        $this->load->library('session');
        $this->load->model('Admin_management_model', 'amm');
        $this->amm->insert_salary();
    }
    
    public function get_employee_salary_data_ajx() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->model('Admin_management_model', 'amm');
        $emp_user_id = $this->input->post('emp_user_id');

        $employee_image = '';
        $employee_name = '';
        $designation = '';
        $department = '';
        $employment_type = '';
        $employee_idcard = '';
        $date_of_joining = '';

        foreach ($this->emm->get_employee_by_userid($emp_user_id) as $row) {
            $employee_name = $row->employee_name;
            
            $this->db->where('dsgn_id', $row->dsgn_id);
            $designation = $this->db->get("designation_list")->row('dsgn_name');

            $this->db->where('dept_id', $row->dept_id);
            $department = $this->db->get("department_list")->row('dept_name');

            $this->db->where('empl_id', $row->empl_id);
            $employment_type = $this->db->get("employment_type_list")->row('empl_name');
            
            $this->db->where('idcard_id', $row->idcard_id);
            $idcard_id = $this->db->get("idcard_type_list")->row('idcard_name');
            $employee_id = $row->employee_id;
            $employee_idcard = $idcard_id . "-" . $employee_id;

            $employee_image = $row->image;
            $date_of_joining = implode("-",array_reverse(explode("-",$row->date_of_joining)));
        }

        $salary_row_data = '';
        $slry_i = 1;
        
        $employee_already_paid_month_no = [];
        
        foreach ($this->amm->get_employee_current_year_salary($emp_user_id) as $row) {
            $this->db->where('month_no', $row->month_no);
            $month_name = $this->db->get("months")->row('month_name');
            array_push($employee_already_paid_month_no, $row->month_no);

            $this->db->where('slry_type_id', $row->slry_type_id);
            $slry_type_name = $this->db->get("salary_type_list")->row('slry_type_name');

            $salary_row_data .= "<tr>
                <td>$slry_i</td>
                <td>$month_name</td>
                <td>$row->year</td>
                <td>$row->salary_amount</td>
                <td>$row->salary_status</td>
                <td>".implode("-", array_reverse(explode("-",$row->pay_date)))."</td>
                <td>$slry_type_name</td>
            </tr>";
            $slry_i++;
        }

        $select_payment_month_select = '';
        foreach ($this->amm->get_months_list() as $row) {
            if(!in_array($row->month_no, $employee_already_paid_month_no)){
                $select_payment_month_select .= "<option value='$row->month_no'>$row->month_name</option>";
            }
        }

        $select_salary_type = '';
        foreach ($this->cmm->get_active_salary_type_list() as $row) {
            $select_salary_type .= "<option value='$row->slry_type_id'>$row->slry_type_name</option>";
        }

        echo "<div class='col-lg-12 col-xl-4'>
            <div class='card m-b-30'>
                <div class='card-body'>
                    <div class='text-center mb-4'>
                        <h5 style='text-decoration: underline;'>Employee Info</h5>
                    </div>
                    <div class='text-center'>
                        <p class='text-muted mb-2 p-2'>
                            <img src='".base_url()."uploads/photos/$employee_image' alt='$employee_name' class='img-fluid rounded-circle w-80'>
                        </p>
                        <h5 class='mt-2 mb-0'>$employee_name</h5>
                        <small class='text-muted'>$designation</small>
                    </div>
                    <hr>
                    <div>
                        <small class='text-muted'><strong>Department:</strong> $department</small><br>
                        <small class='text-muted'><strong>Employment Type:</strong> $employment_type</small><br>
                        <small class='text-muted'><strong>Id Card:</strong> $employee_idcard</small><br>
                        <small class='text-muted'><strong>Joining Date:</strong> $date_of_joining</small><br>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-lg-12 col-xl-8'>
            <div class='card m-b-30'>
                <div class='card-body'>
                    <div class='text-center mb-4'>
                        <h5 style='text-decoration: underline;'>Salary Info (Current Year)</h5>
                    </div>
                    <table class='table table-striped focus-on' id='employee_salary_table'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Pay Date</th>
                                <th>Salary Type</th>
                            </tr>
                        </thead>
                        <tbody>$salary_row_data</tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-12'>
            <div class='card'>
                <div class='card-body'>
                    <div class='text-center mb-4'>
                        <h5 style='text-decoration: underline;'>Pay Salary</h5>
                    </div>
                    <form action='".base_url()."super_admin/insert_salary' method='post' enctype='multipart/form-data'>
                        <div class='form-row'>
                            <input type='hidden' name='emp_user_id' value='$emp_user_id'>
                            <div class='form-group col'>
                                <label for='month_no'>Month</label>
                                <select class='form-control' name='month_no' id='month_no' required>
                                    <option value='' selected='' disabled='' hidden=''>Choose here</option>
                                    $select_payment_month_select
                                </select>
                            </div>
                            <div class='form-group col'>
                                <label for='year'>Year</label>
                                <input type='number' class='form-control' name='year' id='year' required>
                            </div>
                            <div class='form-group col'>
                                <label for='salary_amount'>Amount</label>
                                <input type='number' class='form-control' name='salary_amount' id='salary_amount' required>
                            </div>
                            <div class='form-group col'>
                                <label for='salary_status'>Salary Status</label>
                                <select class='form-control' name='salary_status' id='salary_status' required>
                                    <option value='' selected='' disabled='' hidden=''>Choose here</option>
                                    <option value='Full Paid'>Full Paid</option>
                                    <option value='Half Paid'>Half Paid</option>
                                </select>
                            </div>
                            <div class='form-group col'>
                                <label for='pay_date'>Pay Date</label>
                                <input type='date' class='form-control' name='pay_date' id='pay_date' required>
                            </div>
                            <div class='form-group col'>
                                <label for='slry_type_id'>Salary Type</label>
                                <select class='form-control' id='slry_type_id' name='slry_type_id' required>
                                    <option value='' selected='' disabled='' hidden=''>Choose here</option>
                                    $select_salary_type
                                </select>
                            </div>
                        </div>
                        <div class='form-group form-check mt-4'>
                            <input type='checkbox' class='form-check-input' name='salary_check' id='salary_check' required>
                            <label class='form-check-label' for='salary_check'><strong>Make sure to pay</strong></label>
                        </div>
                        <button type='submit' class='btn btn-dark btn-lg'>Submit</button>
                    </form>
                </div>
            </div>
        </div>";
        
    }

    
    // Salary Functions Ends

    // Department Types Starts
    public function department_list() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/department_list');
    }

    public function create_new_department() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_department();
    }

    public function active_department() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_department();
    }

    public function deactive_department() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_department();
    }

    public function edit_modal_department_ajx(){
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $dept_id = $this->input->post('dept_id');

        foreach ($this->cmm->get_single_department($dept_id) as $row) {
            echo "<input type='hidden' name='dept_id' value='$row->dept_id'>
            <label for='dept_name' class='control-label'>Department Name</label>
            <input type='text' class='form-control' id='dept_name' name='dept_name' value='$row->dept_name' required>";
        }
    }

    public function edit_department() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_department();
    }
    // Department Types Ends


    // Designation Types Starts
    public function designation_list() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/designation_list');
    }

    public function create_new_designation() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_designation();
    }

    public function active_designation() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_designation();
    }

    public function deactive_designation() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_designation();
    }

    public function edit_modal_designation_ajx(){
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $dsgn_id = $this->input->post('dsgn_id');

        foreach ($this->cmm->get_single_designation($dsgn_id) as $row) {
            echo "<input type='hidden' name='dsgn_id' value='$row->dsgn_id'>
            <label for='dsgn_name' class='control-label'>Designation Name</label>
            <input type='text' class='form-control' id='dsgn_name' name='dsgn_name' value='$row->dsgn_name' required>";
        }
    }

    public function edit_designation() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_designation();
    }
    // Designation Types Ends

    // ID Card Types Starts
    public function idcard_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/idcard_type');
    }

    public function create_new_idcard_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_idcard_type();
    }

    public function active_idcard_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_idcard_type();
    }

    public function deactive_idcard_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_idcard_type();
    }

    public function edit_modal_idcard_type_ajx(){
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $idcard_id = $this->input->post('idcard_id');

        foreach ($this->cmm->get_single_idcard_type($idcard_id) as $row) {
            echo "<input type='hidden' name='idcard_id' value='$row->idcard_id'>
            <label for='idcard_name' class='control-label'>Id-Card Type</label>
            <input type='text' class='form-control' id='idcard_name' name='idcard_name' value='$row->idcard_name' required>";
        }
    }

    public function edit_idcard_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_idcard_type();
    }
    // ID Card Types Ends


    // Employment Type Starts
    public function employment_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/employment_type');
    }

    public function create_new_employment_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_employment_type();
    }

    public function active_employment_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_employment_type();
    }

    public function deactive_employment_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_employment_type();
    }

    public function edit_modal_employment_type_ajx(){
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $empl_id = $this->input->post('empl_id');

        foreach ($this->cmm->get_single_employment_type($empl_id) as $row) {
            echo "<input type='hidden' name='empl_id' value='$row->empl_id'>
            <label for='empl_name' class='control-label'>Employment Type</label>
            <input type='text' class='form-control' id='empl_name' name='empl_name' value='$row->empl_name' required>";
        }
    }

    public function edit_employment_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_employment_type();
    }
    // Employment Type Ends

    // Salary Types Functions Starts
    public function salary_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->load->view('super_admin/salary_type');
    }

    public function create_new_salary_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->create_new_salary_type();
    }

    public function active_salary_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->active_salary_type();
    }

    public function deactive_salary_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->deactive_salary_type();
    }

    public function edit_modal_salary_type_ajx(){
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $slry_type_id = $this->input->post('slry_type_id');

        foreach ($this->cmm->get_single_salary_type($slry_type_id) as $row) {
            echo "<input type='hidden' name='slry_type_id' value='$row->slry_type_id'>
            <label for='slry_type_name' class='control-label'>Salary Type</label>
            <input type='text' class='form-control' id='slry_type_name' name='slry_type_name' value='$row->slry_type_name' required>";
        }
    }

    public function edit_salary_type() {
        $this->load->library('session');
        $this->load->model('Category_management_model', 'cmm');
        $this->cmm->edit_salary_type();
    }
    // Salary Types Functions Ends
}