<?php
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = '../templates/cached-'.substr_replace($file ,"",-4).'.html';
$cachetime = 18000;


// Обслуживается из файла кеша, если время запроса меньше $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "R u retarded ?";
    include($cachefile);
    exit;
}


ob_start(); // Запуск буфера вывода
?>
