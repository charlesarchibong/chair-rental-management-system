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
                                <h1 class="h4 text-gray-900 mb-4">Login your Admin Account!</h1>
                            </div>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="text-center mt-1 alert alert-danger">
                                    <h1 class="h4 text-gray-900 mb-4"><?= $this->session->flashdata('error') ?></h1>
                                </div>
                            <?php endif ?>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input required name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input required name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <button style="max-width: 65%; margin: 0 auto;" type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/admin/register">Don't have an account? Register!</a>
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

    <script>
        $(function() {
            setTimeout(() => {
                $('.alert-danger').fadeOut(2000);
            }, 3000);
        });
    </script>
</body>

</html>