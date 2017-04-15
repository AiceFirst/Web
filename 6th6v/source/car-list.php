<?php
$cars = array("Renault Logan","Volkswagen Jetta 2010","Honda Fit","Hyundai Santa Fe","Hyundai SONATA","Volkswagen Jetta 2009","Honda Insight","Jeep Grand Cherokee","Volkswagen Jetta универсал","Toyota Prius","Volkswagen Jetta 2007","Прокат лафета");
$car_string="";
for ($i=0; $i<count($cars); $i++){
    $car_string = $car_string.str_replace("{CAR}",$cars[$i],file_get_contents('../templates/tempo-list.html'));

}
return $car_string;