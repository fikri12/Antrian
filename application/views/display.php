<?php $service = array(1 => 'CS', 2 => 'T'); $service_class = array(1 => 'cust-service', 2 => 'teller');  ?>
<ul class="list-bar list-unstyled" id="board">
	<li class="current-call">
		<div  class="col-lg-7 col-sm-7 col-xs-7 text-left kill-padding-left cc-left-cust">
			<h1 id="curr_number"><?= (count($antrian_list) > 0)? $antrian_list[0]->no_antrian : "A-000" ?></h1>
			<p>No. Antrian Saat Ini</p>			
		</div>
		<div class="col-lg-5 col-sm-5 col-xs-5 text-left kill-padding-right cc-right-cust">
			<div class="clearfix">
				<div class="col-lg-7 col-sm-7 col-xs-7 kill-padding-left">
					<p class="text-white">Ke Loket</p>
				</div>
				<div  class="col-lg-5 col-sm-5 col-xs-5 kill-padding-left">
					<h1 id="curr_loket" class="text-white"><?= (count($antrian_list) > 0)? $service[$antrian_list[0]->jenis_panggilan]."-".$antrian_list[0]->ruang_id : "CS-0" ?></h1>
				</div>
			</div>
		</div>
	</li>
	<li class="default-label">						
		<div class="col-lg-6 col-sm-6 col-xs-6">
			<h4 class="text-center text-blue">Antrian </h4>
		</div>			
		<div class="col-lg-6 col-sm-6 col-xs-6">
			<h4 class="text-center text-blue">Loket</h4>
		</div>						
	</li>
    <?php foreach($antrian_list as $row){?>
    <li class="<?= $service_class[$row->jenis_panggilan] ?>">						
		<div class="col-lg-7 col-sm-7 col-xs-7">
			<h1><?= $row->no_antrian?></h1>
		</div>
		<div class="col-lg-2 col-sm-2 col-xs-2">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</div>
		<div class="col-lg-3 col-sm-3 col-xs-3">
			<h1 class="text-center"><?= $service[$row->jenis_panggilan] ?>-<?= $row->ruang_id ?></h1>
		</div>						
	</li>
    <?php } ?>

</ul>



<script  type="text/javascript">
/*
   function queue_sounds(sounds){

    var index = 0;
    function recursive_play()
    {
      if(index+1 === sounds.length)
      {
        alert("hihihi");
        play(sounds[index],update_antrian());
      }
      else
      {
        alert("hahaha");
        play(sounds[index],function(){index++; recursive_play();});
      }
    }

recursive_play();   
}
function play(audio, callback) {

audio.play();
if(callback)
{
    audio.onended = callback;
}
}*/

    function play(audio, callback) {
      audio.play();
      if (callback) {
        //When the audio object completes it's playback, call the callback
        //provided      
        audio.addEventListener('ended', callback);
      }
    }

    //Changed the name to better reflect the functionality
    function play_sound_queue(sounds) {
      var index = 0;
      function recursive_play() {
        //If the index is the last of the table, play the sound
        //without running a callback after       
        if (index + 1 === sounds.length) {
          play(sounds[index], update_antrian);
        } else {
          //Else, play the sound, and when the playing is complete
          //increment index by one and play the sound in the 
          //indexth position of the array
          play(sounds[index], function() {
            index++;
            recursive_play();
          });
        }
      }

      //Call the recursive_play for the first time
      recursive_play();
    }

var antrian_id = 0;
var path = 'assets/sounds/';
var tingtong     = path + 'tingtong.wav';
var no_antrian   = path + 'no_antrian.wav';
var ke           = path + 'ke.wav';
var belas        = path + 'belas.wav';
var puluh        = path + 'puluh.wav';
var ratus        = path + 'ratus.wav';
var sound_a      = path + 'a.mp3';
var sound_b      = path + 'b.mp3';
var sound_c      = path + 'c.mp3';

var service_sound = [] ;
service_sound[1]     = path + 'cs.mp3';
service_sound[2]     = path + 'teller.mp3';

var number_sound = [] ;
number_sound[0]     = path + '0.wav';
number_sound[1]     = path + '1.wav';
number_sound[2]     = path + '2.wav';
number_sound[3]     = path + '3.wav';
number_sound[4]     = path + '4.wav';
number_sound[5]     = path + '5.wav';
number_sound[6]     = path + '6.wav';
number_sound[7]     = path + '7.wav';
number_sound[8]     = path + '8.wav';
number_sound[9]     = path + '9.wav';
number_sound[10]    = path + '10.wav';
number_sound[11]    = path + '11.wav';
number_sound[100]   = path + '100.wav';
number_sound[1000]  = path + '1000.wav';

var sound_call = [new Audio(tingtong),new Audio(no_antrian)];

function puluhan(no_antrian){
    if(no_antrian <= 11 ){
        sound_call.push(new Audio(number_sound[no_antrian]));
    }else if(no_antrian >= 12 && no_antrian <= 19){
        sound_call.push(new Audio(number_sound[parseInt(String(no_antrian).substr(1,1))]));
        sound_call.push(new Audio(belas));
    }else if(no_antrian >= 20){
        sound_call.push(new Audio(number_sound[parseInt(String(no_antrian).substr(0,1))]));
        sound_call.push(new Audio(puluh));
        if(String(no_antrian).substr(1,2) != '0'){
            sound_call.push(new Audio(number_sound[parseInt(String(no_antrian).substr(1,2))]));
        }
    }              
}
function terbilang(no_antrian){
    if(no_antrian < 1){
        return
    }else if(no_antrian < 100){
        puluhan(no_antrian);
    }else if(no_antrian < 1000){
        if(parseInt(no_antrian / 100) == 1){
            sound_call.push(new Audio(number_sound[100]));
        }else{
            var ratusan = parseInt(no_antrian / 100);
            terbilang(ratusan);
            sound_call.push(new Audio(ratus));
        }
        terbilang(no_antrian % 100);
    }
}
function proses_antrian(data){
    antrian_id = data.id
    var txt_antrian = data.no_panggilan;
    var huruf = txt_antrian.substr(0, 1);
    var no_antrian = parseInt(txt_antrian.substr(1, 3));
    if(huruf == 'A'){
        sound_call.push(new Audio(sound_a));
    }else if(huruf == 'B'){
        sound_call.push(new Audio(sound_b));
    }else if(huruf == 'C'){
        sound_call.push(new Audio(sound_c));
    }
    terbilang(no_antrian);
    sound_call.push(new Audio(ke));
    sound_call.push(new Audio(service_sound[parseInt(data.jenis_panggilan)]));
    terbilang(data.ruang_id);
    play_sound_queue(sound_call);
}
function proses_display(data,curr_number,curr_service,curr_loket){
    var services = [];
    services[1] = "CS"
    services[2] = "T"
    
    var services_class = [];
    services_class[1] = "cust-service"
    services_class[2] = "teller"
    
    $("#curr_number").text(curr_number);
    $("#curr_loket").text(services[curr_service] + '-' + curr_loket);
    
    $(".cust-service").remove();
    $(".teller").remove();
    
    $("#board").append('<li class="' + services_class[curr_service] + '"><div class="col-lg-7 col-sm-7 col-xs-7"><h1>' + curr_number + '</h1></div><div class="col-lg-2 col-sm-2 col-xs-2"><span class="glyphicon glyphicon-chevron-right"></span></div><div class="col-lg-3 col-sm-3 col-xs-3"><h1 class="text-center">' + services[curr_service] + '-' + curr_loket +'</h1></div></li>');      
    
    $.each( data, function( key, row ) {
      if(row.jenis_panggilan !== curr_service ) {
        $("#board").append('<li class="'+ services_class[row.jenis_panggilan] + '"><div class="col-lg-7 col-sm-7 col-xs-7"><h1>' + row.no_antrian + '</h1></div><div class="col-lg-2 col-sm-2 col-xs-2"><span class="glyphicon glyphicon-chevron-right"></span></div><div class="col-lg-3 col-sm-3 col-xs-3"><h1 class="text-center">' + services[row.jenis_panggilan] + '-' + row.ruang_id +'</h1></div></li>');        
      }
    });
        


}
function startWorker() {
    if(typeof(Worker) !== "undefined") {
        if(typeof(w) == "undefined") {
            w = new Worker("{js_path}antrian.js");
            
        }
        w.postMessage({'cmd': 'start' ,'msg': '{site_url}display/get_antrian'});
        w.onmessage = function(event) {
            //console.log(event.data);
            proses_antrian(event.data);
            proses_display(event.data.antrian_list,event.data.no_antrian,event.data.jenis_panggilan,event.data.ruang_id);
            w.terminate();
            w = undefined;
        };
        w.onerror = function(event) {
            window.location.reload();
        };
    } else {
        alert("Sorry, your browser does not support Web Workers");
    }
}
function update_antrian()
{
     sound_call = [new Audio(tingtong),new Audio(no_antrian)];
     $.ajax({
      url: '{site_url}display/update_antrian',
      data: {id : antrian_id},
      dataType: 'json',
      method: 'post',
      success: function(data) {
        startWorker();
      }
    });
}
startWorker();
</script>