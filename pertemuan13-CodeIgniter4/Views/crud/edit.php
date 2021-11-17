<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
body {
    max-width: 100%;
    max-height: 100%;
    background-image: url("https://i.imgur.com/KIwb1jy.jpg");
    background-position: 55%;
}
</style>
<div class="container">
    <!--Awal card Form-->
    <div class="card mx-auto mt-5 border border-primary border-4 rounded-3 mb-3" style="width: 60%;">
        <div class="card-body">
            <h3 class="text-center fw-bold">Form Pengisian Data</h3>
            <hr class="text-black">

            <form method="POST" action="edit/<?= $bio['id']; ?>" enctype="multipart/form-data">
                <div class="mb-4 row text-black">
                    <label class="col-sm-2 col-form-label fw-bolder">NIM</label>
                    <div class="col-sm-9">
                        <input type="text" name="nim" class="form-control" value="<?= $bio['nim']; ?>"
                            placeholder="Input NIM Anda" required="required">
                    </div>
                </div>

                <div class="mb-4 row text-black">
                    <label class="col-sm-2 col-form-label fw-bolder">NAMA</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" value="<?= $bio['nama']; ?>"
                            placeholder="Input Nama Anda" required="required">
                    </div>
                </div>

                <div class="mb-4 row text-black">
                    <label class="col-sm-2 col-form-label fw-bolder">ALAMAT</label>
                    <div class="col-sm-9">
                        <textarea name="alamat" class="form-control" value="<?= $bio['alamat']; ?>"
                            placeholder="Input Alamat Anda" required="required"></textarea>
                    </div>
                </div>

                <div class="mb-4 row text-black">
                    <label class="col-sm-2 col-form-label fw-bolder">PRODI</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="prodi" required="required">
                            <option value="<?= $bio['prodi']; ?>"></option>
                            <option value=" S1-MT">S1-MT</option>
                            <option value="S1-SI">S1-SI</option>
                            <option value="S1-AK">S1-AK</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4 row text-black">
                    <label for="formFile" class="form-label col-sm-2 col-form-label fw-bolder">FOTO</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" id="formFile" name="foto" value="<?= $bio['foto']; ?>"
                            required="required">
                    </div>
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-info">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>