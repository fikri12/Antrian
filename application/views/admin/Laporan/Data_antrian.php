                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" action="{admin_url}Lap_data_antrian?aksi=get_data_laporan_antrian" method="POST">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-list"></i> {title}</h3>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">

                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Tanggal Awal : </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" name="tgl_awal" value="<?= (isset($_POST['tgl_awal'])) ? set_value('tgl_awal') : date('Y-m-01') ?>">                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Tanggal Akhir : </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" name="tgl_akhir" value="<?= (isset($_POST['tgl_akhir'])) ? set_value('tgl_akhir') : date('Y-m-t') ?>"> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Panggilan : </label>
                                                <div class="col-md-9">                                                               
                                                    <select class="form-control select" name="panggilan[]" multiple>
                                                        <? foreach($this->Laporan->get_mruang_jenis() as $row): ?>
                                                            <option value="<?= $row->id ?>" <?php echo set_select('panggilan[]',$row->id, ( !empty($data) && $data == $row->id ? TRUE : FALSE )); ?> ><?= $row->jenis_ruang ?></option>
                                                        <? endforeach ?>
                                                    </select>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ruang : </label>
                                                <div class="col-md-6">                                                                                            
                                                    <select class="form-control select" name="ruang[]" multiple>
                                                        <? foreach($this->Laporan->get_mruang() as $row): ?>
                                                            <option value="<?= $row->id ?>" <?php echo set_select('ruang[]',$row->id, ( !empty($data) && $data == $row->id ? TRUE : FALSE )); ?> ><?= $row->nama_ruang ?></option>
                                                        <? endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="check"><input type="checkbox" class="icheckbox" name="exruang"/> Exclude</label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Layanan : </label>
                                                <div class="col-md-6">                                                               
                                                    <select class="form-control select" name="layanan[]" multiple>
                                                        <? foreach($this->Laporan->get_mlayanan() as $row): ?>
                                                            <option value="<?= $row->id ?>" <?php echo set_select('layanan[]',$row->id, ( !empty($data) && $data == $row->id ? TRUE : FALSE )); ?> ><?= $row->jenis_layanan ?></option>
                                                        <? endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="check"><input type="checkbox" class="icheckbox" name="exlayanan"/> Exclude</label>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Jenkel : </label>
                                                <div class="col-md-9">                                                               
                                                    <select class="form-control select" name="jenkel">
                                                        <option value="#" <?php echo set_select('jenkel','#', ( !empty($data) && $data == "#" ? TRUE : FALSE )); ?> >Semua</option>
                                                        <option value="1" <?php echo set_select('jenkel','1', ( !empty($data) && $data == "1" ? TRUE : FALSE )); ?> >Laki-laki</option>
                                                        <option value="0" <?php echo set_select('jenkel','0', ( !empty($data) && $data == "0" ? TRUE : FALSE )); ?> >Perempuan</option>
                                                    </select>
                                                </div>                                                
                                            </div>                                            
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-default" href="{admin_url}dashboard">Kembali</a>                                    
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            <? if($this->input->get('aksi') == 'get_data_laporan_antrian') : ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> Data Laporan Antrian</h3>
                                    </div>
                                    <div class="panel-body">
                                        <? if($laporan): ?>
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No.</th>
                                                        <th width="10%">Tanggal</th>
                                                        <th width="10%">NO. Antrian</th>
                                                        <th width="15%">Panggilan</th>
                                                        <th width="5%">Ruang</th>
                                                        <th width="15%">Layanan</th>
                                                        <th width="10%">Jenkel</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <? $no=1; foreach($laporan as $row): ?>
                                                        <tr class="active">
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row->tanggal ?></td>
                                                            <td><?= $row->no_antrian ?></td>
                                                            <td><?= $row->jenis_ruang ?></td>
                                                            <td><?= $row->nama_ruang ?></td>
                                                            <td><?= $row->jenis_layanan ?></td>
                                                            <td><?= ($row->jenkel == 1) ? "Laki-laki" : "Perempuan" ?></td>
                                                        </tr>
                                                    <? endforeach ?>
                                                </tbody>
                                            </table>
                                        <? else: ?>
                                            <p>Tidak ada antrian Customer!</p>
                                        <? endif ?>
                                    </div>
                                </div>
                            <? endif ?>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->


<script type="text/javascript">

    $("#call").change(function(){
        
        $.ajax({
            url: '{admin_url}User_antrian/call_antrian',
            data: {
                kode : <?= $this->session->userdata('kode_ruang') ?>,
                jenis_id : <?= $this->session->userdata('user_grup_id') ?>,
            },
            dataType: 'json',
            method: 'post',
            success: function(data) {
                if(data == null){
                    sweetAlert("Maaf tidak ada antrian");
                } else {
                    swal({   title: data,   text: "Proses Berhasil.",   type: "success", timer: 1500,   showConfirmButton: false });
                    location.reload();
                }
            },
            error: function(data) {
                alert("error")
            }
        });
    });
</script>                