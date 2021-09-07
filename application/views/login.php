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
	
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	
	<!-- include navbar -->
	<?php $this->load->view('includes/header_menu');?>
	<!-- banner-2 -->

	<!-- //banner-2 -->
	<!-- page -->
	<!-- //page -->

	<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
			
        <form method="post" action="<?php echo site_url('user/auth_login'); ?>">
          <!-- Email input --> 
          <div class="form-outline mb-4">
            <h3>Login to your account</h3>
          </div>
          <div class="form-outline mb-4">
            <input type="text" id="form1Example13" name="user_id" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Mobile</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" name="password" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Password</label>
          </div>
		  
          <div class="form-outline mb-4">
            <input type="checkbox" value="1" id="rememberMe" name="rememberMe" checked>
			<label for="rememberMe">Remember me</label>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
			<?php echo $this->session->flashdata('err'); ?>
			<br>
			<br>
          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <a href="<?php echo base_url('user/register'); ?>">Create new account</a>
            </div>
            <a href="#!">Forgot password?</a>
          </div>
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