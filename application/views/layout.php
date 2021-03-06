<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="baseurl" content="<?php echo base_url()?>" />
	<link rel="icon" href="<?php echo base_url("images/favicon.ico"); ?>" type="image/ico" />

    <title>ZAZUE </title>

    <!-- Bootstrap -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- iCheck -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/iCheck/skins/flat/green.css"); ?>" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"); ?>" rel="stylesheet">
    <!-- JQVMap -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/jqvmap/dist/jqvmap.min.css"); ?>" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.css"); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
	<link href="<?php echo base_url("assets/bootstrap/build/css/custom.min.css"); ?>" rel="stylesheet">
	
    <!-- jQuery -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/jquery/dist/jquery.min.js"); ?>"></script>
	<!-- jQuery validate-->
	<script type="text/javascript" src="<?php echo base_url("assets/js/general/general.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/general/jquery.validate.js"); ?>"></script>
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
			
			<!-- left navigation -->
			<?php $this->load->view("template/left_menu"); ?>
			<!-- top navigation -->
			<?php $this->load->view("template/top_menu"); ?>
			<!-- Start of content -->
			<?php
			if (isset($view) && ($view != '')) {
				$this->load->view($view);
			}
			?>
			<!-- End of content -->





        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Reservas - BMG</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
    <!-- FastClick -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/fastclick/lib/fastclick.js"); ?>"></script>
    <!-- NProgress -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/nprogress/nprogress.js"); ?>"></script>
    <!-- Chart.js -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/Chart.js/dist/Chart.min.js"); ?>"></script>
    <!-- gauge.js -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/gauge.js/dist/gauge.min.js"); ?>"></script>
    <!-- bootstrap-progressbar -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"); ?>"></script>
    <!-- iCheck -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/iCheck/icheck.min.js"); ?>"></script>
    <!-- Skycons -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/skycons/skycons.js"); ?>"></script>
    <!-- Flot -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/Flot/jquery.flot.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/Flot/jquery.flot.pie.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/Flot/jquery.flot.time.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/Flot/jquery.flot.stack.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/Flot/jquery.flot.resize.js"); ?>"></script>
    <!-- Flot plugins -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/flot.orderbars/js/jquery.flot.orderBars.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/flot-spline/js/jquery.flot.spline.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/flot.curvedlines/curvedLines.js"); ?>"></script>
    <!-- DateJS -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/DateJS/build/date.js"); ?>"></script>
    <!-- JQVMap -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/jqvmap/dist/jquery.vmap.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/jqvmap/dist/maps/jquery.vmap.world.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"); ?>"></script>
    <!-- bootstrap-daterangepicker -->
	<script src="<?php echo base_url("assets/bootstrap/vendors/moment/min/moment.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js"); ?>"></script>

    <!-- Custom Theme Scripts -->
	<script src="<?php echo base_url("assets/bootstrap/build/js/custom.min.js"); ?>"></script>
	
  </body>
</html>