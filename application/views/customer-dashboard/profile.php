<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('customer-dashboard/fragments/customer_head_code') ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('customer-dashboard/fragments/customer_sidebar') ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php $this->load->view('customer-dashboard/fragments/customer_topnav') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Profile</h1>
                    <?php if ($this->session->flashdata('ordersuccess')) : ?>
                        <div class="alert alert-success">
                            <p class="mb-4"><?= $this->session->flashdata('ordersuccess') ?>.</p>
                        </div>
                    <?php else : ?>
                        <p class="mb-4">Edit/View Profile</p>
                    <?php endif; ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 style="float: left;" class="m-0 font-weight-bold text-primary">Your Profile </h6>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">

                            <form id="add_user" method="POST" action="<?= base_url('customer/profile') ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6" style="margin: 0 auto;">
                                            <?php if ($this->session->flashdata('updateerror')) : ?>
                                                <div class="alert alert-danger">
                                                    <p><?= $this->session->flashdata('updateerror') ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($this->session->flashdata('updatesuccess')) : ?>
                                                <div class="alert alert-success">
                                                    <p><?= $this->session->flashdata('updatesuccess') ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control" required value="<?= $user->firstname ?>" name="firstname" placeholder="Enter First Name" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" required value="<?= $user->lastname ?>" name="surname" placeholder="Enter Last Name" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" disabled class="form-control" required value="<?= $user->email ?>" name="email" placeholder="Enter Email" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" value="<?= set_value('password') ?>" name="password" placeholder="Enter Password" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" value="<?= set_value('confirmpassword') ?>" name="confirmPassword" placeholder="Confirm Password" />
                                            </div>
                                            <div class="text-center">
                                                <button style="margin: 0 auto;" type="submit" id="saveNameBtn" class="btn btn-success"><i class="ti-plus"></i> Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->


    <?php $this->load->view('customer-dashboard/fragments/customer_scripts') ?>
</body>

</html>