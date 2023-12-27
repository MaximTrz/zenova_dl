<?php
session_start();
if (isset($_SESSION['user_login'])) {

    require_once('Connections/connect.php');

    require_once("modul/ltl-request/controllers/dl.php");

    $appKey = $set_dellin_key;
    $client = new DLClient($appKey);
    $client->auth($set_dellin_login, $set_dellin_pwd);

    $client->request('v2/counteragents');

    $counteragents = json_decode(json_encode($client->result), true);

    $client->request('v1/references/opf_list');
    $opf = json_decode(json_encode($client->result), true);

}
?>