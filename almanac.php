<?php
  //https://www.wunderground.com/weather/api/d/docs?d=data/almanac
  $json_string = file_get_contents("http://api.wunderground.com/api/59aff698dad25e5b/almanac/q/ID/Semarang.json");
  $parsed_json = json_decode($json_string);
   $kota = $parsed_json->response->results[0]->{'city'};
  $negara = $parsed_json->response->results[0]->{'country_name'};
  echo "lokasi : ${kota},${negara}";
?>