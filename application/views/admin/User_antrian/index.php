                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <?= error_success($this->session) ?>
                            <? if($error != '') echo error_message($error) ?>
                            <!-- START BASIC TABLE SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-list"></i> {title}</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>NO. Antrian</th>
                                                <th style="display:none">Ambil Antrian</th>
                                                <th class="text-center">Aksi</th>
                                                <th style="display:none">id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <? $no=1; foreach($get_user_antrian as $r): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $r->no_antrian ?></td>
                                                    <td style="display:none"><?= $r->ambil_antrian ?></td>
                                                    <td class="text-center">
                                                        <a class="on-default edit-row" title='Proses' data-toggle="modal" data-target="#modal_jenis_layanan" id="jenis_layanan" href="#"><i class="fa fa-arrow-up"></i></a>
                                                    </td>
                                                    <td style="display:none"><?= $r->id ?></td>
                                                </tr>
                                            <? endforeach ?>
                                        </tbody>
                                    </table>                                
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
                    <div class="modal-dialog">
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
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="no_antrian" id="no_antrian" value="" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Layanan :</label>
                                        <div class="col-md-6 col-xs-12">                                                                 
                                            <select class="form-control" name="layanan_id" id="layanan_id" data-live-search="true">
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
        $.ajax({
            url:'{site_url}index.php/admin/User_antrian/update_layanan_id',
            data: {
                id:             $("#id_antrian_harian").val(),
                layanan_id:     $("#layanan_id option:selected").val(),
                no_antrian:     $("#no_antrian").val(),
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
        
        $("#rowindex").val($(this).closest('tr')[0].sectionRowIndex);
        $("#number").val($(this).closest('tr').find("td:eq(0)").html());
        
        $("#no_antrian").val($(this).closest('tr').find("td:eq(1)").html());
        $("#id_antrian_harian").val($(this).closest('tr').find("td:eq(4)").html());
        return false;
    });                    
</script>