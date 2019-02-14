<?php
    // memanggil Koneksi
    require_once __DIR__.'/koneksi.php';

    $sql = 'SELECT * FROM pet order by NAMA asc';
    $rs = mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Hewan</title>
    <script type = "text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js" ></script>
    <style type="text/css">
        body {font-family: verdana; font-size:13px;}
        input, textarea, button {padding:5px;}
        button {cursor : pointer;}
        .container{margin :auto; width:800px;}
        .container .content-form{display:none}
        .container .content-view{display:none}
        .container .table thead tr th {padding : 7px 10px; background-color:#EBEBEB; }
        .container .table tbody tr td { padding: 7px 10px; border-bottom: 1px solid #DDDDDD; }
        .close-form { float: right; margin-right: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Crud Hewan</h2>
        <hr>
        <!-- Form untuk Input dan Edit -->
        <div class="content-form">
            <hr />
            <span class="title">FORM ENTRI</span>
            <span class="close-form">X</span>
            <hr>
            <form method="POST" class = "form" action="index.php" >
                <table>
                    <tbody> 
                        <tr>
                            <td width= "100">Nama</td>
                            <td>: <input type="text" name="nama" id="nama"/></td>
                        </tr>
                        <tr>
                            <td width= "100">Owner</td>
                            <td>: <input type="text" name="owner" id="owner"/></td>
                        </tr>
                        <tr>
                            <td width="100">Species</td>
                            <td>: <input type="text" name="species" id="species"/></td>
                        </tr>
                        <tr>
                            <td width= "100">Sex</td>
                            <td>: <input type="text" name="sex" maxlength="1" id="sex"/></td>
                        </tr>
                        <tr>
                            <td width= "100">Birth</td>
                            <td>: <input type="date" name="birth" id="birth"/></td>
                        </tr>
                        <tr>
                            <td width= "100">Death</td>
                            <td>: <input type="date" name="death" id="death"/></td>
                        </tr>
                        <tr>
                        <td colspan="2"><button type="submit" id="button">TAMBAH</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!-- /Form untuk Input dan Edit -->
        <!-- Menampilkan view -->
        <div class="content-view">
            <hr>
            <span class="title">VIEW</span>
            <span class="close-form">X</span>
            <hr>
            <table>
                <tbody>
                    <tr>
                        <td width= "100">Nama</td>
                        <td>:<span class="result-nama"></span></td>
                    </tr>
                    <tr>
                        <td width= "100">Owner</td>
                        <td>:<span class="result-owner"></span></td>
                    </tr>
                    <tr>
                        <td width="100">Species</td>
                        <td>:<span class="result-species"></span></td>
                    </tr>
                    <tr>
                        <td width= "100">Sex</td>
                        <td>:<span class="result-sex"></span></td>
                    </tr>
                    <tr>
                        <td width= "100">Birth</td>
                        <td>:<span class="result-birth"></span></td>
                    </tr>
                    <tr>
                        <td width= "100">Death</td>
                        <td>:<span class="result-death"></span></td>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
        <!-- /Menampilkan view -->
        <a href="#" class="control" data-set="tambah" data-url="aksi.php?set=tambah">Tambah</a> 
        <table class="table" width="100%">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="100">Nama</th>
                    <th width="100">OWNER</th>
                    <th width="100">SPECIES</th>
                    <th width="50">SEX</th>
                    <th width="150">BIRTH</th>
                    <th width="150">DEATH</th>
                    <th width="200">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    if (mysql_num_rows($rs) > 0) {
                        while ($row = mysql_fetch_array($rs)) {
                            $id = $row['id'];
                            $nama = $row['NAMA'];
                            $owner =$row['OWNER'];
                            $species =$row['SPECIES'];
                            $sex =$row['SEX'];
                            $birth =$row['BIRTH'];
                            $death =$row['DEATH'];
                ?>
                <tr>
                    <td align="center"><?php echo $i;?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $owner; ?></td>
                    <td><?php echo $species; ?></td>
                    <td><?php echo $sex; ?></td>
                    <td><?php echo $birth; ?></td>
                    <td><?php echo $death; ?></td>
                    <td align="center">
                        <a href="#" class="control" data-set="lihat" data-nama="<?php echo $nama; ?>"
                            data-owner="<?php echo $owner; ?>"
                            data-species="<?php echo $species; ?>"
                            data-sex="<?php echo $sex; ?>"
                            data-birth="<?php echo $birth; ?>"
                            data-death="<?php echo $death; ?>">lihat</a> |
                        <a href="#" class="control" data-set="edit" data-nama="<?php echo $nama; ?>"
                            data-owner="<?php echo $owner; ?>"
                            data-species="<?php echo $species; ?>"
                            data-sex="<?php echo $sex; ?>"
                            data-birth="<?php echo $birth; ?>"
                            data-death="<?php echo $death; ?>" 
                            data-url="aksi.php?set=edit&id=<?php echo $id; ?>">edit</a> |  
                        <a href="aksi.php?set=hapus&id=<?php echo $id; ?>" class="hapus">hapus</a>
                    </td>
                </tr>
                <?php
                    $i++;            
                    }
                    }else {?>
                        <tr>
                            <td colspan="8" align="center">BELUM ADA DATA</td>
                        </tr>
                <?php        
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<script type="text/javascript">
    $(function () {
        $('.control').on('click',function () {
            // mengambil isi element data-set dari  class control untuk mengetahui proses yang akan di lakukan
            $set =$(this).attr('data-set');

            // jika isi set adalah tambah atau edit maka yang di animasi adalam form
            if ($set == 'tambah' || $set =='edit') {
                // memanggil isi element dari class control
                $url= $(this).attr('data-url');

                // buat motion buka tutup
                $('.content-form, .content-view').slideUp('fast');
                setTimeout(function(){$('.content-form').slideDown('slow')},500);

                // ganti isi attribute action pada class form dengan url hasil dari element data-url pada class control
                    $('.form').attr('action', $url);

                // tapi jika isi set adalah lihat maka yang di animasi adalah view
            }else if($set == 'lihat'){
                $('.content-form, .content-view').slideUp('fast');
                setTimeout(function(){ $('.content-view').slideDown('slow') }, 500);
            }

            if($set == 'tambah'){
                    // kosongkan input, dan textarea
                    $('#nama, #owner, #species, #sex, #birth, #death').val('');

                    // rubah text button pada class form dengan tulisan TAMBAH DATA, dan rubah judul form pada class title
                    $('.content-form .title').html('FORM ENTRI');
                    $('.form #button').html('TAMBAH HEWAN');

                }else if($set == 'edit'){
                    // ambil isi attribute data-nama, data-owner,data-species,data-sex,data-birth dan data-death pada class control
                    $nama = $(this).attr('data-nama');
                    $owner = $(this).attr('data-owner');
                    $species = $(this).attr('data-species');
                    $sex = $(this).attr('data-sex');
                    $birth = $(this).attr('data-birth');
                    $death = $(this).attr('data-death');

                    // kemudian masukan kedalam input
                    $('#nama').val($nama);
                    $('#owner').val($owner);
                    $('#species').val($species);
                    $('#sex').val($sex);
                    $('#birth').val($birth);
                    $('#death').val($death);

                    // rubah text button pada class form dengan tulisan SIMPAN, dan rubah judul form pada class title
                    $('.content-form .title').html('FORM EDIT');
                    $('.form #button').html('SIMPAN');

                    }else if($set == 'lihat'){
                    // ambil isi attribute data-nama, data-owner,data-species,data-sex,data-birth dan data-death pada class control
                    $nama = $(this).attr('data-nama');
                    $owner = $(this).attr('data-owner');
                    $species = $(this).attr('data-species');
                    $sex = $(this).attr('data-sex');
                    $birth = $(this).attr('data-birth');
                    $death = $(this).attr('data-death');

                    // kemudian tempelkan di class result-nama;
                    $('.content-view .result-nama').html($nama);
                    $('.content-view .result-owner').html($owner);
                    $('.content-view .result-species').html($species);
                    $('.content-view .result-sex').html($sex);
                    $('.content-view .result-birth').html($birth);
                    $('.content-view .result-death').html($death);
                }   
        });
        // menutup form atau view
        $('.close-form').on('click', function(){
            $('.content-form, .content-view').slideUp('fast');
        });
        $('.form').on('submit', function(e){
                // ambil semua data yang ada di form dengan serialize()
                $data = $(this).serialize();

                // ambil url yang sudah di rubah pada attribute action
                $url = $(this).attr('action');

                // gunakan ajax untuk mengirim data
                // disini saya manggunakan JSON untuk mendapatkan response nya
                $.ajax({
                    'type': 'POST',
                    'dataType': 'JSON',
                    'data': $data,
                    'url': $url,
                    'beforeSend': function(){
                        // proses sebelum mengirim data
                    },
                    'success': function(response){
                        // proses saat data berhasil di kirim
                        if(response.error == false){
                        alert(response.pesan);
                        }

                        // segerkan halaman
                        window.location = 'index.php';
                    }
                });

                // tahan form agar tidak berpindah halaman
                e.preventDefault();
            });

        
            $('.hapus').on('click', function(e){
                // ambil isi attribute href pada class hapus
                $url = $(this).attr('href');

                if(confirm('Yakin akan di hapus ? ')){
                $.ajax({
                    'type': 'GET',
                    'dataType': 'JSON',
                    'url': $url,
                    'beforeSend': function(){
                    // proses sebelum mengirim data
                    },
                    'success': function(response){
                    // proses saat data berhasil di kirim
                    if(response.error == false){
                    alert(response.pesan);
                    }

                    // segerkan halaman
                    window.location = 'index.php';
                    }
                });

                return false;
                }

            e.preventDefault();
            });
    });
</script>
