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
            <div class="col-md-12">
                <div class="panel panel-default friends">
                    <div class="panel-heading">
                        <h3 class="panel-title">Üyeler</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo 'Aradığınız kelime '.$_GET['user']; ?>
                        <ul>
                            <?php
                            if (isset($_GET['user'])) {
                                $searchUser = $_GET['user'];
                                $userQuery = mysql_query("SELECT * FROM users where username like '%$searchUser%'");
                                if (mysql_affected_rows()) {
                                    while ($usersRows = mysql_fetch_assoc($userQuery)) {
                                        ?>
                                        <li><a href="profile.php?id=<?php echo $usersRows['userId'] ?>"
                                               class="thumbnail"><img style="width: 65px;height: 65px"
                                                                      src="<?php echo $usersRows['userImage'] ?>"
                                                                      alt=""></a><div class="text-center"><a href="profile.php?id=<?php echo $usersRows['userId'] ?>"><?php echo $usersRows['username'] ?></a> </div>
                                        </li>
                                        <?php
                                    }
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