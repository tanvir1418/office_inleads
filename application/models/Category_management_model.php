<?php
ob_start();

class Category_management_model extends CI_Model {
    
    // Department Model Starts
    function get_department_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("department_list");
        return $query->result();
    }

    function get_active_department_list() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 'ACTIVE');
        $query = $this->db->get('department_list');
        return $query->result();
    }

    function create_new_department() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("dept_name", "dept_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/department_list');
        } else {
            $dept_id = mt_rand(100, 999);
            $data_dept = array(
                'dept_id' => $dept_id,
                'dept_name' => $this->input->post('dept_name'),
                'status' => 'ACTIVE',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->insert('department_list', $data_dept);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/department_list");
    }

    function active_department() {
        $dept_id = $this->uri->segment(3);
        $data_dept = array(
            'status' => 'ACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('dept_id', $dept_id);
        $this->db->update('department_list', $data_dept);
        redirect("super_admin/department_list");
    }

    function deactive_department() {
        $dept_id = $this->uri->segment(3);
        $data_dept = array(
            'status' => 'DEACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('dept_id', $dept_id);
        $this->db->update('department_list', $data_dept);
        redirect("super_admin/department_list");
    }

    function edit_department() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("dept_name", "dept_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/department_list');
        } else {
            $dept_id = $this->input->post('dept_id');
            $data_dept = array(
                'dept_name' => $this->input->post('dept_name'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->where('dept_id', $dept_id);
            $this->db->update('department_list', $data_dept);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/department_list");
    }

    function get_single_department($dept_id) {
        $this->db->order_by("created_at", "DESC");
        $this->db->where('dept_id', $dept_id);
        $query = $this->db->get("department_list");
        return $query->result();
    }
    // Department Model Ends

    // Designation Model Starts
    function get_designation_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("designation_list");
        return $query->result();
    }

    function get_active_designation_list() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 'ACTIVE');
        $query = $this->db->get('designation_list');
        return $query->result();
    }

    function create_new_designation() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("dsgn_name", "dsgn_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/designation_list');
        } else {
            $dsgn_id = mt_rand(100, 999);
            $data_dsgn = array(
                'dsgn_id' => $dsgn_id,
                'dsgn_name' => $this->input->post('dsgn_name'),
                'status' => 'ACTIVE',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->insert('designation_list', $data_dsgn);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/designation_list");
    }

    function active_designation() {
        $dsgn_id = $this->uri->segment(3);
        $data_dsgn = array(
            'status' => 'ACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('dsgn_id', $dsgn_id);
        $this->db->update('designation_list', $data_dsgn);
        redirect("super_admin/designation_list");
    }

    function deactive_designation() {
        $dsgn_id = $this->uri->segment(3);
        $data_dsgn = array(
            'status' => 'DEACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('dsgn_id', $dsgn_id);
        $this->db->update('designation_list', $data_dsgn);
        redirect("super_admin/designation_list");
    }

    function edit_designation() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("dsgn_name", "dsgn_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/designation_list');
        } else {
            $dsgn_id = $this->input->post('dsgn_id');
            $data_dept = array(
                'dsgn_name' => $this->input->post('dsgn_name'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->where('dsgn_id', $dsgn_id);
            $this->db->update('designation_list', $data_dept);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/designation_list");
    }

    function get_single_designation($dsgn_id) {
        $this->db->order_by("created_at", "DESC");
        $this->db->where('dsgn_id', $dsgn_id);
        $query = $this->db->get("designation_list");
        return $query->result();
    }
    // Designation Model Ends

    // Employment Type Model Starts
    function get_employment_type_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("employment_type_list");
        return $query->result();
    }

    function get_active_employment_type_list() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 'ACTIVE');
        $query = $this->db->get('employment_type_list');
        return $query->result();
    }

    function create_new_employment_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("empl_name", "empl_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/employment_type');
        } else {
            $empl_id = mt_rand(100, 999);
            $data_empl = array(
                'empl_id' => $empl_id,
                'empl_name' => $this->input->post('empl_name'),
                'status' => 'ACTIVE',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->insert('employment_type_list', $data_empl);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/employment_type");
    }

    function active_employment_type() {
        $empl_id = $this->uri->segment(3);
        $data_empl = array(
            'status' => 'ACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('empl_id', $empl_id);
        $this->db->update('employment_type_list', $data_empl);
        redirect("super_admin/employment_type");
    }

    function deactive_employment_type() {
        $empl_id = $this->uri->segment(3);
        $data_empl = array(
            'status' => 'DEACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('empl_id', $empl_id);
        $this->db->update('employment_type_list', $data_empl);
        redirect("super_admin/employment_type");
    }

    function edit_employment_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("empl_name", "empl_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/employment_type');
        } else {
            $empl_id = $this->input->post('empl_id');
            $data_empl = array(
                'empl_name' => $this->input->post('empl_name'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->where('empl_id', $empl_id);
            $this->db->update('employment_type_list', $data_empl);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/employment_type");
    }

    function get_single_employment_type($empl_id) {
        $this->db->order_by("created_at", "DESC");
        $this->db->where('empl_id', $empl_id);
        $query = $this->db->get("employment_type_list");
        return $query->result();
    }

    // Employment Type Model Ends

    // ID-Card Type Model Starts
    function get_idcard_type_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("idcard_type_list");
        return $query->result();
    }

    function get_active_idcard_type_list() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 'ACTIVE');
        $query = $this->db->get('idcard_type_list');
        return $query->result();
    }

    function create_new_idcard_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("idcard_name", "idcard_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/idcard_type');
        } else {
            $idcard_id = mt_rand(100, 999);
            $data_idcard = array(
                'idcard_id' => $idcard_id,
                'idcard_name' => $this->input->post('idcard_name'),
                'status' => 'ACTIVE',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->insert('idcard_type_list', $data_idcard);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/idcard_type");
    }

    function active_idcard_type() {
        $idcard_id = $this->uri->segment(3);
        $data_idcard = array(
            'status' => 'ACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('idcard_id', $idcard_id);
        $this->db->update('idcard_type_list', $data_idcard);
        redirect("super_admin/idcard_type");
    }

    function deactive_idcard_type() {
        $idcard_id = $this->uri->segment(3);
        $data_idcard = array(
            'status' => 'DEACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('idcard_id', $idcard_id);
        $this->db->update('idcard_type_list', $data_idcard);
        redirect("super_admin/idcard_type");
    }

    function edit_idcard_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("idcard_name", "idcard_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/idcard_type');
        } else {
            $idcard_id = $this->input->post('idcard_id');
            $data_idcard = array(
                'idcard_name' => $this->input->post('idcard_name'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->where('idcard_id', $idcard_id);
            $this->db->update('idcard_type_list', $data_idcard);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/idcard_type");
    }

    function get_single_idcard_type($idcard_id) {
        $this->db->order_by("created_at", "DESC");
        $this->db->where('idcard_id', $idcard_id);
        $query = $this->db->get("idcard_type_list");
        return $query->result();
    }
    // ID-Card Type Model Ends

    // Salary Type Model Starts
    function get_salary_type_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("salary_type_list");
        return $query->result();
    }

    function get_active_salary_type_list() {
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('status', 'ACTIVE');
        $query = $this->db->get('salary_type_list');
        return $query->result();
    }

    function create_new_salary_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("slry_type_name", "slry_type_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/salary_type');
        } else {
            $slry_type_id = mt_rand(100, 999);
            $data_salary = array(
                'slry_type_id' => $slry_type_id,
                'slry_type_name' => $this->input->post('slry_type_name'),
                'status' => 'ACTIVE',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->insert('salary_type_list', $data_salary);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/salary_type");
    }

    function active_salary_type() {
        $slry_type_id = $this->uri->segment(3);
        $data_salary = array(
            'status' => 'ACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('slry_type_id', $slry_type_id);
        $this->db->update('salary_type_list', $data_salary);
        redirect("super_admin/salary_type");
    }

    function deactive_salary_type() {
        $slry_type_id = $this->uri->segment(3);
        $data_salary = array(
            'status' => 'DEACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('slry_type_id', $slry_type_id);
        $this->db->update('salary_type_list', $data_salary);
        redirect("super_admin/salary_type");
    }

    function edit_salary_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("slry_type_name", "slry_type_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/salary_type');
        } else {
            $slry_type_id = $this->input->post('slry_type_id');
            $data_salary = array(
                'slry_type_name' => $this->input->post('slry_type_name'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->where('slry_type_id', $slry_type_id);
            $this->db->update('salary_type_list', $data_salary);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/salary_type");
    }

    function get_single_salary_type($slry_type_id) {
        $this->db->order_by("created_at", "DESC");
        $this->db->where('slry_type_id', $slry_type_id);
        $query = $this->db->get("salary_type_list");
        return $query->result();
    }
    // Salary Type Model Ends    
}
