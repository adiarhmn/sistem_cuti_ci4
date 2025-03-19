<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Karyawan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Karyawan</a></li>
                <li class="breadcrumb-item active">Data Karyawan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Data Karyawan</h5>
                    <a href="<?= base_url('/admin/karyawan/tambah'); ?>" class="btn btn-primary ms-auto">Tambah</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <!-- Default Table -->
                <table class="table text-center" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>No Telp</th>
                            <th>Departement</th>
                            <th>Hak Cuti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_karyawan as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= $item['nama_karyawan']; ?></td>
                                <td><?= $item['no_telp']; ?></td>
                                <td><?= $item['departement_name']; ?></td>
                                <td><?= $item['hak_cuti']; ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/karyawan/edit/' . $item['id_karyawan']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('/admin/karyawan/hapus/' . $item['id_karyawan']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    <a href="<?= base_url('/admin/karyawan/monitoring-cuti/' . $item['id_karyawan']); ?>" class="btn btn-info">Monitoring Cuti</a>
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