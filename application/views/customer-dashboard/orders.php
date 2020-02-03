<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('customer-dashboard/fragments/customer_head_code') ?>

</head>

<body id="page-top" ng-app>

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
                    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                    <?php if ($this->session->flashdata('ordersuccess')) : ?>
                        <div class="alert alert-success">
                            <p class="mb-4"><?= $this->session->flashdata('ordersuccess') ?>.</p>
                        </div>
                    <?php else : ?>
                        <p class="mb-4">List of orders placed by you, please click on pay now to complete order.</p>
                    <?php endif; ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 style="float: left;" class="m-0 font-weight-bold text-primary">Order List</h6>
                            <a href="<?= base_url('customer/orders/make_order') ?>" style="float: right;" class="btn btn-info pull-right"><i class="fa fa-plus-circle"> </i> Make Order</a>
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
                                            <?php if ($order->payment_status == 'Pending') : ?>
                                                <tr>
                                                    <td>  <?= $i ?></td>
                                                    <td><?= $order->orderId ?></td>
                                                    <td><?= $order->description ?></td>
                                                    <td><?= 'N' . number_format($order->amount, 2) ?></td>
                                                    <td><?= $order->duration ?></td>
                                                    <td><?= $order->chair_quantity ?></td>
                                                    <td><?= $order->table_quantity ?></td>
                                                    <td><?= $order->status ?></td>
                                                    <td><?= $order->payment_status ?></td>
                                                    <td style="white-space:nowrap;">
                                                        <?php if ($order->payment_status == 'Pending') : ?>
                                                            <button class="btn btn-success pay-order" order-id="<?= $order->orderId ?>">
                                                                <i class="fa fa-money-bill-alt"> </i> Pay
                                                            </button>
                                                        <?php else : ?> <button disabled class="btn btn-success pay-order" order-id="<?= $order->orderId ?>">
                                                                <i class="fa fa-money-bill-alt"> </i> Pay
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
        </div>
    </div>
    <!-- End of Page Wrapper -->


    <?php $this->load->view('customer-dashboard/fragments/customer_scripts') ?>
    <script>
        function payWithPaystack(order, user) {
            console.log(order, user);
            var handler = PaystackPop.setup({
                key: 'pk_test_198ec758f9a1a39abd22e42adb6a3d4e9321a2bf',
                email: user.email,
                amount: parseInt(order.amount) * 100,
                currency: "NGN",
                firstname: user.firstname,
                lastname: user.lastname,
                // label: "Optional string that replaces customer email"
                // metadata: {
                //     custom_fields: [{
                //         orderId: order.orderId,
                //         customerId: order.customerId,
                //         chair_quantity: order.chair_quantity,
                //         table_quantity: order.table_quantity
                //     }]
                // },
                callback: function(response) {
                    $.ajax({
                        url: '<?= base_url('customer/orders/update_order') ?>',
                        type: 'POST',
                        data: {
                            orderId: order.orderId,
                            transactionId: response.reference
                        },
                        dataType: 'JSON',
                        success: (data) => {
                            window.location.replace("<?= base_url('customer/orders') ?>");
                        }
                    });

                },
                onClose: function() {
                    //alert('window closed');
                }
            });
            handler.openIframe();
        }
        $(document).ready(function() {
            $('.dataTable').DataTable();
            $('.pay-order').click(function() {
                var orderId = $(this).attr('order-id');
                console.log(orderId);
                $.ajax({
                    url: '<?= base_url('customer/orders/get_order') ?>',
                    type: 'GET',
                    data: {
                        orderId: orderId
                    },
                    dataType: 'JSON',
                    beforeSend: () => {
                        $(this).attr('disabled', true);
                        $(this).html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
                    },
                    success: (data) => {
                        if (data) {
                            payWithPaystack(data.order, data.user);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
