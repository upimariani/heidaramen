<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('asset/gentelella-master/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('asset/gentelella-master/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('asset/gentelella-master/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('asset/gentelella-master/') ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('asset/gentelella-master/') ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">

                    <h1>Login Form</h1>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check"></i> ';
                        echo $this->session->flashdata('pesan');
                        echo '</h5></div>';
                    }
                    if ($this->session->flashdata('gagal')) {
                        echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check"></i> ';
                        echo $this->session->flashdata('gagal');
                        echo '</h5></div>';
                    }
                    ?>
                    <form action="<?= base_url('Admin/c_login') ?>" method="POST">
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info">LOGIN</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000)
    </script>
</body>


</html>