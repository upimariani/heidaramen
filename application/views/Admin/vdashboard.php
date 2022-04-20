<?php
$total_menu = $this->m_dashboard->jml_menu();
$total_pelanggan = $this->m_dashboard->jml_pelanggan();
$total_pemesanan = $this->m_dashboard->jml_pemesanan();
?>
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Data Menu</span>
                <div class="count"><?= $total_menu ?></div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Pelanggan Register</span>
                <div class="count"><?= $total_pelanggan ?></div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Pemesanan</span>
                <div class="count green"><?= $total_pemesanan ?></div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
            </div>
        </div>
    </div>
    <!-- /top tiles -->


    <div class="row">
        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Stok Menu HeidaRamen</h2>
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
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <?php
                            foreach ($produk as $key => $value) {
                            ?>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a><?= $value->nama_menu ?></a>
                                            </h2>
                                            <div class="byline">
                                                <span <?php
                                                        if ($value->stok < 5) {
                                                            echo ' class="text-danger"';
                                                        } else {
                                                            echo 'class="text-success"';
                                                        }
                                                        ?>>Jumlah Stok Tersedia: <?= $value->stok ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>