<br>
<br>
<br>
<br>
<br>
<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Register</h2>
            <p>REGISTER PELANGGAN</p>

        </div>

        <form action="<?= base_url('Pelanggan/c_login/register') ?>" method="post" role="form">
            <div class="row">
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                    <div class="validate">

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" value="Laki-Laki" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" value="Perempuan" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Perempuan
                        </label>
                    </div>
                    <div class="validate"></div>
                    <br>
                </div>
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" type="date" id="date" name="tgl_lahir" placeholder="Tanggal Lahir">
                    <div class="validate"></div>
                    <br>
                </div>
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <label>No Telepon</label>
                    <input type="text" class="form-control" name="no_tlp" placeholder="No Telepon"></input>
                    <div class="validate"></div>
                    <br>
                </div>
                <div class="col-lg-12 col-md-6 form-group mt-3 mt-md-0">
                    <label>Alamat</label>
                    <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"></textarea>
                    <div class="validate"></div>
                    <br>
                </div>
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="validate"></div>
                    <br>
                </div>
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password">
                    <div class="validate"></div>
                    <br>
                </div>
                <p>Anda suda memiliki akun? <a href="<?= base_url('Pelanggan/c_login') ?>">Login!!!</a></p>
                <button type="submit" class="btn btn-outline-warning">REGISTER</button>
            </div>

        </form>

    </div>
</section><!-- End Book A Table Section -->