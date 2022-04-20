<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.html">HEIDARAMEN <br> Selamat Datang <?=
                                                                                                $this->session->userdata('nama_lengkap');
                                                                                                ?></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <?php
        $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $key => $value) {
            $jml_item = $jml_item + $value['qty'];
        }
        ?>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <?php
                if ($this->session->userdata('id_user') == '') {
                ?>
                    <li><a class="nav-link scrollto" href="<?= base_url('Pelanggan/c_login') ?>">Login</a></li>
                <?php
                } else {
                ?>
                    <li><a class="nav-link scrollto" href="<?= base_url('Pelanggan/c_login/logout_pelanggan') ?>">Logout</a></li>
                <?php
                }
                ?>

                <li><a class="nav-link scrollto" href="#contact">Cart
                        <?php
                        if ($this->session->userdata('id_user') == '') {
                        ?>
                        <?php
                        } else {
                        ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                <?= $jml_item ?>
                                <span class="visually-hidden">unread messages</span>
                            <?php
                        }
                            ?>


                            </span></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->