
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" type="text/css" href="../css/index_style.css" />
        <title>Ремонт</title>
    </head>

<body>
   <div class="main">
        <p>Поиск объектов без адресов:</p>
            <form method="post" action="find_object.php">
    <?php

    require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";
/*    else
        echo "Connect to data base is OK";*/
$sql = "SELECT id, name FROM object_type order by name";

$result_select = mysqli_query($link, $sql);

/*Выпадающий список*/

echo "<select id = 'object' name='object_type'>";

while($row = mysqli_fetch_assoc($result_select)){

echo "<option value=", $row['id'], ">";
    echo $row['name'];
    echo "</option>";
}
echo "</select></br></br>";
    
$sql = "SELECT id, name FROM repairs_type";

$result_select = mysqli_query($link, $sql);

/*Выпадающий список*/

echo "<select id = \"object\" name = 'repairs_type'>";

while($row = mysqli_fetch_assoc($result_select)){

echo "<option value=", $row['id'], ">";
    echo $row['name'];
    echo "</option>";

}
 echo "</select></br></br>";
                
$sql = "SELECT id, name FROM constructive";

$result_select = mysqli_query($link, $sql);

/*Выпадающий список*/

echo "<select id = \"object\" name = 'constructive'>";

while($row = mysqli_fetch_assoc($result_select)){

echo "<option value=", $row['id'], ">";
    echo $row['name'];
    echo "</option>";

}
 echo "</select></br>";

?>
   <br>
    <!-- <button formaction="" name="button" type="submit" value="OK"> Окай</button> -->
        <input type="submit" value="Найти">

        </form>
    </div>