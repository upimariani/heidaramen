<br>
<br>
<br>
<br>
<br>
<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Login</h2>
            <p>LOGIN PELANGGAN</p>
            <br>
            <?php
            if ($this->session->userdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->userdata('pesan');
                echo ' </div>';
            }

            if ($this->session->userdata('gagal')) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $this->session->userdata('gagal');
                echo ' </div>';
            }
            ?>

        </div>

        <form action="<?= base_url('Pelanggan/c_login') ?>" method="post" role="form">
            <div class="row">
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="validate">

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="validate"></div>
                    <br>
                </div>
                <p>Anda belum memiliki akun? <a href="<?= base_url('Pelanggan/c_login/register') ?>">Register!!!</a></p>
                <button type="submit" class="btn btn-outline-warning">LOGIN</button>
            </div>

        </form>

    </div>
</section><!-- End Book A Table Section -->