<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('admin-dashboard/fragments/admin_head_code') ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('admin-dashboard/fragments/admin_sidebar') ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php $this->load->view('admin-dashboard/fragments/admin_topnav') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                    <?php if ($this->session->flashdata('ordersuccess')) : ?>
                        <div class="alert alert-success">
                            <p class="mb-4"><?= $this->session->flashdata('ordersuccess') ?>.</p>
                        </div>
                    <?php else : ?>
                        <p class="mb-4">List of orders placed by customers, please click the approve button to approve an order.</p>
                    <?php endif; ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 style="float: left;" class="m-0 font-weight-bold text-primary">Order List</h6>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="white-space:nowrap;">#</th>
                                            <th style="white-space:nowrap;">Order ID</th>
                                            <th style="white-space:nowrap;">Description</th>
                                            <th style="white-space:nowrap;">Price</th>
                                            <th style="white-space:nowrap;">Duration</th>
                                            <th style="white-space:nowrap;">Chair(s)</th>
                                            <th style="white-space:nowrap;">Table(s)</th>
                                            <th style="white-space:nowrap;">Status</th>
                                            <th style="white-space:nowrap;">Payment Status</th>
                                            <th style="white-space:nowrap;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($orders as $order) :  $i++; ?>
                                            <?php if ($order->payment_status == 'Paid' && $order->status == 'Pending') : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $order->orderId ?></td>
                                                    <td><?= $order->description ?></td>
                                                    <td><?= 'N' . number_format($order->amount, 2) ?></td>
                                                    <td><?= $order->duration ?></td>
                                                    <td><?= $order->chair_quantity ?></td>
                                                    <td><?= $order->table_quantity ?></td>
                                                    <td><?= $order->status ?></td>
                                                    <td><?= $order->payment_status ?></td>
                                                    <td style="white-space:nowrap;">
                                                        <?php if ($order->payment_status == 'Paid') : ?>
                                                            <button class="btn btn-success approve-order" orderId="<?= $order->orderId ?>">
                                                                <i class="fa fa-marker"> </i> Approve
                                                            </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <?php $this->load->view('admin-dashboard/fragments/admin_footer') ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php $this->load->view('admin-dashboard/fragments/admin_scripts') ?>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('.dataTable').DataTable();
            $('.approve-order').click(function() {
                $.ajax({
                    url: '<?= base_url('customer/orders/update_order') ?>',
                    type: 'POST',
                    data: {
                        orderId: $(this).attr('orderId')
                    },
                    dataType: 'JSON',
                    beforeSend: () => {
                        $(this).attr('disabled', true);
                        $(this).html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
                    },
                    success: (data) => {
                        if (data.order) {
                            $(this).html('<i class="fa fa-marker"> </i> Approved');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>