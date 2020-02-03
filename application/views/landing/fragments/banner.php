<!-- start banner Area -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="overlay overlay-bg"></div>
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('<?= base_url('assets/landing/img/header-bg.jpg') ?>')">
            <div class="overlay overlay-bg"></div>
            <div class="carousel-caption d-none d-md-block chair-bg">
                <h2 class="display-4 text-white">Ali rentals services</h2>
                <p class="lead">Get all kind of quality chairs for your event</p>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('<?= base_url('assets/landing/img/header-bg-2.jpg') ?>')">
            <div class="overlay overlay-bg"></div>
            <div class="carousel-caption d-none d-md-block chair-bg">
                <h2 class="display-4 text-white">Ali rentals services</h2>
                <p class="lead">Get all kind of desginers tables for your personal used or event</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="col-lg-12  col-md-12 header-right">
                <?php if ($this->session->flashdata('ordererror')) : ?>
                    <div class="alert alert-danger">
                        <h4 class="pb-30 text-center"><?= $this->session->flashdata('ordererror') ?></h4>
                    </div>
                <?php else : ?>
                    <h4 class="text-white pb-4 text-center">Book Your Chair/Table Today!</h4>
                    <h6 class="text-white pb-2 text-center">Chair Cost N20 each</h6>
                    <h6 class="text-white pb-2 text-center">Table Cost N100 each</h6>
                    <h6 class="text-white pb-4 text-center"> Fee Delivery </h6>
                <?php endif; ?>
                <form class="form" method="POST" role="form" action="<?= base_url('customer/orders/make_order') ?>" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            <?php if (!$this->session->rentalCustomer) : ?>
                                <div class="from-group">
                                    <input class="form-control txt-field" type="text" name="firstname" placeholder="Enter firstname">
                                    <input class="form-control txt-field" type="text" name="lastname" placeholder="Enter last name">
                                    <input class="form-control txt-field" type="email" name="email" placeholder="Email address">
                                    <input class="form-control txt-field" type="password" name="password" placeholder="Password">
                                    <input class="form-control txt-field" type="password" name="confirmPassword" placeholder="Confirm Password">
                                </div>
                            <?php endif; ?>
                        </div>
                        <button style="width: 70%; margin: 0 auto;" type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">
                            Confirm Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->