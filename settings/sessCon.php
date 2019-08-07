<?php
session_start();
ob_start();
if(!isset($_SESSION["login"])){
    echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
    header('Location: ../login.php');
}
?>