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
			<div class="row">
			  <div class="col-md-12 mb-4">
				<div class="card mb-4">
				  <div class="card-header py-3">
					<h5 class="mb-0">Edit address</h5>
				  </div>
				  <div class="card-body">
					<form action="<?php echo base_url('user/updateaddrss?addID='.$this->input->get('addID').'&referer='.$this->input->get('referer')); ?>" method="post">
					  <div class="row mb-4">
						<?php
						foreach($address->result() as $address)
						{ ?>
						<div class="col">
						  <div class="form-outline">
							<input type="text" value="<?php echo $address->alt_mobile;?>" name="mobile" id="form6Example2" class="form-control" required/>
							<label class="form-label" for="form6Example2">Mobile</label>
						  </div>
						</div>
						<div class="col">
						  <div class="form-outline">
							<input type="text" value="<?php echo $address->pincode;?>" name="pincode" id="form6Example2" class="form-control" required/>
							<label class="form-label" for="form6Example2">Pincode</label>
						  </div>
						</div>
					  </div>
					  <div class="row mb-4">
						<div class="col">
						  <div class="form-outline">
							<input type="text" value="<?php echo $address->city;?>" name="city" id="form6Example1" class="form-control" required/>
							<label class="form-label" for="form6Example1">City</label>
						  </div>
						</div>
						<div class="col">
						  <div class="form-outline">
							<input type="text" value="<?php echo $address->landmark;?>" name="landmark" id="form6Example2" class="form-control" required/>
							<label class="form-label" for="form6Example2">Landmark</label>
						  </div>
						</div>
					  </div>

					  <!-- Text input -->
					  <div class="form-outline mb-4">
						<input type="text" value="<?php echo $address->address;?>" name="address" id="form6Example4" class="form-control" required/>
						<label class="form-label" for="form6Example4">Address</label>
					  </div>
						<?php } ?>
					  <input type="submit" class="form-control" id="makepurchasebtn" style="cursor:pointer;color: #fff;background-color: #007bff;border-color: #007bff;"/>
					</form>
				  </div>
				</div>
			  </div>
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