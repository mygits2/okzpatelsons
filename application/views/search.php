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
	<!-- top Products -->
	<div class="ads-grid  py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h4 class='heading-tittle text-center font-italic'>
								Search results for <span style="color:#0879c9"><?php echo $this->input->get('keywords');?></span>
							</h4>
							<div class="row">
							<?php
								if(!$allproducts->result())
								{
								?>
									<img src="<?php echo base_url('assets/images/no_result.gif'); ?>" style="width:100%;"/>
								<?php
								}
								else
								{
									foreach ($allproducts->result() as $w_spice)  
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
							<?php 
								if($allproducts->result())
								{
								?>
									<hr/>
									<h4 class="heading-tittle text-center font-italic">
										<a href="<?php echo base_url('allproducts?cat=w_spice'); ?>">Load More</a>
									</h4>
								<?php
								}
								?>
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