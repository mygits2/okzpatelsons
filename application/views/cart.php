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
			
			<!-- //tittle heading -->
			<div class="checkout-right">
				<div class="table-responsive">
					<?php 
					echo $this->session->flashdata('cartsms');
					if(!$cartitems->result())
					{
						?>
						<div class="container-fluid mt-100">
							<div class="row">
								<div class="col-md-12">
									<div class="">
										<div class="card-body cart">
											<div class="col-sm-12 empty-cart-cls text-center"> <img src="<?php echo base_url('assets/images/dCdflKN.png'); ?>" width="130" height="130" class="img-fluid mb-4 mr-3">
												<h3><strong>Your Cart is Empty</strong></h3>
												<br>
												<a href="<?php echo base_url(); ?>" class="btn btn-primary cart-btn-transform m-3" style="background-color:#4a7dff;" data-abc="true">continue shopping</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					else
					{ ?>
					<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
						<span>S</span>hopping Cart
					</h3>
					<table class="timetable_sub">
					<thead>
						<tr>
							<th>Product</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Subtotal</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$total="0";
						foreach($cartitems->result() as $cartitem)
						{
						$total+=$cartitem->subtotal;
						?>
						<tr class="rem1">
							<td class="invert-image">
								<a href="<?php echo base_url('single?id='.$cartitem->p_id);?>">
									<img src="<?php echo base_url('assets/pro_img/'.$cartitem->thumbnail);?>" alt=" " class="img-responsive">
								</a>
							</td>
							<td class="invert"><?php echo $cartitem->product_name;?></td>
							<td class="invert">
								<?php echo $cartitem->qty." x ".$cartitem->weight."&nbsp".$cartitem->scale;?>
							</td>
							<td class="invert"><?php echo $cartitem->price;?></td>
							<td class="invert"><?php echo $cartitem->subtotal;?></td>
							<td class="invert">
								<a href="<?php echo base_url('single/removefromcart?id='.$cartitem->cart_id); ?>">
								<div class="rem">
									<div class="close1"> </div>
								</div>
								</a>
							</td>
						</tr>
							<?php
						}
						
					?>
						<tr class="rem1">
						<td class="invert" colspan="4" style="text-align:right;color:#0879c9;font-size: 20px;"><b>Total</b></td>
						<td class="invert" colspan="2" style="text-align:left;color:#f45c5d;font-size: 20px;"><b>&#8377;<?php echo $total;?>/-</b></td>
						</tr>
						</tbody>
					</table>
					<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<div class="checkout-right-basket">
						<a href="<?php echo base_url('user/confirmorder'); ?>">Confirm Order
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
					<?php
					
						}
						?>
							
				</div>
			</div>
		</div>
	</div>
	<!-- load footer -->
		<?php $this->load->view('includes/footer');?>
	<!-- //load footer -->
</body>

</html>