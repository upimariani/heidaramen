<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small>Data</small> Order </h3>

            </div>

        </div>
        <div class="">
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

                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pesanan Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pesanan Selesai</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Data Order Masuk</h2>
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
                                                                        <th class="text-center">Id Pemesanan</th>
                                                                        <th class="text-center">No Kursi</th>
                                                                        <th class="text-center">Atas Nama</th>
                                                                        <th class="text-center">Total Pembayaran</th>
                                                                        <th class="text-center">Detail</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($belum_bayar as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $no++ ?></td>
                                                                            <td><?= $value->id_pemesanan ?></td>
                                                                            <td><?= $value->no_meja ?></td>
                                                                            <td><?= $value->username ?></td>
                                                                            <td>Rp. <?= number_format($value->total_belanja, 0) ?></td>
                                                                            <td class="text-center"><a href="<?= base_url('Admin/c_order/detail_pemesanan/' . $value->id_pemesanan) ?>"><i class="fa fa-ellipsis-h"></i></a></td>
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
                                                <h2>Informasi Order Selesai<br> Laporan Transaksi</h2>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <br />
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box table-responsive">
                                                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Id Pemesanan</th>
                                                                        <th class="text-center">No Kursi</th>
                                                                        <th class="text-center">Atas Nama</th>
                                                                        <th class="text-center">Total Pembayaran</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($selesai as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $no++ ?></td>
                                                                            <td><?= $value->id_pemesanan ?></td>
                                                                            <td><?= $value->no_meja ?></td>
                                                                            <td><?= $value->username ?></td>
                                                                            <td>Rp. <?= number_format($value->total_belanja, 0) ?></td>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- /page content -->
</div>