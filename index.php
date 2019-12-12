<html>
<head>
	<title>Form Input API</title>
	<!-- commenr -->
	<!-- Load librari/plugin jquery nya -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<!-- Load File javascript config.js -->
	<script src="js/config.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">


	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	
</head>
<body class="text-white " style="background-color:#161719">
	<h1 align="center">Parameter dan Baseline </h1>
	
	<table cellpadding="8" style="margin-left:15px;margin-top:15px;">
	<!-- <form action="http://172.16.34.11:8099/?district={district}&unit={unit}&start={start}&end={end}" id="form"> -->
	<!-- <form action="submit_form.php" id="form"> -->
	<form id="form" >



		<tr>
			<td><b>Distrik</b></td>
			
			<td>
				<select name="district" id="district" style="width: 200px;">
					<option value="">Pilih</option>
					
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
		</tr>
		<tr>	
			<td><b>Start Time</b></td>
			<td>
				<!-- <div class='col-sm-6'>

				<div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				</div> -->
				<input type="datetime-local" name="start" id="start">


				<!-- <div id="loading" style="margin-top: 1	5px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
				</div> -->
			</td>
		</tr>

		<tr>
			<td><b>Finish Time</b></td>
			<td>
			<input type="datetime-local" name="end" id="end">

				<!-- <div id="loading" style="margin-top: 15px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
				</div> -->
			</td>
		</tr>
		<tr>
			<td>
				<input class="btn btn-primary" type="submit" value="Submit" id="form-btn">
			</td>
		</tr>
	
		<!-- <button type="button" id="button">Click Me!</button> -->


	</form>
	</table>
	<div id="loading2" style="margin-top: 15px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
	</div>
	<div id="text-parameter">
		<h3>Parameter</h3>
	</div>
	<table style="width: 100%" class="table table-striped" id="table-parameter">
     <thead align="center">
          <tr>
               <th>No</th>
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
		<h3>Baseline</h3>
		<div id="baseline">
			<!-- <span>haii</span> -->
		</div>
	</div>
	

				

	<table style="width: 100%" class="table table-striped" id="table-baseline">
     <thead align="center">
          <tr>
               <th>No</th>
               <!-- <th>Parameter</th>
               <th>Unit</th> -->
			   <th>Perubahan</th>
			   <th>%  Heatrate</th>	
			   <th>Baseline Heatrate</th>
			   <th>Deviasi</th>
			   <th>% Gap Heatrate</th>
			   <th>Gap kCal/kWh</th>
			   <th>Polaritas</th>

           </tr>
     </thead>
     <tbody id="tbody">
     </tbody>
	</table>
	<div id ="text-rekom">
		<h3>Rekomendasi</h3>
	</div>
	<table style="width: 100%; white-space:pre-wrap; word-wrap:break-word;" class="table table-striped" id="table-rekom">
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
</body>
</html>
