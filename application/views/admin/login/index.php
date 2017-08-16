<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Login Administrator</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <!-- <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url() ?>admin_template/css/theme-forest-head-light.css"/> -->
        <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url() ?>admin_template/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
            <div class="login-box animated fadeInDown">
				<?php if($error != ''){ ?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<strong>Oops sorry. </strong><?php echo $error ?>
					</div>
				<? } ?>
                <?php if($this->session->flashdata('error_access')){ ?>
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Oops sorry. </strong><?php echo $this->session->flashdata('error_access') ?>
                    </div>
                <? } ?>
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Selamat Datang</strong>, Silahkan login</div>
					<form class="form-horizontal" method="post" action="<?= site_url() ?>admin/login/do_login">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Lupa Password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?= date('Y') ?> Queue
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>