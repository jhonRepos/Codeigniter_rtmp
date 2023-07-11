
<script>

setTimeout(function () {
             $('.toast').removeClass('show');
             }, 3000);
             
var cattable= $('#cattable').DataTable({

	
    ordering:false,
  	
	 "ajax":{
			   "url": 'channel/fetch',
         
			},

	    
	});
var player = videojs('live1');
		player.play();
		
		
$(document).on('click','#sample',function(){

player.src({
             src: 'https://rtmp.jomalig.com:1888/hls/live.m3u8',
              type: 'application/x-mpegurl'
               });


})
$(document).on('click','#sample1',function(){

player.src({
             src: 'https://rtmp.jomalig.com:1888/hls2/live.m3u8',
              type: 'application/x-mpegurl'
               });


})



</script>