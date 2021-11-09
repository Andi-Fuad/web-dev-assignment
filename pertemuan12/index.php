<?php
//koneksi database
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbpertemuan12";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

//aktifkan tombol simpan

$rand = rand();
if (isset($_POST['bsimpan'])) {
    $nama_foto = $_FILES['foto']['name'];
    $xx = $rand.'_'.$nama_foto;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$rand.'_'.$nama_foto);
    if ($_GET['hal'] == "edit") {
        $edit = mysqli_query($koneksi, "UPDATE tmhs set 
        nim='$_POST[tnim]',
        nama='$_POST[tnama]',
        alamat='$_POST[talamat]',
        prodi='$_POST[tprodi]',
        foto='$xx'
        WHERE id_mhs = '$_GET[id]'
        ");
        if ($edit) {
            echo "<script>
            alert('Edit data sukses!');
            document.location='index.php';
            </script>";
        } else {
            echo "<script>
            alert('Edit data gagal!');
            document.location='index.php';
            </script>";
        }
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi, foto)
        VALUES('$_POST[tnim]','$_POST[tnama]','$_POST[talamat]','$_POST[tprodi]','$xx')");
        if ($simpan) {
            echo "<script>
            alert('Simpan data sukses');
            document.location='index.php';
            </script>";
        } else {
            echo "<script>
            alert('Simpan data gagal');
            document.location='index.php';
            </script>";
        }
    }
}

if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $vnim = $data['nim'];
            $vnama = $data['nama'];
            $valamat = $data['alamat'];
            $vprodi = $data['prodi'];
            $vfoto = $data['foto'];
        }
    } else if ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs='$_GET[id]'");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>PERTEMUAN 12</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        h2 {
            font-family: "Times New Roman", Times, serif;
        }
    </style>
    <script>
        function show(shown, hidden) {
            document.getElementById(shown).style.display = 'block';
            document.getElementById(hidden).style.display = 'none';
            return false;
        }
    </script>
</head>

<body>
    <div id="Page1">
        <div style="background-image: url('bg_form.jpg'); height: 100%; background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
            <div class="container">
                <div class="border border-primary bg-warning text-black text-center rounded-pill mx-auto" style="width: 50%;">
                    <h2 class="mx-5">PERTEMUAN 12</h2>
                </div>

                <!--Awal card Form-->
                <div class="card bg-white mx-auto mt-5 border border-danger border-4 rounded-3 mb-3" style="width: 60%;">
                    <div class="card-body">
                        <h2 class="text-center">Form Pengisian Data</h2>
                        <hr class="text-black">

                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-4 row text-black">
                                <label class="col-sm-2 col-form-label fw-bolder">NIM</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tnim" value="<?= @$vnim ?>" class="form-control" placeholder="Input NIM Anda" required="required">
                                </div>
                            </div>

                            <div class="mb-4 row text-black">
                                <label class="col-sm-2 col-form-label fw-bolder">NAMA</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tnama" value="<?= @$vnama ?>" class="form-control" placeholder="Input Nama Anda" required="required">
                                </div>
                            </div>

                            <div class="mb-4 row text-black">
                                <label class="col-sm-2 col-form-label fw-bolder">ALAMAT</label>
                                <div class="col-sm-9">
                                    <textarea name="talamat" class="form-control" placeholder="Input Alamat Anda" required="required"><?= @$valamat ?></textarea>
                                </div>
                            </div>

                            <div class="mb-4 row text-black">
                                <label class="col-sm-2 col-form-label fw-bolder">PRODI</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="tprodi" required="required">
                                        <option value=""><?= @$vprodi ?></option>
                                        <option value="S1-MT">S1-MT</option>
                                        <option value="S1-SI">S1-SI</option>
                                        <option value="S1-AK">S1-AK</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4 row text-black">
                                <label for="formFile" class="form-label col-sm-2 col-form-label fw-bolder">FOTO</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="formFile" name="foto"><?= @$vfoto ?>
                                </div>
                            </div>

                            <button type="reset" class="btn btn-warning" name="breset">Reset</button>
                            <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a class="btn btn-info mx-auto" role="button" href="#" onclick="return show('Page2','Page1');">List Mahasiswa</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--Akhir Card Form-->

    <!--Awal card Form-->
    <div id="Page2" style="display:none">
        <div class="card border-info mt-3">
            <div class="card-header">Daftar Mahasiswa</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>PRODI</th>
                        <th>FOTO</th>
                        <th>AKSI</th>
                    </tr>

                    <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nim']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['prodi']; ?></td>
                            <td><img src="foto/<?php echo $data['foto'] ?>" width="35" height="40"></td>
                            <td>
                                <a href="index.php?hal=edit&id=<?= $data['id_mhs'] ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?hal=hapus&id=<?= $data['id_mhs'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <a class="btn btn-outline-primary mx-auto" role="button" href="#" onclick="return show('Page1','Page2');">Form Mahasiswa</a>
        </div>
    </div>
    <!--Akhir Card Form-->


    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>