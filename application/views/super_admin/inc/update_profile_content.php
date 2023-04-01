<?php $error = $this->uri->segment(3);
if ($error == "username_error") {
    $error_msg = "USER NAME EXIST!";
}

if ($error == "username_invalid") {
    $error_msg = "Space or Invalid Symbol! Username Must Contain Number and Alphabet";
}

if ($error == "success") {
    $error_msg = "Information Update Successfully!";
}
?>

<div class="row-wrapper">
    <?php if ($error != "") { ?>
        <div class="alert alert-danger mb-0" role="alert">
            <strong><?= $error_msg ?></strong>
        </div>
    <?php } ?>

    <form action="<?= base_url() ?>super_admin/update_admin_data" method="post" enctype="multipart/form-data">
        <?php
        foreach ($this->amm->get_admin_data() as $row) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">UPDATE PROFILE</h4>

                            <input type="hidden" name="username" value="<?= $row->username ?>">
                            <div class="form-group row">
                                <label for="full_name" class="col-sm-2 col-form-label">Full Name: </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control ml-2" name="full_name" id="full_name" value="<?= $row->full_name ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_username" class="col-sm-2 col-form-label">Username: </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control ml-2" name="new_username" id="new_username" value="<?= $row->username ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password" class="col-sm-2 col-form-label">Password: </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control ml-2" name="new_password" id="new_password" value="<?= $row->password ?>">
                                </div>
                            </div>
                            <a href="<?= base_url() ?>super_admin" class="btn btn-danger ml-2">Cancel</a>
                            <button type="submit" class="btn btn-primary ml-2">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </form>
</div>
</div> <!--  end of row-wrapper -->

</div> <!-- end content -->

</div><!-- end content-page -->