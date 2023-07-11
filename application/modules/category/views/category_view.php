
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<?php if(isset($_SESSION['success'])) { ?>

<div class="toast  mt-3 show"  >
                  <div class="toast-body " style="background: #fcd116;" id="toastval">
                    <?php echo $_SESSION['success']; ?>
                  </div>
                </div>
<?php } ?>
<div class="toast mt-3 " id="toastajax" >
                  <div class="toast-body " style="background: #fcd116;" id="toastval">
                  
                  </div>
</div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <div class="col-md-6 mt-3">
            <form class="form-horizontal" action="category/add" method="POST">
                <div class="card card-gray">
                	<div class="card-header">
                	  <h3 class="card-title">ADD CATEGORY</h3>
                	</div>
                	 <div class="card-body">

                    <div class="form-group ">
                        <label > CATEGORY NAME </label> 
                        <?php echo $this->session->flashdata('catName'); ?>	
                        <div class="input-group">
                        <input type="text" class="form-control" id="catName" name="catName" placeholder="Name" value="<?php echo $this->session->flashdata('catNameVal'); ?>">
						</div>
                    </div>

                    <div class="form-group ">
                        <label >CATEGORY DESCRIPTION </label> 
                        <?php echo $this->session->flashdata('catDescription'); ?>	
                        <div class="input-group">
                        <input type="text" class="form-control" id="catDescription" name="catDescription" placeholder="Description" value="<?php echo $this->session->flashdata('catDescriptionVal'); ?>">
						</div>
                    </div>
                   

                    <div class="float-right">
                    <button type="submit" class="btn btn-info">Enter</button>
                    
                        </div>
                    </div>
                </div>
             </form>
            </div>
            
            <div class="col-md-6 mt-3" >
              <div  class="card card-gray" >
                  <div class="card-header">
                  	 <h3 class="card-title">CATEGORY LISTS </h3>
                  </div>
                  <div class="card-body table-responsive">
                   
                  	<table id="cattable" style="width:100%;" class="table  table-bordered table-hover table-striped">
                           <thead>
                      			<tr>
                                    <th style="width:20%;">Category name </th>
                                    <th style="width:70%;">Category Description</th>  
                                    <th style="width:10%;">Action</th>                         
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
