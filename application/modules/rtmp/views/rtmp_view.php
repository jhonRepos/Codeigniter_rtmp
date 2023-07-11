





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <div class=" col-6">
          <h1>Channel Lists</h1>

                    <ul>
                        <?php $count=1; foreach ($channels as $channel) {?>
                            <li>
                                <a href="<?php echo base_url('rtmp/play/' . $channel->id); ?>">
                                    <?php echo $count++.'-'.$channel->name; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
          </div>
          <div class=" col-6" style="  border-style: solid;border-color:gray;   border-radius: 20px;">
            <form class="form-horizontal" action="rtmp/add" method="POST">
                    <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">NAME</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="NAME">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-2 col-form-label">URL</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="url"  name="url" placeholder="URL">
                        </div>
                    </div>
                    <div class="float-right">
                    <button type="submit" class="btn btn-info">Enter</button>
                    
                        </div>
                    </div>
                
                </form>
            </div>

            
        </div>
       
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
 

