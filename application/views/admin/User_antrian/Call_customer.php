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
                                    <div class="col-md-6">
                                        <button id="call" class="btn btn-info btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="Panggil Customer" data-original-title="Panggil Customer">
                                            <b><i class="fa fa-bullhorn"></i> CALL</b>
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button id="recall" class="btn btn-warning btn-block btn-lg" data-toggle="tooltip" data-placement="top" title="Panggil Kembali Customer" data-original-title="Panggil Kembali Customer">
                                            <b><i class="fa fa-bullhorn"></i> RECALL</b>
                                        </button>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-default" href="{admin_url}dashboard">Kembali</a>
                                </div>                                
                            </div>
                            <!-- END BASIC TABLE SAMPLE -->
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-list"></i> Antrian Customer <?= date('d M Y') ?></h3>
                                </div>
                                <div class="panel-body">
                                    <? if($this->User_antrian->get_list_belum_terlayani($this->session->userdata('user_grup_id'))): ?>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NO. Antrian</th>
                                                    <th class="text-center">Ambil Antrian</th>
                                                    <th class="text-center">Lama Tunggu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <? $no=1; foreach($this->User_antrian->get_list_belum_terlayani($this->session->userdata('user_grup_id')) as $row): ?>
                                                    <tr class="active">
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row->no_antrian ?></td>
                                                        <td class="text-center"><?= date_format(date_create($row->ambil_antrian),'H:s:i'); ?></td>
                                                        <td class="text-center <? if($row->lama_tunggu) ?>"><?= $row->lama_tunggu ?></td>
                                                    </tr>
                                                <? endforeach ?>
                                            </tbody>
                                        </table>
                                    <? else: ?>
                                        <p>Tidak ada antrian Customer!</p>
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

                <div id="antrian_harian"></div>

<script type="text/javascript">


    $("#get_antrian_customer").click(function(){
        $.ajax({
            url: '{admin_url}User_antrian/get_antrian_customer',
            data: {jenis_panggilan: <?= $this->session->userdata('user_grup_id') ?>},
            dataType: 'json',
            method: 'POST',
            success: function(data) {
                var obj = parseJSON( '{ "name": "John" }' );
                alert( obj.name === "John" );                
                // $('#antrian_harian').html(data);
                /*var obj = data;
                $.each( obj, function( key, value ) {
                    alert( key + ": " + value );
                });*/
            },
            error: function(data) {
                alert("error")
            }
        });        
    });

    $("#call").click(function(){
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

    $("#recall").click(function(){
        $.ajax({
            url: '{admin_url}User_antrian/recall_antrian',
            data: {jenis_id : <?= $this->session->userdata('user_grup_id') ?>},
            dataType: 'json',
            method: 'post',
            success: function(data) {
                if(data == null){
                    sweetAlert("Maaf tidak ada antrian");
                } else {
                    swal({   title: data,   text: "Proses Berhasil.",   type: "success", timer: 1500,   showConfirmButton: false });
                }
            }
        });
    });    
</script>