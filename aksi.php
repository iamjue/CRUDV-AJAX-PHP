<?php
    // memanggil koneksi
    require_once __DIR__.'/koneksi.php';

    //menentukan apakah proses berupa tambah, edit atau hapus
    $set = $_GET['set'];

    // proses tambah
    if ($set =='tambah') {
        $nama = $_POST['nama'];
        $owner =$_POST['owner'];
        $species =$_POST['species'];
        $sex =$_POST['sex'];
        $birth =$_POST['birth'];
        $death =$_POST['death'];
    
        // $sql = 'INSERT INTO pet SET';
        // $sql .=' NAMA="'.$nama.'",';
        // $sql .=' OWNER="'.$owner.'",';
        // $sql .=' SPECIES="'.$species.'",';
        // $sql .=' SEX="'.$sex.'",';
        // $sql .=' BIRTH="'.$birth.'",';
        // $sql .=' DEATH="'.$death.'"';
        // $rs = mysql_query($sql);
        
        $rs = mysql_query("INSERT INTO pet (id,nama,owner,species,sex,birth,death) 
            VALUES(0,'".$nama."','".$owner."','".$species."','".$sex."','".$birth."','".$death."')");

        $user_id = mysql_insert_id();

        // untuk response ya saya menggunkan aray agar bisa menjadi JSON
        $response = array(
            'error'=>false,
            'pesan'=>'Hewan Berhasil Ditambahkan'
        );

        // merubah bentuk aray ke format JSON
        echo json_encode($response);
    
    // proses edit
    }elseif ($set == 'edit') {
        $user_id =intval($_GET['id']);
        $nama = $_POST['nama'];
        $owner =$_POST['owner'];
        $species =$_POST['species'];
        $sex =$_POST['sex'];
        $birth =$_POST['birth'];
        $death =$_POST['death'];

        // $sql = 'UPDATE pet SET';
        // $sql .=' NAMA="'.$nama.'",';
        // $sql .=' OWNER="'.$owner.'",';
        // $sql .=' SPECIES="'.$species.'",';
        // $sql .=' SEX="'.$sex.'",';
        // $sql .=' BIRTH="'.$birth.'",';
        // $sql .=' DEATH="'.$death.'"';
        // $sql .=' WHERE id='.$user_id;
        // mysql_query($sql);
        mysql_query("UPDATE pet SET nama='".$nama."',owner='".$owner."',species='".$species."',
            sex='".$sex."',birth='".$birth."',death='".$death."' WHERE id ='".$user_id."'");

        // untuk response ya saya menggunakan array agar bisa menjadi JSON
        $response = array(
            'error'=>false,
            'pesan'=>'Hewan Berhasil Di Update'
        );

        // merubah bentuk aray ke format JSON
        echo json_encode($response);
    
    // proses Hapus
    }
    elseif ($set=='hapus') {
        $user_id = intval($_GET['id']);

        // $sql = 'DELETE FROM pet';
        // $sql .= ' WHERE id='.$user_id;
        // mysql_query($sql);

        mysql_query("DELETE FROM pet WHERE id='".$user_id."'");

        // untuk response ya saya menggunakan array agar bisa menjadi JSON
        $response = array(
            'error'=>false,
            'pesan'=>'Data Berhasil Di Hapus'
        );

        // merubah bentuk aray ke format JSON
        echo json_encode($response);
    }
    
?>