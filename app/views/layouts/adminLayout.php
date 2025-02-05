<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">

	<title>Ekka - Admin Dashboard eCommerce HTML Template.</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/simplebar/simplebar.css" rel="stylesheet" />

	<!-- No Extra plugin used -->

	<link href='<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>
	<!-- Ekka CSS -->
	<link id="ekka-css" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/ekka.css" rel="stylesheet" />
	<link href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/checkbox.css" rel="stylesheet" />

	<!-- FAVICON -->
	<link href="<?php echo _WEB_ROOT ?>/public/assets/admin/img/favicon.png" rel="shortcut icon" />

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">

		<!-- Render Left Main Side Bar -->
		<?php $this->RenderView($views['leftSideBar']) ?>
		<!-- End Render Left Main Side Bar -->

		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">



			<!-- Render Header Here -->
			<?php $this->RenderView($views['header']) ;
			// <!-- End Render Header -->
			// <!-- Render Content Here KyDing -->
			$this->RenderView($views['content'], $subData);
			//  Render Footer Here 
			$this->RenderView($views['footer']) ?>
			<!-- End Render Footer -->

		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->

	<!-- Common Javascript -->
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/simplebar/simplebar.min.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/slick/slick.min.js"></script>

	<!-- Chart -->
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/charts/Chart.min.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/chart.js"></script>

	<!-- Google map chart -->
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/charts/google-map-loader.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/charts/google-map.js"></script>

	<!-- Date Range Picker -->
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/daterangepicker/moment.min.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/date-range.js"></script>


	<!-- Datatables -->
	<script src='<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/data-tables/jquery.datatables.min.js'></script>
	<script src='<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/data-tables/datatables.bootstrap5.min.js'></script>
	<script src='<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/data-tables/datatables.responsive.min.js'></script>

	<!-- Option Switcher -->
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/ekka.js"></script>

	<!-- handle -->
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/handleImport.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/handleOrder.js"></script>
	<script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/handleProduct.js"></script>
</body>

</html>