$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
	// Kita sembunyikan dulu untuk loadingnya
	$("#loading").hide();
	$("#loading2").hide();
	$("#text-baseline").hide();
	$("#table-baseline").hide();
	$("#text-rekom").hide();
	$("#table-rekom").hide();
	$("#text-parameter").hide();
	$("#table-parameter").hide();

	$("#form").submit(function(e) {
		// console.log('masuk form')
		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#loading2").show(); 
		var unit = $("#unit").val();
		var district = $("#district").val();
		var start = $("#start").val();
		start = start.concat(':00')
		start = start.replace("T"," ");

		array = start.split(" ");
		array[0] = array[0].split("-").reverse().join("-");
		start = array[0] + " " + array[1];
		console.log(start);
		
		var end = $("#end").val();
		end = end.concat(':00')
		end = end.replace("T"," ");
		array2 = end.split(" ");
		array2[0] = array2[0].split("-").reverse().join("-");
		end = array2[0] + " " + array2[1];
		console.log(end);

		// console.log(end);
		var uri = 'http://172.16.33.157:8099/';
		



		

		// var url = form.attr('action');
		// url = 'http://172.16.34.11:8099/';
		// console.log(form.serialize);
		// $("div").text($("form").serialize());
		  //do ajax proses
		$.ajax({
			type: "GET", // Method pengiriman data bisa dengan GET atau POST
			//http://localhost:6969/?district={district}&unit={unit}0&start={time start}&end={time end}
			url: uri, // Isi dengan url/path file php yang dituju
			crossDomain: true,
			// contentType: "application/json; charset=utf-8",
			contentType: 'application/x-www-form-urlencoded',
			
			// uri : "submit_form.php",
			// data: form.serialize(), // data yang akan dikirim ke file yang dituju
			data: { 
				"unit": unit,
				"district" : district,
				"start" : start,
				"end" : end 
			}, 

			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(output){ // Ketika proses pengiriman berhasil

				console.log('success');
				//log debug json
				console.log(output);
				$("#loading2").hide(); 
				$("#text-baseline").show();
				$("#table-baseline").show();
				$("#text-rekom").show();
				$("#table-rekom").show();
				$("#text-parameter").show();
				$("#table-parameter").show();

				var save_index = [];
				//looping data parameter
				$.each(output, function (index) {
				
											var parameter2 = [ 
												"MVAR Generator",
												"MW Generator",
												"MW Netto",
												"Pemakaian sendiri MW",
												"Pemakaian Batubara / coal flow",
												"Nilai Kalor batubara (kcal/kg)",
												"Gross Plant Heat Rate IO (kcal/kwh)",
												"Netto Plant Heat Rate IO (kcal/kwh)",
												"Tekanan Main Steam",
												"Temperatur Main Steam",
												"Main Steam Enthalphy",
												"Main Steam Flow 1",
												"Main Steam Flow 2",
												"Main Steam Flow 3",
												"Total Main Steam Flow (Ton)",
												"Tekanan Final Feedwater 1",
												"Tekanan Final Feedwater 2",
												"Rata2 Tekanan Final Feedwater",
												"Temperatur Final Feedwater",
												"Final Feedwater Enthalphy",
												"Final Feedwater Flow 1",
												"Final Feedwater Flow 2",
												"Total Final Feedwater Flow (Ton)",
												"Tekanan Superheater Spray 1St",
												"Tekanan Superheater Spray 2nd",
												"Rata2 Tekanan Superheater Spray",
												"Temperature Superheater Spray",
												"Superheater Spray Enthalphy",
												"Superheater Spray Flow 1st",
												"Superheater Spray Flow 2nd",
												"Total SH Spray Flow",
												"Turbine Heat Rate (kcal/kwh)",
												"Steam rate (Ton/ MW)",
												"Spesific Fuel Consumption (Ton/MW)",
												"Total Air Flow",
												"Total Fuel Flow",
												"Total Air Flow Ratio",
												"TEMPERATURE EXIT FLUE GAS (°C) Left",
												"TEMPERATURE EXIT FLUE GAS (°C) Right",
												"Temperature Exit Flue Gas (°C)",
												" Main Steam Temperature (°C)",
												"Main Steam Pressure (Mpa)",
												"BOILER Outlet Lelf O2 CONTENT",
												"BOILER Outlet Right O2 CONTENT",
												"Outlet 02 Flue Gas (%)",
																	];
					// while(output.baselineheatrate.hasOwnProperty(idx))){
					// }
					// save_index.push = index;
					// console.log(output[index]);
					if(index === 'baseline') {
						// var baseline_html =  "<span>" +"Gap = "+output.baseline[index].gap + "</span>"
						// 				+"<br>" + "<span>" + "Baselined = " + output.baseline[index].baselined+ "</span>" + "<br>";
						// $('#baseline').append(baseline_html);
						return true;
					}
					var eachrow = "<tr>"
								+ "<td style='text-align:left;'>" + index+ "</td>"
								+ "<td style='text-align:left;'>" + parameter2[index-1]+ "</td>"
								+ "<td style='text-align:left;'>" + output[index]+ "</td>"
								+ "</tr>";
					$('#table_parameter').append(eachrow);
					// idx = idx + 1

					// if(output.baseline.hasOwnProperty(idx)){
					// 	idx = idx + 1

					// }
					// else{
					// 	idx = idx + 3;
					// }
			   });
				$.each(output.baseline, function (index) {
					// while(output.baselineheatrate.hasOwnProperty(idx))){
					// }
					
					save_index.push = index;
					if(index == 8) {
						var baseline_html =  "<span>" +"Gap = "+output.baseline[index].gap + "</span>"
										+"<br>" + "<span>" + "Baselined = " + output.baseline[index].baselined+ "</span>" + "<br>";
						$('#baseline').append(baseline_html);
						return true;
					}
					var eachrow = "<tr>"
								+ "<td style='text-align:center;'>" + output.baseline[index].deskripsi+ "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].perubahan+ "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].percentheatrate + "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].baselineheatrate+ "</td>"
								//aktual
								+ "<td style='text-align:center;'>" + output[index]+ "</td>"

								+ "<td style='text-align:center;'>" + output.baseline[index].deviasi + "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].gap_percentheatrate + "</td>"

								+ "<td style='text-align:center;'>" + output.baseline[index].gap_kCal_kWh+ "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].polaritas+ "</td>"


								+ "</tr>";
					$('#tbody').append(eachrow);
					// idx = idx + 1

					// if(output.baseline.hasOwnProperty(idx)){
					// 	idx = idx + 1

					// }
					// else{
					// 	idx = idx + 3;
					// }
			   });

			   //looping rekomendasi
			   $.each(output.baseline, function (index,item) {
				//    console.log(index);
				//    console.log("iter1")
					var open_tag = "<tr>";
					$('#table_rekom').append(open_tag);
					if(index == 8) {
						return true;
					}
					//add number index
					var row2 =  "<td style='text-align:left;'>" +output.baseline[index].deskripsi+ "</td>" ;
						$('#table_rekom').append(row2);

					//open tag rekom
					
					if(item.rekomendasi	 === "cek alat ukur"){
						var row2 =  "<td style='text-align:left;'>" +"cek alat ukur"+ "</td>" + "</tr>";
						$('#table_rekom').append(row2);
						return true
					}
					var save_baseline = this;
					// console.log(save_baseline);
					$.each(item.rekomendasi, function(index2,item2){
						// console.log("iter2")

						// console.log(item2);	
						
						// console.log(item2.index2);
						var save2 = ''
						for (i = 0; i < item2.length; i++) {
							// do something with `substr[i]`
							// console.log(item2.length);
							if(item2[i] === null){
								item2[i] = '-';
							}
							var save = item2[i];
							var breaktext = "";
							if(i==0){
								breaktext = "";
							}
							else{
								breaktext = "<br><br>"
							}
							save2 = save2 + breaktext + save ;
						}
						open_tag = "<td style='text-align:left;'>" + save2 + "  " +"<br>";
						// if(item2[0] === null){
						// 	item2[0] = '-';
						// }
						var row2 = open_tag + "</td>";
						// console.log(row2);
						// console.log("iter2");
						// console.log(index2);
						// console.log(item2);	
						$('#table_rekom').append(row2);

						
			
					});
					var close =  "</tr>";
					$('#table_rekom').append(close);
			
				});

				
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
				// alert("Hello! I am an alert box!!");
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

	//testing
	$("#button").click(function(){
		console.log("hiyaaa");
		// Ketika user mengganti atau memilih data district
		// $("#unit").hide(); // Sembunyikan dulu combobox unit nya
		// $("#loading").show(); // Tampilkan loadingnya
		var form = $(this);
		$.ajax({ 
			type: 'GET', 
			url: 'http://dummy.restapiexample.com/api/v1/employee/1', 
			data: { get_param: 'value' }, 
			dataType: 'json',
			success: function (data) { 
				console.log(data);
				var output = 
					{
						"22":6356.637963600003,
						"23":4846.257295600001,
						"24":1227.6847676999996,
						"25":1258.2218786000003,
						"26":12430.5464815,
						"27":40080.63561969998,
						"28":-1.0,
						"29":139.41560060000023,
						"30":337.15042100000034,
						"31":476.56602160000057,
						"10":8756.23919699997,
						"32":18.21467687996781,
						"11":-1.0,
						"33":6.430426284727057,
						"12":23854.30071299998,
						"34":0.925601048598021,
						"13":23387.3243947,
						"35":17207261.3828125,
						"14":15084.445701600007,
						"36":2990.4226118,
						"15":20775.356936433327,
						"37":5754.123619489045,
						"16":1400.2616256999995,
						"38":50162.47139300003,
						"17":64.08954789999996,
						"39":8756.23919699997,
						"18":7322.769117999998,
						"19":40080.63561969998,
						"baseline":{
						   "38":{
							  "gap_percentheatrate":2273.2118815000013,
							  "polaritas":"positif",
							  "gap_kCal_kWh":7225403.965347754,
							  "percentheatrate":0.25,
							  "perubahan":5.5,
							  "rekomendasi":{
								 "indicator":[
									"b1"
								 ],
								 "recom_rendal":[
									"c1"
								 ],
								 "recom_engineering":[
									"f1"
								 ],
								 "cause":[
									"a1"
								 ],
								 "recom_operation":[
									"d1"
								 ],
								 "recom_maintenance":[
									"e1"
								 ]
							  },
							  "deviasi":50010.66139300003,
							  "baselineheatrate":151.81
						   },
						   "39":{
							  "gap_percentheatrate":-263.23645430399904,
							  "polaritas":"negatif",
							  "gap_kCal_kWh":-836697.070005261,
							  "percentheatrate":-0.32,
							  "perubahan":10.0,
							  "rekomendasi":"cek alat ukur",
							  "deviasi":8226.13919699997,
							  "baselineheatrate":530.1
						   },
						   "8":{
							  "baselined":3178.5,
							  "gap":-188.07738819999986
						   },
						   "40":{
							  "gap_percentheatrate":-423.95694919999994,
							  "polaritas":"negatif",
							  "gap_kCal_kWh":-1347547.1630321997,
							  "percentheatrate":-0.04,
							  "perubahan":0.1,
							  "rekomendasi":"cek alat ukur",
							  "deviasi":1059.892373,
							  "baselineheatrate":8.83
						   },
						   "43":{
							  "gap_percentheatrate":208.67710643899966,
							  "polaritas":"positif",
							  "gap_kCal_kWh":663280.1828163604,
							  "percentheatrate":0.29,
							  "perubahan":1.0,
							  "rekomendasi":{
								 "indicator":[
									"b4"
								 ],
								 "recom_rendal":[
									"c4"
								 ],
								 "recom_engineering":[
									"f4"
								 ],
								 "cause":[
									"a4"
								 ],
								 "recom_operation":[
									"d4"
								 ],
								 "recom_maintenance":[
									"e4"
								 ]
							  },
							  "deviasi":719.5762290999988,
							  "baselineheatrate":8.95
						   }
						},
						"1":-215.12464650000064,
						"2":3230.79,
						"3":1.0,
						"4":1.0,
						"5":2990.4226118,
						"6":1.0,
						"7":0.925601048598021,
						"8":2990.4226118,
						"9":1068.7223729999998,
						"40":1068.7223729999998,
						"41":1456.4301713999978,
						"42":0.6222868000000015,
						"20":-1.0,
						"21":3335.8766275999997,
						"43":728.5262290999989
					 }
				
					
				var save_index = [];
				$.each(output.baseline, function (index) {
					// while(output.baselineheatrate.hasOwnProperty(idx))){
					// }
					save_index.push = index;
					if(index == 8) {
						var baseline_html =  "<span>" +"Gap = "+output.baseline[index].gap + "</span>"
										+"<br>" + "<span>" + "Baselined = " + output.baseline[index].baselined+ "</span>" + "<br>";
						$('#baseline').append(baseline_html);
						return true;
					}
					var eachrow = "<tr>"
								+ "<td style='text-align:center;'>" + index+ "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].perubahan+ "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].percentheatrate + "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].baselineheatrate+ "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].deviasi + "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].gap_percentheatrate + "</td>"

								+ "<td style='text-align:center;'>" + output.baseline[index].gap_kCal_kWh+ "</td>"
								+ "<td style='text-align:center;'>" + output.baseline[index].polaritas+ "</td>"


								+ "</tr>";
					$('#tbody').append(eachrow);
					// idx = idx + 1

					// if(output.baseline.hasOwnProperty(idx)){
					// 	idx = idx + 1

					// }
					// else{
					// 	idx = idx + 3;
					// }
			   });

			   //looping rekomendasi
			   $.each(output.baseline, function (index,item) {
				//    console.log(index);
				//    console.log("iter1")
					var open_tag = "<tr>";
					$('#table_rekom').append(open_tag);
					if(index == 8) {
						return true;
					}
					//add number index
					var row2 =  "<td >" +index+ "</td>" ;
						$('#table_rekom').append(row2);

					//open tag rekom
					
					if(item.rekomendasi	 === "cek alat ukur"){
						var row2 =  "<td >" +"cek alat ukur"+ "</td>" + "</tr>";
						$('#table_rekom').append(row2);
						return true
					}
					var save_baseline = this;
					// console.log(save_baseline);
					$.each(item.rekomendasi, function(index2,item2){
						console.log("iter2")

						// console.log(item2);	
						
						// console.log(item2.index2);
						var row2 = "<td >" + item2[0]+ "</td>";
						// console.log("iter2");
						// console.log(index2);
						// console.log(item2);	
						$('#table_rekom').append(row2);

						
			
					});
					var close =  "</tr>";
					$('#table_rekom').append(close);
			
		});

			

			 
			}
		});
	});
	
	
	
});
