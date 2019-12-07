<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID district yang dikirim via ajax post
$id_district = $_POST['district'];

// Buat query untuk menampilkan data unit dengan district tertentu (sesuai yang dipilih user pada form)
$sql = pg_query($connect, "SELECT * FROM public.unit WHERE district_id='".$id_district."'");
// $sql = pg_query($connect, "SELECT * FROM public.unit");

// var_dump($sql);
// Buat variabel untuk menampung tag-tag option nya
// Set defaultnya dengan tag option Pilih
$html = "<option value=''>Pilih</option>";

while($data = pg_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$html .= "<option value='".$data['id_unit']."'>".$data['unit_number']."</option>"; // Tambahkan tag option ke variabel $html
}

$callback = array('data_unit'=>$html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_unit

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>	
