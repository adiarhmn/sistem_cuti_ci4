<?= $this->extend('layouts/karyawan_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Cuti Saya</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Cuti Saya</a></li>
                <li class="breadcrumb-item active">Data Cuti Saya</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Data Cuti Saya</h5>
                    <a href="<?= base_url('karyawan/cuti/tambah'); ?>" class="btn btn-primary ms-auto">Tambah</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <!-- Default Table -->
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenis Cuti</th>
                            <th>Lama Cuti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>