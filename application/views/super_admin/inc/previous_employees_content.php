<div class="row-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Previous Employee List || <a class="btn btn-dark ml-2" href="<?= base_url() ?>super_admin/add_employee">Add New</a></h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Id Card</th>
                                <th>Joining</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($this->emm->get_previous_employees() as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><img class="w-60 h-60 rounded-circle" src="<?= base_url() ?>uploads/photos/<?= $row->image ?>"></td>
                                    <td>
                                        <a href="<?= base_url() ?>super_admin/employee_profile/<?= $row->emp_user_id ?>" class="btn btn-dark mt-0 tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Show Profile">
                                            <?= $row->employee_name ?>
                                        </a>
                                    </td>
                                    <td><?= $row->designation ?></td>
                                    <td><?= $row->department ?></td>
                                    <td><?= $row->pre_emp_id ?>-<?= $row->employee_id ?></td>
                                    <td><?= implode("-", array_reverse(explode("-", $row->date_of_joining))) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->