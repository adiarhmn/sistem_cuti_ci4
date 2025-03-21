<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Cuti</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Cuti</a></li>
                <li class="breadcrumb-item active">Data Cuti</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Data Pengajuan Cuti</h5>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <!-- Default Table -->
                <table class="table text-center" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Alasan</th>
                            <th>Status HRD</th>
                            <th>Status Kadiv</th>
                            <th>Status Askep</th>
                            <th>Status Manager</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_cuti as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= esc($item['tanggal_mulai']); ?>
                                    -
                                    <?= esc($item['tanggal_selesai']); ?>
                                </td>
                                <td><?= $item['nama_karyawan']; ?></td>
                                <td><?= $item['alasan']; ?></td>
                                <td>
                                    <?= get_status_icon($item['status_hrd']); ?>
                                </td>
                                <td>
                                    <?= get_status_icon($item['status_kadiv']); ?>
                                </td>
                                <td>
                                    <?= get_status_icon($item['status_askep']); ?>
                                </td>
                                <td>
                                    <?= get_status_icon($item['status_manager']); ?>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $index; ?>">
                                        <i class="bi bi-check-square-fill"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $index; ?>" tabindex="-1" aria-labelledby="exampleModal<?= $index; ?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal<?= $index; ?>Label">Approval Cuti</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form action="<?= base_url('admin/cuti/approve/' . $item['id_cuti']); ?>" method="post">

                                                        <div class="mb-3">
                                                            <label for="status_hrd" class="form-label">Status HRD</label>
                                                            <select class="form-select" id="status_hrd" name="status_hrd">
                                                                <option value="diajukan" <?= $item['status_hrd'] === 'diajukan' ? 'selected' : ''; ?>>Diajukan</option>
                                                                <option value="disetujui" <?= $item['status_hrd'] === 'disetujui' ? 'selected' : ''; ?>>Disetujui</option>
                                                                <option value="ditolak" <?= $item['status_hrd'] === 'ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="status_kadiv" class="form-label">Status Kadiv</label>
                                                            <select class="form-select" id="status_kadiv" name="status_kadiv">
                                                                <option value="diajukan" <?= $item['status_kadiv'] === 'diajukan' ? 'selected' : ''; ?>>Diajukan</option>
                                                                <option value="disetujui" <?= $item['status_kadiv'] === 'disetujui' ? 'selected' : ''; ?>>Disetujui</option>
                                                                <option value="ditolak" <?= $item['status_kadiv'] === 'ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status_askep" class="form-label">Status Askep</label>
                                                            <select class="form-select" id="status_askep" name="status_askep">
                                                                <option value="diajukan" <?= $item['status_askep'] === 'diajukan' ? 'selected' : ''; ?>>Diajukan</option>
                                                                <option value="disetujui" <?= $item['status_askep'] === 'disetujui' ? 'selected' : ''; ?>>Disetujui</option>
                                                                <option value="ditolak" <?= $item['status_askep'] === 'ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status_manager" class="form-label">Status Manager</label>
                                                            <select class="form-select" id="status_manager" name="status_manager">
                                                                <option value="diajukan" <?= $item['status_manager'] === 'diajukan' ? 'selected' : ''; ?>>Diajukan</option>
                                                                <option value="disetujui" <?= $item['status_manager'] === 'disetujui' ? 'selected' : ''; ?>>Disetujui</option>
                                                                <option value="ditolak" <?= $item['status_manager'] === 'ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">
                                                                Simpan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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