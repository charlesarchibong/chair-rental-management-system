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
                    <h1 class="h3 mb-2 text-gray-800">Make Order</h1>
                    <?php if ($this->session->flashdata('ordersuccess')) : ?>
                        <div class="alert alert-success">
                            <p class="mb-4"><?= $this->session->flashdata('ordersuccess') ?>.</p>
                        </div>
                    <?php else : ?>
                        <p class="mb-4">Fill the form below with the neccessary information to place an order now</p>
                    <?php endif; ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 style="float: left;" class="m-0 font-weight-bold text-primary">Make Order </h6>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">
                            <form class="form" method="POST" role="form" action="<?= base_url('customer/orders/make_order') ?>" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6" style=" margin: 0 auto;">
                                        <div class="form-group">
                                            <div class="default-select" id="default-select">
                                                <select class="form-control orderType" name="description" required>
                                                    <option value="" disabled selected hidden>Select your order</option>
                                                    <option value="chair">Chair</option>
                                                    <option value="table">Table</option>
                                                    <option value="both">Chair and Table</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group dates-wrap">
                                                <input class="dates form-control" name="duration" value="<?= set_value('duration') ?>" required id="exampleAmount" placeholder="How many days do you need it?" type="number">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 wrap-left">
                                                <div class="default-select" id="default-select">
                                                    <input id="orderDefault" name="default-quantity" value="<?= set_value('default-quantity') ?>" class="form-control" type="number" placeholder="Enter quatity" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 wrap-left">
                                                <div class="default-select" id="default-select">
                                                    <input style="display: none;" name="chair-quantity" value="<?= set_value('chair-quantity') ?>" id="orderChair" class="form-control" type="number" placeholder="Enter quatity of chair" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 wrap-right">
                                                <div class="input-group dates-wrap">
                                                    <input style="display: none;" name="table-quantity" value="<?= set_value('table-quantity') ?>" id="orderTable" class="form-control" type="number" placeholder="Enter quatity of table" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button style="margin: 0 auto;" type="submit" class="btn btn-success">
                                                Confirm Booking
                                            </button>
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