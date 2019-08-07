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
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysql_query("SELECT * FROM users WHERE userId = '{$id}'");
    if (mysql_affected_rows()) {
        $row = mysql_fetch_assoc($query);
    } else {
        header('Location: index.php');
    }
}
?>
<section>
    <div class="container">
        <div class="row">
		<center>
            <div class="col-md-4">
                <div class="panel panel-default">
				<div class="panel-heading">
                        <h4 class="panel-title">Profil Bilgileri</h4>
                    </div>
                    <div style="padding-bottom:8px" class="panel-body">
					<h3 class="page-header"><?php echo $row['userNameSurname']; ?></h3>
                            <img src="<?php echo $row['userImage']; ?>" class="img-thumbnail" alt="">
                            <ul>
                                <li><strong>Name:</strong><?php echo $row['userNameSurname']; ?></li>
                                <li><strong>Email:</strong><?php echo $row['userEmail']; ?></li>
                                <li><strong>City:</strong><?php echo $row['userCity']; ?></li>
                            </ul>
                    </div>
                </div>
            </div>
			</center>
            <div class="col-md-8">
                <?php
                $userId = $_GET['id'];
                $postListenerQuery = $db->query("SELECT * FROM posts p join users u on u.userId = p.postUserId where postUserId = '{$userId}'", PDO::FETCH_ASSOC);
                if ($postListenerQuery->rowCount()) {
                    foreach ($postListenerQuery as $postListenerRow) {
                        ?>
                        <div class="panel panel-default post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="profile.php?id=<?php echo $postListenerRow['userId'] ?>"
                                           class="post-avatar thumbnail"><img style="width: 65px;height: 65px" src="<?php echo $postListenerRow['userImage'] ?>" alt="">
                                            <div class="text-center"><?php echo $postListenerRow['username']?></div>
                                        </a>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="bubble">
                                            <div class="pointer">
                                                <p>
                                                    <?php echo $postListenerRow['postContent']?>
                                                </p>
                                            </div>
                                            <div class="pointer-border"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if($_SESSION['login'] == $postListenerRow['postUserId']){
                                    ?>
                                    <a href="/deletePost.php?postId=<?php echo $postListenerRow['postId'] ?>" type="button" class="btn btn-danger btn-xs">Sil</a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
