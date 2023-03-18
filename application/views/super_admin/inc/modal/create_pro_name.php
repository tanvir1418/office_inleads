<div class="modal create_pro_name" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <form action="<?= base_url() ?>super_admin/create_pro_name/page_name" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalform">New Product Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-dark">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sup_id" class="control-label">Select Supplier</label>
                                <select class="form-control" name="sup_id" id="sup_id" required>
                                    <option value='' selected disabled hidden>Select Here</option>
                                    <option value='val1'>Value One</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="product_name_id">
                            <div class="form-group">
                                <label for="field_product_name" class="control-label">Product Name</label>
                                <input type="text" class="form-control" id="field_product_name" name="pro_name" required="">
                            </div>
                            <span class="error-message"></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Product Code</label>
                                <input type="text" class="form-control" id="field-2" name="pro_code" value="" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-raised btn-primary ml-2" disabled>ADD</button>
                    <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>


</div>