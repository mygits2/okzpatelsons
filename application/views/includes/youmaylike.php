<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
	<div class="side-bar p-sm-4 p-3">
		<div class="search-hotel border-bottom py-2">
			<h3 class="agileits-sear-head mb-3">Search Here..</h3>
			<form action="<?php echo base_url('search'); ?>" method="get">
				<input type="search" placeholder="Product name..." name="keywords" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		
		<!-- best seller -->
		<div class="f-grid py-2">
			<h3 class="agileits-sear-head mb-3">You may like</h3>
			<div class="box-scroll">
				<?php 
				foreach($random->result() as $row){
				
				?>
					<div class="row">
						<div class="col-lg-3 col-sm-2 col-3 left-mar">
						<a href="<?php echo base_url('single?id='.$row->id); ?>">
							<img src="<?php echo base_url('assets/pro_img/'.$row->thumbnail);?>" alt="" class="img-fluid">
						</a>
						</div>
						<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
							<a href="<?php echo base_url('single?id='.$row->id); ?>">
								<?php echo $row->product_name;?>
							</a>
							<a href="<?php echo base_url('single?id='.$row->id); ?>" class="price-mar mt-2">
								From &#8377;<?php echo $row->price.'&nbsp;/&nbsp;<small>'.$row->qty.'&nbsp;'.$row->unit;?></small>
							</a>
						</div>
					</div>
					<hr/>
				<?php } ?>
			</div>
		</div>
		<!-- //best seller -->
	</div>
	<!-- //product right -->
</div>