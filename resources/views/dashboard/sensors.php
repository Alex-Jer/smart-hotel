<?php
$rooftop_solarbattery = explode(';', file_get_contents("../api/data/rooftop/solar_battery/value.txt"));
$rooftop_solarpanels = explode(';', file_get_contents("../api/data/rooftop/solar_panel/value.txt"));
$pool_temp = explode(';', file_get_contents("../api/data/pool/temperature/value.txt"));
$pool_lights = explode(';', file_get_contents("../api/data/pool/lights/value.txt"));
$parking_barrier = explode(';', file_get_contents("../api/data/parking/barrier/value.txt"));
