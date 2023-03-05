<?php
session_start();
function session_login_auth($condition)
{
    if (!$_SESSION[$condition]) {
        header('location:/build/views');
        // header('location:/it2/views/login.php');
    }
}
?>