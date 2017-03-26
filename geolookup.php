<?php
  $json_string = file_get_contents("http://api.wunderground.com/api/59aff698dad25e5b/geolookup/conditions/q/IA/Cedar_Rapids.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  echo "Current temperature in ${location} is: ${temp_f}\n";

  $stations = $parsed_json->{'location'}->{'nearby_weather_stations'}->{'pws'}->{'station'};
  $count = count($stations);
  for($i = 0; $i < $count; $i++)
  {
     $station = $stations[$i];
     if (strcmp($station->{'id'}, "KIACEDAR22") == 0)
     {
        echo "Neighborhood: " . $station->{'neighborhood'} . "\n";
        echo "City: " . $station->{'city'} . "\n";
        echo "State: " . $station->{'state'} . "\n";
        echo "Latitude: " . $station->{'lat'} . "\n";
        echo "Longitude: " . $station->{'lon'} . "\n";
        break;
     }
  }
?>