<?php

define('MYSQL_SERVER', '192.168.12.86');
define('MYSQL_USER', 'repairs_old');
define('MYSQL_PASSWORD', 'md56sd11');
define('MYSQL_DB', 'repairs_old');

function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        OR DIE("Error: ".mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        print("Error: ".mysqli_error($link));
    }
    
    return $link;
}

?>