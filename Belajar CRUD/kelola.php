<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Font -->
 <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>belajar_crud</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        belajar_crud - BS5
    </a>
  </div>
  <div class="container">
    <form action="proses.php" method="POST">
      <div class="mb-3 row">
    <label for="nisn" class="col-sm-2 col-form-label">
        NISN
    </label>
    <div class="col-sm-10">
      <input type="text"  name="nisn" class="form-control" id="nisn" placeholders="ex : 12345644">
    </div>
  </div>
  </div>
   <div class="container">
    <div class="mb-3 row">
    <label for="nisn" class="col-sm-2 col-form-label">
        Nama
    </label>
    <div class="col-sm-10">
      <input type="text" name="nama_siswa" class="form-control" id="nama" placeholders="ex : Alexander">
    </div>
    <select id="jkel" name="jenis_kelamin" class="form-select">
  <option selected>Jenis kelamin siswa</option>
  <option value="1">Laki laki</option>
  <option value="2">Perempuan</option>
  <option value="3">Transgender</option>
</select>
<div class="mb-3">
  <label for="foto" class="form-label">Foto</label>
  <input class="form-control" type="file" name="foto" id="foto">
</div>
<div class="mb-3">
  <label for="alamat" class="form-label">Alamat</label>
  <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
</div>
<div class="mb-3 row mt-4">
    <div class="col">
      <?php
      if (isset($_GET['ubah'])){
      ?>
 <button type="submit" name="aksi" value="edit" class="btn btn-primary">
            Simpan perubahan
    </button>
      <?php
      } else {
      ?>
      <button type="submit" value="add" name="aksi" class="btn btn-primary">
            Tambahkan 
    </button>
     <?php
      } 
      ?>
     <a href="Beranda.php" type="button" class=" btn btn-danger">
            Batal
     </a>
    </div>
    </form>
   
</div>
  </nav>
</body>
</html>