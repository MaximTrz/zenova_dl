<?php

$modulname = 'Транспортные компании'; ///название модуля

if(isset($_GET['inc']) and $_GET['inc'] == 'index') {



    $page_title = 'Тест ТК - ' . $set_systemname;

    $page_css = 'modul/ltl-request/view/ltl.css.tpl';
    $page = 'modul/ltl-request/view/ltl.tpl';
    $page_java = 'modul/ltl-request/view/ltl.js.tpl';
    $page_name = 'Отправка сборного заказа'; ///для доступа
    $terminalsData = file_get_contents('modul/ltl-request/ajax/terminals_v3.json');
    $terminals = json_decode ($terminalsData, true);
    ///
    ///

    include("modul/ltl-request/ajax/related_data.php");




} else {


    include "view/dostup_disabled.tpl";
    exit();

}