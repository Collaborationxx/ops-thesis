<?php

include('authentication/functions.php');

    if(function_exists('finfo_open')){
        echo ' function exist!</br>';
    } else {
        echo 'function not found</br>';
    }

    echo paymentStatus(1);

    
?>