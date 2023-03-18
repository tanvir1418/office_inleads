<?php
ob_start();

class Employee_management_model  extends CI_Model {

    function insert_employee() {

        $this->load->library("form_validation");

        $this->form_validation->set_rules("employee_name", "employee_name", "xss_clean");
        $this->form_validation->set_rules("designation", "designation", "xss_clean");
        $this->form_validation->set_rules("pre_emp_id", "pre_emp_id", "xss_clean");
        $this->form_validation->set_rules("employee_id", "employee_id", "xss_clean");
        $this->form_validation->set_rules("division", "division", "xss_clean");
        $this->form_validation->set_rules("date_of_joining", "date_of_joining", "xss_clean");
        $this->form_validation->set_rules("department", "department", "xss_clean");
        $this->form_validation->set_rules("location", "location", "xss_clean");
        $this->form_validation->set_rules("employment_type", "employment_type", "xss_clean");
        $this->form_validation->set_rules("image", "image", "xss_clean");
        $this->form_validation->set_rules("father_name", "father_name", "xss_clean");
        $this->form_validation->set_rules("mother_name", "mother_name", "xss_clean");
        $this->form_validation->set_rules("date_of_birth", "date_of_birth", "xss_clean");
        $this->form_validation->set_rules("place_of_birth", "place_of_birth", "xss_clean");
        $this->form_validation->set_rules("gender", "gender", "xss_clean");
        $this->form_validation->set_rules("religion", "religion", "xss_clean");
        $this->form_validation->set_rules("tin_no", "tin_no", "xss_clean");
        $this->form_validation->set_rules("nationality", "nationality", "xss_clean");
        $this->form_validation->set_rules("blood_group", "blood_group", "xss_clean");
        $this->form_validation->set_rules("marital_status", "marital_status", "xss_clean");
        $this->form_validation->set_rules("passport_no", "passport_no", "xss_clean");
        $this->form_validation->set_rules("marriage_date", "marriage_date", "xss_clean");
        $this->form_validation->set_rules("nid_no", "nid_no", "xss_clean");
        $this->form_validation->set_rules("spouse_name", "spouse_name", "xss_clean");
        $this->form_validation->set_rules("email", "email", "xss_clean");
        $this->form_validation->set_rules("mobile", "mobile", "xss_clean");
        $this->form_validation->set_rules("present_address", "present_address", "xss_clean");
        $this->form_validation->set_rules("permanent_address", "permanent_address", "xss_clean");
        $this->form_validation->set_rules("extra_curricular", "extra_curricular", "xss_clean");

        $this->form_validation->set_rules("qual_degree[]", "qual_degree", "xss_clean");
        $this->form_validation->set_rules("qual_institution[]", "qual_institution", "xss_clean");
        $this->form_validation->set_rules("qual_subject[]", "qual_subject", "xss_clean");
        $this->form_validation->set_rules("qual_result[]", "qual_result", "xss_clean");
        $this->form_validation->set_rules("qual_completion[]", "qual_completion", "xss_clean");

        $this->form_validation->set_rules("children_name[]", "children_name", "xss_clean");
        $this->form_validation->set_rules("children_gender[]", "children_gender", "xss_clean");
        $this->form_validation->set_rules("children_dob[]", "children_dob", "xss_clean");

        $this->form_validation->set_rules("train_title[]", "train_title", "xss_clean");
        $this->form_validation->set_rules("train_institution[]", "train_institution", "xss_clean");
        $this->form_validation->set_rules("train_start_date[]", "train_start_date", "xss_clean");
        $this->form_validation->set_rules("train_end_date[]", "train_end_date", "xss_clean");

        $this->form_validation->set_rules("pro_cerf_certificate[]", "pro_cerf_certificate", "xss_clean");
        $this->form_validation->set_rules("pro_cerf_institution[]", "pro_cerf_institution", "xss_clean");
        $this->form_validation->set_rules("pro_cerf_start_date[]", "pro_cerf_start_date", "xss_clean");
        $this->form_validation->set_rules("pro_cerf_end_date[]", "pro_cerf_end_date", "xss_clean");
        $this->form_validation->set_rules("pro_cerf_completion[]", "pro_cerf_completion", "xss_clean");

        $this->form_validation->set_rules("emp_his_organization[]", "emp_his_organization", "xss_clean");
        $this->form_validation->set_rules("emp_his_designation[]", "emp_his_designation", "xss_clean");
        $this->form_validation->set_rules("emp_his_start_date[]", "emp_his_start_date", "xss_clean");
        $this->form_validation->set_rules("emp_his_end_date[]", "emp_his_end_date", "xss_clean");

        $this->form_validation->set_rules("mem_soc_association[]", "mem_soc_association", "xss_clean");
        $this->form_validation->set_rules("mem_soc_activities[]", "mem_soc_activities", "xss_clean");
        $this->form_validation->set_rules("mem_soc_start_date[]", "mem_soc_start_date", "xss_clean");
        $this->form_validation->set_rules("mem_soc_end_date[]", "mem_soc_end_date", "xss_clean");

        $this->form_validation->set_rules("ref_name[]", "ref_name", "xss_clean");
        $this->form_validation->set_rules("ref_occupation[]", "ref_occupation", "xss_clean");
        $this->form_validation->set_rules("ref_mobile[]", "ref_mobile", "xss_clean");
        $this->form_validation->set_rules("ref_email[]", "ref_email", "xss_clean");
        $this->form_validation->set_rules("ref_address[]", "ref_address", "xss_clean");

        $this->form_validation->set_rules("emerg_name[]", "emerg_name", "xss_clean");
        $this->form_validation->set_rules("emerg_relation[]", "emerg_relation", "xss_clean");
        $this->form_validation->set_rules("emerg_mobile[]", "emerg_mobile", "xss_clean");
        $this->form_validation->set_rules("emerg_address[]", "emerg_address", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/add_employee');
        } else {
            $emp_user_id = mt_rand(10000000, 99999999);

            $image = $_FILES['image']['name'];
            if ($image != "") {
                $image = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $image;
                $config['upload_path'] = 'uploads/photos';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;
                $config['image_library'] = 'gd2';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $this->upload->data();
            } else {
                $image = "default.png";
            }

            $data_employee = array(
                'emp_user_id' => $emp_user_id,
                'employee_name' => $this->input->post('employee_name'),
                'designation' => $this->input->post('designation'),
                'pre_emp_id' => $this->input->post('pre_emp_id'),
                'employee_id' => $this->input->post('employee_id'),
                'division' => $this->input->post('division'),
                'date_of_joining' => $this->input->post('date_of_joining'),
                'department' => $this->input->post('department'),
                'location' => $this->input->post('location'),
                'employment_type' => $this->input->post('employment_type'),
                'image' => $image,
                'status' => 'WORKING',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );

            $data_personal = array(
                'emp_user_id' => $emp_user_id,
                'father_name' => $this->input->post('father_name'),
                'mother_name' => $this->input->post('mother_name'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'place_of_birth' => $this->input->post('place_of_birth'),
                'gender' => $this->input->post('gender'),
                'religion' => $this->input->post('religion'),
                'tin_no' => $this->input->post('tin_no'),
                'nationality' => $this->input->post('nationality'),
                'blood_group' => $this->input->post('blood_group'),
                'marital_status' => $this->input->post('marital_status'),
                'passport_no' => $this->input->post('passport_no'),
                'marriage_date' => $this->input->post('marriage_date'),
                'nid_no' => $this->input->post('nid_no'),
                'spouse_name' => $this->input->post('spouse_name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'present_address' => $this->input->post('present_address'),
                'permanent_address' => $this->input->post('permanent_address'),
                'extra_curricular' => $this->input->post('extra_curricular'),
            );

            $this->db->insert('employee_info', $data_employee);
            $this->db->insert('emp_personal_info', $data_personal);



            $qual_degree = $this->input->post('qual_degree');
            $qual_institution = $this->input->post('qual_institution');
            $qual_subject = $this->input->post('qual_subject');
            $qual_result = $this->input->post('qual_result');
            $qual_completion = $this->input->post('qual_completion');

            // Counting no of academic qualification
            $count = count($qual_degree);

            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    $data_academic = array(
                        'emp_user_id' => $emp_user_id,
                        'degree' => $qual_degree[$i],
                        'institution' => $qual_institution[$i],
                        'subject' => $qual_subject[$i],
                        'result' => $qual_result[$i],
                        'completion' => $qual_completion[$i]
                    );
                    $this->db->insert('emp_academic_qualification', $data_academic);
                }
            }

            // isset and not empty (Children Information)
            $children_checkbox = $this->input->post('children_checkbox');
            if (isset($children_checkbox) && $children_checkbox == 'on') {
                $children_name = $this->input->post('children_name');
                $children_gender = $this->input->post('children_gender');
                $children_dob = $this->input->post('children_dob');

                // Counting no of children details
                $count = count($children_name);

                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        $data_children = array(
                            'emp_user_id' => $emp_user_id,
                            'name' => $children_name[$i],
                            'gender' => $children_gender[$i],
                            'dob' => $children_dob[$i]
                        );
                        $this->db->insert('emp_children_details', $data_children);
                    }
                }
            }

            // isset and not empty (Training Certificate)
            $training_checkbox = $this->input->post('training_checkbox');
            if (isset($training_checkbox) && $training_checkbox == 'on') {
                $train_title = $this->input->post('train_title');
                $train_institution = $this->input->post('train_institution');
                $train_start_date = $this->input->post('train_start_date');
                $train_end_date = $this->input->post('train_end_date');

                // Counting no of training details
                $count = count($train_title);

                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        $data_training = array(
                            'emp_user_id' => $emp_user_id,
                            'title' => $train_title[$i],
                            'institution' => $train_institution[$i],
                            'start_date' => $train_start_date[$i],
                            'end_date' => $train_end_date[$i]
                        );
                        $this->db->insert('emp_training_details', $data_training);
                    }
                }
            }

            // isset and not empty (Professional Certificate)
            $certificate_checkbox = $this->input->post('certificate_checkbox');
            if (isset($certificate_checkbox) && $certificate_checkbox == 'on') {
                $pro_cerf_certificate = $this->input->post('pro_cerf_certificate');
                $pro_cerf_institution = $this->input->post('pro_cerf_institution');
                $pro_cerf_start_date = $this->input->post('pro_cerf_start_date');
                $pro_cerf_end_date = $this->input->post('pro_cerf_end_date');
                $pro_cerf_completion = $this->input->post('pro_cerf_completion');

                // Counting no of professional certificate
                $count = count($pro_cerf_certificate);

                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        $data_certification = array(
                            'emp_user_id' => $emp_user_id,
                            'certificate' => $pro_cerf_certificate[$i],
                            'institution' => $pro_cerf_institution[$i],
                            'start_date' => $pro_cerf_start_date[$i],
                            'end_date' => $pro_cerf_end_date[$i],
                            'completion' => $pro_cerf_completion[$i],
                        );
                        $this->db->insert('emp_prof_certification', $data_certification);
                    }
                }
            }

            // isset and not empty (Employment History)
            $emp_history_checkbox = $this->input->post('emp_history_checkbox');
            if (isset($emp_history_checkbox) && $emp_history_checkbox == 'on') {
                $emp_his_organization = $this->input->post('emp_his_organization');
                $emp_his_designation = $this->input->post('emp_his_designation');
                $emp_his_start_date = $this->input->post('emp_his_start_date');
                $emp_his_end_date = $this->input->post('emp_his_end_date');

                // Counting no of employment history
                $count = count($emp_his_organization);

                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        $data_employment_history = array(
                            'emp_user_id' => $emp_user_id,
                            'organization' => $emp_his_organization[$i],
                            'designation' => $emp_his_designation[$i],
                            'start_date' => $emp_his_start_date[$i],
                            'end_date' => $emp_his_end_date[$i]
                        );
                        $this->db->insert('emp_employment_history', $data_employment_history);
                    }
                }
            }

            // isset and not empty (Membership)
            $membership_checkbox = $this->input->post('membership_checkbox');
            if (isset($membership_checkbox) && $membership_checkbox == 'on') {
                $mem_soc_association = $this->input->post('mem_soc_association');
                $mem_soc_activities = $this->input->post('mem_soc_activities');
                $mem_soc_start_date = $this->input->post('mem_soc_start_date');
                $mem_soc_end_date = $this->input->post('mem_soc_end_date');

                // Counting no of employment history
                $count = count($mem_soc_association);

                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        $data_society_member = array(
                            'emp_user_id' => $emp_user_id,
                            'association' => $mem_soc_association[$i],
                            'activities' => $mem_soc_activities[$i],
                            'start_date' => $mem_soc_start_date[$i],
                            'end_date' => $mem_soc_end_date[$i]
                        );
                        $this->db->insert('emp_society_member', $data_society_member);
                    }
                }
            }

            // Reference Information
            $ref_name = $this->input->post('ref_name');
            $ref_occupation = $this->input->post('ref_occupation');
            $ref_mobile = $this->input->post('ref_mobile');
            $ref_email = $this->input->post('ref_email');
            $ref_address = $this->input->post('ref_address');

            // Counting no of reference
            $count = count($ref_name);

            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    $data_reference = array(
                        'emp_user_id' => $emp_user_id,
                        'name' => $ref_name[$i],
                        'occupation' => $ref_occupation[$i],
                        'mobile' => $ref_mobile[$i],
                        'email' => $ref_email[$i],
                        'address' => $ref_address[$i]
                    );
                    $this->db->insert('emp_reference', $data_reference);
                }
            }

            // Emergency Contact Information
            $emerg_name = $this->input->post('emerg_name');
            $emerg_relation = $this->input->post('emerg_relation');
            $emerg_mobile = $this->input->post('emerg_mobile');
            $emerg_address = $this->input->post('emerg_address');

            // Counting no of emergency contact information
            $count = count($emerg_name);

            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    $data_emergency_contact = array(
                        'emp_user_id' => $emp_user_id,
                        'name' => $emerg_name[$i],
                        'relation' => $emerg_relation[$i],
                        'mobile' => $emerg_mobile[$i],
                        'address' => $emerg_address[$i]
                    );
                    $this->db->insert('emp_emergency_contact', $data_emergency_contact);
                }
            }
        }

        // var_dump($_POST);

        // $id = $this->db->insert_id();

        // die();

        redirect("super_admin/employee_list");
    }

    function get_working_employees() {
        $this->db->order_by("pre_emp_id", "DESC");
        $this->db->where("status", "WORKING");
        $query = $this->db->get("employee_info");
        return $query->result();
    }

    function get_previous_employees() {
        $this->db->order_by("pre_emp_id", "DESC");
        $this->db->where("status", "DEPARTED");
        $query = $this->db->get("employee_info");
        return $query->result();
    }

    function get_employee_details_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("employee_info");
        return $query->result();
    }

    function get_employee_personal_details_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_personal_info");
        return $query->result();
    }

    function get_employee_academic_qualification_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->order_by("completion", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_academic_qualification");
        return $query->result();
    }

    function get_employee_training_details_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->order_by("end_date", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_training_details");
        return $query->result();
    }

    function get_employee_prof_certification_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->order_by("completion", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_prof_certification");
        return $query->result();
    }

    function get_employee_history_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->order_by("end_date", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_employment_history");
        return $query->result();
    }

    function get_employee_contact_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_personal_info");
        return $query->result();
    }

    function get_employee_emergency_contact_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_emergency_contact");
        return $query->result();
    }

    function get_employee_reference_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_reference");
        return $query->result();
    }

    function get_employee_children_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_children_details");
        return $query->result();
    }

    function get_employee_society_member_by_userid() {
        $emp_user_id = $this->uri->segment(3);
        $this->db->order_by("start_date", "DESC");
        $this->db->where('emp_user_id', $emp_user_id);
        $query = $this->db->get("emp_society_member");
        return $query->result();
    }

    function update_registration() {

        $reg_id = $this->input->post('id');

        $this->load->library("form_validation");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("full_name", "full_name", "xss_clean");
        $this->form_validation->set_rules("father_name", "father_name", "xss_clean");
        $this->form_validation->set_rules("mother_name", "mother_name", "xss_clean");
        $this->form_validation->set_rules("db_day", "db_day", "xss_clean");
        $this->form_validation->set_rules("db_month", "db_month", "xss_clean");
        $this->form_validation->set_rules("db_year", "db_year", "xss_clean");
        $this->form_validation->set_rules("ssc_year", "ssc_year", "xss_clean");
        $this->form_validation->set_rules("ocopation", "adverect Description", "xss_clean");
        $this->form_validation->set_rules("ocopation_details", "ocopation_details", "xss_clean");
        $this->form_validation->set_rules("mobile_no", "mobile", "xss_clean");
        $this->form_validation->set_rules("email", "email", "xss_clean");
        $this->form_validation->set_rules("present_add", "present_add", "xss_clean");
        $this->form_validation->set_rules("permanent_add", "permanent_add", "xss_clean");
        $this->form_validation->set_rules("pay_mobile", "pay_mobile", "xss_clean");
        $this->form_validation->set_rules("tranx_id", "tranx_id", "xss_clean");

        $this->form_validation->set_rules("image", "image", "xss_clean");


        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/includes/new_adverect');
        } else {
            $image = $_FILES['image']['name'];
            if ($image != "") {
                $image = random_string('alnum', 10) . '.jpg';
                //insert image
                $config['file_name'] = $image;
                $config['upload_path'] = 'uploads/photos';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']         = '100000';
                $config['encrypt_name']     = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('image');

                $file_data = $this->upload->data();
            } else {
                $image = $this->input->post('image');
            }

            //insert data to database

            $data = array(

                'full_name'         => $this->input->post('full_name'),
                'name_bng'             => $this->input->post('name_bng'),
                'blood_group'         => $this->input->post('blood_group'),
                'update_date'         => date('Y-m-d H:i:s'),
                'father_name'        => $this->input->post('father_name'),
                'mother_name'        => $this->input->post('mother_name'),
                'mobile_no'         => $this->input->post('mobile_no'),
                'email'             => $this->input->post('email'),

                'db_day'             => $this->input->post('db_day'),
                'db_month'             => $this->input->post('db_month'),
                'db_year'             => $this->input->post('db_year'),
                'ssc_year'             => $this->input->post('ssc_year'),
                'ocopation'         => $this->input->post('ocopation'),
                'ocopation_details' => $this->input->post('ocopation_details'),
                'present_add'         => $this->input->post('present_add'),
                'permanent_add'     => $this->input->post('permanent_add'),
                'gender'             => $this->input->post('gender'),
                'tshirt'             => $this->input->post('tshirt'),
                'payment'             => $this->input->post('payment'),
                'pay_mobile'         => $this->input->post('pay_mobile'),
                'tranx_id'             => $this->input->post('tranx_id'),
                'status'             => $this->input->post('status'),
                'image'             => $image



            );

            $this->db->where('id', $reg_id);
            $this->db->update('registration', $data);
            redirect("admin/all_registerd");
        }
    }

    // Department Model Starts
    function get_department_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("department_list");
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
    // Department Model Ends

    // Designation Model Starts
    function get_designation_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("designation_list");
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
    // Designation Model Ends

    // Employment Type Model Starts
    function get_employment_type_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("employment_type_list");
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
    // Employment Type Model Ends

    // ID-Card Type Model Starts
    function get_idcard_type_list() {
        $this->db->order_by("created_at", "DESC");
        $query = $this->db->get("idcard_type_list");
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

    function create_new_salary_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("salary_name", "salary_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/salary_type');
        } else {
            $salary_id = mt_rand(100, 999);
            $data_salary = array(
                'salary_id' => $salary_id,
                'salary_name' => $this->input->post('salary_name'),
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
        $salary_id = $this->uri->segment(3);
        $data_salary = array(
            'status' => 'ACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('salary_id', $salary_id);
        $this->db->update('salary_type_list', $data_salary);
        redirect("super_admin/salary_type");
    }

    function deactive_salary_type() {
        $salary_id = $this->uri->segment(3);
        $data_salary = array(
            'status' => 'DEACTIVE',
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('salary_id', $salary_id);
        $this->db->update('salary_type_list', $data_salary);
        redirect("super_admin/salary_type");
    }

    function edit_salary_type() {
        $page_name = $this->uri->segment(3);
        $this->form_validation->set_rules("salary_name", "salary_name", "xss_clean");
        if ($this->form_validation->run() == FALSE) {
            echo  $this->upload->display_errors();
            $this->load->view('super_admin/salary_type');
        } else {
            $salary_id = $this->input->post('salary_id');
            $data_salary = array(
                'salary_name' => $this->input->post('salary_name'),
                'updated_at' => date('Y-m-d')
            );
            $this->db->where('salary_id', $salary_id);
            $this->db->update('salary_type_list', $data_salary);
            redirect("super_admin/$page_name");
        }
        redirect("super_admin/salary_type");
    }

    function get_single_salary_type($salary_id) {
        $this->db->order_by("created_at", "DESC");
        $this->db->where('salary_id', $salary_id);
        $query = $this->db->get("salary_type_list");
        return $query->result();
    }
    // Salary Type Model Ends
}
