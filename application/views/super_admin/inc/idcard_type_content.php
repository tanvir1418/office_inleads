<div class="row-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Id-Card Type List || <a class="btn btn-dark text-white ml-2" data-toggle="modal" data-target=".create_new_idcard_type">Add New</a></h4>

                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id-Card</th>
                                <th>Employee No.</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($this->cmm->get_idcard_type_list() as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->idcard_name ?></td>
                                    <td>5</td>

                                    <?php if ($row->status == "ACTIVE") { ?>
                                        <td class="text-success-imp"><strong><?= $row->status ?></strong></td>
                                    <?php } else { ?>
                                        <td class="text-danger"><strong><?= $row->status ?></strong></td>
                                    <?php } ?>

                                    <?php
                                    // $this->db->where('sup_id', $row->sup_id);
                                    // $supplier_name = $this->db->get("supplier")->row('sup_name');
                                    ?>
                                    <!-- <td><?php // $supplier_name 
                                                ?></td> -->


                                    <td>
                                        <a class="btn btn-warning text-dark ml-2 edit_idcard_modal" data-id="<?= $row->idcard_id ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <?php
                                        if ($row->status == "ACTIVE") { ?>
                                            <a onclick="return confirm('Want to deactive id card type?');" href="<?= base_url() ?>super_admin/deactive_idcard_type/<?= $row->idcard_id ?>" class="btn btn-danger">
                                                <i class="fas fa-times"></i> Deactive
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url() ?>super_admin/active_idcard_type/<?= $row->idcard_id ?>" class="btn btn-success btn-success-imp">
                                                <i class="fas fa-check"></i> Active
                                            </a>
                                        <?php } ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
</div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->