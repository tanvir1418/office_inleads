<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <!--<a href="index.html" class="logo"><i class="fa fa-paw"></i> Aplomb</a>-->
            <a href="<?= base_url() ?>super_admin" class="logo"><img src="<?= base_url() ?>assets/backend/images/logo.jpg" height="50" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft" id="sidebar-main">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Overview</li>
                <li>
                    <a href="<?= base_url() ?>super_admin" class="waves-effect waves-light"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                        <!-- <span class="badge badge-pill badge-primary float-right">5</span> -->
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-users"></i><span>Employee</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>super_admin/employee_list"><i class="fas fa-user"></i>Employee List</a></li>
                        <li><a href="<?= base_url() ?>super_admin/add_employee"><i class="fas fa-user-plus"></i>Add Employee</a></li>
                        <li><a href="<?= base_url() ?>super_admin/previous_employees"><i class="fas fa-user-slash"></i>Previous Employees</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-money-bill"></i><span>Salary</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>super_admin/add_employee_salary"><i class="fas fa-wallet"></i>Add Emp. Salary</a></li>
                        <li><a href="<?= base_url() ?>super_admin/salary_details"><i class="fas fa-receipt"></i></i>Salary Details</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-clipboard-list"></i><span>Leave Details</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>super_admin/leave_application"><i class="fas fa-file-medical"></i>Leave Application</a></li>
                        <li><a href="<?= base_url() ?>super_admin/leave_list"><i class="fas fa-file-alt"></i>Leave List</a></li>
                        <li><a href="<?= base_url() ?>super_admin/manage_paid_leave"><i class="fas fa-file-alt"></i>Manage Paid Leave</a></li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-university"></i><span>Bank Details</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>super_admin/add_deposit"><i class="fas fa-hand-holding-usd"></i>Add Deposit</a></li>
                        <li><a href="<?= base_url() ?>super_admin/deposit_list"><i class="fas fa-file-alt"></i>Deposit List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url() ?>super_admin/report_generation" class="waves-effect"><i class="fas fa-chart-area"></i><span>Report Generation</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                </li>

                <li class="menu-title">Add</li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-th-large"></i><span>Categories</span><span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>super_admin/department_list"><i class="fas fa-sitemap"></i>Department</a></li>
                        <li><a href="<?= base_url() ?>super_admin/designation_list"><i class="fas fa-id-card-alt"></i>Designation</a></li>
                        <li><a href="<?= base_url() ?>super_admin/employment_type"><i class="fas fa-list-alt"></i>Employment Type</a></li>
                        <li><a href="<?= base_url() ?>super_admin/idcard_type"><i class="fas fa-list-alt"></i>ID Card</a></li>
                        <li><a href="<?= base_url() ?>super_admin/salary_type"><i class="fas fa-list-alt"></i>Salary Type</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url() ?>login/logout" class="waves-effect"><i class="fas fa-sign-out-alt"></i><span>Log out</span><span class="float-right"></span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End