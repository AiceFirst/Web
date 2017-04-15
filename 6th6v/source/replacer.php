<?php
$content = file_get_contents('../templates/main.html');
$car_list = include '../source/car-list.php';
$car_compiler = file_get_contents('../templates/car-compiler.html');

$car_compiler =str_replace("{CAR}",$car_list,$car_compiler);
	$arrayOfTegs = array(
		array("{CAR}",$car_compiler),

	);
	for ($i=0;$i<count($arrayOfTegs);$i++)
	{
		$content=str_replace($arrayOfTegs[$i][0],$arrayOfTegs[$i][1],$content);
	}

    $basic_top = include ('../source/top-cache.php');
	   echo $content ;
	$basic_bottom = include ('../source/bottom-cache.php');