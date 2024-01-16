<?php

$host           ="localhost";
$user           ="root";
$pass           ="";
$db             ="admin_page";
$port           = 3307;

$mysqli        = mysqli_connect($host,$user,$pass,$db, $port);
if(!$mysqli){
    die("gagal terkoneksi");
}
//echo"Berhasil";

//Menambah member baru
if(isset($_POST['tambahmember'])){
    $idmember= $_POST['idmember'];
    $namamember= $_POST['namamember'];
    $umur= $_POST['umur'];
    $alamat= $_POST['alamat'];
    $memberplan= $_POST['memberplan'];
    $mulaimember= $_POST['mulaimember'];
    $memberexpired= $_POST['memberexpired'];


    //tambah ke database
    $addtotable= mysqli_query($mysqli, "INSERT INTO addmember (idmember, namamember, umur, alamat, memberplan, mulaimember, memberexpired) VALUES ('$idmember', '$namamember', '$umur', '$alamat', '$memberplan', '$mulaimember', '$memberexpired')");
    if($addtotable){
        echo "<script> alert ('Success nambah member');</script>";
        header('location:index.php');
    } else{
        echo "<script> alert ('Gagal menambahkan member.');</script>";
    }
}

//proses nambah perlengkapan
if(isset($_POST['tambahalat'])){
    $alat = $_FILES['alat']['name'];
    $namaalat = $_POST['namaalat'];
    $biayapembelian = $_POST['biayapembelian'];
    $tanggalpembelian = $_POST['tanggalpembelian'];

    if($alat != ""){
        $ekstensi_diizinkan = array('jpg', 'png');
        $x = explode('.', $alat);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['alat']['name'];
        $angka_random = rand(1, 999);
        $nama_alat_baru = $angka_random.'-'.$alat;

        if(in_array($ekstensi, $ekstensi_diizinkan) === true){
            move_uploaded_file($file_tmp, 'assets/img/'.$nama_alat_baru);

            $query = "INSERT INTO perlengkapan (alat, namaalat, biayapembelian, tanggalpembelian) VALUES ('$nama_alat_baru', '$namaalat', '$biayapembelian', '$tanggalpembelian')";
            $result = mysqli_query($mysqli, $query);

            if(!$result){
                die("Query error : ".mysqli_errno($mysqli)." - ".mysqli_error($koneksi));
            } else {
                echo "<script> alert('Data succes uploaded'); window.location='perlengkapan.php';</script>";
            }
        }
    }
}
?>

