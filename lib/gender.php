<?php

    function show_gender($gender){
        $list_gender = array(
            'False' => 'Nam',
            'True' => 'Nữ'
        );
        if(array_key_exists($gender, $list_gender)){
            return $list_gender[$gender];
        }
    }

?>