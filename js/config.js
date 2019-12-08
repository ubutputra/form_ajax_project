$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	$("#loading").hide();
	$("#loading2").hide();

	$("#form").submit(function(e) {

		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#loading2").show(); 
		var form = $(this);
		var url = form.attr('action');
		  //do ajax proses
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			//http://localhost:6969/?district={district}&unit={unit}0&start={time start}&end={time end}
			url: url, // Isi dengan url/path file php yang dituju
			data: form.serialize(), // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil

				console.log('haii');

				// var arr = $.parseJSON(response);
				// console.log(arr);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
			   
	});
	$("#district").change(function(){
		// console.log("hiyaaa");
		// Ketika user mengganti atau memilih data district
		$("#unit").hide(); // Sembunyikan dulu combobox unit nya
		$("#loading").show(); // Tampilkan loadingnya

		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "option_unit.php", // Isi dengan url/path file php yang dituju
			data: {district : $("#district").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading").hide(); // Sembunyikan loadingnya

				// set isi dari combobox unit
				// lalu munculkan kembali combobox unitnya
				// console.log(response.data_unit);
				$("#unit").html(response.data_unit).show();
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
	});

	
	
	
});
