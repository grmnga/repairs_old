<?php


require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";


$sql = "select *, (kv_1 + kv_2 + kv_3 + kv_4) as kv_sum  from objects where id = " . $_POST['id'];

$result = mysqli_query($link, $sql);

    if (!$result)
        die(mysqli_error($link));
    
/*    $n = mysqli_num_rows($result);
    $data = array();
    
    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        data[] = $row;
    }*/
    $data = mysqli_fetch_assoc($result);
    //var_dump($data);
    include("object.html");
?>