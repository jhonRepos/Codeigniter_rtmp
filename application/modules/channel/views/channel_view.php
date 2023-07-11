





  <!-- Content Wrapper. Contains page content -->
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
          
          <div class="col-md-6">
          <form class="form-horizontal" action="channel/add" method="POST" enctype="multipart/form-data">
            <div class="card card-gray mt-3"  style="border-radius: 20px;">
            
                <div class="card-header">
                
                <h3 class="card-title">ADD CHANNEL</h3>
                </div>
                
                    <div class="card-body">
           
                    <div class="form-group ">
                        <label >CATEGORY </label> 
                        <?php echo $this->session->flashdata('category'); ?>	
                        <div class="input-group">
                            <select  class="form-control" name="category">
                                <option value='' >Select Category</option>
                                <option value='local'>Local Channel</option>
                                <option value='cable'>Cable Channel</option>
                            </select>
						</div>
                    </div>

                    <div class="form-group ">
                        <label >NAME </label> 
                        <?php echo $this->session->flashdata('name'); ?>	
                        <div class="input-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="NAME" value="<?php echo $this->session->flashdata('nameVal'); ?>">
						</div>
                    </div>

                    <div class="form-group ">
                        <label >URL </label> 
                        <?php echo $this->session->flashdata('url'); ?>	
                        <div class="input-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="<?php echo $this->session->flashdata('urlVal'); ?>">
						</div>
                    </div>
                    <div class="form-group ">
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

                    <div class="float-right">
                    <button type="submit" class="btn btn-info">Enter</button>
                    
                        </div>
                    </div>
                
                
                </div>
                </form>
            </div>
            <div class="col-md-6">
            	<div class="card card-gray mt-3"  style="border-radius: 50px;">
                    <div class="card-header">
                    	<h3 class="card-title">CHANNEL LIST</h3>
                    </div>
                  	<div class="card-body table-responsive" > 
                               
                				<table id="cattable" style="width:100%;" class="table  table-bordered table-hover table-striped">
                                   <thead>
                              			<tr>
                              			  <th>Channel banner </th>
                                            <th>Channel Name </th>
                                            <th>Category Url</th>  
                                             <th>Action</th>                         
                                          </tr>
                                        </thead>
                                        <tbody>    
                                        </tbody>
                                    </table>
                       </div>
                   </div>
            </div>
            
        </div>
       
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <style>

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
</style>

