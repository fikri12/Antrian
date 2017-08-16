                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{admin_url}User/save" class="form-horizontal" method="POST">
                                <input type="hidden" name="id" value="{id}"/>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> {title}</h3>                                    
                                    </div>
                                    <div class="panel-body">                                    
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Nama Depan</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="nama_depan" value="{nama_depan}"/>
                                                </div>
                                                <span class="help-block error-msg"><?= form_error('nama_depan') ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Nama Belakang</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="nama_belakang" value="{nama_belakang}"/>
                                                </div>
                                                <span class="help-block error-msg"><?= form_error('nama_belakang') ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin</label>
                                            <div class="col-md-6 col-xs-12">                                                                 
                                                <select class="form-control select" name="jenkel">
                                                    <option value="0">Laki-laki</option>
                                                    <option value="1">Perempuan</option>
                                                </select>
                                                <span class="help-block error-msg"><?= form_error('jenkel') ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>  
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    <input class="mask_date form-control" value="{tgllahir}" type="text" name="tgllahir">
                                                </div>
                                                <span class="help-block error-msg"><?= form_error('tgllahir') ?></span>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                            <div class="col-md-6 col-xs-12">
                                                <textarea class="form-control" rows="4" name="alamat">{alamat}</textarea>
                                                <span class="help-block error-msg"><?= form_error('alamat') ?></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-default" href="{admin_url}User">Kembali</a>                                    
                                        <button class="btn btn-primary pull-right" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->