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
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>rder success
			</h3>
			<!-- //tittle heading -->
			<div class=" container-fluid my-5 ">
				<div class="row justify-content-center ">
					<div class="col-xl-10">
						<div class="card shadow-lg ">
							<div class="card border-0 ">
								<div class="card-header card-2" style="margin-bottom:5px;">
									<p class="card-text text-muted mt-md-4 mb-2 space">YOUR ORDER </p>
								</div>
								<div class="card-body pt-0">
									<?php
										$sub=0;
										foreach($orderitems->result() as $orderitem)
										{?>
											<div class="row justify-content-between">
												<div class="col-auto col-md-7">
													<div class="media flex-column flex-sm-row">
													<img class=" img-fluid" src="<?php echo base_url('assets/pro_img/'.$orderitem->thumbnail); ?>" width="62" height="62" style="margin-left:5px;">
														<div class="media-body my-auto" style="margin-left:5px;">
															<div class="row ">
																<div class="col-auto">
																	<p class="mb-0"><b><?php echo $orderitem->product_name;?></b></p><small class="text-muted"><?php echo $orderitem->weight.' '.$orderitem->scale.' x '.$orderitem->qty;?></small>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class=" pl-0 flex-sm-col col-auto my-auto ">
													<p><b>&#8377;<?php echo $orderitem->subtotal;?></b></p>
												</div>
											</div>
											<hr class="my-2">
										<?php 
										$sub += $orderitem->subtotal;
										}
									?>	
									<div class="row ">
										<div class="col">
											<div class="row justify-content-between">
												<div class="col-6">
													<p class="mb-1"><b>Subtotal</b></p>
												</div>
												<div class="flex-sm-col col-auto">
													<p class="mb-1"><b>&#8377;<?php echo $sub; ?></b></p>
												</div>
											</div>
											<div class="row justify-content-between">
												<div class="col-6">
													<p class="mb-1"><b>Shipping</b></p>
												</div>
												<div class="flex-sm-col col-auto">
													<p class="mb-1"><b>&#8377;20</b></p>
												</div>
											</div>
											<div class="row justify-content-between">
												<div class="col-6">
													<p><b>Total</b></p>
												</div>
												<div class="flex-sm-col col-auto">
													<p class="mb-1"><b>&#8377;<?php echo $orderitem->amount; ?></b></p>
												</div>
											</div>
											<div class="col-md-7 col-lg-6 mx-auto">
												<a href="<?php echo base_url(); ?>" class="btn btn-block btn-outline-primary btn-lg">CONTINUE SHOPPING</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- load footer -->
		<?php $this->load->view('includes/footer');?>
	<!-- //load footer -->
</body>

</html>