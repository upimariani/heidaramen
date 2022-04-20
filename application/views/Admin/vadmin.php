<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small>Data</small> Admin</h3>

            </div>

        </div>
        <div class="">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <br>
                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check"></i> ';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        }
                        ?>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tambah Data Admin</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Data Menu</h2>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box table-responsive">
                                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Nama Lengkap</th>
                                                                        <th class="text-center">Jenis Kelamin</th>
                                                                        <th class="text-center">Tanggal Lahir</th>
                                                                        <th class="text-center">Alamat</th>
                                                                        <th class="text-center">No Telepon</th>
                                                                        <th class="text-center">Akun</th>
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($admin as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center"><?= $no++ ?></td>
                                                                            <td><?= $value->nama_lengkap ?></td>
                                                                            <td><?= $value->jenis_kelamin ?></td>
                                                                            <td><?= $value->tanggal_lahir ?></td>
                                                                            <td><?= $value->alamat ?></td>
                                                                            <td><?= $value->hp ?></td>
                                                                            <td><?= $value->username ?> <br>
                                                                                <?= $value->password ?></td>
                                                                            <td class="text-center"><a href="<?= base_url('Admin/c_admin/edit/' . $value->id_user) ?>"><i class="fa fa-edit fa-2x"></i></a> | <a href="<?= base_url('Admin/c_admin/hapus/' . $value->id_user) ?>"><i class="fa fa-trash fa-2x"></i></a></td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Input Data Menu</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <br />
                                                <form id="demo-form2" action="<?= base_url('Admin/c_admin') ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" name="nama" id="first-name" required="required" class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                                <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                    <input type="radio" name="jk" value="Perempuan" class="join-btn"> &nbsp; Perempuan &nbsp;
                                                                </label>
                                                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                    <input type="radio" name="jk" value="Laki-Laki" class="join-btn"> Laki-Laki
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input id="birthday" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                                            <script>
                                                                function timeFunctionLong(input) {
                                                                    setTimeout(function() {
                                                                        input.type = 'text';
                                                                    }, 60000);
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>

                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" name="alamat" id="first-name" required="required" class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Telepon <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" name="no_tlp" id="first-name" required="required" class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Username <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" name="username" id="first-name" required="required" class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                            <input type="text" name="password" id="first-name" required="required" class="form-control ">
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="item form-group">
                                                        <div class="col-md-6 col-sm-6 offset-md-3">
                                                            <button class="btn btn-danger" type="reset">Reset</button>
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /page content -->
</div>