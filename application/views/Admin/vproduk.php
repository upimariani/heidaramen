<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small>Data</small> Menu </h3>

            </div>

        </div>
        <div class="">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fa fa-check"></i> ';
                        echo $this->session->flashdata('pesan');
                        echo '</h5></div>';
                    }
                    ?>
                    <div class="x_title">
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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tambah Data Menu</a>
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
                                                                        <th class="text-center">Gambar</th>
                                                                        <th class="text-center">Nama Menu</th>
                                                                        <th class="text-center">Jenis Menu</th>
                                                                        <th class="text-center">Stok</th>
                                                                        <th class="text-center">Harga</th>
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($produk as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $no++ ?></td>
                                                                            <td><img style="width: 100px;" src="<?= base_url('asset/gambar/' . $value->gambar) ?>"></td>
                                                                            <td><?= $value->nama_menu ?></td>
                                                                            <td><?= $value->jenis_menu ?></td>
                                                                            <td><?= $value->stok ?></td>
                                                                            <td><?= $value->harga ?></td>
                                                                            <td class="text-center"><a href="<?= base_url('Admin/c_produk/edit/' . $value->id_menu) ?>"><i class="fa fa-edit fa-2x"></i></a> | <a href="<?= base_url('Admin/c_produk/hapus/' . $value->id_menu) ?>"><i class="fa fa-trash fa-2x"></i></a></td>
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
                                                <?php echo form_open_multipart('Admin/c_produk');
                                                ?>

                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Menu <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="text" name="nama" id="first-name" required="required" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Menu <span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="jenis" value="Makanan" class="join-btn"> &nbsp; Makanan &nbsp;
                                                            </label>
                                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="jenis" value="Minuman" class="join-btn"> Minuman
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Stok <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="text" name="jumlah" id="first-name" required="required" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Harga <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="number" name="harga" id="first-name" required="required" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Gambar <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="file" name="gambar" id="last-name" name="last-name" required="required" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="ln_solid"></div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                                        <button class="btn btn-danger" type="reset">Reset</button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                                <?php echo form_close() ?>
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