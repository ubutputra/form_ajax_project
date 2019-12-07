<?php
function callAPI($method, $url, $data){
   $curl = curl_init();

   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: 111111111111111111111',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
var_dump($_POST['district']);
$data_array =  array(
   "district"        => $_POST['district'],
   "unit"            => $_POST['unit'],
   "start"           => $_POST['start'],
   "end"             => $_POST['end'],
);

$make_call = callAPI('POST', 'http://172.16.33.157:8088/',json_encode($data_array));
echo ($make_call);
$response = json_decode($make_call, true);
$errors   = $response['response']['errors'];
$data     = $response['response']['data'][0];
?>