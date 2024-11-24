<?php

if (!function_exists('hashPassword')) {
    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
