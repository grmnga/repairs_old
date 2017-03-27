<?php


require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";

//ЗАПРОС ДАННЫХ ОБ ОБЪЕКТЕ
$sql = "select *, (kv_1 + kv_2 + kv_3 + kv_4) as kv_sum  from objects where id = " . $_POST['id'];
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);

//var_dump($data);

//СПРАВОЧНИК РЕМОНТНЫХ РАБОТ
$sql = "select id, name from repairs_type";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$repairs_type = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $repairs_type[] = $row;
}

//СПРАВОЧНИК КОНСТРУКТИВОВ
$sql = "SELECT id, name FROM constructive ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$constructive = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $constructive[] = $row;
}

//СПРАВОЧНИК ИСПОЛНИТЕЛЕЙ
$sql = "select id, name from executor";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$executor = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $executor[] = $row;
}

//var_dump($constructive);

include("object.html");
?>