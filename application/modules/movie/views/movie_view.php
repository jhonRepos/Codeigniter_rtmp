
<div class="content-wrapper">

<?php if(isset($_SESSION['success'])) { ?>

<div class="toast  mt-3 show"  >
                  <div class="toast-body " style="background: #fcd116;" id="toastval">
                    <?php echo $_SESSION['success']; ?>
                  </div>
                </div>
<?php } ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-md-12 mt-3">
         <form  class=" col-md-12" id="uploadform"   action="movie/add" method="POST"  enctype="multipart/form-data">
            <div class="card card-gray">
            	<div class="card-header">
            		<h3 class="card-title">Upload Movie</h3>
            	</div>
            	<div class="card-body">
            		<div class="row">
            			<div class="col-md-6" >
                     	
                            <div class="form-group ">
                                <label >CATEGORY </label> 
                                 <?php echo $this->session->flashdata('category'); ?>	
                                <div class="input-group">
                                    <select  class="form-control" name="category" id="category">
                                        <option value='' selected >Select Category</option>
                                        <?php foreach($category as $row) {?>
                                        <option value='<?php echo $row->catId?>'><?php echo $row->catName?></option>
                                        <?php }?>
                                        
                                    </select>
        						</div>
                            </div>
                              <div class="form-group ">
                                <label >TITLE </label> 
                               <?php echo $this->session->flashdata('title'); ?>	
                                <div class="input-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $this->session->flashdata('titleVal'); ?>">
        						</div>
                        	</div>
                            <div class="form-group ">
                                <label >DESCRIPTION </label> 
                               <?php echo $this->session->flashdata('description'); ?>	
                                <div class="input-group">
                                <textarea class="form-control" rows="3" placeholder="Description ..."  id="description" name="description" value="<?php echo $this->session->flashdata('descriptionVal'); ?>"></textarea>
<!--                                 <input type="text" class="form-control" placeholder="description" > -->
        						</div>
                        	</div>
                             <div class="form-group ">
                                <label >DURATION (per mins) </label> 
                               <?php echo $this->session->flashdata('duration'); ?>	
                                <div class="input-group">
                                <input type="number" class="form-control" id="duration" name="duration"  value="<?php echo $this->session->flashdata('durationVal'); ?>">
        						</div>
                        	</div>
                                 	
                         </div>
                         <div class="col-md-6">
                           <!-- video  -->
                                <div class="card card-primary card-outline">
                                  <div class="card-body box-profile">   
                                     <?php echo $this->session->flashdata('video_nameses'); ?>	
                                    <h5 class="profile-username text-center" style="font-size:40px;" ><i class="fas fa-photo-video"></i> Upload Movie</h5>

                                    <br>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <input name="video_name" id="video_name" readonly="readonly" type="file" accept="video/*" />
                                       <input name="video_nameses"  id="video_nameses"  type="text" value="<?php echo $this->session->flashdata('video_namesesVal'); ?>" />
                                       </div> 
                                       <div class="col-md-6">
                                        <button class="btn btn-success btn-sm float-right " name="video_upload" id="video_upload" type="button" /><i class="fas fa-arrow-up"></i> UPLOAD</button>
                                       </div>
                                    </div>
                    
                                   
                                  </div>
                                      <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <center><div id="uploadStatus"></div></center>
                                </div>
                                <div class="row">
                                	 <div class="card card-primary card-outline pl-4  col-md-5" >
                                 	   		<div class="form-group">
                                                <label >THUMBNAIL </label> 
                                                <?php echo $this->session->flashdata('thumbnail'); ?>	
                                                <div class="input-group">
                                                    
                                                <input type="file" size="20" oninput="pic.src=window.URL.createObjectURL(this.files[0])"   name="thumbnail">
                        						</div>
                                            </div>   
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                <img id="pic" width="100px" height="100px" > 
                                                </div>
                                            </div>
                            			</div>
                            			<div  class="col-md-1 ">
                            			</div >
                            			 <div class="card card-primary card-outline pl-4 col-md-5" >
                                 	   		<div class="form-group">
                                                <label >SUBTITLE </label> 
                                                <?php echo $this->session->flashdata('subtitle'); ?>	
                                                <div class="input-group">
                                                    
                                                <input type="file" size="20"  name="subtitle" accept=".vtt,.srt">
                        						</div>
                                            </div>   
                                            
                            			</div>
                                </div>
                               
                           
                          </div>
            		</div>
            	</div>
            	<div class="card-footer">
            	
            		<div class="col-12 pt-2 " >           
                       <center><button type="submit" class="btn btn-info "><i class="fas fa-plus"></i> ADD MOVIE</button></center>
                	 </div>
                	 
                	 
                	
                	 
                	 
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
 <style>
table, tr,th,td{
border:1px solid gray;

}
.toast {
    position: fixed;
    top: 10;
    right: 0;
    z-index:2;
    height:auto;
    font-size: 20px;
    border-color: white;
    animation: shake 0.5s;
 text-transform: uppercase;

 }
     .col-md-4 {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

      