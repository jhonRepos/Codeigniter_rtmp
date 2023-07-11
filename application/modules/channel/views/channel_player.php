





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
    
          <div class=" col-12">

          <h1><?php echo $channels->name?></h1>
          	<video id=live1 width=640 height=300 class="video-js vjs-default-skin"
            		controls autoplay muted>
            		<source src="<?php echo $channels->url?>"
            			type="application/x-mpegURL">
            	</video>

          </div>
          <!-- ./col -->
        </div>
<!--         <input type="button" value="sample" id="sample">  -->
<!--             <input type="button" value="sample1" id="sample1">  -->
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


