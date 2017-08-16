<? $uri = $this->uri->segment(1); ?>
<? $uri2 = $this->uri->segment(2); ?>
<? $uri3 = $this->uri->segment(3); ?>


<li <?= ($uri == 'dashboard')? "class='active'":""?>>
    <a href="{admin_url}dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
</li>           


<? if($this->session->userdata('user_grup_id') == 0): ?>
<!-- START MASTER DATA -->
<li class="xn-openable <?= ($uri2 == 'Layanan' || 
                            $uri2 == 'Ruang_jenis' ||
                            $uri2 == 'Ruang' ||
                            $uri2 == 'User' ||
                            $uri2 == ''
                            )? "active":""?>">
    <a href="#"><span class="fa fa-list"></span> <span class="xn-text">Master Data</span></a>
    <ul>
        <li <?= ($uri2 == 'Ruang_jenis' || 
                 $uri2 == 'Ruang' ||
                 $uri2 == ''
                 )? "class='active'":""?>>
            <a href="#"><span class="fa fa-list"></span>Ruang</a>
            <ul>
                <li <?= ($uri2 == 'Ruang_jenis')? "class='active'":""?>><a href="{admin_url}Ruang_jenis"><span class="fa fa-arrow-circle-o-right"></span>Ruang Jenis</a></li>
                <li <?= ($uri2 == 'Ruang')? "class='active'":""?>><a href="{admin_url}Ruang"><span class="fa fa-arrow-circle-o-right"></span>Ruang</a></li>
            </ul>
        </li>        
        <li <?= ($uri2 == 'Layanan')? "class='active'":""?>><a href="{admin_url}Layanan"><span class="fa fa-arrow-circle-o-right"></span>Layanan</a></li>
        <li <?= ($uri2 == 'User')? "class='active'":""?>><a href="{admin_url}User"><span class="fa fa-arrow-circle-o-right"></span>User</a></li>
    </ul>
</li>
<!-- END MASTER DATA -->
<? endif ?>


<? if($this->session->userdata('user_grup_id') !== 0): ?>
<!-- START LAYANAN -->
<li class="xn-openable <?= ($uri2 == 'Ruang_layanan' ||
                            $uri2 == 'Call_customer'
                            )? "active":""?>">
    <a href="#"><span class="fa fa-list"></span> <span class="xn-text">Layanan</span></a>
    <ul>
        <li <?= ($uri2 == 'Call_customer')? "class='active'":""?>><a href="{admin_url}Call_customer"><span class="fa fa fa-bullhorn"></span>Panggil Customer</a></li>
        <li <?= ($uri2 == 'Ruang_layanan')? "class='active'":""?>><a href="{admin_url}Ruang_layanan"><span class="fa fa-cogs"></span>Ruang Layanan</a></li>
    </ul>
</li>
<!-- END LAYANAN -->
<? endif ?>

<!-- START LAPORAN  -->
<li class="xn-openable <?= ($uri2 == 'Lap_data_antrian' ||
                            $uri2 == 'Lap_data_antrian_staff'
                            )? "active":""?>">
    <a href="#"><span class="fa fa-list"></span> <span class="xn-text">Laporan</span></a>
    <ul>
        <? if($this->session->userdata('user_grup_id') == 0): ?>
            <li <?= ($uri2 == 'Lap_data_antrian')? "class='active'":""?>><a href="{admin_url}Lap_data_antrian"><span class="fa fa-arrow-circle-o-right"></span>Data Antrian</a></li>
        <? else :?>
            <li <?= ($uri2 == 'Lap_data_antrian_staff')? "class='active'":""?>><a href="{admin_url}Lap_data_antrian_staff"><span class="fa fa-arrow-circle-o-right"></span>Data Antrian</a></li>
        <? endif ?>
    </ul>
</li>
<!-- END LAPORAN -->