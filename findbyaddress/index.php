
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" type="text/css" href="../css/index_style.css" />
        <link rel="stylesheet" type="text/css" href="../css/background.css" />
        <title>Ремонт</title>
    </head>

<body>
   <div class="main">
        <h3>Поиск объектов по адресам</h3>
          <br>
           <p>Улица:</p>
            <form method="post" action="find_object.php">
    <?php

    require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";
/*    else
        echo "Connect to data base is OK";*/
$sql = "SELECT id, name FROM street order by name";

$result_select = mysqli_query($link, $sql);

/*Выпадающий список*/

echo "<select id = 'object' name='street'>";

while($row = mysqli_fetch_assoc($result_select)){

echo "<option value=", $row['id'], ">";
    echo $row['name'];
    echo "</option>";
}
echo "</select></br></br>";
    
?>
   <p>Номер дома:</p>
    <input type="text" name="number" id="object">
    </br></br>
    <p>Корпус:</p>
    <input type="text" name="litera" id="object">
    </br></br>
    <!-- <button formaction="" name="button" type="submit" value="OK"> Окай</button> -->
        <input type="submit" value="Найти">

        </form>
    </div>