<?php
    include "inc/header_links.php";
?>

<body class="fixed-left">
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0">
                    <a href="#" class="logo logo-admin"><img src="<?= base_url() ?>assets/backend/images/logo.jpg" height="50" alt="logo"></a>
                </h3>

                <h6 class="text-center">Sign In</h6>

                <div class="p-3">
                    <div class="text-center" id="login_message">
                        <p class="text-danger">
                            <?php
                                if ($this->session->flashdata('wrong_password')) {
                                    echo "Wrong Password!";
                                } else if ($this->session->flashdata('wrong_username')) {
                                    echo "Wrong Username!";
                                } else if ($this->session->flashdata('account_disabled')) {
                                    echo "Account Disabled!";
                                }
                            ?>
                        </p>
                    </div>
                    <form class="form-horizontal" action="<?= base_url() ?>login/login_process" method="post">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" required="" placeholder="Username" name="username" id="username_input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password_input">
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-sm-7 m-t-20">
                                Login Details: <br>
                                <b>Super Admin:</b><br> User: admin Password: admin <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="<?= base_url() ?>assets/backend/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/detect.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/fastclick.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/jquery.blockUI.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/waves.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/backend/js/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#username_input, #password_input').on('click', function() {
                $('#login_message p').html("");
            });
        });
    </script>

</body>

</html>