<?php
/**
Вариант 8: написать функцию, формирующую полный список файлов и подкаталогов в указанном каталоге.
Для всех элементов списка выводить размер в килобайтах (для подкаталогов считать размер их содержимого),
дату и время создания, модификации и последнего обращения. Для всех текстовых
файлов отобразить первые 100 символов. Имя анализируемого каталога получать через веб-форму.*/



    print_r( $_POST);
    echo "<br>";
    $dir = "/home/artur/VirtualBox VMs/NewXP/";
        //$_Get['directory'];
    $files1 = scandir($dir);

    function dir_size($dir)
    {
        $handle = opendir($dir);
        $mas = 0;
        while ($file = readdir($handle)) {
            if ($file != '..' && $file != '.' && !is_dir($dir . '/' . $file)) {
                $mas += filesize($dir . '/' . $file);
            } else if (is_dir($dir . '/' . $file) && $file != '..' && $file != '.') {
                $mas += dir_size($dir . '/' . $file);
            }
        }
        return $mas;
    }

    function get_ext_text($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension == "txt") {
            $flag = true;
        } else $flag = false;
        return $flag;
    }

    $i = 1;
    foreach ($files1 as $file) {
        $stat = stat($dir . $file);
        $mydir = $dir . $file;
        echo "<b>" . $file . "</b>" . " : в последний раз был изменен: " . date("F d Y H:i:s.", $stat['mtime']) . "<br>" .
            "Был создан: " . date("F d Y H:i:s.", $stat['atime']) . "<br>";
        if ($stat['mode'] & 040000) {
            echo "Размер файла: " . dir_size($mydir) / 1000 . "kb" . "<br>";
        } else {
            echo "Размер файла: " . $stat['size'] / 1000 . "kb" . "<br>";

            if (get_ext_text($file)) {
                echo "Первые 100 символов : " . file_get_contents($mydir, Null, Null, 0, 100) . "<br>";

            }
        };

    }
