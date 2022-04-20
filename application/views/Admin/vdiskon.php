<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small>Data</small> Diskon </h3>

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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Diskon</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tambah Data Diskon</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Data Diskon</h2>
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
                                                                        <th class="text-center">Jumlah Diskon</th>
                                                                        <th class="text-center">Harga</th>
                                                                        <th class="text-center">Harga Diskon</th>
                                                                        <th class="text-center">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($diskon as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center"><?= $no++ ?></td>
                                                                            <td><img style="width: 100px;" src="<?= base_url('asset/gambar/' . $value->gambar) ?>" </td>
                                                                            <td><?= $value->nama_menu ?></td>
                                                                            <td><?= $value->diskon ?> %</td>
                                                                            <td>Rp. <?= number_format($value->harga, 0)  ?></td>
                                                                            <td>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0)  ?></td>
                                                                            <td class="text-center"><a href="<?= base_url('Admin/c_diskon/edit/' . $value->id_menu) ?>"><i class="fa fa-edit fa-2x"></i></a> | <a href="<?= base_url('Admin/c_diskon/hapus/' . $value->id_menu) ?>"><i class="fa fa-trash fa-2x"></i></a></td>
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
                                                <h2>Input Data Diskon</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <br />
                                                <?php echo form_open_multipart('Admin/c_diskon/insert');
                                                ?>

                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Menu <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <select class="form-control " name="produk">
                                                            <option>---Pilih Produk---</option>
                                                            <?php
                                                            foreach ($produk as $key => $value) {
                                                            ?>
                                                                <option value="<?= $value->id_menu ?>"><?= $value->nama_menu ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Besar Diskon <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="number" name="diskon" id="first-name" required="required" class="form-control ">
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