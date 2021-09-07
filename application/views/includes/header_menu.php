

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="<?php echo base_url(); ?>" class="font-weight-bold font-italic">
							<img src="<?php echo base_url('assets/images/logo2.png');?>" alt=" " class="img-fluid">Patel Sons
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="<?php echo base_url('search'); ?>" method="get">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" name="keywords" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" type="submit">Search</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							<a href="<?php echo base_url('user/cart'); ?>">
								<button class="btn w3view-cart" type="submit" name="submit" value="">
									<i class="fas fa-cart-arrow-down"></i>
								</button>
								</a>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option value="">All Categories</option>
							<option value="Whole Spices">Whole Spices</option>
							<option value="Grounded Spices">Grounded Spices</option>
							<option value="Grains">Grains</option>
							<option value="Cashew Nuts">Cashew Nuts</option>
							<option value="Almonds/ Badam">Almonds/ Badam</option>
							<option value="Anjeer">Anjeer</option>
							<option value="Chirongi Nuts/ Charoli">Chirongi Nuts/ Charoli</option>
							<option value="Pistachio/ Pista">Pistachio/ Pista</option>
							<option value="Shelled Walnut/Akhrot">Shelled Walnut/Akhrot</option>
							<option value="Kishmish">Kishmish</option>
							<option value="Black Kishmish">Black Kishmish</option>
						</select>
					</form>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="<?php echo base_url(); ?>">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Category
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">Best Quality Whole &amp; Homemade Grounded Spices</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="<?php echo base_url('allproducts?cate=w_spice'); ?>">Spices and Herbs</a>
												</li>
												<li>
													<a href="<?php echo base_url('allproducts?cate=g_spice'); ?>">Powdered Spices/Masala Powders	</a>
												</li>
												<li>
													<a href="<?php echo base_url('allproducts?cate=grains'); ?>">Grains</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dry fruits, Nuts & Seeds
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">Handpicked Dry Fruits, Nuts & Seeds</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a href="<?php echo base_url('allproducts?cate=dry_fruits'); ?>">All dryfruits</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Cashew'); ?>">Cashew Nuts</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Almonds'); ?>">Almonds/ Badam</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Anjeer'); ?>">Anjeer</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Charoli'); ?>">Chirongi Nuts/ Charoli</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Pistachio'); ?>">Pistachio/ Pista</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Walnut'); ?>">Shelled Walnut/Akhrot</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Kishmish'); ?>">Kishmish</a>
												</li>
												<li>
													<a href="<?php echo base_url('search?keywords=Kishmish'); ?>">Black Kishmish</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('contact_us');?>">Contact Us</a>
						</li>
						<?php
							if($this->session->userdata('userid'))
							{
								?>
								<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
									<a class="nav-link" href="<?php echo base_url('user/account');?>">My account</a>
								</li>
								<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
									<a class="nav-link" href="<?php echo base_url('user/logout');?>">Logout</a>
								</li>
								<?php
							}
							else
							{
								?><li class="nav-item mr-lg-2 mb-lg-0 mb-2">
									<a class="nav-link" href="<?php echo base_url('user/login');?>">Login / Register</a></li>
								<?php
							}
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
