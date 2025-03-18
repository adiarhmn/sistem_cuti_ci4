<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Departement</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Departement</a></li>
                <li class="breadcrumb-item active">Data Departement</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Data Departement</h5>
                    <a href="<?= base_url('/admin/departement/tambah'); ?>" class="btn btn-primary ms-auto">Tambah</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <!-- Default Table -->
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Departement</th>
                            <th>Jumlah Karyawan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_departement as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= $item['departement_name']; ?></td>
                                <td><?= $item['total_karyawan']; ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/departement/edit/' . $item['id_departement']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('/admin/departement/hapus/' . $item['id_departement']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- End Default Table Example -->
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>