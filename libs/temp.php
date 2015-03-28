<?php
//require 'Utils/Misc.class.php';

$temp = shell_exec('sensors coretemp-isa-0000 |grep C');

$data = explode('
',$temp);

foreach ($data as $key => $value) {

	$data[$key] = explode(':',$value);

	if(empty($data[$key][0]) or $data[$key][0] == "")
		continue;

	$temp = explode(' ',$data[$key][1]);

	$temp = array_values(array_filter($temp));

	$data[$key][1] = $temp[0];

}


echo json_encode($data);