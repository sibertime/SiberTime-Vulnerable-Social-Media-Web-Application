<?php
#mysql_ li ile veritabanına bağlantısı
$baglanti = mysql_connect("localhost","root","") or die ();
mysql_select_db("sibertime", $baglanti) or die ( mysql_error() );
mysql_set_charset("utf8");
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8_general_ci");  
#PDO da veritabanı bağlantısı
try {
     $db = new PDO("mysql:host=localhost;dbname=sibertime", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>