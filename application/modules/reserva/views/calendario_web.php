<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="baseurl" content="<?php echo base_url(); ?>" />
	<link rel="icon" href="<?php echo base_url("images/favicon.ico"); ?>" type="image/ico" />

    <title>ZAZUE </title>

    <!-- Bootstrap -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- Animate.css -->
	<link href="<?php echo base_url("assets/bootstrap/vendors/animate.css/animate.min.css"); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
	<link href="<?php echo base_url("assets/bootstrap/build/css/custom.min.css"); ?>" rel="stylesheet">
	
    <!-- jQuery -->
    <script src="<?php echo base_url("assets/bootstrap/vendors/jquery/dist/jquery.min.js"); ?>"></script>
	
	<!-- jQuery validate-->
	<script type="text/javascript" src="<?php echo base_url("assets/js/general/jquery.validate.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/validate/login/login.js"); ?>"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
  </head>
  
  <body class="nav-md">

  
<!-- FullCalendar -->
<link href="<?php echo base_url("assets/bootstrap/vendors/fullcalendar/dist/fullcalendar.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("assets/bootstrap/vendors/fullcalendar/dist/fullcalendar.print.css"); ?>" rel="stylesheet" media="print">

<div class="right_col" role="main">

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class='fa fa-calendar'></i> CALENDARIO </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<script>
	   	/* CALENDAR */
		$(document).ready(function() {

				if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
				console.log('init_calendar');
					
				var date = new Date(),
					d = date.getDate(),
					m = date.getMonth(),
					y = date.getFullYear(),
					started,
					categoryClass;

				var calendar = $('#calendar').fullCalendar({
				defaultView: "month",
				locale: 'es',
				  header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,listMonth'
				  },
				  buttonText: {
					  today:    'Hoy',
					  month:    'Mes',
					  week:     'Semana',
					  day:      'Día',
					  list:     'Lista'
				  },
				  selectable: true,
				  selectHelper: true,
				  select: function(start, end, allDay) {
					$('#fc_create').click();

					started = start;
					ended = end;

					$(".antosubmit").on("click", function() {
					  var title = $("#title").val();
					  if (end) {
						ended = end;
					  }

					  categoryClass = $("#event_type").val();

					  if (title) {
						calendar.fullCalendar('renderEvent', {
							title: title,
							start: started,
							end: end,
							allDay: allDay
						  },
						  true // make the event "stick"
						);
					  }

					  $('#title').val('');

					  calendar.fullCalendar('unselect');

					  $('.antoclose').click();

					  return false;
					});
				  },
				  eventClick: function(calEvent, jsEvent, view) {
					$('#fc_edit').click();
					$('#title2').val(calEvent.title);

					categoryClass = $("#event_type").val();

					$(".antosubmit2").on("click", function() {
					  calEvent.title = $("#title2").val();

					  calendar.fullCalendar('updateEvent', calEvent);
					  $('.antoclose2').click();
					});

					calendar.fullCalendar('unselect');
				  },
				  editable: true,
				  
				  events: [
<?php
if($information){
	foreach ($information as $data):
?>
				  {
					title: '<?php 
							echo "Checkin: " . $data['date_checkin'] . " $data[hora_inicial]";
							echo " - Checkout: " . $data['date_checkout'] . " $data[hora_final]";
							?>',
					start: '<?php echo $data["date_checkin"] . " " . $data["hora_inicial_24"]; ?>',
					end: '<?php echo $data["date_checkout"] . " " . $data["hora_final_24"]; ?>'
				  },
				  
<?php
		endforeach;
	}
?>
				  
				  ]			  
				});
		});
</script>
				  				  

                    <div id='calendar'></div>

                  </div>
                </div>
              </div>

</div>

    <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Datos reserva</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <div class="col-sm-12">
					<textarea class="form-control" id="title2" name="title2" rows="3" disabled></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->

<!-- bootstrap-datetimepicker -->    	
<script src="<?php echo base_url("assets/bootstrap/vendors/moment/min/moment.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/bootstrap/vendors/fullcalendar/dist/fullcalendar.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/bootstrap/vendors/fullcalendar/dist/lang/es.js"); ?>"></script>
			

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