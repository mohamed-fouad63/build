<?php
session_start();
function session_login_auth($condition)
{
    if (!$_SESSION[$condition]) {
        header('location:/build/views');
        // header('location:/build/views/login.php');
    }
}
?>