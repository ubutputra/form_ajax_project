$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	$("#loading").hide();
	$("#loading2").hide();

	$("#form").submit(function(e) {
		console.log('masuk form')
		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#loading2").show(); 
		var form = $(this);
		var unit = $("#unit").val();
		var district = $("#district").val();
		var start = $("#start").val();
		start = start.replace("T"," ");
		var end = $("#end").val();
		end = end.replace("T"," ");

		var url = form.attr('action');
		url = 'http://172.16.34.11:8099/';
		// console.log(form.serialize);
		// $("div").text($("form").serialize());
		  //do ajax proses
		$.ajax({
			type: "GET", // Method pengiriman data bisa dengan GET atau POST
			//http://localhost:6969/?district={district}&unit={unit}0&start={time start}&end={time end}
			url: url, // Isi dengan url/path file php yang dituju
			// uri : "submit_form.php",
			// data: form.serialize(), // data yang akan dikirim ke file yang dituju
			data: { 
				unit: unit,
				district : district,
				start : start,
				end : end 
			}, 

			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(data){ // Ketika proses pengiriman berhasil

				console.log('haii sukses');
				console.log(data);
				$("#loading2").hide(); 

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


	$("#button").click(function(){
		console.log("hiyaaa");
		// Ketika user mengganti atau memilih data district
		// $("#unit").hide(); // Sembunyikan dulu combobox unit nya
		// $("#loading").show(); // Tampilkan loadingnya
		var form = $(this);
		var url = form.attr('action');
		$.ajax({ 
			type: 'GET', 
			url: 'http://dummy.restapiexample.com/api/v1/employee/1', 
			data: { get_param: 'value' }, 
			dataType: 'json',
			success: function (data) { 
				console.log(data);
				// var jsonStr = JSON.stringify(data);
				// document.body.innerHTML = jsonStr;
				var obj = data;
				var output = {
					"1" : "value",
					"2" : "value",
					"3" : "value",
					"4" : "value",
					"5" : "value",
					"6" : "value",
					"7" : "value",
					"8" : "value",
					"9" : "value",
					"10" : "value",
					"12" : "value",
					"13" : "value",
					"14" : "value",
					"15" : "value",
					"16" : "value",
					"17" : "value",
					"18" : "value",
					"19" : "value",
					"20" : "value",
					"21" : "value",
					"22" : "value",
					"23" : "value",
					"24" : "value",
					"25" : "value",
					"26" : "value",
					"27" : "value",
					"28" : "value",
					"29" : "value",
					"30" : "value",
					"31" : "value",
					"32" : "value",
					"33" : "value",
					"34" : "value",
					"35" : "value",
					"36" : "value",
					"37" : "value",
					"38" : "value",
					"39" : "value",
					"40" : "value",
					"41" : "value",
					"42" : "value",
					"43" : "value",
					"baseline" : {
						"8" : {
							"baselined" : "value",
							"gap" : "value"
						},
						"38" : {
							"perubahan" : "value",
							"percentheatrate" : "value",
							"baselineheatrate" : "value",
							"polaritas" : "value",
							"deviasi" : "value",
							"gap_percentheatrate" : "value",
							"gap_kCal/kWh" : "value",
							"rekomendasi" : "value"
						},
						"39" : {
							"perubahan" : "value",
							"percentheatrate" : "value",
							"baselineheatrate" : "value",
							"polaritas" : "value",
							"deviasi" : "value",
							"gap_percentheatrate" : "value",
							"gap_kCal/kWh" : "value",
							"rekomendasi" : "value"
						},
						"40" : {
							"perubahan" : "value",
							"percentheatrate" : "value",
							"baselineheatrate" : "value",
							"polaritas" : "value",
							"deviasi" : "value",
							"gap_percentheatrate" : "value",
							"gap_kCal/kWh" : "value",
							"rekomendasi" : "value"
						},
						"43" : {
							"perubahan" : "value",
							"percentheatrate" : "value",
							"baselineheatrate" : "value",
							"polaritas" : "value",
							"deviasi" : "value",
							"gap_percentheatrate" : "value",
							"gap_kCal/kWh" : "value",
							"rekomendasi" : "value"
						}
					}
				}
				// data = jsonStr;
				// var json_data = {"2013-01-21":1,"2013-01-22":7};
				var result = [];

				// for(var i in data){
				// 	result.push([i, data [i]]);

				// }
				console.log(output.length);
				console.log(output);
				// data = JSON.parse(data);
				$.each(output, function (index, item) {
					var eachrow = "<tr>"
								+ "<td>" + output.baseline[43].deviasi + "</td>"
								+ "<td>" + item[2] + "</td>"
								+ "<td>" + item[3] + "</td>"
								+ "<td>" + item[4] + "</td>"
								+ "</tr>";
					$('#tbody').append(eachrow);
			   });

			 
			}
		});
	});
	
	
	
});
