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
			<?php 
			if(!$adress->result())
			{
			?>
			<div class="row">
			  <div class="col-md-12 mb-4">
				<div class="card mb-4">
				  <div class="card-header py-3">
					<h5 class="mb-0">Please provide shipping address</h5>
				  </div>
				  <div class="card-body">
					<form action="<?php echo base_url('user/addnewaddress?referer=user/confirmorder'); ?>" method="post">
					<?php echo $this->session->flashdata('addressms'); ?>
					  <div class="row mb-4">
						<div class="col">
						  <div class="form-outline">
							<input type="text" name="name" id="form6Example1" class="form-control" value="<?php echo $username;?>" readonly required/>
							<label class="form-label" for="form6Example1">Contact Person</label>
						  </div>
						</div>
						<div class="col">
						  <div class="form-outline">
							<input type="text" name="mobile" id="form6Example2" class="form-control" required/>
							<label class="form-label" for="form6Example2">Mobile</label>
						  </div>
						</div>
					  </div>
					  <div class="row mb-4">
						<div class="col">
						  <div class="form-outline">
							<input type="text" name="city" id="form6Example1" class="form-control" required/>
							<label class="form-label" for="form6Example1">City</label>
						  </div>
						</div>
						<div class="col">
						  <div class="form-outline">
							<input type="text" name="pincode" id="form6Example2" class="form-control" required/>
							<label class="form-label" for="form6Example2">Pincode</label>
						  </div>
						</div>
					  </div>

					  <!-- Text input -->
					  <div class="form-outline mb-4">
						<input type="text" name="address" id="form6Example4" class="form-control" required/>
						<label class="form-label" for="form6Example4">Address</label>
					  </div>

					  <!-- Text input -->
					  <div class="form-outline mb-4">
						<input type="text" name="landmark" id="form6Example4" class="form-control" required/>
						<label class="form-label" for="form6Example4">Landmark</label>
					  </div>
					  <input type="submit" class="form-control" id="makepurchasebtn" style="cursor:pointer;color: #fff;background-color: #007bff;border-color: #007bff;">
					</form>
				  </div>
				</div>
			  </div>
			</div>
			<?php
			}
			else
			{
			?>
			<div class="row">
			  <div class="col-md-8 mb-4">
				<div class="card mb-4">
				  <div class="card-header py-3">
					<h5 class="mb-0">Biling details</h5>
				  </div>
				  <div class="card-body">
					<form action="<?php echo base_url('user/placeorder'); ?>" method="post">
					<?php
					echo $this->session->flashdata('addressms'); 
					foreach($adress->result() as $address)
					{
					?> 
					<div class="card" style="text-transform:capitalize">
						<div class="card-body">
							<input type="radio" name="address_id" id="address<?php echo $address->add_id;?>" value="<?php echo $address->add_id;?>" required />
							<input type="hidden" name="totalamount" value="<?php echo $subtotal+20;?>" required />
							<label class="form-label" for="address<?php echo $address->add_id;?>">Deliver to this address</label>
							<br/>
							<br/>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $address->address;?></h6>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $address->city;?></h6>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $address->pincode;?></h6>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $address->alt_mobile;?></h6>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo $address->landmark;?></h6>
							<a href="<?php echo base_url('user/removeaddrss?referer=user/confirmorder&addID='.$address->add_id); ?>" class="card-link">Remove</a>
							<a href="<?php echo base_url('user/editaddrss?referer=user/confirmorder&addID='.$address->add_id); ?>" class="card-link">Edit</a>
							<a href="<?php echo base_url('user/addnewaddressview?referer=user/confirmorder'); ?>" class="card-link">Add new</a>
						</div>
					</div>
					<br>
					<?php
					}
					?>
					<input type="submit" id="makepurchasebtn" style="display:none;"/>
					</form>
				  </div>
				</div>
			  </div>
			
			  <div class="col-md-4 mb-4">
				<div class="card mb-4">
				  <div class="card-header py-3">
					<h5 class="mb-0">Summary</h5>
				  </div>
				  <div class="card-body">
					<ul class="list-group list-group-flush">
					  <li
						class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
						Products
						<span><?php echo $subtotal;?>/-</span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center px-0">
						Shipping
						<span>20/-</span>
					  </li>
					  <li
						class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
						<div>
						  <strong>Total amount</strong>
						  <strong>
							<p class="mb-0">(including GST)</p>
						  </strong>
						</div>
						<span><strong>&#8377;<?php echo $subtotal+20;?>/-</strong></span>
					  </li>
					</ul>

					<button type="button" id="mkprchs" class="btn btn-primary btn-lg btn-block">
					  Make purchase
					</button>
				  </div>
				</div>
			  </div>
			</div>
			
		<?php
		}
		?>
		</div>
	</div>
	<script>
	$(document).ready(function(){
	  $("#mkprchs").click(function(){
		$("#makepurchasebtn").click();
	  });
	});
	</script>
	<!-- load footer -->
		<?php $this->load->view('includes/footer');?>
	<!-- //load footer -->
</body>

</html>