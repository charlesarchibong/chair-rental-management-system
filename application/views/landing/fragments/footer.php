<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Quick Links</h6>
                    <ul>
                        <?php if (!$this->session->userdata('rentalAdmin')) : ?>
                            <li><a href="<?= base_url('admin/register') ?>">Admin Registration</a></li>
                            <li><a href="<?= base_url('admin/login') ?>">Admin Login</a></li>
                        <?php endif; ?>
                        <?php if (!$this->session->userdata('rentalCustomer')) : ?>
                            <li><a class="customerRegister" href="#">Customer Registration</a></li>
                            <li><a class="customerLogin" href="#">Customer Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <p class="mt-50 mx-auto footer-text col-lg-12">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved
            </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->