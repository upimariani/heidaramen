<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Welcome to <span>HEIDARAMEN</span></h1>
                <h2>Delivering great food for more than 18 years!</h2>

            </div>

        </div>
    </div>
</section><!-- End Hero -->

<main id="main">




    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu</h2>
                <p>Heida Ramen</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li data-filter=".filter-makanan">Makanan</li>
                        <li data-filter=".filter-minuman">Minuman</li>
                    </ul>
                </div>
            </div>

            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                <?php
                foreach ($makanan as $key => $value) {
                    echo form_open('Pelanggan/c_katalog/add');
                ?>
                    <div class="col-lg-6 menu-item filter-makanan">
                        <input type="hidden" name="id" value="<?= $value->id_menu ?>">
                        <input type="hidden" name="name" value="<?= $value->nama_menu ?>">

                        <input type="hidden" name="qty" value="1">
                        <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" class="menu-img" alt="">
                        <div class="menu-content">
                            <?php
                            $tot_diskon = 0;
                            $tot_diskon = $value->harga - ($value->harga * $value->diskon / 100);
                            if ($value->diskon != 0) {

                            ?>
                                <a href="#"><?= $value->nama_menu ?></a> <span>Rp.<?= number_format($tot_diskon, 0) ?><span class="text-decoration-line-through">Rp. <?= number_format($value->harga, 0) ?></span></span>
                            <?php
                            } else {
                            ?>
                                <a href="#"><?= $value->nama_menu ?></a><span>Rp. <?= number_format($tot_diskon, 0) ?></span>
                            <?php
                            }
                            ?>
                            <input type="hidden" name="price" value="<?= $tot_diskon ?>">
                        </div>
                        <div class="menu-ingredients">
                            <?php
                            if ($value->diskon != '0') {
                                echo 'Diskon ' . $value->diskon . '%';
                            }
                            ?>

                            <br>
                            <br>
                            <button type="submit" class="btn btn-outline-warning btn-sm">Add To Cart</button>
                        </div>
                    </div>
                <?php
                    echo form_close();
                }
                ?>
                <?php
                foreach ($minuman as $key => $value) {
                    echo form_open('Pelanggan/c_katalog/add');
                ?>
                    <div class="col-lg-6 menu-item filter-minuman">
                        <input type="hidden" name="id" value="<?= $value->id_menu ?>">
                        <input type="hidden" name="name" value="<?= $value->nama_menu ?>">
                        <input type="hidden" name="price" value="<?= $value->harga - ($value->diskon / 100 * $value->harga) ?>">
                        <input type="hidden" name="qty" value="1">
                        <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#"><?= $value->nama_menu ?></a>
                            <?php
                            if ($value->diskon != '0') {
                            ?>
                                <span>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0) ?>
                                    <del> Rp. <?= number_format($value->harga, 0) ?></del></span>
                            <?php
                            } else {
                            ?>
                                <span>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0) ?></span>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="menu-ingredients">
                            <br>
                            <button type="submit" class="btn btn-outline-warning btn-sm">Add To Cart</button>
                        </div>
                    </div>
                <?php
                    echo form_close();
                }
                ?>



            </div>

        </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Informasi</h2>
                <p>Pesanan Anda</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Belum Bayar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Selesai</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-12 details order-2 order-lg-1">
                                    <!-- ======= Contact Section ======= -->
                                    <?php
                                    $cek = 0;
                                    foreach ($this->cart->contents() as $value) {
                                        $cek = $cek + $value['price'];
                                    }
                                    if ($cek == 0) {
                                    ?>
                                        <section id="contact" class="contact">
                                            <div class="container" data-aos="fade-up">

                                                <div class="section-title">
                                                    <h2>Keranjang Anda!!!</h2>
                                                    <p>Silahkan Add To Cart</p>
                                                </div>
                                            </div>
                                        </section>
                                    <?php

                                    } else {
                                    ?>

                                        <section id="contact" class="contact">
                                            <div class="container" data-aos="fade-up">

                                                <div class="section-title">
                                                    <h2>Keranjang Anda!!!</h2>
                                                    <p>Silahkan Isi Data Pemesanan</p>
                                                </div>
                                            </div>
                                            <?php
                                            echo form_open('pelanggan/c_katalog/update');
                                            ?>
                                            <table class="table table-active">
                                                <thead>
                                                    <tr>
                                                        <th class="text-light">No</th>
                                                        <th class="text-light">Nama Menu</th>
                                                        <th class="text-light">Harga</th>
                                                        <th class="text-light">Qty</th>
                                                        <th class="text-light">Subtotal</th>
                                                        <th class="text-light">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $no = 1;
                                                    $keranjang = $this->cart->contents();
                                                    foreach ($this->cart->contents() as $value) :
                                                    ?>
                                                        <tr>
                                                            <td class="text-light"><?= $no++ ?></td>
                                                            <td class="text-light"><?= $value['name']; ?></td>
                                                            <td class="text-light">Rp. <?= number_format($value['price']); ?></td>
                                                            <td class="text-light"> <input id="jml" type="number" name="<?= $i . '[qty]' ?>" class="input-number" min="1" data-max="100" value="<?= $value['qty'] ?>"></td>
                                                            <td class="text-light">Rp. <?= number_format($value['price'] * $value['qty']) ?></td>
                                                            <td class="text-light"><a href="<?= base_url('Pelanggan/c_katalog/delete/' . $value['rowid']) ?>"><i class="ti-trash remove-icon"></i>Hapus</a> | <input type="submit" class="btn btn-success" value="UPDATE CART"></a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>

                                                        <td class="text-light">Total</td>
                                                        <td class="text-light">Rp. <?php echo $this->cart->format_number($this->cart->total(), 0); ?></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <?php
                                            echo form_close();
                                            ?>
                                            <div class="container" data-aos="fade-up">
                                                <div class="row mt-5">
                                                    <div class="col-lg-12 mt-5 mt-lg-0">

                                                        <form action="<?= base_url('Pelanggan/c_katalog/pesan') ?>" method="post">
                                                            <?php
                                                            $id_pemesanan = date('Ymd') . strtoupper(random_string('alnum', 8));
                                                            $date = date('Y-m-d');
                                                            $i = 1;
                                                            foreach ($this->cart->contents() as $items) {
                                                                echo form_hidden('qty' . $i++, $items['qty']);
                                                            }
                                                            ?>
                                                            <input name="id_pemesanan" value="<?= $id_pemesanan ?>" hidden>
                                                            <input name="date" value="<?= $date ?>" hidden>
                                                            <input name="total" value="<?= $this->cart->total() ?>" hidden>
                                                            <input name="username" value="-" hidden>
                                                            <input name="konfirmasi" value="0" hidden>
                                                            <div class="row">
                                                                <div class="col-md-6 form-group">
                                                                    <input type="text" name="atas_nama" value="<?= $this->session->userdata('nama_lengkap') ?>" class="form-control" id="name" placeholder="Atas Nama" readonly>
                                                                </div>
                                                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                                                    <input type="number" class="form-control" name="no_telp" id="email" placeholder="No Telepon" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <select class="form-control" name="no_meja">
                                                                    <option value="1">---Pilih Kursi---</option>
                                                                    <?php
                                                                    foreach ($tempat as $key => $value) {
                                                                    ?>
                                                                        <option value="<?= $value->id_tempat ?>" <?php if ($value->status_tempat == '1') {
                                                                                                                        echo 'disabled';
                                                                                                                    } ?>><?= $value->nama_tempat ?> | No Kursi <?= $value->no_tempat ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <textarea class="form-control" name="ket" rows="8" placeholder="Keterangan" required></textarea>
                                                            </div>
                                                            <br>
                                                            <button type="submit" class="btn btn-warning">Pesan Sekarang!!!</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </section><!-- End Contact Section -->
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/specials-1.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div class="col-lg-12 details order-2 order-lg-1">

                                    <?php
                                    $cek = 0;
                                    foreach ($belum_bayar as $key => $value) {
                                        $cek = $cek + $value->total_belanja;
                                    }
                                    if ($cek == 0) {
                                    ?>
                                        <section id="contact" class="contact">
                                            <div class="container" data-aos="fade-up">

                                                <div class="section-title">
                                                    <h2>Tidak Ada Pemesanan</h2>
                                                    <p>Silahkan Melakukan Pemesanan!!!</p>
                                                </div>
                                            </div>
                                        </section>
                                    <?php
                                    } else {
                                    ?>
                                        <h3>Informasi Pemesanan</h3>

                                        <table class="table">
                                            <thead>
                                                <th class="text-light">No</th>
                                                <th class="text-light">Id Pemesanan</th>
                                                <th class="text-light">Atas Nama</th>
                                                <th class="text-light">Tanggal Pemesanan</th>
                                                <th class="text-light">Total Bayar</th>
                                                <th class="text-light">Batalkan Pemesanan</th>
                                                <th class="text-light">Detail Pemesanan</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($belum_bayar as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td class="text-light"><?= $no++ ?></td>
                                                        <td class="text-warning"><?= $value->id_pemesanan ?></td>
                                                        <td class="text-light"><?= $value->username ?></td>
                                                        <td class="text-light"><?= $value->tanggal_pemesanan ?></td>
                                                        <td class="text-light">Rp.<?= number_format($value->total_belanja, 0)  ?></td>
                                                        <td class="text-center"><a href="<?= base_url('Pelanggan/c_katalog/batalkan_pemesanan/' . $value->id_pemesanan) ?>">Klik!!!</a>

                                                        </td>
                                                        <td class="text-center"> <a href="<?= base_url('Pelanggan/c_katalog/detail_pemesanan/' . $value->id_pemesanan) ?>">Klik!!!</a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                                <div class="col-lg-12 details order-2 order-lg-1">
                                    <h3>Informasi Pesanan Selesai</h3>
                                    <table class="table">
                                        <thead>
                                            <th class="text-light">No</th>
                                            <th class="text-light">Id Pemesanan</th>
                                            <th class="text-light">Atas Nama</th>
                                            <th class="text-light">Tanggal Pemesanan</th>
                                            <th class="text-light">Total Bayar</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pesanan_selesai as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td class="text-light"><?= $no++ ?></td>
                                                    <td class="text-warning"><?= $value->id_pemesanan ?></td>
                                                    <td class="text-light"><?= $value->username ?></td>
                                                    <td class="text-light"><?= $value->tanggal_pemesanan ?></td>
                                                    <td class="text-light">Rp. <?= number_format($value->total_belanja, 0)  ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Specials Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
        </div>
        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="open-hours">
                            <i class="bi bi-clock"></i>
                            <h4>Open Hours:</h4>
                            <p>
                                Monday-Saturday:<br>
                                11:00 AM - 2300 PM
                            </p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->