<!DOCTYPE html>
<html>
<head>
	<title>Form Input API</title>
	<!-- commenr -->
	<!-- Load librari/plugin jquery nya -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<!-- Load File javascript config.js -->
	<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">

	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

	<script src="css/moment.min.js"></script>
	<script src="js/jquery.min.js" type="text/javascript"></script>

	<script src="css/bootstrap.min.js"></script>
	<script src="css/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">


	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.js">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.js"> -->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/config.js" type="text/javascript"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>


	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	
</head>
<body  style="background-color:#161719">
	<h1 align="center" class="text-white">Parameter dan Baseline </h1>
	
	<form id="form">
		<div class="form-group row">
			<!-- <label for="staticEmail" class="mr-sm-2 sr-only">Email</label> -->
			<label class="col-sm-1 col-form-label text-white" >District</label>
			<div class="col-sm-3">
				<select class="custom-select my-1 mr-sm-2" id="district" name="district">
					<option value="">pilih</option>
					<?php
					// Load file koneksi.php
					include "koneksi.php";
					$coba = "haiii";
					echo $coba;
					// Buat query untuk menampilkan semua data siswa
					$sql = pg_query($connect, "SELECT * FROM public.district");
					// var_dump($coba);
					while($data = pg_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						// var_dump($data);
						echo "<option value='".$data['id_district']."'>".$data['district_name']."</option>";
					}
					?>
				</select>
				<!-- <label for="district" class="error"></label> -->
			
	  		</div>
		</div>
		<div class="form-group row">
			<!-- <label for="staticEmail" class="mr-sm-2 sr-only">Email</label> -->
			<label class="col-sm-1 col-form-label text-white" >Unit</label>
			<div class="col-sm-3">
				<select class="custom-select my-1 mr-sm-2" id="unit" name="unit">
					<option value="">pilih</option>

				</select>
				<div id="loading" style="margin-top: 15px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
				</div>			
	  		</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-1 col-form-label text-white" >Start Time</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="start" name="datetimes" >
				<!-- <input   type="datetime-local" class="form-control" id="start"  > -->

				
	  		</div>
			<!-- <label for="staticEmail" class="mr-sm-2 sr-only">Email</label> -->
			<!-- <label class="col-sm-1 col-form-label" >Start Time</label>
			<div class="col-sm-3">
				<div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" id="start" class="start"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				<script type="text/javascript">
    				$("#datetimepicker1").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
				</script>

				
	  		</div> -->
		</div>

		<div class="form-group row">
			<!-- <label for="staticEmail" class="mr-sm-2 sr-only">Email</label> -->
			<label class="col-sm-1 col-form-label text-white" >finish Time</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="end" name="datetimes">
				<!-- <input   type="datetime-local" class="form-control" id="end"  > -->

				
	  		</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Submit" id="form-btn">

	</form>


<!-- Email -->

	<table cellpadding="8" style="margin-left:15px;margin-top:15px;">
	<!-- <form action="http://172.16.34.11:8099/?district={district}&unit={unit}&start={start}&end={end}" id="form"> -->
	<!-- <form action="submit_form.php" id="form"> -->
	<form id="form2" >
		<tr>
			<!-- <td><b>Distrik</b></td>
			
			<td>
				<select name="district" id="district" style="width: 200px;">
					<option value="">Pilih</option>
					
				</select>
			</td>
		</tr>
		<tr>
			<td><b>Unit</b></td>
			<td>
				<select name="unit" id="unit" style="width: 200px;">
					<option value="">Pilih</option>
					
					
					
				</select>

				<div id="loading" style="margin-top: 15px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
				</div>
			</td>
		</tr> -->
		<tr>	
			<!-- <td><b>Start Time</b></td> -->
			<td>
				<!-- <div class='col-sm-6'>

				<div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				</div> -->
				<!-- <input type="datetime-local" name="start" id="start"> -->


				<!-- <div id="loading" style="margin-top: 1	5px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
				</div> -->
			</td>
		</tr>

		<tr>
			<!-- <td><b>Finish Time</b></td>
			<td>
			<input type="datetime-local" name="end" id="end"> -->

				<!-- <div id="loading" style="margin-top: 15px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
				</div> -->
			</td>
		</tr>
		<tr>
			<td>
				<!-- <input class="btn btn-primary" type="submit" value="Submit" id="form-btn"> -->
			</td>
		</tr>
	
		<!-- <button type="button" id="button">Click Me!</button> -->
	</form>
	</table>
	
	<!-- end dari form view -->
	<div id="loading2" style="margin-top: 15px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
	</div>
	<div id="text-parameter">
		<h3 class="text-white">Parameter</h3>
	</div>
	<table style="width: 50%" class="table table-striped table-dark text-white" id="table-parameter">
     <thead align="center">
          <tr>
               <th>No</th>
			   <th>Parameter</th>
			   <th>Value</th>
			   <!-- <th>%  Heatrate</th>	
			   <th>Baseline Heatrate</th>
			   <th>Deviasi</th>
			   <th>% Gap Heatrate</th>
			   <th>Gap kCal/kWh</th>
			   <th>Polaritas</th> -->

           </tr>
     </thead>
     <tbody id="table_parameter">
     </tbody>
	</table>
	
	<div id="text-baseline">
		<h3 class="text-white">Baseline</h3>
	
	</div>
	<table style="width: 30%" class="table table-striped table-dark text-white" id="gap-baseline">
     <thead align="center">
          <tr>
               <th>Gap</th>
			   <th>Baselined</th>
			   

           </tr>
     </thead>
     <tbody id="baseline">
     </tbody>
	</table>

	<!-- <div id="text-baseline">
		<h3 class="text-white">Baseline</h3>
		<div class="text-white" id="baseline">

		</div>
	</div> -->
	

				

	<table style="width: 100%" class="table table-striped table-dark text-white" id="table-baseline">
     <thead align="center">
        	<tr>
               <!-- <th rowspan="2">Nama Parameter</th>
               <th>Parameter</th>
               <th>Unit</th> -->
			   <!-- <th colspan="2">Faktor Perubah</th> -->
			   <!-- <th>Perubahan</th>
			   <th>%  Heatrate</th>	
			   <th>Baseline Heatrate</th>
			   <th>Aktual</th>

			   <th>Deviasi</th>
			   <th>% Gap Heatrate</th>
			   <th>Gap kCal/kWh</th>
			   <th>Polaritas</th> -->
			   <tr> 
					<th  rowspan="2" style="text-align:center;vertical-align:top;">Nama Parameter</th>
					<th  colspan="2">Faktor Perubah</th>
					<th >Baseline</th>
					<th  rowspan="2" style="text-align:center;vertical-align:top;">Aktual</th>
					<th  rowspan="2" style="text-align:center;vertical-align:top;">Deviasi</th>
					<th  colspan="2">Gap Heat Rate</th>
					<th  rowspan="2" style="text-align:center;vertical-align:top;">Polaritas</th>

				</tr>
				<tr>
					<td >Perubahan</td>
					<td >%Heatrate</td>
					<td >Heatrate</td>
					<td >%HR</td>
					<td >KCal/kWh</td>
				</tr>
           </tr>
     </thead>
     <tbody id="tbody">
     </tbody>
	</table>
	<div id ="text-rekom">
		<h3 class="text-white">Rekomendasi</h3>
	</div>
	<table style="width: 100%; white-space:pre-wrap; word-wrap:break-word;" class="table table-striped table-dark text-white" id="table-rekom">
     <thead align="center">
          <tr>
		  		<th>No</th>
				<th>Indikator</th>
				<th>Recom_rendal</th>
				<th>Recom_engineering</th>	
				<th>Cause</th>
				<th>Deviation</th>
				<th>Recom_operation</th>
				<th>Recom_maintenance</th>
			   

           </tr>
     </thead>
     <tbody id="table_rekom">
     </tbody>
	</table>

	
	<!-- <script>
		$('#datetimepicker1').datetimepicker({
		defaultDate: new Date(),
		format: 'DD/MM/YYYY hh:mm:ss A',
		sideBySide: true
	});
	</script> -->
	<!-- <script src="assets/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->

<script>
$(function() {
  $('input[name="datetimes"]').daterangepicker({
	singleDatePicker: true,
    showDropdowns: true,
	timePicker24Hour: true,
    // timePickerIncrement: 30,
    timePicker: true,
    locale: {
	  format: 'DD-MM-YYYY HH:mm'
	// format: 'YYYY-MM-DD HH:mm'

    }
  });
});
</script>

<script type="text/javascript">
       $(document).ready(function(){
		
		
		
		
   
          $("#form").validate({
			rules: {
            district: {
                required: true,
             
            },
            unit: {
                required: true,
                
			},
			start: {
                required: true,
             
			},
			end: {
                required: true,
             
            },
        }

		  });
       });
    </script>	

</body>


</html>
