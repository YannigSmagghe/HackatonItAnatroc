<?php

// $url will contain the API endpoint
$url = "https://public.opendatasoft.com/api/records/1.0/search/?dataset=lignes-de-metro-et-funiculaire-du-reseau-tcl-grand-lyon";



// Make the POST request using Curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Decode and display the output
$api_output =  curl_exec($ch);
$json_output = json_decode($api_output);
$output = $json_output?$json_output:$api_output;



// Clean up
curl_close($ch);

var_dump($output);