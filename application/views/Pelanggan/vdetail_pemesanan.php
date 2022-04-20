<!-- ======= Hero Section ======= -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2><a href="<?= base_url('Pelanggan/c_katalog') ?>">Home</a> -> Detail Pemesanan</h2>
            <p>Detail Pemesanan</p>
        </div>
    </div>
    <div class="container" data-aos="fade-up">

        <div class="row mt-5">

            <div class="col-lg-4">
                <div class="info">
                    <?php
                    foreach ($detail as $key => $value) {
                    ?>

                        <div class="address">
                            <i class="bi bi-layer-backward"></i>
                            <h4><?= $value->nama_menu ?></h4>
                            <p><?= $value->jumlah ?> x Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga))  ?></p>
                            <p>=> Rp. <?= number_format($value->jumlah * ($value->harga - ($value->diskon / 100 * $value->harga)))  ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->