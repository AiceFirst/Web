<?php
/**
 * Написать свой шаблонизатор
 */
$content = file_get_contents("extendtask.html");
	$arrayOfTegs = array(
        array("{IP}",$_SERVER['REMOTE_ADDR']),
		array("{TIME}",date('H:i:s')),
		array("{DATA}",date('l jS \of F Y'))

	);
	for ($i=0;$i<count($arrayOfTegs);$i++)
	{
		$content=str_replace($arrayOfTegs[$i][0],$arrayOfTegs[$i][1],$content);
	}
	echo $content;