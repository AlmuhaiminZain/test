<!DOCTYPE html>
<?php

include 'konek.php';
$id = "";
$judul = "";
$pengarang = "";
$penerbit = "";
$kategori = "";
$gambar = "";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM tb_buku WHERE id='$id'";
    $sql = mysqli_query($konek, $query);
    $data = mysqli_fetch_array($sql);
    $judul = $data['judul'];
    $pengarang = $data['pengarang'];
    $penerbit = $data['penerbit'];
    $kategori = $data['kategori'];
    $gambar = $data['gambar'];
}
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">Data Buku</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </nav>
        <figure class="text-center mt-3">
            <blockquote class="blockquote">
                <p>Data Buku yang tersedia</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">CRUD : Create, Read, Update, and Delete</cite>
            </figcaption>
        </figure>
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" placeholder="Masukan Judul Buku">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pengarang" class="col-sm-2 col-form-label">pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $pengarang; ?>" placeholder="Masukan Pengarang Buku">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>" placeholder="Masukan Penerbit Buku">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                <div class="col-sm-10">
                    <select name="kategori" id="kategori" class="form-control" value="<?php echo $kategori; ?>">
                        <option value="Umum" <?php if ($kategori == "Umum") echo "selected"; ?>>Umum</option>
                        <option value="IT" <?php if ($kategori == "IT") echo "selected"; ?>>IT</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar" class="col-sm-2 col-form-label">gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
            </div>
            <div class="mb-3 row">
                <?php
                if (isset($_GET['edit'])) {
                    echo "<button type='submit' class='btn btn-warning' name='btnProses' value='edit'>Simpan Perubahan</button>";
                } else {
                    echo "<button type='submit' class='btn btn-warning' name='btnProses' value='tambah'>Tambah Data</button>";
                }
                ?>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>