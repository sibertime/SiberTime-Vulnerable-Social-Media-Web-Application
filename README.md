# SiberTime Vulnerable Web Application

[![N|CybrbookLogo](https://raw.githubusercontent.com/sibertime/sibertime-vulnerable-web-application/master/img/readme/logo.png)](https://github.com/sibertime/sibertime-vulnerable-web-application)


[![N|Cybrbook](https://raw.githubusercontent.com/sibertime/sibertime-vulnerable-web-application/master/img/readme/sibertime1.PNG)](https://github.com/sibertime/sibertime-vulnerable-web-application)

SiberTime Vulnerable Web Application uygulaması kendini web güvenliği alanında geliştirmek isteyen kişiler için hazırlanmıştır. Uygulama php ile kodlanmış ve üzerinde çeşitli bir çok zafiyet barındırmaktadır. Bu zafiyetlerden bazıları şunlardır :

  - Sql injection
  - Cross Site Scripting
  - Broken Authentication
  - Sensitive Data Exposure
  - Broken Access Control

Uygulama Windows 10 - xamp üzerinde aşağıdaki versiyonlar ile sorunsuz çalışmaktadır.

- PHP Version 5.6.38
- 10.1.36-MariaDB
- XAMP v3.2.2

# Kurulum

  - İndirdiginiz dosyaları xamp üzerinden "C:\xampp\htdocs" ,wamp üzerinden "C:\wamp\www" , linux üzerinden ise "/var/www/html" dizini içine yüklemeniz yeterli olacaktır.
  - Veritabanı baglantısını gerçekleştirmek için "/settings/db.php" adlı dosya içindeki bilgileri kendi sql server bilginiz ile değiştirmeniz yeterli olacaktır.
  
         <?php
         #....
	    $baglanti = mysql_connect("localhost","root","password") or die ();
         ?>
  
  - Settings dizini içinde bulunan "sibertime-database.sql" adlı dosyayı veritabanına yüklemek yeterli olacaktır.

# Uygulama içi görseller

[![N|Cybrbook](https://raw.githubusercontent.com/sibertime/sibertime-vulnerable-web-application/master/img/readme/sibertime2.PNG)](https://github.com/sibertime/sibertime-vulnerable-web-application/)

[![N|Cybrbook](https://raw.githubusercontent.com/sibertime/sibertime-vulnerable-web-application/master/img/readme/sibertime3.PNG)](https://github.com/sibertime/sibertime-vulnerable-web-application/)

[![N|Cybrbook](https://raw.githubusercontent.com/sibertime/sibertime-vulnerable-web-application/master/img/readme/sibertime4.PNG)](https://github.com/sibertime/sibertime-vulnerable-web-application/)
