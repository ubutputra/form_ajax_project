<html>
<head>
	<title>Form Input API</title>
	
	<!-- Load librari/plugin jquery nya -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	
	<!-- Load File javascript config.js -->
	<script src="js/config.js" type="text/javascript"></script>
</head>
<body>
	<h1>Form Input API</h1>
	<hr>
	
	<table cellpadding="8">
	<form action="http://172.16.33.157:8090/?district={district}&unit={unit}&start={start}&end={end}" id="form">
	<!-- <form action="http://172.16.33.157:8088/" id="form"> -->
	<!-- <form action="submit_form.php" id="form"> -->


	<!-- <form action="https://jsonplaceholder.typicode.com/posts" id="form" name="form"> -->

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


				<!-- <div id="loading" style="margin-top: 15px;">
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
				<input type="submit" value="submit" id="form-btn">
			</td>
		</tr>
		

	</form>
	</table>
	<div id="loading2" style="margin-top: 15px;">
					<img src="images/loading.gif" width="18"> <small>Loading...</small>
	</div>
	<div>
		<h3>Formula</h3>
	</div>

	<div>
		<h3>Baseline</h3>
	</div>
	<div>
		<h3>Rekomendasi</h3>
	</div>
</body>
</html>
