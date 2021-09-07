<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="eng">
<?php $this->load->view('includes/head'); ?>

<body>
	
	<!-- include navbar -->
	<?php $this->load->view('includes/header_menu');?>
	

	<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
			<?php echo $this->session->flashdata('err'); echo $this->session->flashdata('exists'); ?>
        <form method="post" action="<?php echo site_url('user/auth_register'); ?>">
          <!-- Email input --> 
          <div class="form-outline mb-4">
            <h3>Create new account</h3>
          </div>
          <div class="form-outline mb-4">
            <input type="text" id="name" name="name" value="<?php echo $this->session->flashdata('name');?>" class="form-control form-control-lg" placeholder="John Snow" required />
            <label class="form-label" for="name">Full Name</label>
          </div>
		  
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" value="<?php echo $this->session->flashdata('email');?>" class="form-control form-control-lg" placeholder="user@example.com" required />
            <label class="form-label" for="email">Email</label>
          </div>
		  
          <div class="form-outline mb-4">
            <input type="text" id="mobile" name="mobile" value="<?php echo $this->session->flashdata('mobile');?>" class="form-control form-control-lg" placeholder="99794xxxxx" required />
            <label class="form-label" for="mobile">Mobile</label>
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
            <label class="form-label" for="password">Password</label>
          </div>
		  
          <div class="form-outline mb-4">
            <input type="password" id="conpassword" name="cpass" class="form-control form-control-lg" required />
            <label class="form-label" for="conpassword">Confirm password</label>
          </div>
		  
          <div class="form-outline mb-4">
            <input type="checkbox" value="1" id="remember" name="remember" checked>
			<label for="remember">Remember me</label>
          </div>

          <!-- Submit button -->
          <button type="submit" id="submitbtn" class="btn btn-primary btn-lg btn-block">Sign up</button>
			<?php echo $this->session->flashdata('errsave'); ?>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- load footer -->
		<?php $this->load->view('includes/footer');?>
	<!-- //load footer -->

</body>

</html>