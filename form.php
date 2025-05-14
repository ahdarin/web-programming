<?php
include_once './config/Database.php';
include_once './model/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mahasiswa = new Mahasiswa($db);

$isEdit = false;
$data = [
    'id' => '',
    'nim' => '',
    'nama' => '',
    'jurusan' => ''
];

if (isset($_GET['id'])) {
    $result = $mahasiswa->read($_GET['id'])->fetch_assoc();
    if ($result) {
        $isEdit = true;
        $data = $result;
    }
}

$formAction = $isEdit ? 'function/Mahasiswa.php?action=update' : 'function/Mahasiswa.php?action=create';
$formTitle = $isEdit ? 'Edit Mahasiswa' : 'Create Mahasiswa';
$submitText = $isEdit ? 'Update' : 'Create';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $formTitle ?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <h1><?= $formTitle ?></h1>
        <form action="<?= $formAction ?>" method="post">
            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" value="<?= $data['nim'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" value="<?= $data['jurusan'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2"><?= $submitText ?></button>
        </form>
    </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
