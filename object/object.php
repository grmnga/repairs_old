<?php


require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";

//ЗАПРОС ДАННЫХ ОБ ОБЪЕКТЕ
$sql = "select o.*, (o.kv_1 + o.kv_2 + o.kv_3 + o.kv_4) as kv_sum, e.percent as percent,
(o.sum_smr_current_year * e.percent / 100) as economy
from objects o left join executor e on o.executor_id = e.id where o.id = " . $_POST['id'];
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);

//var_dump($data);

//СПРАВОЧНИК РЕМОНТНЫХ РАБОТ
$sql = "select id, name from repairs_type ORDER BY name";
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
$sql = "select id, name from executor ORDER BY name";
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


//СПРАВОЧНИК КУРАТОРОВ
$sql = "select id, name from curator ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$curator = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $curator[] = $row;
}

//СПРАВОЧНИК ВИДОВ КОНСТРУКТИВА
$sql = "select id, name from constructive_type ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$constructive_type = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $constructive_type[] = $row;
}

//СПРАВОЧНИК ВИДОВ РАБОТ
$sql = "select id, name from work_type ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$work_type = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $work_type[] = $row;
}

//СПРАВОЧНИК МАТЕРИАЛОВ
$sql = "select id, name from material ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$material = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $material[] = $row;
}

//СПРАВОЧНИК ЗАКАЗЧИКОВ
$sql = "select id, name from customer ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$customer = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $customer[] = $row;
}

//СПРАВОЧНИК ПОДРЯДЧИКОВ
$sql = "select id, name from contractor ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$contractor = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $contractor[] = $row;
}

//СПРАВОЧНИК ЕДИНИЦ ИЗМЕРЕНИЯ
$sql = "select id, name from unit ORDER BY name";
$result = mysqli_query($link, $sql);
if (!$result)
    die(mysqli_error($link));
$n = mysqli_num_rows($result);
$unit = array();
for ($i = 0; $i < $n; $i++)
{
    $row = mysqli_fetch_assoc($result);
    $unit[] = $row;
}



//var_dump($constructive);

include("object.html");
?>