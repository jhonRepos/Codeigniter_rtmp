
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">

				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $countChannel?></h3>
							<!-- <sup style="font-size: 20px">1</sup> -->
							<p>Channel Count</p>
						</div>

						<a href="<?php echo base_url('channel')?>"
							class="small-box-footer">More info <i
							class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php echo $countMovie?></h3>

							<p>Movie Count</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="<?php echo base_url('movielist')?>"
							class="small-box-footer">More info <i
							class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?php echo $countCategory?></h3>

							<p>Cagetory</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="<?php echo base_url('category')?>"
							class="small-box-footer">More info <i
							class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->


	

			</div>
			<!-- /.row -->

		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->


