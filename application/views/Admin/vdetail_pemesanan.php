<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Pemesanan <small></small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">

                    <a href="<?= base_url('Admin/c_order') ?>" class="btn btn-success pull-right"><i class="fa fa-reply"></i> Kembali</a>
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

                        <section class="content invoice">
                            <!-- title row -->

                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Pemesanan Atas Nama
                                    <address>
                                        <?= $detail['pemesanan']->username ?><br>
                                        <strong><?= $detail['pemesanan']->id_pemesanan ?></strong>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Tanggal Pemesanan</b> <?= $detail['pemesanan']->tanggal_pemesanan ?>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="  table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($detail['detail'] as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->nama_menu ?></td>
                                                    <td><?= $value->jumlah ?></td>
                                                    <td>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0) ?></td>
                                                    <td>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga) * $value->jumlah, 0)  ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-md-6">
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>

                                                <tr>
                                                    <th>Total: Rp. <?= number_format($detail['pemesanan']->total_belanja, 0)  ?></th>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <form id="demo-form2" action="<?= base_url('Admin/c_order/bayar/' . $value->id_pemesanan) ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                                                            <input type="hidden" name="tot" value="<?= $detail['pemesanan']->total_belanja ?>">
                                                            <input type="hidden" name="kursi" value="<?= $detail['pemesanan']->no_meja ?>">
                                                            <div class="item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bayar <span class="required">* Rp.</span>
                                                                </label>
                                                                <div class="col-md-7 col-sm-6 ">
                                                                    <input type="text" id="first-name" name="bayar" required="required" class="form-control " placeholder="Masukkan Jumlah Nominal">
                                                                </div>
                                                            </div>
                                                            <div class="ln_solid"></div>
                                                            <div class="item form-group">
                                                                <div class="col-md-6 col-sm-6 offset-md-3">
                                                                    <button class="btn btn-danger" type="reset">Reset</button>
                                                                    <button type="submit" class="btn btn-success">Bayar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class=" ">
                                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->