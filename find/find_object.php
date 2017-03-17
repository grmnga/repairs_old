<?php
    require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";
/*    else
        echo "Connect to data base is OK";*/
echo $_POST['object_type'], "</br>";
/*$sql = "SELECT o.id as id, o.year as year, ot.name as otname, wt.name as wtname " .
    "FROM objects as o, object_type as ot, work_type as wt " .
    "where o.object_type_id = ot.id and ot.id = " . $_POST['object_type'] . 
    " and o.work_type_id = wt.id and o.year = 2017;";*/

$sql = "SELECT o.id as id, o.year as year, ot.name as otname, wt.name as wtname " .
    "FROM objects o left join object_type ot ON o.object_type_id = ot.id left join work_type wt " .
    "ON o.work_type_id = wt.id where  ot.id = " . $_POST['object_type'] . 
    " and  o.year = 2017;";

$result = mysqli_query($link, $sql);

    if (!$result)
        die(mysqli_error($link));
    
    $n = mysqli_num_rows($result);
    $articles = array();
    
    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }
    echo "<table border=1> 
            <tr>
                <th>№</th>
                <th>Вид объекта</th>
                <th>Вид работ</th>
            </tr>";
    $i = 1;
    foreach($articles as $a): 
        echo "<tr><td>";
        echo $i++;
        echo "</td><td>";
        echo $a['otname'];
        echo "</td><td>";
        echo $a['wtname'];
        echo "</td></tr>";
    endforeach;
    echo "</div>";
