<?php
    require_once("database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";
    else
        echo "Connect to data base is OK";

    $query = "SELECT id, name FROM customer ORDER BY name";
    $result = mysqli_query($link, $query);
    
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
                <th>id</th>
                <th>name</th>
            </tr>";
    $i = 1;
    foreach($articles as $a): 
        echo "<tr><td>";
        echo $i++;
        echo "</td><td>";
        echo $a['id'];
        echo "</td><td>";
        echo $a['name'];
        echo "</td></tr>";
    endforeach;

?>