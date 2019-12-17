<?php
$host = "172.16.34.11"; // Nama hostnya
$username = "gpadmin"; // Username
$password = "jangandiingat"; // Password (Isi jika menggunakan password)
$database = "pjbs_input"; // Nama databasenya

$conn_string = "host=172.16.34.11 port=5432 dbname=pjbs_input user=gpadmin password=jangandiingat";
$connect = pg_connect($conn_string);


?>
