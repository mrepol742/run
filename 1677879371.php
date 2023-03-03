<?php
//Your API Key
$api_key = "YOUR_API_KEY";

//Your Mobile Number
$mobile_number = "+1234567890";

//Your Message
$message = "Hello World!";

//API URL
$url = "https://smsapi.example.com/api/send?api_key=".$api_key."&mobile=".$mobile_number."&message=".urlencode($message);

//Initiate the cURL
$ch = curl_init($url);

//Execute the cURL
$result = curl_exec($ch);

//Close the cURL
curl_close($ch);

//Print the result
echo $result;
?>