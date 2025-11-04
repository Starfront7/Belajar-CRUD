<?php
include 'koneksi.php';

$mode = 'add';
$data = [
  'id_siswa' => '',
  'nisn' => '',
  'nama_siswa' => '',
  'jenis_kelamin' => '',
  'foto_siswa' => '',
  'alamat' => ''
];

if (isset($_GET['ubah'])) {
  $id = (int) $_GET['ubah'];
  $q = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id_siswa = $id LIMIT 1");
  if ($q && mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    $data = $row;
    $mode = 'edit';
  } else {
    // jika id tidak ditemukan redirect ke index
    header("Location: index.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo ($mode === 'edit') ? 'Edit' : 'Tambah'; ?> Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>

<body>
  <div class="container mt-4">
    <h2><?php echo ($mode === 'edit') ? 'Edit Data Siswa' : 'Tambah Data Siswa'; ?></h2>
    <form method="post" action="proses.php" enctype="multipart/form-data">
      <input type="hidden" name="id_siswa" value="<?php echo htmlspecialchars($data['id_siswa']); ?>">
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">NISN</label>
        <div class="col-sm-10">
          <input name="nisn" type="text" class="form-control" value="<?php echo htmlspecialchars($data['nisn']); ?>"placeholder="Nisn"
            required>
        </div>
      </div>

      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input name="nama_siswa" type="text" class="form-control" placeholder="Nama"
            value="<?php echo htmlspecialchars($data['nama_siswa']); ?>" required>
        </div>
      </div>

      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select name="jenis_kelamin" class="form-select" required>
            <option value="">Pilih...</option>
            <option value="Laki-Laki" <?php if ($data['jenis_kelamin'] == 'Laki-Laki')
              echo 'selected'; ?>>Laki-Laki
            </option>
            <option value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan')
              echo 'selected'; ?>>Perempuan
            </option>
          </select>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Foto (jpg/png) - kosongkan jika tidak ingin mengganti</label>
        <?php if (!empty($data['foto_siswa']) && file_exists('img/' . $data['foto_siswa'])): ?>
          <div class="mb-2">
            <img src="<?php echo 'img/' . $data['foto_siswa']; ?>" alt="foto" style="width:120px;border-radius:6px;">
          </div>
        <?php endif; ?>
        <input name="foto" class="form-control" type="file" accept="image/*">
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" placeholder="Alamat"
          rows="3"><?php echo htmlspecialchars($data['alamat']); ?></textarea>
      </div>

      <div class="mb-3">
        <?php if ($mode === 'edit'): ?>
          <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Simpan
            Perubahan</button>
        <?php else: ?>
          <button type="submit" name="aksi" value="add" class="btn btn-primary"><i class="fa fa-floppy-o"></i>
            Tambahkan</button>
        <?php endif; ?>
        <a href="index.php" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</body>

</html>