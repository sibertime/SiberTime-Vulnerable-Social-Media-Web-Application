<!DOCTYPE html>
<html lang="en">
<?php require_once 'include/head.php' ?>
<body>
<header>
    <div class="container">
        <img style="height: 50px;" src="img/logo.png" class="logo" alt="">
        <form method="post" class="form-inline">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Kullanıcı Adı</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail3"
                       placeholder="Kullanıcı Adı">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword3"
                       placeholder="Şifre">
            </div>
            <button name="loginButton" type="submit" class="btn btn-default">Giriş Yap</button>
        </form>
    </div>
</header>

<section>
    <div class="container">
        <div class="row">
            <div style="text-align: center" class="col-md-8">
                <br>
                <img class="img-thumbnail" src="img/girisResmi.jpg" alt="Chania" style="width: 600px">
                <p>Makineler düşünebilir mi? - 23 Haziran 1912</p>
            </div>
            <div class="col-md-4">
                <h3>Haydi hemen katıl !</h3>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Adın ve soyadın:</label>
                        <input name="nameAndSurname" type="text" class="form-control" id="email" placeholder="Kullanıcı Adı"
                               name="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Kullanıcı Adı:</label>
                        <input name="username" type="text" class="form-control" id="email" placeholder="Kullanıcı Adı"
                               name="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email"
                               name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Şifre:</label>
                        <input name="password" type="password" class="form-control" id="pwd" placeholder="Şifre"
                               name="pwd">
                    </div>
                    <button name="registerButton" type="submit" class="btn btn-default">Gönder</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include("settings/db.php");
session_start();
ob_start();
if (isset($_POST['loginButton'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysql_query("SELECT * FROM users WHERE username = '{$username}' and password = '{$password}'");
    if (mysql_affected_rows()) {
        $row = mysql_fetch_assoc($query);
        if ($row) {
            $_SESSION['login'] = $row['userId'];
            header('Location: index.php');
        }
    } else {
        echo '<script>alert("Kullanıcı adı veya şifre Yanlış")</script>';
    }
}
if (isset($_POST['registerButton'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nameAndSurname = $_POST['nameAndSurname'];
    if (empty($username || $email or $password || $nameAndSurname)) {
        echo '<script>alert("Lütfen boş bir alan bırakmayınız")</script>';
    } else {
        $usernameControl = $db->query("SELECT * FROM users WHERE username = '{$username}'")->fetch(PDO::FETCH_ASSOC);
            if (!empty($usernameControl)) {
            echo '<script>alert("Kullanıcı adı daha önceden sisteme üye olmuştur.")</script>';
        } else {
            $insertQueryForRegister = $db->prepare("INSERT INTO users SET username = ?, userEmail = ?, password = ? , userNameSurname= ?");
            $insertStatus = $insertQueryForRegister->execute(array($username, $email, $password,$nameAndSurname));
            if ($insertStatus) {
                print "<script>alerrt('Kayıt işleminiz gerçekleşti.')</script>";
            }
        }
    }
}
ob_end_flush();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
