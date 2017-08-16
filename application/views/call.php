<!-- HEADER SECTION START -->
	<section name="header" id="" class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<img src="{images_path}logo.png" class="max-img-default t-xs-padding"/>						
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 bank-data">					
						<h4 class="t-xs-padding"><strong>Kantor Cabang Cimahi</strong></h4>
						<h4>Jalan Amir Machmud no.234, Cimahi | +62 987 654 321</h4>
					</div>		
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="clock">
						<ul class="list-inline clock-bar">
							<li><div id="Date"></div></li>
							<li>
							  <ul class="clock-detail">
								  <li id="hours"></li>
								  <li id="point">:</li>
								  <li id="min"></li>
								  <li id="point">:</li>
								  <li id="sec"></li>
							  </ul>
							</li>
						</ul>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h4 class="text-italic tagline"><strong>Percaya pada keyakinan Anda</strong></h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- HEADER SECTION END -->	
	
	<!-- CONTENT SECTION START -->
	<section name="content" id="" class="content-body">
		<div class="container cont-ticket-no-padding">
			<div class="row">				
				<img class="bg-model-1" src="{images_path}model-1.png"/>
					<h4 class="section-title">Customer Call</h4>
				<div class="col-lg-12 col-md-12 col-sm-12 md-padding">					
					<form>
                      <!--
					  <div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Email">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  </div>-->
					  <div class="form-group">
						<label for="position">Position</label>
                        <select id="ruang_id" name="ruang_id" class="form-control">>
                            <?php foreach($list_loket as $row){ ?>
                                <option value="<?=$row->id?>"><?=$row->nama_ruang?></option>
                            <?}?>
                          
                        </select>
					  </div>
					  <div class="form-group">
						 <div class="row">	
						  <div class="col-lg-6 col-md-6 col-sm-6">
							<button id="call" type="button" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-bullhorn r-xs-padding"></span>Call</button>
						  </div>
						  <div class="col-lg-6 col-md-6 col-sm-6">
							<button id="recall" type="button" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-bullhorn r-xs-padding"></span>Re-Call</button>
						  </div>
						  </div>
					  </div>
					</form>
				</div>
				
			</div>	
		</div>
	</section>
	<!-- CONTENT SECTION END -->
	
	<!-- FOOTER SECTION START -->
	<section name="footer" id="" class="footer">		
		<div class="col-lg-2 col-md-2 col-sm-2 marq-title">
			<h4 class="text-center">Info Terkini MyBank</h4>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 kill-lr-padding">
			<div class="marquee">
			  <p>Selamat Datang, Silahkan mengambil nomor antrian</p>
			  <p>Jam Operasional MyBank Cabang Cimahi Pukul 08.00 - 16.00 WIB</p>
			</div>
		</div>	
	</section>
	<!-- FOOTER SECTION END -->
    
<script type="text/javascript">

$("#call").click(function(){
    $.ajax({
      url: '{site_url}index.php/call/call_antrian',
      data: {kode : $("#ruang_id").val()},
      dataType: 'json',
      method: 'post',
      success: function(data) {
        if(data == null){
            alert("Tidak ada Antrian Baru");
        } else {
        	alert("Berhasil dipanggil");
        }
        
      }
    });
});

$("#recall").click(function(){
    $.ajax({
      url: '{site_url}index.php/call/recall_antrian',
      data: {kode : $("#ruang_id").val()},
      dataType: 'json',
      method: 'post',
      success: function(data) {
        if(data == null){
            alert("Tidak ada Antrian");
        } else {
        	alert("Berhasil dipanggil");
        }
        
      }
    });
});


</script>
 