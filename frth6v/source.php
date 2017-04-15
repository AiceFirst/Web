<?php
/**
Вариант 6: в произвольном тексте все даты (в формате DD.MM.YYYY и MM/DD/YYYY,
 * причём день и месяц могут
 * быть однозначными) вывести красным цветом, при этом увеличить год на единицу.
 */

$string ='qweqwef ggsg 32.11._1999 _897 980 ggngpc 2000  31.11.2017 phyo,b  09/28/1324  kyphmcm;c. rtkf. kt . ktp43,6. 47.7 sfc 9.11.2011 qweqwef ggsg 10.01.1.1936 ggngpc';
echo "Исходный текст: ".$string."<br>";

$regul[0] = "/((([0][1-9])|([1-3]\d))|([1-9]))\.((([0][1-9])|([1][0-2]))|([1-9]))\.\d{4}/";

$regul[1] = "/((([0][1-9])|([1][0-2]))|([1-9]))\/((([0][1-9])|([1-3]\d))|([1-9]))\/\d{4}/";

echo "Текст апосля изменений: ";
for ($i=0; $i<count($regul); $i++)
$string = preg_replace_callback($regul[$i], function ($matches)
    {
        $string_inp =$matches[0];
        $lastchar = substr($string_inp, -4, 4);
        $lastchar ++;
        $string_inp = substr($string_inp,0,(strlen($string_inp)-4));
        $string_inp=$string_inp.$lastchar;

        return "<span style='color:red'>".$string_inp."</span>";
    }
    , $string);

echo $string;