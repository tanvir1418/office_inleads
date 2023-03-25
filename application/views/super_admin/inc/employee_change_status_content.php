<?php 
    $emp_user_id = $this->uri->segment(3);
    $emp_dsgn_id = '';
    $appointed_date = '';
    $emp_designation = '';
    $organization = 'Inleads IT Solution Ltd.';
?>
<div class="row-wrapper">
    <div class="card">
        <div class="card-body text-center">
            <span class="h4 text-white bg-dark px-4 py-2 rounded"><strong>Change Employee Status</strong></span>
        </div>
    </div>
    <div class="row">
        <div class='col-lg-12 col-xl-4'>
            <div class='card m-b-30'>
                <div class='card-body'>
                    <div class='text-center mb-4'>
                        <h5 style='text-decoration: underline;'>Employee Info</h5>
                    </div>
                    <?php foreach ($this->emm->get_employee_details_by_userid() as $row) : ?>
                        <div class='text-center'>
                            <p class='text-muted mb-2 p-2'>
                                <img src="<?= base_url() ?>uploads/photos/<?= $row->image ?>" alt='<?= $row->employee_name ?>' class='img-fluid rounded-circle w-80'>
                            </p>
                            <h5 class='mt-2 mb-0'><?= $row->employee_name ?></h5>
                            <?php
                                $emp_dsgn_id = $row->dsgn_id;
                                $this->db->where('dsgn_id', $row->dsgn_id);
                                $designation = $this->db->get("designation_list")->row('dsgn_name');
                                $emp_designation = $designation;
                    
                                $this->db->where('dept_id', $row->dept_id);
                                $department = $this->db->get("department_list")->row('dept_name');
                    
                                $this->db->where('empl_id', $row->empl_id);
                                $employment_type = $this->db->get("employment_type_list")->row('empl_name');
                                
                                $this->db->where('idcard_id', $row->idcard_id);
                                $idcard_id = $this->db->get("idcard_type_list")->row('idcard_name');
                                $employee_id = $row->employee_id;
                                $employee_idcard = $idcard_id . "-" . $employee_id;
                    
                                $date_of_joining = implode("-",array_reverse(explode("-",$row->date_of_joining)));
                                $appointed_date = $row->appointed_date;
                            ?>
                            <small class='text-muted'><?= $designation ?></small>
                        </div>
                        <hr>
                        <div>
                            <small class='text-muted'><strong>Department:</strong> <?= $department ?></small><br>
                            <small class='text-muted'><strong>Employment Type:</strong> <?= $employment_type ?></small><br>
                            <small class='text-muted'><strong>Id Card:</strong> <?= $employee_idcard ?></small><br>
                            <small class='text-muted'><strong>Joining Date:</strong> <?= $date_of_joining ?></small><br>
                            <small class='text-muted'><strong>Working Status:</strong> <?= $row->status ?></small><br>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class='col-lg-12 col-xl-8'>
            <div class='card m-b-30'>
            <div class='card-body'>
                    <div class='text-center mb-4'>
                        <h5 style='text-decoration: underline;'>Employee Promotion</h5>
                    </div>
                    <form action="<?= base_url() ?>super_admin/employee_promotion" method='post' enctype='multipart/form-data'>
                        <input type='hidden' name='emp_user_id' value='<?= $emp_user_id ?>'>
                        <div class='form-row'>
                            <div class='form-group col'>
                                <label for='organization'>Organization</label>
                                <input type='text' class='form-control' name='organization' value="<?= $organization ?>" readonly>
                            </div>
                            <div class='form-group col'>
                                <label for='designation'>Current Designation</label>
                                <input type='text' class='form-control' name='designation' id="designation" value="<?= $emp_designation ?>" readonly>
                            </div>
                            <div class='form-group col'>
                                <label for='start_date'>Start Date</label>
                                <input type='date' class='form-control' name='start_date' id="start_date" value="<?= $appointed_date ?>" readonly>
                            </div>
                            <div class='form-group col'>
                                <label for='end_date'>End Date</label>
                                <input type='date' class='form-control' name='end_date' id='end_date' required>
                            </div>
                        </div>
                        <hr>
                        <div class='form-row'>
                            <div class='form-group col'>
                                <label for='new_dsgn_id'>New Designation</label>
                                <select class='form-control' name='new_dsgn_id' id='new_dsgn_id' required>
                                    <option value='' selected='' disabled='' hidden=''>Choose here</option>
                                    <?php foreach ($this->cmm->get_active_designation_list() as $row) : ?>
                                        <?php if($row->dsgn_id !== $emp_dsgn_id) : ?>
                                            <option value="<?= $row->dsgn_id ?>"><?= $row->dsgn_name ?></option>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class='form-group col'>
                                <label for='new_appointed_date'>Appoint Date</label>
                                <input type='date' class='form-control' name='new_appointed_date' id='new_appointed_date' required>
                            </div>
                        </div>
                        <div class='form-group form-check mt-4'>
                            <input type='checkbox' class='form-check-input' name='promotion_check' id='promotion_check' required>
                            <label class='form-check-label' for='promotion_check'><strong>Make sure to submit</strong></label>
                        </div>
                        <button type='submit' class='btn btn-dark btn-lg'>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->