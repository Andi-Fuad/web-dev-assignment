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
    <div class="text-dark home-01 fw-bold">
        <p class="m-0 p-0">
            WELCOME TO X UNIVERSITY WEBSITE
            <hr>
        </p>
    </div>
    <div class="text-white bg-primary home-02 fw-bold" style="width: fit-content">
        <div class="card-body p-2 m-2">
            <p class="m-0">
                CRUD Data Mahasiswa Universitas X
            </p>
        </div>
    </div>
    <div class="card home-03 fw-bold" style="width: 380px;">
        <div class="card-body p-1 m-1">
            <p>
                Website ini dibuat dalam rangka untuk memenuhi tugas Pemrograman Web pada semester 3 dengan menggunakan
                framework CodeIgniter. Website ini dibuat dan dikembangkan oleh :
            </p>
            <p>
                A. Fuad Ahsan Basir (H071201076)
            </p>
        </div>
    </div>

</div>
<?= $this->endSection('content'); ?>