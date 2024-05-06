<?php
  include "../../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Update data</title>
  <link rel="icon" type="image/x-icon" href="../../dist/assets/img/logo_smk.png" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

  <?php

    // Ambil data dari patameter url browser
    $id = $_GET['id'];

    // Query ambil data dari param jika ada.
    $query = "SELECT * FROM posts WHERE id = $id";
    // Hasil Query
    $result = mysqli_query($link, $query);
    foreach($result as $data) {
  ?>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Agenda</h1>
      <form method="POST">
        <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
        <input type="hidden" value="<?= $data['id'] ?>" name="id">
        <div class="mb-3">
          <label for="inputNis" class="form-label">Judul Agenda</label>
          <input type="text" class="form-control" id="inputJudul" value="<?= $data['judul'] ?>" name="judul" placeholder="Masukan Judul Agenda">
        </div>
        <div class="mb-3">
          <label for="inputIsi" class="form-label">Keterangan Agenda</label>
          <input type="text" class="form-control" id="inputIsi" value="<?= $data['isi'] ?>" name="isi" placeholder="Masukan Keterangan Agenda Sekolah">
        </div>
        <div class="mb-3">
          <label for="inputCreate" class="form-label">Tanggal</label>
          <input type="date" class="form-control" id="inputKelas" value="<?= $data['create_at'] ?>" name="create_at">
        </div>
        <input name="daftar" type="submit" class="btn btn-primary" value="Update">
        <a href="../tables.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php } ?>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['daftar'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $judul = $_POST['judul'];
      $isi = $_POST['isi'];
      $create_at = $_POST['create_at'];

      // Membuat Query
      $query = "UPDATE posts SET judul = '$judul', isi = '$isi', create_at = '$create_at' WHERE id = '$id'";

      $result = mysqli_query($link, $query);

      if($result){
        header("location: ../tables.php");
      } else {
        echo "<script>alert('Data Gagal di update!')</script>";
      }

    }    

  ?>

</body>
</html>