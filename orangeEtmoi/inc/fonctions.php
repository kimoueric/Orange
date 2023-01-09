<?php

function userClient()
{
    if ($_SESSION['statut_user'] == 0) {
        return true ;
    }
}

function userAdmin()
{
    if ($_SESSION['statut_user'] == 1) {
        return true ;
    }
}

?>