<?php require_once 'settings/sessCon.php' ?>
<?php require_once("settings/db.php"); ?>
<?php
ob_start();
if (isset($_GET['postId'])) {
    $id = $_GET['postId'];
    $delete = mysql_query("DELETE FROM posts where postId = '{$id}'");
    if($delete){
        header('Location: profile.php?id='.$_SESSION['login']);
    }
}