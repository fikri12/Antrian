                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" action="{admin_url}Lap_data_customer?aksi=get_data_laporan" method="POST">
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
                                                        <input type="text" class="form-control datepicker" name="tgl_awal" value="<?= set_value('tgl_awal') ?>">                                            
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Tanggal Akhir : </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker" name="tgl_akhir" value="<?= set_value('tgl_akhir') ?>">                                            
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Panggilan : </label>
                                                <div class="col-md-9">                                                               
                                                    <select class="form-control select" name="panggilan[]" multiple>
                                                        <? foreach($this->Laporan->get_mruang_jenis() as $row): ?>
                                                            <option value="<?= $row->id ?>"><?= $row->jenis_ruang ?></option>
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
                                                            <option value="<?= $row->id ?>"><?= $row->nama_ruang ?></option>
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
                                                            <option value="<?= $row->id ?>"><?= $row->jenis_layanan ?></option>
                                                        <? endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="check"><input type="checkbox" class="icheckbox" name="exlayanan"/> Exclude</label>
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
                            <? if($this->input->get('aksi') == 'get_data_laporan') : ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> Data Laporan Antrian</h3>
                                    </div>
                                    <div class="panel-body">
                                        <? if($laporan): ?>
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tanggal</th>
                                                        <th>NO. Antrian</th>
                                                        <th>Panggilan</th>
                                                        <th>Ruang</th>
                                                        <th>Layanan</th>
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