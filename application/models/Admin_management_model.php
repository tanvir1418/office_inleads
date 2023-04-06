<?php
ob_start();

class Admin_management_model extends CI_Model {

    public function get_admin_data() {
        $this->db->where('user_type', "super_admin");
        $query = $this->db->get("admin_user");
        return $query->result();
    }

    function update_admin_data() {

        $this->load->library("form_validation");
        $this->form_validation->set_rules("full_name", "full_name", "xss_clean");
        $this->form_validation->set_rules("new_username", "username", "xss_clean");
        $this->form_validation->set_rules("new_password", "password", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/update_profile/error');
        } else {

            $user_id =  $this->session->userdata("user_id");
            $username = $this->input->post('username');
            $new_username = $this->input->post('new_username');

            // find out user name
            if ($username != $new_username) {
                // find out user name
                if (!preg_match('/^[A-Za-z0-9\_]+$/', $new_username)) {
                    redirect("super_admin/update_profile/username_invalid");
                }
                $query = "SELECT count(*) as user_count from admin_user where username= '$new_username'";
                $result = $this->db->query($query)->result();

                if ($result[0]->user_count >= 1) {
                    redirect("super_admin/update_profile/username_error");
                }
            }

            //insert data to database
            $data_user = array(
                'full_name'         => $this->input->post('full_name'),
                'username'         => $this->input->post('new_username'),
                'password'         => $this->input->post('new_password')
            );

            $this->db->where('user_id', $user_id);
            $this->db->update('admin_user', $data_user);

            $this->session->unset_userdata("username");
            $this->session->unset_userdata("user_type");
            $this->session->unset_userdata("user_id");
            $this->session->unset_userdata("status");

            $this->session->sess_destroy();
            $this->session->set_flashdata('logout_notification', 'logged_out');
            redirect("super_admin");
        }
    }


    public function get_employee_current_year_salary($emp_user_id) {
        $current_year = date('Y');
        $query = $this->db->query("SELECT * FROM employee_salary WHERE emp_user_id = $emp_user_id AND year = $current_year ORDER BY month_no");
        return $query->result();
    }

    public function get_employee_salary_info() {
        $emp_user_id = $this->uri->segment(3);
        $query = $this->db->query("SELECT * FROM employee_salary WHERE emp_user_id = $emp_user_id ORDER BY year");
        return $query->result();
    }

    public function get_employee_salary_history() {
        $emp_user_id = $this->uri->segment(3);
        $query = $this->db->query("SELECT esh.*, es.emp_user_id, es.month_no, es.year FROM employee_salary_history AS esh , employee_salary AS es WHERE esh.emp_salary_id = es.emp_salary_id AND es.emp_user_id = '$emp_user_id' ORDER BY created_at DESC");
        return $query->result();
    }

    public function get_months_list() {
        $this->db->order_by("month_no", "ASC");
        $query = $this->db->get("months");
        return $query->result();
    }

    public function get_salary_details() {
        $this->db->order_by("updated_at", "DESC");
        $query = $this->db->get("employee_salary");
        return $query->result();
    }

    public function get_employee_current_month_salary_history($emp_user_id) {
        $this->db->where('emp_user_id', $emp_user_id);
        $this->db->where('month_no', date('n'));
        $this->db->where('year', date('Y'));
        $query = $this->db->get("employee_salary");
        return $query->result();
    }

    public function insert_single_employee_salary() {

        $this->load->library("form_validation");
        $this->form_validation->set_rules("emp_user_id", "emp_user_id", "xss_clean");
        $this->form_validation->set_rules("emp_salary_id", "emp_salary_id", "xss_clean");
        $this->form_validation->set_rules("month_no", "month_no", "xss_clean");
        $this->form_validation->set_rules("year", "year", "xss_clean");
        $this->form_validation->set_rules("salary_amount", "salary_amount", "xss_clean");
        $this->form_validation->set_rules("salary_paid", "salary_paid", "xss_clean");
        $this->form_validation->set_rules("slry_type_id", "slry_type_id", "xss_clean");
        $this->form_validation->set_rules("paid_amount", "paid_amount", "xss_clean");

        $previous_url = $_SERVER['HTTP_REFERER'];

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/all_employee_salary');
        } else {
            $emp_salary_id = $this->input->post('emp_salary_id');

            if ($emp_salary_id != '') {

                $salary_amount = $this->input->post('salary_amount');
                $salary_paid = $this->input->post('salary_paid');
                $paid_amount = $this->input->post('paid_amount');
                $salary_due = $salary_amount - ($salary_paid + $paid_amount);

                if ($salary_due <= 0) {
                    $salary_status = 'Full Paid';
                } else {
                    $salary_status = 'Partial Paid';
                }

                $data_salary = array(
                    'salary_paid' => $salary_paid + $paid_amount,
                    'salary_status' => $salary_status,
                    'last_pay_date' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d h:m:s')
                );

                $this->db->where('emp_salary_id', $emp_salary_id);
                $this->db->update('employee_salary', $data_salary);

                $emp_slry_his_id = mt_rand(100000, 999999);

                $data_salary_history = array(
                    'emp_slry_his_id' => $emp_slry_his_id,
                    'emp_salary_id' => $emp_salary_id,
                    'salary_amount' => $salary_amount,
                    'salary_paid' => $salary_paid,
                    'paid_amount' => $paid_amount,
                    'slry_type_id' => $this->input->post('slry_type_id'),
                    'pay_date' => date('Y-m-d'),
                    'created_at' => date('Y-m-d h:m:s'),
                );

                $this->db->insert('employee_salary_history', $data_salary_history);
            } else {

                $emp_salary_id = mt_rand(100000, 999999);
                $emp_slry_his_id = mt_rand(100000, 999999);
                $salary_status = '';

                if (($this->input->post('salary_amount') - $this->input->post('paid_amount')) <= 0) {
                    $salary_status = 'Full Paid';
                } else {
                    $salary_status = 'Partial Paid';
                }

                $data_salary = array(
                    'emp_salary_id' => $emp_salary_id,
                    'emp_user_id' => $this->input->post('emp_user_id'),
                    'month_no' => $this->input->post('month_no'),
                    'year' => $this->input->post('year'),
                    'salary_amount' => $this->input->post('salary_amount'),
                    'salary_paid' => $this->input->post('paid_amount'),
                    'salary_status' => $salary_status,
                    'last_pay_date' => date('Y-m-d'),
                    'slry_type_id' => $this->input->post('slry_type_id'),
                    'created_at' => date('Y-m-d h:m:s'),
                    'updated_at' => date('Y-m-d h:m:s')
                );

                $emp_slry_his_id = mt_rand(100000, 999999);

                $data_salary_history = array(
                    'emp_slry_his_id' => $emp_slry_his_id,
                    'emp_salary_id' => $emp_salary_id,
                    'salary_amount' => $this->input->post('salary_amount'),
                    'salary_paid' => $this->input->post('salary_paid'),
                    'paid_amount' => $this->input->post('paid_amount'),
                    'slry_type_id' => $this->input->post('slry_type_id'),
                    'pay_date' => date('Y-m-d'),
                    'created_at' => date('Y-m-d h:m:s'),
                );

                $this->db->insert('employee_salary', $data_salary);

                $this->db->insert('employee_salary_history', $data_salary_history);
            }
        }

        redirect($previous_url);
    }

    public function employee_promotion() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("emp_user_id", "emp_user_id", "xss_clean");
        $this->form_validation->set_rules("organization", "organization", "xss_clean");
        $this->form_validation->set_rules("designation", "designation", "xss_clean");
        $this->form_validation->set_rules("start_date", "start_date", "xss_clean");
        $this->form_validation->set_rules("end_date", "end_date", "xss_clean");
        $this->form_validation->set_rules("new_dsgn_id", "new_dsgn_id", "xss_clean");
        $this->form_validation->set_rules("new_appointed_date", "new_appointed_date", "xss_clean");
        $this->form_validation->set_rules("promotion_check", "promotion_check", "xss_clean");

        $emp_user_id = $this->input->post('emp_user_id');

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            redirect("super_admin/employee_change_status/$emp_user_id");
        } else {

            $promotion_check = $this->input->post('promotion_check');

            if (isset($promotion_check) && $promotion_check == 'on') {
                $data_emp_history = array(
                    'emp_user_id' => $emp_user_id,
                    'organization' => $this->input->post('organization'),
                    'designation' => $this->input->post('designation'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date')
                );
                $this->db->insert('emp_employment_history', $data_emp_history);

                $data_employee = array(
                    'dsgn_id' => $this->input->post('new_dsgn_id'),
                    'appointed_date' => $this->input->post('new_appointed_date'),
                    'updated_at' => date('Y-m-d')
                );

                $this->db->where('emp_user_id', $emp_user_id);
                $this->db->update('employee_info', $data_employee);

                redirect("super_admin/employee_profile/$emp_user_id");
            }
        }
    }

    public function employee_depart() {
        $emp_user_id = $this->uri->segment(3);
        $data_employee = array(
            'status' => 'DEPARTED',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('emp_user_id', $emp_user_id);
        $this->db->update('employee_info', $data_employee);
        redirect("super_admin/employee_profile/$emp_user_id");
    }

    public function add_paid_leave() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("emp_user_id", "emp_user_id", "xss_clean");
        $this->form_validation->set_rules("leave_year", "leave_year", "xss_clean");
        $this->form_validation->set_rules("casual_leave", "casual_leave", "xss_clean");
        $this->form_validation->set_rules("sick_leave", "sick_leave", "xss_clean");
        $this->form_validation->set_rules("maternal_leave", "maternal_leave", "xss_clean");
        $this->form_validation->set_rules("paid_leave_check", "paid_leave_check", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {
            $paid_leave_check = $this->input->post('paid_leave_check');

            if (isset($paid_leave_check) && $paid_leave_check == 'on') {

                $paid_leave_id = mt_rand(100000, 999999);

                // check leave details exists or not
                $emp_user_id = $this->input->post('emp_user_id');
                $leave_year = $this->input->post('leave_year');

                $query = $this->db->query("SELECT * from emp_paid_leave_details where emp_user_id= '$emp_user_id' AND leave_year='$leave_year'");

                if ($query->num_rows() == 0) {
                    $data_paid_leave = array(
                        'paid_leave_id' => $paid_leave_id,
                        'emp_user_id' => $emp_user_id,
                        'leave_year' => $leave_year,
                        'casual_leave' => $this->input->post('casual_leave'),
                        'casual_consumed' => 0,
                        'sick_leave' => $this->input->post('sick_leave'),
                        'sick_consumed' => 0,
                        'maternal_leave' => $this->input->post('maternal_leave'),
                        'maternal_consumed' => 0,
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    );
                    $this->db->insert('emp_paid_leave_details', $data_paid_leave);
                }
            }
        }
        redirect("super_admin/manage_paid_leave");
    }

    public function get_emp_paid_leave_details() {
        $this->db->order_by("leave_year", "DESC");
        $query = $this->db->get("emp_paid_leave_details");
        return $query->result();
    }

    public function get_single_emp_paid_leave_details($emp_user_id) {
        $current_year = date('Y');
        $this->db->order_by("leave_year", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $this->db->where('leave_year', $current_year);
        $query = $this->db->get("emp_paid_leave_details");
        return $query->result();
    }

    public function add_leave_application() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("emp_user_id", "emp_user_id", "xss_clean");
        $this->form_validation->set_rules("leave_type", "leave_type", "xss_clean");
        $this->form_validation->set_rules("leave_date_from", "leave_date_from", "xss_clean");
        $this->form_validation->set_rules("leave_date_to", "leave_date_to", "xss_clean");
        $this->form_validation->set_rules("leave_total_days", "leave_total_days", "xss_clean");
        $this->form_validation->set_rules("leave_check", "leave_check", "xss_clean");

        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
        } else {
            $leave_check = $this->input->post('leave_check');
            $emp_user_id = $this->input->post('emp_user_id');

            if (isset($leave_check) && $leave_check == 'on') {
                $current_year = date('Y');
                // emp_paid_leave_details
                $queryLeave = $this->db->query("SELECT * FROM emp_paid_leave_details WHERE emp_user_id= '$emp_user_id' AND leave_year='$current_year'");

                if ($queryLeave->num_rows() == 1) {
                    $emp_paid_leave_id = "";
                    $input_leave_type = $this->input->post('leave_type');
                    $input_leave_total_days = $this->input->post('leave_total_days');
                    $assigned_leave = 0;
                    $consumed_leave = 0;
                    $remained_leave = 0;

                    foreach ($queryLeave->result() as $row) {
                        if ($input_leave_type == "casual_leave") {
                            $emp_paid_leave_id = $row->paid_leave_id;
                            $assigned_leave = $row->casual_leave;
                            $consumed_leave = $row->casual_consumed;
                            $remained_leave = $assigned_leave - $consumed_leave;
                        }
                        if ($input_leave_type == "sick_leave") {
                            $emp_paid_leave_id = $row->paid_leave_id;
                            $assigned_leave = $row->sick_leave;
                            $consumed_leave = $row->sick_consumed;
                            $remained_leave = $assigned_leave - $consumed_leave;
                        }
                        if ($input_leave_type == "maternal_leave") {
                            $emp_paid_leave_id = $row->paid_leave_id;
                            $assigned_leave = $row->maternal_leave;
                            $consumed_leave = $row->maternal_consumed;
                            $remained_leave = $assigned_leave - $consumed_leave;
                        }
                    }

                    $leave_appl_id = mt_rand(100000, 999999);
                    if (($remained_leave - $input_leave_total_days) >= 0) {
                        $data_leave_application = array(
                            'leave_appl_id' => $leave_appl_id,
                            'emp_user_id' => $emp_user_id,
                            'leave_type' => $input_leave_type,
                            'leave_date_from' => $this->input->post('leave_date_from'),
                            'leave_date_to' => $this->input->post('leave_date_to'),
                            'leave_total_days' => $input_leave_total_days,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                        );

                        $this->db->insert('emp_leave_application', $data_leave_application);

                        // HAVE TO UPDATE THIS SECTION STARTS
                        $data_paid_leave = [];

                        if ($input_leave_type == "casual_leave") {
                            $data_paid_leave = array(
                                'casual_consumed' => $consumed_leave + $input_leave_total_days,
                                'updated_at' => date('Y-m-d')
                            );
                        } elseif ($input_leave_type == "sick_leave") {
                            $data_paid_leave = array(
                                'sick_consumed' => $consumed_leave + $input_leave_total_days,
                                'updated_at' => date('Y-m-d')
                            );
                        } else {
                            $data_paid_leave = array(
                                'maternal_consumed' => $consumed_leave + $input_leave_total_days,
                                'updated_at' => date('Y-m-d')
                            );
                        }
                        $this->db->where('paid_leave_id', $emp_paid_leave_id);
                        $this->db->update('emp_paid_leave_details', $data_paid_leave);
                        // HAVE TO UPDATE THIS SECTION ENDS
                    }
                }
            }
        }
        redirect("super_admin/leave_application");
    }

    public function get_leave_application_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("emp_leave_application");
        return $query->result();
    }

    public function get_leave_employee_on_current_date() {
        $current_date = date('Y-m-d');
        $query = $this->db->query("SELECT * FROM emp_leave_application WHERE leave_date_from <= '$current_date' AND leave_date_to >= '$current_date' ORDER BY created_at DESC");
        return $query->result();
    }

    public function get_employee_leave_application() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->order_by("created_at", "DESC");
        $this->db->where("emp_user_id", $emp_user_id);
        $query = $this->db->get("emp_leave_application");
        return $query->result();
    }

    public function get_employee_paid_leave_details_by_segment() {
        $emp_user_id = $this->uri->segment(3);
        $current_year = date('Y');
        $this->db->order_by("leave_year", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $this->db->where('leave_year', $current_year);
        $query = $this->db->get("emp_paid_leave_details");
        return $query->result();
    }

    public function showing_current_month_report() {
        $first_day_this_month = date('m-01-Y');
        $last_day_this_month  = date('m-t-Y');
        $query = $this->db->query("SELECT * FROM employee_salary WHERE created_at BETWEEN '$first_day_this_month' AND '$last_day_this_month' ORDER BY created_at ASC");
        return $query->result();
    }

    public function custom_date_range_report() {
        if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];
            $query = $this->db->query("SELECT * FROM employee_salary WHERE created_at BETWEEN '$from_date' AND '$to_date' ORDER BY created_at ASC");
            return $query->result();
        } else {
            return array();
        }
    }
}
