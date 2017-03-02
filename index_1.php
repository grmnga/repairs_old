<?php

    if(isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "";

    if($action == "")
        header("Location: house.html");
    else 
        header("Location: house.html");
?>