<?php
$userQuery = mysql_query("SELECT * FROM users WHERE userId = '{$_SESSION['login']}'");
if (mysql_affected_rows()) {
    @$userRow = mysql_fetch_assoc($userQuery);
}
?>
<header>
    <div class="container">
        <a href="index.php"><img style="height: 50px;" src="img/logo.png" class="logo" alt=""></a>
        <form class="form-inline">
            <a type="submit" href="profile.php?id=<?php echo $userRow['userId'] ?>"
               class="btn btn-default"><?php echo $userRow['userNameSurname'] ?></a>
            <a type="submit" href="editProfile.php?id=<?php echo $userRow['userId'] ?>" class="btn btn-default">Profili
                Düzenle</a>
            <a type="submit" href="logout.php" class="btn btn-default">Çıkış Yap</a>
        </form>
    </div>
</header>