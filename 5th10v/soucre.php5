<?php

$db_link = new SQLite3("Lolkat.db");
//SELECT t1.*, t2.* FROM table1 t1 left JOIN (SELECT * from  table2 where Field2="VMSIS" limit 2) t2 on t1.id = t2.id

$sqlTime[-1] = 0;
$sqlTime[-2] = 0;

$N_TIMES= 1000;

for ($i=0; $i<100; $i++) {
    $sql_N[$i] = ($i + 1) * 10;
    $sqlTime[$i] = 0;

    for ($j = 0; $j < $sql_N[$i]; $j++) {
        $timeStart = microtime(TRUE);
        $db_link->query('SELECT t1.*, t2.* FROM table1 t1 left JOIN 
(SELECT * from  table2 where Field2="VMSIS" limit 2) t2 on t1.id = t2.id');
        $sqlTime[$i] += microtime(TRUE) - $timeStart;
    }

}
$sqlTime[100] = $sqlTime[99];
$sqlTime[101] = $sqlTime[99];


$db_link->close();
for ($i=0; $i<100; $i++) {
    printf('%d запросов за %01.2f секунд. <br>', $sql_N[$i], $sqlTime[$i]);
}
/*
  require_once "/home/artur/pChart/pData.class";
  require_once "/home/artur/pChart/pChart.class";
  $DataSet = new pData(); // Создаём объект pData
  $DataSet->AddPoint(array(0, 1, 4, 9, 16, 25, 36, 49, 64, 81, 100), "Serie1"); // Загружаем данные графика 1
  $DataSet->AddPoint(array(0, 1, 8, 27, 64, 125, 216, 343, 512, 729, 1000), "Serie2"); // Загружаем данные графика 2
  $DataSet->AddAllSeries(); // Добавить все данные для построения
  $Test = new pChart(700, 230); // Рисуем графическую плоскость
  $Test->setFontProperties("Fonts/tahoma.ttf", 8); // Установка шрифта
  $Test->setGraphArea(50, 30, 585, 200); // Установка области графика
  $Test->drawFilledRoundedRectangle(7, 7, 693, 223, 5, 240, 240, 240); // Выделяем плоскость прямоугольником
  $Test->drawRoundedRectangle(5, 5, 695, 225, 5, 230, 230, 230); // Делаем контур графической плоскости
  $Test->drawGraphArea(255, 255, 255, true); // Рисуем графическую плоскость
  $Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), SCALE_NORMAL, 150, 150, 150, true, 0, 2); // Рисуем оси и график
  $Test->drawGrid(4, true, 230, 230, 230, 50); // Рисуем сетку
  $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription()); // Соединяем точки графика линиями
  $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(), 3, 2, 255, 255, 255); // Рисуем точки
  $Test->drawTitle(50, 22, "MyRusakov.ru", 50, 50, 50, 585); // Выводим заголовок графика
  $Test->Stroke(); // Выводим график в окно браузера;*/