<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <!-- <div class="float-right">
                        <div class="dropdown">
                            <a href="<?= base_url() ?>super_admin/system_settings" class="btn btn-secondary btn-round" type="button" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings mr-1"></i>Settings
                            </a>
                        </div>
                    </div> -->
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-cube-outline"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">Products</h6>
                        <div class="float-right">
                            <a href="<?= base_url() ?>super_admin/outof_stock_check" title="StockOut Product List">
                                <p class="mb-0"><b>Stock-Out:</b> products_stockout </p>
                            </a>
                        </div>
                        <a href="<?= base_url() ?>super_admin/stock_check" title="Product List">
                            <h4 class="mb-0"> products </h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-buffer"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">Customer</h6>
                        <a href="<?= base_url() ?>super_admin/customer_list" title="Customer List">
                            <h4 class="mb-0"> customer </h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-tag-text-outline"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">Purchase</h6>
                        <div class="float-right">
                            <p class="mb-0"><b>Due:</b> due_purchase </p>
                        </div>
                        <a href="<?= base_url() ?>super_admin/inventory_list" title="Purchase List">
                            <h4 class="mb-0">total_purchase </h4>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-3">
                <div class="card mini-stat">
                    <div class="mini-stat-icon text-right">
                        <i class="mdi mdi-account-multiple-outline"></i>
                    </div>
                    <div class="p-4">
                        <h6 class="text-uppercase mb-3">Users</h6>
                        <div class="float-right">
                            <a href="<?= base_url() ?>super_admin/field_worker_list_table" title="Fieldworker List">
                                <p class="mb-0"><b>Field Worker:</b> field_worker</p>
                            </a>
                        </div>
                        <h4 class="mb-0">total_users </h4>
                    </div>
                </div>
            </div>

        </div><!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-data">
                        <h6 class="d-inline-block">Pending Purchase Approval</h6>

                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped focus-on">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>CP-No</th>
                                        <th>Field Worker</th>
                                        <th>Product</th>
                                        <th>Purchase</th>
                                        <th>Payment</th>
                                        <th>Due</th>
                                        <th>Next Pay</th>
                                        <th><strong>Status</strong></th>
                                        <th>Next level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>CP-No</td>
                                        <td>Field Worker</td>
                                        <td>Product</td>
                                        <td>Purchase</td>
                                        <td>Payment</td>
                                        <td>Due</td>
                                        <td>Next Pay</td>
                                        <td><strong>Status</strong></td>
                                        <td>Next level</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-data">
                        <h6 class="d-inline-block">Field Worker Registration Request</h6>

                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped focus-on">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Branch</th>
                                        <th>Contact</th>
                                        <th>Username</th>
                                        <th><strong>Status</strong></th>
                                        <th>Reg. Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>CP-No</td>
                                        <td>Field Worker</td>
                                        <td>Product</td>
                                        <td>Purchase</td>
                                        <td>Payment</td>
                                        <td><strong>Status</strong></td>
                                        <td>Next level</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- end row -->

    </div><!-- container -->
</div> <!-- Page content Wrapper -->

</div> <!-- content -->