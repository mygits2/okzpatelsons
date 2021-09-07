<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<?php $this->load->view('includes/head'); ?>
<style>
.rad-label {
  display: flex;
  align-items: center;
  border-radius: 100px;
  padding: 14px 16px;
  margin: 10px 0;
  cursor: pointer;
  transition: .3s;
}

.rad-label:hover,
.rad-label:focus-within {
  background: hsla(0, 0%, 80%, .14);
}

.rad-input {
  position: absolute;
  left: 0;
  top: 0;
  width: 1px;
  height: 1px;
  opacity: 0;
  z-index: -1;
}

.rad-design {
  width: 22px;
  height: 22px;
  border-radius: 100px;

  background: linear-gradient(to right bottom, hsl(154, 97%, 62%), hsl(225, 97%, 62%));
  position: relative;
}

.rad-design::before {
  content: '';

  display: inline-block;
  width: inherit;
  height: inherit;
  border-radius: inherit;

  background: hsl(0, 0%, 90%);
  transform: scale(1.1);
  transition: .3s;
}

.rad-input:checked+.rad-design::before {
  transform: scale(0);
}

.rad-text {
  color: #000000;
  margin-left: 14px;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 700;
  width:max-content;
  transition: .3s;
}

.rad-input:checked~.rad-text {
  color: hsl(0, 0%, 40%);
}
/* -- quantity box -- */

.quantity {
 display: inline-block; }

.quantity .input-text.qty {
 width: 35px;
 height: 41px;
 padding: 0 5px;
 text-align: center;
 background-color: transparent;
 border: 1px solid #efefef;
}

.quantity.buttons_added {
 text-align: left;
 position: relative;
 white-space: nowrap;
 vertical-align: top; }

.quantity.buttons_added input {
 display: inline-block;
 margin: 0;
 vertical-align: top;
 box-shadow: none;
}

.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
 padding: 7px 10px 8px;
 height: 41px;
 background-color: #e6e6e6;
 border: 1px solid #efefef;
 cursor:pointer;}

.quantity.buttons_added .minus:hover,
.quantity.buttons_added .plus:hover {
 background: #d0cfcf; }

.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
 -webkit-appearance: none;
 -moz-appearance: none;
 margin: 0; }
 
 .quantity.buttons_added .minus:focus,
.quantity.buttons_added .plus:focus {
 outline: none; }
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
<body>
	<!-- include navbar -->
	<?php $this->load->view('includes/header_menu');?>
	
<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<?php echo $this->session->flashdata('cartmessage'); ?>
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<?php
								foreach($images->result() as $imgrow){
								?>
									<li data-thumb="<?php echo base_url('assets/pro_img/'.$imgrow->img); ?>">
										<div class="thumb-image">
											<img src="<?php echo base_url('assets/pro_img/'.$imgrow->img); ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
									</li>
									<?php
								}
								?>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
				<?php  
					foreach($single->result() as $singlerow)
					{
					?>
					<h3 class="mb-3"><?php echo $singlerow->product_name; ?></h3>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="<?php echo base_url('single/addtocart'); ?>" method="post" style="width: fit-content;">
								<?php
								foreach($units->result() as $unitsrow)
								{ ?>
									<label class="rad-label" for="<?php echo $unitsrow->qty;?>">
										<input type="radio" class="rad-input" id="<?php echo $unitsrow->qty;?>"  name="weight" value="<?php echo $unitsrow->qty.",".$unitsrow->unit.",".$unitsrow->price; ?>" required>
										<div class="rad-design"></div>
										<div class="rad-text">
										<?php
										echo $unitsrow->qty."&nbsp;".$unitsrow->unit." : &#8377; ".$unitsrow->price;
										?>
										</div>
									</label>
								<?php
								}
								?>
								<script>
								$(document).ready(function(){
									var qtyplus = $('input[name="plusqty"]').click(function(){
									
										var qty = parseInt($('#proqty').val());
										qty++;
										if(parseInt($('#proqty').val())<10)
										{
											$('#proqty').val(qty);
										}
									});
									var qtyminus = $('input[name="minusqty"]').click(function(){
									
										var qty = parseInt($('#proqty').val());
										qty--;
										if(parseInt($('#proqty').val())>1)
										{
											$('#proqty').val(qty);
										}
									});
								});
								</script>
								<label class="rad-label">
									<div class="rad-text">Quantity :&nbsp;</div>
									<div class="quantity buttons_added">
										<input type="button" value="-" class="minus" name="minusqty">
										<input type="number" id="proqty" step="1" min="1" max="10" name="qty" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" required>
										<input type="button" value="+" class="plus" name="plusqty">
									</div>
								</label>
									<input type="hidden" name="pro_id" value="<?php echo $singlerow->id; ?>" />
									<input type="submit" name="submit" value="Add to cart" class="button" />
							</form>
						</div>
					</div>
					<?php  } ?>
				</div>
			</div>
		</div>
	</div>

<!-- load footer -->
		<?php $this->load->view('includes/footer');?>
	<!-- //load footer -->
<!-- imagezoom -->
	<script src="<?php echo base_url('assets/js/imagezoom.js'); ?>"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/flexslider.css'); ?>" type="text/css" media="screen" />

	<script src="<?php echo base_url('assets/js/jquery.flexslider.js'); ?>"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
	
</body>
</html>