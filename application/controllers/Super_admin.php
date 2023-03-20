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
        $this->load->view('super_admin/employee_edit_details');
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
    
    // Department Types Starts
    public function department_list() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/department_list');
    }

    public function create_new_department() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_new_department();
    }

    public function active_department() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->active_department();
    }

    public function deactive_department() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->deactive_department();
    }

    public function edit_modal_department_ajx(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $dept_id = $this->input->post('dept_id');

        foreach ($this->emm->get_single_department($dept_id) as $row) {
            echo "<input type='hidden' name='dept_id' value='$row->dept_id'>
            <label for='dept_name' class='control-label'>Id-Card Type</label>
            <input type='text' class='form-control' id='dept_name' name='dept_name' value='$row->dept_name' required>";
        }
    }

    public function edit_department() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->edit_department();
    }
    // Department Types Ends


    // Designation Types Starts
    public function designation_list() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/designation_list');
    }

    public function create_new_designation() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_new_designation();
    }

    public function active_designation() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->active_designation();
    }

    public function deactive_designation() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->deactive_designation();
    }

    public function edit_modal_designation_ajx(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $dsgn_id = $this->input->post('dsgn_id');

        foreach ($this->emm->get_single_designation($dsgn_id) as $row) {
            echo "<input type='hidden' name='dsgn_id' value='$row->dsgn_id'>
            <label for='dsgn_name' class='control-label'>Id-Card Type</label>
            <input type='text' class='form-control' id='dsgn_name' name='dsgn_name' value='$row->dsgn_name' required>";
        }
    }

    public function edit_designation() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->edit_designation();
    }
    // Designation Types Ends

    // ID Card Types Starts
    public function idcard_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/idcard_type');
    }

    public function create_new_idcard_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_new_idcard_type();
    }

    public function active_idcard_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->active_idcard_type();
    }

    public function deactive_idcard_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->deactive_idcard_type();
    }

    public function edit_modal_idcard_type_ajx(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $idcard_id = $this->input->post('idcard_id');

        foreach ($this->emm->get_single_idcard_type($idcard_id) as $row) {
            echo "<input type='hidden' name='idcard_id' value='$row->idcard_id'>
            <label for='idcard_name' class='control-label'>Id-Card Type</label>
            <input type='text' class='form-control' id='idcard_name' name='idcard_name' value='$row->idcard_name' required>";
        }
    }

    public function edit_idcard_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->edit_idcard_type();
    }
    // ID Card Types Ends


    // Employment Type Starts
    public function employment_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/employment_type');
    }

    public function create_new_employment_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_new_employment_type();
    }

    public function active_employment_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->active_employment_type();
    }

    public function deactive_employment_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->deactive_employment_type();
    }

    public function edit_modal_employment_type_ajx(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $empl_id = $this->input->post('empl_id');

        foreach ($this->emm->get_single_employment_type($empl_id) as $row) {
            echo "<input type='hidden' name='empl_id' value='$row->empl_id'>
            <label for='empl_name' class='control-label'>Id-Card Type</label>
            <input type='text' class='form-control' id='empl_name' name='empl_name' value='$row->empl_name' required>";
        }
    }

    public function edit_employment_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->edit_employment_type();
    }
    // Employment Type Ends

    // Salary Types Functions Starts
    public function salary_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->load->view('super_admin/salary_type');
    }

    public function create_new_salary_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->create_new_salary_type();
    }

    public function active_salary_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->active_salary_type();
    }

    public function deactive_salary_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->deactive_salary_type();
    }

    public function edit_modal_salary_type_ajx(){
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $salary_id = $this->input->post('salary_id');

        foreach ($this->emm->get_single_salary_type($salary_id) as $row) {
            echo "<input type='hidden' name='salary_id' value='$row->salary_id'>
            <label for='salary_name' class='control-label'>Id-Card Type</label>
            <input type='text' class='form-control' id='salary_name' name='salary_name' value='$row->salary_name' required>";
        }
    }

    public function edit_salary_type() {
        $this->load->library('session');
        $this->load->model('Employee_management_model', 'emm');
        $this->emm->edit_salary_type();
    }
    // Salary Types Functions Ends
}