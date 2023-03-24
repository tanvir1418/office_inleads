<?php
ob_start();

class Admin_management_model extends CI_Model {

    public function get_employee_current_year_salary($emp_user_id){
        $current_year = date('Y');
        $query = $this->db->query("SELECT * FROM employee_salary WHERE emp_user_id = $emp_user_id AND year = $current_year ORDER BY month_no");
        return $query->result();
    }

    public function get_employee_current_year_salary_history(){
        $emp_user_id = $this->uri->segment(3);
        $current_year = date('Y');
        $query = $this->db->query("SELECT * FROM employee_salary WHERE emp_user_id = $emp_user_id AND year = $current_year ORDER BY month_no");
        return $query->result();
    }

    public function get_employee_salary_history(){
        $emp_user_id = $this->uri->segment(3);
        $this->db->order_by("updated_at", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("employee_salary");
        return $query->result();
    }

    public function get_months_list(){
        $this->db->order_by("month_no", "ASC");
        $query = $this->db->get("months");
        return $query->result();
    }

    public function get_salary_details(){
        $this->db->order_by("updated_at", "DESC");
        $query = $this->db->get("employee_salary");
        return $query->result();
    }

    public function insert_salary(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("emp_user_id", "emp_user_id", "xss_clean");
        $this->form_validation->set_rules("month_no", "month_no", "xss_clean");
        $this->form_validation->set_rules("year", "year", "xss_clean");
        $this->form_validation->set_rules("salary_amount", "salary_amount", "xss_clean");
        $this->form_validation->set_rules("salary_status", "salary_status", "xss_clean");
        $this->form_validation->set_rules("pay_date", "pay_date", "xss_clean");
        $this->form_validation->set_rules("slry_type_id", "slry_type_id", "xss_clean");
        $this->form_validation->set_rules("salary_check", "salary_check", "xss_clean");

        $previous_url = $_SERVER['HTTP_REFERER'];

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/add_salary');
        } else {

            $salary_check = $this->input->post('salary_check');
            $emp_salary_id = mt_rand(100000, 999999);
            if (isset($salary_check) && $salary_check == 'on') {
                
                $data_salary = array(
                    'emp_salary_id' => $emp_salary_id,
                    'emp_user_id' => $this->input->post('emp_user_id'),
                    'month_no' => $this->input->post('month_no'),
                    'year' => $this->input->post('year'),
                    'salary_amount' => $this->input->post('salary_amount'),
                    'salary_status' => $this->input->post('salary_status'),
                    'pay_date' => $this->input->post('pay_date'),
                    'slry_type_id' => $this->input->post('slry_type_id'),
                    'created_at' => date('Y-m-d h:m:s'),
                    'updated_at' => date('Y-m-d h:m:s')
                );
    
                $this->db->insert('employee_salary', $data_salary);
            }    
        }

        redirect($previous_url);
    }
}
