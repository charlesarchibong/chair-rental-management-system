<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="/assets/landing/img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">

                <ul class="nav-menu">
                    <li class="menu-active"><a href="/">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="contact">Contact Us</a></li>

                    <?php if (!$this->session->rentalAdmin && !$this->session->rentalCustomer) : ?>
                        <li class="menu-has-children"><a href="#">Dashboard</a>
                            <ul>
                                <li><a href="<?= base_url('admin/login') ?>">Admin</a></li>
                                <li><a class="customerLogin" href="#">Customer Login</a></li>
                                <li><a class="customerRegister" href="#">Customer Register</a></li>
                            </ul>
                        </li>
                    <?php elseif ($this->session->rentalCustomer) : ?>
                        <li><a href="<?= base_url('customer/home') ?>"><?= $this->session->rentalCustomer->firstname . ' ' . $this->session->rentalCustomer->lastname ?></a></li>
                    <?php else : ?>
                        <li><a href="<?= base_url('admin/home') ?>">Admin Dashboard</a></li>
                    <?php endif; ?>


                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->

<!-- Customer Register modal -->
<div class="modal fade" id="customerRegister" tabindex="-1" role="model">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span style="color: black;">Fill in the details</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    &times;
                </button>
            </div>
            <form id="add_user" method="POST" action="<?= base_url('customer/register') ?>">
                <div class="modal-body">
                    <?php if ($this->session->flashdata('registererror')) : ?>
                        <div class="alert alert-danger">
                            <p><?= $this->session->flashdata('registererror') ?></p>
                        </div>
                    <?php else : ?>
                        <p>
                            Registration takes less than a minute but gives you full control over your orders.
                        </p>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="text" class="form-control" required value="<?= set_value('firstname') ?>" name="firstname" placeholder="Enter First Name" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" required value="<?= set_value('surname') ?>" name="surname" placeholder="Enter Last Name" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" required value="<?= set_value('email') ?>" name="email" placeholder="Enter Email" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" value="<?= set_value('password') ?>" required name="password" placeholder="Enter Password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" required value="<?= set_value('confirmpassword') ?>" name="confirmPassword" placeholder="Confirm Password" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveNameBtn" class="btn btn-success"><i class="ti-plus"></i> Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Customer Login modal -->
<div class="modal fade" id="customerLogin" tabindex="-1" role="model">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span style="color: black;">Fill in the details</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    &times;
                </button>
            </div>
            <form method="POST" action="<?= base_url('customer/login') ?>">
                <div class="modal-body">
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <p><?= $this->session->flashdata('error') ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="text" class="form-control" required value="<?= set_value('email') ?>" name="email" placeholder="Enter Email" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" value="<?= set_value('password') ?>" required name="password" placeholder="Enter Password" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveNameBtn" class="btn btn-success"><i class="ti-plus"></i> Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>