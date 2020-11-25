<?php

    function hashPwd($password){
        $options = [
            'cost' => 11
            ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

?>