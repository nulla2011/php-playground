<?php
define('key', 0xA3);
$filename=$argv[1];
$input_path = 'C:/Users/n/AppData/Local/Netease/CloudMusic/Cache/Cache/';
$output_path = 'C:/users/n/Desktop/';
$input_file = $input_path . $filename;
$output_file = $output_path . substr($filename, 0, -4);
$handle1 = fopen($input_file, 'rb');
$handle2 = fopen($output_file, 'wb');
$decoded = [];
$encoded = unpack('C*', fread($handle1, filesize($input_file)));
foreach ($encoded as $value) {
  array_push($decoded, $value ^ key);
}
fwrite($handle2, pack('C*', ...$decoded), filesize($input_file));
fclose($handle1);
fclose($handle2);
