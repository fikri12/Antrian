                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <?= error_success($this->session) ?>
                            <? if($error != '') echo error_message($error) ?>
                            <!-- START BASIC TABLE SAMPLE -->
                            <div class="panel panel-colorful">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-list"></i> {title}</h3>
                                </div>
                                <div class="panel-body">
                                    <? if($this->User_antrian->get_user_ruang_layanan()): ?>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NO. Antrian</th>
                                                    <th style="display:none">Ambil Antrian</th>
                                                    <th width="10%" class="text-center">Aksi</th>
                                                    <th style="display:none">id</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <? foreach($this->User_antrian->get_user_ruang_layanan() as $row): ?>
                                                    <tr class="active">
                                                        <td><?= $row->no_antrian ?></td>
                                                        <td style="display:none"><?= $row->ambil_antrian ?></td>
                                                        <td class="text-center">
                                                            <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_jenis_layanan" id="jenis_layanan" href="#" data-backdrop="static" data-keyboard="false">Mulai Layanan</a>
                                                        </td>
                                                        <td style="display:none"><?= $row->id ?></td>
                                                    </tr>
                                                <? endforeach ?>
                                            </tbody>
                                        </table>
                                    <? else: ?>
                                        <p>Tidak ada Customer yang dilayani!</p>
                                    <? endif ?>
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-default" href="{admin_url}dashboard">Kembali</a>
                                </div>                                
                            </div>
                            <!-- END BASIC TABLE SAMPLE -->
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->


                <div class="modal" id="modal_jenis_layanan" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <form action="" class="form-horizontal" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="defModalHead">Jenis Layanan</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_antrian_harian" id="id_antrian_harian" value=""/>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">No. Antrian :</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin :</label>
                                        <div class="col-md-3 col-xs-12">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jenkel" id="jenkel" value="1"> Laki-laki
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-12">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jenkel" id="jenkel" value="0"> Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>                                                            
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tipe Customer :</label>
                                        <div class="col-md-9 col-xs-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="0" name="tipe_customer"> Baru</label>
                                                <span class="help-block error-msg"></span>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Layanan :</label>
                                        <div class="col-md-9 col-xs-12">                                                                 
                                            <select class="form-control select" name="layanan_id" id="layanan_id" data-live-search="true">
                                                <option>Pilih Opsi</option>
                                                <? foreach($this->User_antrian->get_mlayanan() as $r): ?>
                                                    <option value="<?= $r->id ?>"><?= $r->jenis_layanan ?></option>
                                                <? endforeach ?>
                                            </select>
                                            <span class="help-block error-msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="update_layanan_id">Simpan</button>
                                </div>                            
                            </div>
                        </from>
                    </div>
                </div>

<script type="text/javascript">
    // update layanan_id
    $("#update_layanan_id").click(function(e) {
        e.preventDefault();
        var tipe_customer = 0;
        if($("#tipe_customer").val() == 1) {
            tipe_customer = 1;
        }        
        $.ajax({
            url:'{site_url}index.php/admin/User_antrian/update_layanan_id',
            data: {
                id:             $("#id_antrian_harian").val(),
                layanan_id:     $("#layanan_id option:selected").val(),
                no_antrian:     $("#no_antrian").val(),
                jenkel:         $("input[name=jenkel]:checked").val(),
                tipe_customer:  tipe_customer,
            },
            dataType: 'json',
            method: 'POST',
            success:function(data) {
                $(".close").click();
                swal({   title: data,   text: "Proses penyimpanan data.",   type: "success", timer: 1500,   showConfirmButton: false });                
                location.reload();
            }
        });
    });

    // insert jenis layanan
    $(document).on("click","#jenis_layanan",function(){
        var id_antrian_harian = $(this).closest('tr').find("td:eq(3)").html();
        $("#no_antrian").val($(this).closest('tr').find("td:eq(0)").html());
        $("#id_antrian_harian").val(id_antrian_harian);
        
        $.ajax({
            url:'{site_url}index.php/admin/User_antrian/update_dilayani',
            data: {
                id:             id_antrian_harian,
            },
            dataType: 'json',
            method: 'POST'
        });
        return false;
    });
</script>