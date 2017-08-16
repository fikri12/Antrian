                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{admin_url}Ruang/save" class="form-horizontal" method="POST">
                                <input type="hidden" name="id" value="{id}"/>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> {title}</h3>                                    
                                    </div>
                                    <div class="panel-body">                                    
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Nama Ruang</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="nama_ruang" value="{nama_ruang}"/>
                                                </div>
                                                <span class="help-block error-msg"><?= form_error('nama_ruang') ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Ruang Jenis</label>
                                            <div class="col-md-6 col-xs-12">                                                                 
                                                <select class="form-control" name="jenis_id" data-live-search="true">
                                                    <option>Pilih Opsi</option>
                                                    <? foreach($this->Ruang->get_mruang_jenis() as $r): ?>
                                                        <option value="<?= $r->id ?>" <?= ($r->id == $jenis_id) ? 'selected' : '' ?> ><?= $r->jenis_ruang ?></option>
                                                    <? endforeach ?>
                                                </select>
                                                <span class="help-block error-msg"><?= form_error('jenis_id') ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Kode Ruang</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control" name="kode" value="{kode}"/>
                                                </div>
                                                <span class="help-block error-msg"><?= form_error('kode') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-default" href="{admin_url}Ruang">Kembali</a>                                    
                                        <button class="btn btn-primary pull-right" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->