<?php
    $connection = mysql_connect('localhost','root','') or die ("koneksi gagal");
    mysql_select_db('juandri',$connection) or die("failed database");
?>