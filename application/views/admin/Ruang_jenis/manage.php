                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{admin_url}Ruang_jenis/save" class="form-horizontal" method="POST">
                                <input type="hidden" name="id" value="{id}"/>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> {title}</h3>                                    
                                    </div>
                                    <div class="panel-body">                                    
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Nama Ruang Jenis</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="jenis_ruang" value="{jenis_ruang}"/>
                                                </div>
                                                <span class="help-block error-msg"><?= form_error('jenis_ruang') ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Kode Ruang Jenis</label>
                                            <div class="col-md-3 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="kode_ruang" value="{kode_ruang}"/>
                                                </div>
                                                <span class="help-block error-msg"><?= form_error('kode_ruang') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-default" href="{admin_url}Ruang_jenis">Kembali</a>                                    
                                        <button class="btn btn-primary pull-right" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->