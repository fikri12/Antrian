<!-- HEADER SECTION START -->
	<section name="header" id="" class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="logo">
							<img src="{images_path}logo.png" class="max-img-default t-xs-padding"/>
						</div>						
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 bank-data">					
						<h4 class="t-xs-padding"><strong>Kantor Cabang Cimahi</strong></h4>
						<h4 class="alamat">Jl Amir Machmud no.234, Cimahi | +62 960 5411 854</h4>
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
						<h4 class="text-italic tagline"><strong>Melayani Dengan Setulus Hati</strong></h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- HEADER SECTION END -->	
	
	<!-- CONTENT SECTION START -->
	<section name="content" id="" class="content-body">
		<div class="container cont-ticket">
			<div class="row">				
				<img class="bg-model-1" src="{images_path}model-1.png"/>				
				<div class="col-lg-12 col-md-12 col-sm-12 text-center">					
					<h1><strong>Selamat Datang di BRI</strong></h1>
					<h4 class="b-border">Silahkan ambil nomor antrian sesuai keperluan anda, Terima Kasih!</h4>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 text-center">
					<ul class="list-inline">
						<li><h3 class="text-uppercase">Antrian Terakhir</h3></li>
						<li><h2 id="display_teller"><strong>{last_teller}</strong></h2></li>					
					</ul>
					<button id="teller_button" class="btn btn-success btn-block btn-lg btn-teller">Teller</button>		
					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 text-center">
					<ul class="list-inline">
						<li><h3 class="text-uppercase">Antrian Terakhir</h3></li>
						<li><h2 id="display_cs"><strong>{last_cs}</strong></h2></li>					
					</ul>
					<button id="cs_button" class="btn btn-primary btn-block btn-lg btn-cs">Customer Service</button>
				</div>				
			</div>	
		</div>
	</section>
	<!-- CONTENT SECTION END -->
	
	<!-- FOOTER SECTION START -->
	<section name="footer" id="" class="footer">		
		<div class="col-lg-2 col-md-2 col-sm-3  marq-title">
			<h4 class="text-center">Info Terkini BRI</h4>
		</div>
		<div class="col-lg-10 col-md-9 col-sm-9 kill-lr-padding">
			<div class="marquee">
			  <p>Selamat Datang, Silahkan mengambil nomor antrian</p>
			  <p>Jam Operasional BRI Cabang Cimahi Pukul 08.00 - 16.00 WIB</p>
			</div>
		</div>	
	</section>
	<!-- FOOTER SECTION END -->
<script type="text/javascript">
var state = false;


$("#teller_button").click(function(){
    if(state == false){
        state = true;
        $.ajax({
          url: '{site_url}tiket/get_antrian',
          data: {kode : '2'},
          dataType: 'json',
          method: 'post',
          success: function(data) {
            $("#display_teller").html("<strong>" + data + "</strong>");
            state = false;
            
          }
        });
    }
});

$("#cs_button").click(function(){
    if(state == false){
        state = true;
        $.ajax({
          url: '{site_url}tiket/get_antrian',
          data: {kode : '1'},
          dataType: 'json',
          method: 'post',
          success: function(data) {
            $("#display_cs").html("<strong>" + data + "</strong>");
            state = false;
          }
        });
    }
});

</script>