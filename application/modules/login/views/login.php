
  <section class="content">

<?php if(isset($_SESSION['error'])) { ?>
<center>
	<div class="alert alert-danger col-md-12"
		style="background-color: #fff6f5; border-color: red; color: red;"> 	<?php echo $_SESSION['error']; ?></div>
</center>
<?php } ?>
            <!-- card  -->
            <center><div class="card card-info col-8">
              <div class="card-header">
                <h3 class="card-title">Sign in </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($_SESSION['success'])) { ?>
     		<center>
							<div class="alert alert-danger col-md-12" style="background-color: #fff6f5; border-color: red; color: red;"><?php echo $_SESSION['success']; ?>
							</div>
							</center>
		    <?php } ?>
    
              <form class="form-horizontal" action="login/auth" method="POST">
                <div class="card-body">
                  <div class="form-group row">
              
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3"  name="password" placeholder="Password">
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                
                </div>
                <!-- /.card-footer -->
              </form>
            </div><center>
            <!-- /.card -->

  </section>
