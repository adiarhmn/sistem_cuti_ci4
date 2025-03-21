<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Jenis Cuti</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Jenis Cuti</a></li>
                <li class="breadcrumb-item active">Data Jenis Cuti</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Data Jenis Cuti</h5>
                    <a href="<?= base_url('/admin/jenis-cuti/tambah'); ?>" class="btn btn-primary ms-auto">Tambah</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <!-- Default Table -->
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenis Cuti</th>
                            <th>Potongan Cuti</th>
                            <th>Status Potong Cuti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_jenis_cuti as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= $item['jenis_cuti']; ?></td>
                                <td><?= $item['potongan_cuti'] < 1 ? 'Disesuaikan' : $item['potongan_cuti'] . ' Hari'; ?></td>
                                <td><?= $item['status_potong_cuti'] == 1 ? 'Ya' : 'Tidak'; ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/jenis-cuti/edit/' . $item['id_jenis_cuti']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('/admin/jenis-cuti/hapus/' . $item['id_jenis_cuti']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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