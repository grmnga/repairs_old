<?php
    require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";
/*    else
        echo "Connect to data base is OK";*/
/*$sql = "SELECT o.id as id, o.year as year, ot.name as otname, wt.name as wtname " .
    "FROM objects as o, object_type as ot, work_type as wt " .
    "where o.object_type_id = ot.id and ot.id = " . $_POST['object_type'] . 
    " and o.work_type_id = wt.id and o.year = 2017;";*/

$sql = "select o.id as id, s.name as sname, h.number as hnumber, h.litera as hlitera, w.name as wtname, rt.name as rtname, c.name as cname, ct.name as ctname, o.year as oyear
from objects o 
left join houses h on o.houses_id = h.id left join street s on h.street_id = s.id
left join works w on o.work_id = w.id
left join repairs_type rt on o.repairs_type_id = rt.id
left join constructive c on o.constructive_id = c.id 
left join constructive_type ct on o.constructive_type_id = ct.id
where o.year = 2017 and s.id = " . $_POST['street'] . " and h.number = " . $_POST['number'];

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
    $i = 1;
?>
   
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!--<link rel="stylesheet" type="text/css" href="../css/index_style.css" />-->
        <link rel="stylesheet" type="text/css" href="../css/background.css" />
        <title>По адресам</title>
    </head>
<body>
   <div class="main">
        <h3>Результаты поиска</h3>
          <br>
            <form method="post" action="../object/object.php">
                <table border=1> 
                    <tr>
                        <th>№</th>
                        <th>Улица</th>
                        <th>Дом</th>
                        <th>Корпус</th>
                        <th>Вид работ</th>
                        <th>Вид ремонта</th>
                        <th>Конструктив</th>
                        <th>Вид конструктива</th>
                        <th>Год планового ремонта</th>
                        <th>Просмотр</th>
                    </tr>
<?php     
    foreach($articles as $a): 
        echo "<tr><td>";
        echo $i++;
        echo "</td><td>";
        echo $a['sname'];
        echo "</td><td>";
        echo $a['hnumber'];
        echo "</td><td>";
        echo $a['hlitera'];
        echo "</td><td>";
        echo $a['wtname'];
        echo "</td><td>";
        echo $a['rtname'];
        echo "</td><td>";
        echo $a['cname'];
        echo "</td><td>";
        echo $a['ctname'];
        echo "</td><td>";
        echo $a['oyear'];
        echo "</td><td>";
        echo "<button type=\"submit\" name=\"id\" value=\"" . $a['id'] . "\">>></button>";
        echo "</td></tr>";
    endforeach;
    
?>
                </table>
       </form>
    </div>
</body>
</html>