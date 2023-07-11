





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
    
          <div class=" col-12">

          <h1><?php echo $video->vidTitle; ?></h1>
<!--             <video width="640" height="480" controls> -->
<!--             <source src="https://rtmp.jomalig.com:8443/video/testingvod.json/master.m3u8" -->
<!-- 			type="application/x-mpegURL"> -->
			
				<video id=vod1 width=640 height=300 class="video-js vjs-default-skin "
		controls>
		<?php     $split= explode('.' ,$video->vidName);  $scr='https://rtmp.jomalig.com:8443/video/'.$split[0].'.json/master.m3u8'?>
		<source src="<?php echo $scr?>"
			type="application/x-mpegURL">
			
                <source src="<?php echo base_url('public/uploads/movie/'.$video->catId.'/'.$video->vidName); ?>"type="video/mp4">
                	<track kind="captions" src="<?php echo base_url('public/uploads/subs/'.$video->vibSubtitle); ?>"
							srclang="en" label="English" default>
			
            </video>
                  

          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


