<?php require_once 'settings/sessCon.php' ?>
<?php require_once("settings/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'include/head.php' ?>
<body>
<?php
$userQuery = mysql_query("SELECT * FROM users WHERE userId = '{$_SESSION['login']}'");
if (mysql_affected_rows()) {
    @$userRow = mysql_fetch_assoc($userQuery);
}
?>
<header>
    <div class="container">
        <img style="height: 50px;" src="img/logo.png" class="logo" alt="">
        <form class="form-inline">
            <a type="submit" href="profile.php?id=<?php echo $userRow['userId'] ?>"
               class="btn btn-default"><?php echo $userRow['userNameSurname'] ?></a>
            <a type="submit" href="editProfile.php?id=<?php echo $userRow['userId'] ?>" class="btn btn-default">Profili
                Düzenle</a>
            <a type="submit" href="logout.php" class="btn btn-default">Çıkış Yap</a>
        </form>
    </div>
</header>
<?php require_once 'include/nav.php' ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gönderi Paylaş</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <textarea name="postContent" class="form-control"
                                          placeholder="Merhaba <?php echo $userRow['userNameSurname'] ?> ne düşünüyorsun ?"></textarea>
                            </div>
                            <button name="postSender" type="submit" class="btn btn-default">Gönder</button>
                        </form>
                    </div>
                </div>
                <?php
                if (isset($_POST['postSender'])) {
                    $postContent = $_POST['postContent'];
                    $postUserId = $_SESSION["login"];
                    $postSenderQuery = "INSERT INTO posts SET postUserId  =" . $postUserId . " ,postContent='{$postContent}'";
                    $insert = mysql_query($postSenderQuery);
                    if ($insert) {
                        ob_start();
                        header('Location: index.php');
                    }
                }
                ?>
                <?php
                $query = mysql_query("SELECT * FROM posts p join users u on p.postUserId = u.userId order by p.postId desc");
                if (mysql_affected_rows()) {
                    while ($row = mysql_fetch_assoc($query)) {
                        ?>
                        <div class="panel panel-default post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="profile.php?id=<?php echo $row['userId'] ?>"
                                           class="post-avatar thumbnail"><img style="width: 65px;height: 65px"
                                                                              src="<?php echo $row['userImage'] ?>"
                                                                              alt="">
                                            <div class="text-center"><?php echo $row['username'] ?></div>
                                        </a>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="bubble">
                                            <div class="pointer">
                                                <p>
                                                    <?php echo $row['postContent'] ?>
                                                </p>
                                                <i><?php echo $row['postDate'] ?></i>
                                            </div>
                                            <div class="pointer-border"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default friends">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ara</h3>
                    </div>
                    <div class="panel-body">
                        <form action="search.php" method="get">
                            <div class="form-group">
                                <input type="text" name="user" placeholder="Aramak istediginiz kullanıcıyı girin." class="form-control">
                            </div>
                            <div class="pull-right">
                                <div class="btn-toolbar">
                                    <input class="btn btn-default" type="submit" value="Search" />
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default friends">
                    <div class="panel-heading">
                        <h3 class="panel-title">Üyeler</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <?php
                            $userQuery = mysql_query("SELECT * FROM users");
                            if (mysql_affected_rows()) {
                                while ($usersRows = mysql_fetch_assoc($userQuery)) {
                                    ?>
                                    <li><a href="profile.php?id=<?php echo $usersRows['userId'] ?>"
                                           class="thumbnail"><img style="width: 65px;height: 65px"
                                                                  src="<?php echo $usersRows['userImage'] ?>"
                                                                  alt=""></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>