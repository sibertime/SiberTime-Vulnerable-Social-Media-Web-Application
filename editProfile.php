<?php require_once 'settings/sessCon.php' ?>
<?php require_once("settings/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'include/head.php' ?>
<body>
<?php require_once 'include/header.php' ?>
<?php require_once 'include/nav.php' ?>
<?php
include("settings/db.php");
if (isset($_POST['postSender'])) {
    if(!empty($_FILES['uploaded_file']))
    {
        $path = "img/";
        $path = $path . basename( $_FILES['uploaded_file']['name']);
        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
            $imageName = $_FILES['uploaded_file']['name'];
            $postSenderQuery = "update users SET userImage = '/img/$imageName' where userId = {$_GET['id']}";
            $insert = mysql_query($postSenderQuery);
            if ($insert) {
                echo "Başarıyla eklendi";
                header("Refresh: 1; url=index.php");
            }
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profil Düzenle</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                Profil Resmi Yükle
                                <input type="file" name="uploaded_file" id="fileToUpload">
                            </div>
                            <button name="postSender" type="submit" class="btn btn-default">Resmi yükle</button>
                            <div class="pull-right">
                                <div class="btn-toolbar">
                                    <button type="button" class="btn btn-default"><i class="fa fa-image"></i> Resim
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
