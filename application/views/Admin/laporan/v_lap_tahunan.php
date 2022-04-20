<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Elements</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
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
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fa fa-shopping-cart"></i> <?= $title ?>
                                <small class="float-right">Tahun: <?= $tahun ?></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total_belanja = 0;
                                    foreach ($laporan as $key => $value) {
                                        $tot_harga = $value->jumlah * $value->harga;
                                        $total_belanja = $total_belanja + $value->total_belanja;
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_menu ?></td>
                                            <td><?= $value->id_pemesanan ?></td>
                                            <td><?= $value->tanggal_pemesanan ?></td>
                                            <td><?= $value->harga ?></td>
                                            <td><?= $value->jumlah ?></td>
                                            <td>Rp.<?= number_format($value->total_belanja, 0) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <h3>Grand Total : Rp. <?= number_format($total_belanja, 0) ?> </h3>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <button class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div>
    </div>
</div>