<html>
<head>
	<title>Form Input API</title>
	
	<!-- Load librari/plugin jquery nya -->
	<!-- <script src="js/jquery.min.js" type="text/javascript"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Load File javascript config.js -->
	<script src="js/config.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		body {
		color: white;
		}
</style>
</head>
<body>
	<h1 align="center">Form Input </h1>
	<hr>
	
	<table cellpadding="8">
	<!-- <form action="http://172.16.34.11:8099/?district={district}&unit={unit}&start={start}&end={end}" id="form"> -->
	<!-- <form action="submit_form.php" id="form"> -->
	<form id="form">



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
	<!-- <div>
		<h3>Formula</h3>
	</div> -->

	<div>
		<h3>Baseline</h3>
		<div id="baseline">
			<!-- <span>haii</span> -->
		</div>
	</div>
	

				

	<table style="width: 100%" class="table table-striped">
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
	<div>
		<h3>Rekomendasi</h3>
	</div>
	<table style="width: 100%" class="table table-striped">
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
</body>
</html>
