<?php
$pagescount = 5;



$counter = mysql_query('SELECT COUNT(`id`) FROM `blog`');
$counter = mysql_fetch_array($counter);
$pages = intval( ($counter[0] - 1) / $pagescount) + 1;

if( isset($_GET['page'])) {

$page = (int) $_GET['page'];
    if ( $page > 0 && $page <= $pages ) {
        // Вычисляем с какого номера статьи надо начинать выводить
        $start = $page * $pagescount - $pagescount;
        $sql = "SELECT * FROM `blog` ORDER BY `date` DESC LIMIT {$start}, {$pagescount}";
    }
    else { 
        $sql = 'SELECT * FROM `blog` ORDER BY `date` DESC LIMIT '. $pagescount; 
        $page = 1;
    }
}
else {
$sql = 'SELECT * FROM `blog` ORDER BY `date` DESC LIMIT '. $pagescount;
$page = 1;
}
$otvet = mysql_query($sql);


require('templates/header.php'); ?>

<h3>Главная страница</h3>
    
<?php require('content.php'); ?>
<?php require('templates/footer.php'); //что бы выводить предагаю в цикл выводить по айдишнику ид++ до того момента когда строка с текстом выбранного айдишника будет пуста ?>



