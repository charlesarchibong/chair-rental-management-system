<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('admin-dashboard/fragments/admin_head_code') ?>

    <style>
        .container-fluid {
            width: 60%;
        }

        @media screen and (max-width: 700px) {
            .container-fluid {
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container-fluid">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-md-12">
                        <div class="p-3">
                            <div class="text-center mt-5">
                                <h1 class="h4 text-gray-900 mb-4">Create an Admin Account!</h1>
                            </div>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger text-center mt-1">
                                    <h4 class="h4 text-gray-900 mb-4"><?= $this->session->flashdata('error') ?></h4>
                                </div>
                            <?php endif; ?>
                            <form class="user" method="POST" action="<?= base_url('admin/register') ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="firstname" value="<?= set_value('firstname') ?>" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input required name="surname" value="<?= set_value('surname') ?>" type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="email" value="<?= set_value('email') ?>" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="pin" value="<?= set_value('pin') ?>" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Admin Authentication pin">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="password" value="<?= set_value('password') ?>" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input required name="confirmPassword" value="<?= set_value('confirmPassword') ?>" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button style="max-width: 65%; margin: 0 auto;" type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/admin/login">Already have an account? Login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url() ?>">Home Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- End of Page Wrapper -->
    <?php $this->load->view('admin-dashboard/fragments/admin_scripts') ?>

</body>

</html>