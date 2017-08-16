                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-4">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-info widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-male"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $this->dashboard->get_total_customer_jenkel(1) ?></div>
                                    <div class="widget-title">Laki-laki</div>
                                    <div class="widget-subtitle">MyBank</div>
                                </div>
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-warning widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-female"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $this->dashboard->get_total_customer_jenkel(0) ?></div>
                                    <div class="widget-title">Perempuan</div>
                                    <div class="widget-subtitle">MyBank</div>
                                </div>
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>                        
                        <div class="col-md-4">
                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-danger widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">Hari Ini</div>                                                                        
                                        <div class="widget-subtitle"><?= date('d / m / Y') ?></div>
                                        <div class="widget-int"><?= $this->dashboard->get_total_day() ?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Minggu Ini</div>
                                        <div class="widget-subtitle"><?= $this->dashboard->get_total_week()->tgl_awal ?> - <?= $this->dashboard->get_total_week()->tgl_akhir ?></div>
                                        <div class="widget-int"><?= $this->dashboard->get_total_week()->total ?></div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Bulan Ini</div>
                                        <div class="widget-subtitle"><?= date('F') ?></div>
                                        <div class="widget-int"><?= $this->dashboard->get_total_month() ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET SLIDER -->
                        </div>
                    </div>
                    <!-- END WIDGETS -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- START CHART CS -->
                            <div class="panel panel-default">
                                <div class="panel-heading"> 
                                    <div class="panel-title-box">
                                        <h3>Layanan di Customer Service</h3>
                                        <span>Bank MyBank</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: 300px;"></div>
                                </div>                                    
                            </div>
                            <!-- END CHART CS -->
                        </div>
                        <div class="col-md-12">
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-colorful">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Layanan di Teller</h3>
                                        <span>Bank MyBank</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    </ul>
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-2" style="height: 200px;"></div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                        </div>                        
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->


                <?php
                    $kjl = 1;
                    foreach ($get_mlayanan as $row):
                        $jenis_layanan[] = $row->jenis_layanan;
                    endforeach;
                    $jenis_layanan = json_encode($jenis_layanan);
                ?>



        <script type="text/javascript">
            /* Bar dashboard chart */
            Morris.Bar({
                element: 'dashboard-bar-1',
                data: <?= json_encode($this->dashboard->get_chart_layanan_cs()); ?>,
                xkey: 'tanggal',
                ykeys: ['tabungan','kartu_kredit','deposito','kliring','inkasio','kpr'],
                labels: <?= $jenis_layanan ?>,
                barColors: ['#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80'],
                gridTextSize: '10px',
                hideHover: true,
                resize: true,
                gridLineColor: '#E5E5E5'
            });
            /* END Bar dashboard chart */

            /* Bar dashboard chart */
            Morris.Bar({
                element: 'dashboard-bar-2',
                data: <?= json_encode($this->dashboard->get_chart_layanan_teller()); ?>,
                xkey: 'tanggal',
                ykeys: ['tabungan','kartu_kredit','deposito','kliring','inkasio','kpr'],
                labels: <?= $jenis_layanan ?>,
                barColors: ['#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80'],
                gridTextSize: '10px',
                hideHover: true,
                resize: true,
                gridLineColor: '#E5E5E5'
            });
            /* END Bar dashboard chart */
        </script>                    