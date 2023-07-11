<!DOCTYPE html>
<html>
<head>
<link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
<link href="https://unpkg.com/videojs-seek-buttons@2.2.0/dist/videojs-seek-buttons.css" rel="stylesheet" />
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
   
  


</head>

<body>




	<!-- Player Live1 Start -->
	<video id=live1 width=640 height=300 class="video-js vjs-default-skin"
		controls autoplay muted>
		<source src="https://rtmp.jomalig.com:1888/hls/live.m3u8"
			type="application/x-mpegURL">
	</video>
	<!-- Player Live1 End -->
	<!-- Player Live2 Start -->
	<video id=live2 width=640 height=300 class="video-js vjs-default-skin"
		controls autoplay muted>
		<source src="https://rtmp.jomalig.com:1888/hls2/live.m3u8"
			type="application/x-mpegURL">
	</video>
	<!-- Player Live2 End -->
	<!-- Player VOD Start-->
	<video id=vod1 width=640 height=300 class="video-js vjs-default-skin"
		controls>
		<source src="https://rtmp.jomalig.com:8443/video/testingvod.json/master.m3u8"
			type="application/x-mpegURL">
		<track kind="captions" src="/public/uploads/subs/testinglangto.vtt"
			srclang="en" label="English" default>
	
	</video>
	<!-- Player VOD End-->
	<video id=vod2 width=640 height=300 class="video-js vjs-default-skin  " data-setup='{ "poster": "https://image.tmdb.org/t/p/original/lkQwySSjhgLPCtkdmMUOt7iPu8.jpg"}'
		controls>
		<source src="https://rtmp.jomalig.com:8443/video/john_wick_2014.json/master.m3u8"
			type="application/x-mpegURL">
<!-- 		<track kind="captions" src="/public/uploads/subs/testinglangto.vtt" -->
<!-- 			srclang="en" label="English" default> -->
	
	</video>









	<style>
body {
	margin-top: 20px;
	background: #222;
	background: radial-gradient(#333, hsl(200, 30%, 6%));
}

.vjs-tech {
	pointer-events: none;

}
</style>
  
	<script src="https://vjs.zencdn.net/7.8.4/video.js"></script>
	<script src="https://vjs.zencdn.net/7.8.4/video.css"></script>
	<script type="text/javascript" src="https://unpkg.com/videojs-seek-buttons@2.2.0/dist/videojs-seek-buttons.js"></script>
	<script>
		var player = videojs('live1');
		player.play();
  		player.controlBar.removeChild(player.controlBar.getChild('PictureInPictureToggle'));
	</script>

	<script>
		var player = videojs('live2');
		player.play();
                player.controlBar.removeChild(player.controlBar.getChild('PictureInPictureToggle'));
	</script>

	<script>
		var player = videojs('#vod1');
//		player.play();
		player.controlBar.removeChild(player.controlBar.getChild('PictureInPictureToggle'));
		player.seekButtons({
		    forward: 10,
		    back: 10
		});
		
	


	</script>
	
	<script>
		var player = videojs('#vod2');
		player.play();
                player.controlBar.removeChild(player.controlBar.getChild('PictureInPictureToggle'));
                player.seekButtons({
                    forward: 10,
                    back: 10
                });

	</script>
	









</body>
</html>
