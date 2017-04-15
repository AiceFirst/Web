<?php
/**
 Вариант 10: объявить пятимерный массив
 * с произвольными данными (не менее 30-ти элементов),
 * в этом массиве (программно!) отсортировать все данные по возрастанию
 * в строковом режиме, а также подсчитать (программно!) количество числовых элементов.
 */


 #$a[2][2][2][2][2];
$t = 3;
for ($i=1; $i<$t; $i++){
    for ($j=1; $j<$t; $j++) {
        for ($k=1; $k<$t; $k++) {
            for ($l=1; $l<$t; $l++) {
                 for ($m=1; $m<$t; $m++) {

                 $a[$i][$j][$k][$l][$m]=$i+$j+$k-$l-$m+3;
                 }
            }
        }
    }
}

$a[1][2][1][1][2]="F";
$a[1][2][1][2][2]="B";
$a[1][2][2][1][2]="c";

for ($i=1; $i<$t; $i++){
    for ($j=1; $j<$t; $j++) {
        for ($k=1; $k<$t; $k++) {
            for ($l=1; $l<$t; $l++) {
                 for ($m=1; $m<$t; $m++) {

                  echo $a[$i][$j][$k][$l][$m];

                 }
            }
        }
    }
}

array_multisort($a, SORT_REGULAR);


echo "</br>";
$jey=1;
for ($i=1; $i<$t; $i++){
    for ($j=1; $j<$t; $j++) {
        for ($k=1; $k<$t; $k++) {
            for ($l=1; $l<$t; $l++) {
                 for ($m=1; $m<$t; $m++) {

                  $tempmass[$jey]=$a[$i][$j][$k][$l][$m];
                  $jey++;

                 }
            }
        }
    }
}

sort($tempmass);


$jey=0;
for ($i=1; $i<$t; $i++){
    for ($j=1; $j<$t; $j++) {
        for ($k=1; $k<$t; $k++) {
            for ($l=1; $l<$t; $l++) {
                 for ($m=1; $m<$t; $m++) {

                  $a[$i][$j][$k][$l][$m]=$tempmass[$jey];
                  echo $a[$i][$j][$k][$l][$m];
                  $jey++;

                 }
            }
        }
    }
}

echo "</br>",count(array_filter($tempmass, function($tempmass) {
    return is_int($tempmass);
}));
