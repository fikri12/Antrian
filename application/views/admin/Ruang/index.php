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
                                    <ul class="panel-controls">
                                        <li><a href="{admin_url}Ruang/add_new"><span class="fa fa-plus"></span></a></li>
                                    </ul>                                    
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>Nama Ruang</th>
                                                <th>Jenis Ruang</th>
                                                <th width="15%" class="text-center">Kode Ruang</th>
                                                <th width="15%" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <? $no=1; foreach($get_mruang as $r): ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $r->nama_ruang ?></td>
                                                    <td><?= $r->jenis_ruang ?></td>
                                                    <td class="text-center"><?= $r->kode ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-info btn-xs" href="{admin_url}Ruang/edit/<?= $r->id ?>"><i class="fa fa-pencil"></i></a>
                                                            <a href='{admin_url}Ruang/Remove/<?= $r->id ?>' class='btn btn-danger btn-xs' title='Hapus' onclick="return confirm('{deleteconfirmmsg}');"><i class='fa fa-trash-o'></i></a>
                                                        </div>
                                                    </td>
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