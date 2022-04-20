<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
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
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Edit Data Menu</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br />
                                        <?php echo form_open_multipart('Admin/c_produk/update/' . $edit_produk->id_menu);
                                        ?>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Menu <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" name="nama" id="first-name" class="form-control " value="<?= $edit_produk->nama_menu ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Menu <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <p>
                                                    Makanan
                                                    <input type="radio" class="flat" name="jenis_menu" value="Makanan" <?php if ($edit_produk->jenis_menu == 'Makanan') {
                                                                                                                            echo 'checked=" "';
                                                                                                                        } ?> required /> Minuman
                                                    <input type="radio" class="flat" name="jenis_menu" value="Minuman" <?php if ($edit_produk->jenis_menu == 'Minuman') {
                                                                                                                            echo 'checked=" "';
                                                                                                                        } ?> />
                                                </p>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Stok <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" name="jumlah" id="first-name" class="form-control " value="<?= $edit_produk->stok ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Harga <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" name="harga" id="first-name" class="form-control " value="<?= $edit_produk->harga ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Gambar <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="file" name="gambar" id="last-name" name="last-name" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <img src="<?= base_url('asset/gambar/' . $edit_produk->gambar) ?>" id="gambar_load" width="200px">
                                                </div>
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
</div>
<!-- /page content -->