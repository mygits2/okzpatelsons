<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<?php $this->load->view('includes/head'); ?>
<body>
	<?php $this->load->view('includes/header_menu');?>
	
	<!-- banner -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item item1 active">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Homemade
								<span>Powdered Spices
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Spices
								<span>and</span>
								Masalas
							</h3>
							<a class="button2" href="<?php echo base_url('allproducts?cate=g_spice'); ?>">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item3">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Whole
								<span>Spices</span> </p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Fresh,
								<span>Standard Quality</span>
							</h3>
							<a class="button2" href="<?php echo base_url('allproducts?cate=w_spice'); ?>">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item2">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Handpicked
								<span>Dry Fruits,</span> Nuts & Seeds</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
								<span>Dry Fruits</span>
							</h3>
							<a class="button2" href="<?php echo base_url('allproducts?cate=dry_fruits'); ?>">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item4">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Grains
								<span>to be</span> Stored</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Wheat, rice, toordaal,
								<span>etc</span>
							</h3>
							<a class="button2" href="<?php echo base_url('allproducts?cate=grains'); ?>">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>N</span>ew
				<span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">Spices &amp; Herbs</h3>
							<div class="row">
							<?php
								if(!$whole_spices->result())
								{
								?>
									<small>no product found for this category...!</small>
								<?php
								}
								else
								{
									foreach ($whole_spices->result() as $w_spice)  
									{
									?>
									<div class="col-md-4 product-men mt-5">
										<div class="men-pro-item simpleCart_shelfItem">
											<div class="men-thumb-item text-center">
												<img src="<?php echo base_url('assets/pro_img/'.$w_spice->thumbnail); ?>" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?php echo base_url('single?id='.$w_spice->id); ?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
											</div>
											<div class="item-info-product text-center border-top mt-4">
												<h4 class="pt-1">
													<a href="<?php echo base_url('single?id='.$w_spice->id); ?>"><?php echo $w_spice->product_name;?></a>
												</h4>
												<div class="info-product-price my-2">
													From
													<span class="item_price" id="pro<?php echo $w_spice->id;?>">&#8377;<?php echo $w_spice->price;?> </span>
													<small><?php echo $w_spice->qty.'&nbsp;'.$w_spice->unit;?></small>
												</div>
											</div>
										</div>
									</div>
									<?php 
									}
								}
								?>
							</div>
							<hr/>
							<h4 class="heading-tittle text-center font-italic">
								<a href="<?php echo base_url('allproducts?cate=w_spice'); ?>">View More</a>
							</h4>
						</div>
						<!-- //first section -->
						<!-- second section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">Grounded Spices</h3>
							<div class="row">
							<?php
								if(!$grounded_spices->result())
								{
								?>
									<small>no product found for this category...!</small>
								<?php
								}
								else
								{
									foreach ($grounded_spices->result() as $g_spice)  
									{
									?>
									<div class="col-md-4 product-men mt-5">
										<div class="men-pro-item simpleCart_shelfItem">
											<div class="men-thumb-item text-center">
												<img src="<?php echo base_url('assets/pro_img/'.$g_spice->thumbnail); ?>" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?php echo base_url('single?id='.$g_spice->id); ?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
											</div>
											<div class="item-info-product text-center border-top mt-4">
												<h4 class="pt-1">
													<a href="<?php echo base_url('single?id='.$g_spice->id); ?>"><?php echo $g_spice->product_name;?></a>
												</h4><div class="info-product-price my-2">
													From
													<span class="item_price" id="pro<?php echo $g_spice->id;?>">&#8377;<?php echo $g_spice->price;?> </span>
													<small><?php echo $g_spice->qty.'&nbsp;'.$g_spice->unit;?></small>
												</div>
											</div>
										</div>
									</div>
									<?php 
									}
								}
								?>
							</div>
							<hr/>
							<h4 class="heading-tittle text-center font-italic">
								<a href="<?php echo base_url('allproducts?cate=g_spice'); ?>">View More</a>
							</h4>
						</div>
						<!-- //second section -->
						
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">Dry fruits</h3>
							<div class="row">
							<?php
								if(!$dryfruits->result())
								{
								?>
									<small>no product found for this category...!</small>
								<?php
								}
								else
								{
									foreach ($dryfruits->result() as $dry_fruits)  
									{
									?>
									<div class="col-md-4 product-men mt-5">
										<div class="men-pro-item simpleCart_shelfItem">
											<div class="men-thumb-item text-center">
												<img src="<?php echo base_url('assets/pro_img/'.$dry_fruits->thumbnail); ?>" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?php echo base_url('single?id='.$dry_fruits->id); ?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
											</div>
											<div class="item-info-product text-center border-top mt-4">
												<h4 class="pt-1">
													<a href="<?php echo base_url('single?id='.$dry_fruits->id); ?>"><?php echo $dry_fruits->product_name;?></a>
												</h4>
												<div class="info-product-price my-2">
													<span class="item_price" id="pro<?php echo $dry_fruits->id;?>">&#8377;<?php echo $dry_fruits->price;?> </span>
													<small><?php echo $dry_fruits->qty.'&nbsp;'.$dry_fruits->unit;?></small>
												</div>
											</div>
										</div>
									</div>
									<?php 
									}
								}
								?>
							</div>
							<hr/>
							<h4 class="heading-tittle text-center font-italic">
								<a href="<?php echo base_url('allproducts?cate=dry_fruits'); ?>">View More</a>
							</h4>
						</div>
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<?php $this->load->view('includes/youmaylike'); ?>
			</div>
		</div>
	</div>
	<!-- //top products -->
	<!-- load footer -->
		<?php $this->load->view('includes/footer');?>
	<!-- //load footer -->
</body>

</html>