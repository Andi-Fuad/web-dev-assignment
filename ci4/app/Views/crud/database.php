<?php
$page = 3;
?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
body {
    max-width: 100%;
    max-height: 100%;
    background-image: url("https://i.pinimg.com/originals/ec/eb/79/eceb7990b39fa62d4189f57f2076712f.png");
    background-position: top;
}
</style>
<div class="container">
    <div class="row">
        <div class="col">
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
                        foreach ($datamhs as $bio) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $bio['nim']; ?></td>
                            <td><?= $bio['nama']; ?></td>
                            <td><?= $bio['alamat']; ?></td>
                            <td><?= $bio['prodi']; ?></td>
                            <td><img src="/public/img/<?= $bio['foto'] ?>" width="35" height="40"></td>
                            <td>
                                <a href="edit/<?= $bio['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete/<?= $bio['id'] ?>"
                                    onclick="return confirm('Anda Yakin Akan Menghapus Data?');"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <!--Akhir Card Form-->
    </div>
</div>
<?= $this->endSection('content'); ?>