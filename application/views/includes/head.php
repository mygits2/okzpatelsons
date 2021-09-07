<head>
	<title>OKZ - PATEL SONS</title>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/icon/apple-touch-icon.png');?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/images/icon/favicon-32x32.png');?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/icon/favicon-16x16.png');?>">
	<link rel="manifest" href="<?php echo base_url('assets/images/icon/site.webmanifest');?>">
	<link rel="mask-icon" href="<?php echo base_url('assets/images/icon/safari-pinned-tab.svg');?>" color="#5bbad5">
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="WHOLE SPICES, GROUNDED SPICES, ROPES, GROCERIES, GRAINS, ETC"
	/>
	<style>
img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {display: none;}
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->
		
	<!-- scroll seller -->
	<script src="<?php echo base_url('assets/js/scroll.js')?>"></script>
	<!-- //scroll seller -->

	<!-- start-smooth-scrolling -->
	<script src="<?php echo base_url('assets/js/move-top.js');?>"></script>
	<script src="<?php echo base_url('assets/js/easing.js');?>"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome-all.css');?>">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="<?php echo base_url('assets/css/popuo-box.css');?>" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="<?php echo base_url('assets/css/menu.css');?>" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web fonts -->

</head>