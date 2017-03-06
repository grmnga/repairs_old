<?php

    require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";
    else
        echo "Connect to data base is OK";
$sql = "SELECT id, name FROM object_type";

$result_select = mysqli_query($link, $sql);

/*Выпадающий список*/

echo "<select name = ''>";

while($row = mysqli_fetch_assoc($result_select)){

echo "<option value=", $row['id'], ">";
    echo $row['name'];
    echo "</option>";

}

echo "</select>";

?>