





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
    
          <div class=" col-12">

          <h1><?php echo $channel->name; ?></h1>
            <video width="640" height="480" controls>
                <source src="https://rtmp.jomalig.com:1888/hls/live.m3u8'" type="application/x-mpegURL">
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


