<?php
$mysqlsunucu = "localhost";
$mysqlveritabani = "bbdms";
$mysqlkullanici = "root";
$mysqlsifre = "";
try {
    $db = new PDO("mysql:host=$mysqlsunucu;dbname=$mysqlveritabani;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
     $e->getMessage();
    }
?>
