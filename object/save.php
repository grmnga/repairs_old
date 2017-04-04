<?php

    require_once("../database.php");
    $link = db_connect();
    
    if (!$link)
        echo "Error connect to data base";

    $sql = "UPDATE objects SET repairs_type_id='%d', constructive_id='%d', executor_id='%d', last_year='%d', year='%d', contract='%s', contract_date='%s', number_pp='%d', curator_id='%d',
    constructive_type_id='%d', work_type_id='%d', material_id='%d', customer_id='%d', contractor_id='%d',
    volume_per_year='%f', sum_smr_1984='%f', sum_smr_current_year='%f', unit_id='%d', current_smr='%f', cost_of_equipment='%f', kv_1='%f', kv_2='%f', kv_3='%f', kv_4='%f', cost_balance='%f',
    first_date='%s', last_date='%s', note='%s', justification='%s'
    WHERE id='%d'";

    if(!empty($_POST['winter'])) $winter = false;
        else $winter = true;

    
    $query = sprintf($sql,                                         
                     mysqli_real_escape_string($link, $_POST['repairs_type_id']), 
                     mysqli_real_escape_string($link, $_POST['constructive_id']),                                      
                     mysqli_real_escape_string($link, $_POST['executor_id']),                                        
                     mysqli_real_escape_string($link, $_POST['last_year']),   
                     mysqli_real_escape_string($link, $_POST['year']),   
                     mysqli_real_escape_string($link, $_POST['contract']),     
                     mysqli_real_escape_string($link, $_POST['contract_date']),     
                     mysqli_real_escape_string($link, $_POST['number_pp']),     
                     mysqli_real_escape_string($link, $_POST['curator_id']),  
                     
                     mysqli_real_escape_string($link, $_POST['constructive_type_id']),      
                     mysqli_real_escape_string($link, $_POST['work_type_id']),      
                     mysqli_real_escape_string($link, $_POST['material_id']),      
                     mysqli_real_escape_string($link, $_POST['customer_id']),      
                     mysqli_real_escape_string($link, $_POST['contractor_id']),    
                     
                                                           
                     mysqli_real_escape_string($link, $_POST['volume_per_year']),                                        
                     mysqli_real_escape_string($link, $_POST['sum_smr_1984']),   
                     mysqli_real_escape_string($link, $_POST['sum_smr_current_year']),   
                     mysqli_real_escape_string($link, $_POST['unit_id']),     
                     mysqli_real_escape_string($link, $_POST['current_smr']),     
                     mysqli_real_escape_string($link, $_POST['cost_of_equipment']),     
                     mysqli_real_escape_string($link, $_POST['kv_1']),     
                     mysqli_real_escape_string($link, $_POST['kv_2']),      
                     mysqli_real_escape_string($link, $_POST['kv_3']),      
                     mysqli_real_escape_string($link, $_POST['kv_4']),      
                     mysqli_real_escape_string($link, $_POST['cost_balance']),      
                          
                     mysqli_real_escape_string($link, $_POST['first_date']),     
                     mysqli_real_escape_string($link, $_POST['last_date']),      
                     mysqli_real_escape_string($link, $_POST['note']),      
                     mysqli_real_escape_string($link, $_POST['justification']),
                            $_POST['id']);
    
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));

include("object.php");

?>