<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <?= $karyawan ? 'Edit Karyawan' : 'Tambah Karyawan'; ?>
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Karyawan</a></li>
                <li class="breadcrumb-item active">
                    <?= $karyawan ? 'Edit Karyawan' : 'Tambah Karyawan'; ?>
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <?= $karyawan ? 'Form Edit Karyawan' : 'Form Tambah Karyawan'; ?>
                    </h5>
                    <a href="<?= base_url('/admin/karyawan'); ?>" class="btn btn-primary ms-auto">Kembali</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <form action="<?= $url; ?>" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <!-- Nama Karyawan -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="nama_karyawan" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= old('nama_karyawan', $karyawan['nama_karyawan'] ?? ''); ?>">
                        </div>

                        <!-- NIK -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="<?= old('nik', $karyawan['nik'] ?? ''); ?>">
                        </div>

                        <!-- Alamat -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat', $karyawan['alamat'] ?? ''); ?>">
                        </div>

                        <!-- no_telp -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= old('no_telp', $karyawan['no_telp'] ?? ''); ?>">
                        </div>

                        <!-- tanggal_lahir -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir', $karyawan['tanggal_lahir'] ?? ''); ?>">
                        </div>

                        <!-- Agama -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" id="agama" name="agama">
                                <option value="Islam" <?= $karyawan && $karyawan['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                <option value="Kristen" <?= $karyawan && $karyawan['agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                                <option value="Katolik" <?= $karyawan && $karyawan['agama'] == 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                                <option value="Hindu" <?= $karyawan && $karyawan['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                                <option value="Budha" <?= $karyawan && $karyawan['agama'] == 'Budha' ? 'selected' : ''; ?>>Budha</option>
                                <option value="Konghucu" <?= $karyawan && $karyawan['agama'] == 'Konghucu' ? 'selected' : ''; ?>>Konghucu</option>
                            </select>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="L" <?= $karyawan && $karyawan['jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="P" <?= $karyawan && $karyawan['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>

                        <!-- Hak Cuti -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="hak_cuti" class="form-label">Hak Cuti (Hari)</label>
                            <input type="number" class="form-control" id="hak_cuti" name="hak_cuti" value="<?= old('hak_cuti', $karyawan['hak_cuti'] ?? ''); ?>" min="0">
                        </div>

                        <!-- Aktif Cuti (Date) -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="aktif_cuti" class="form-label">Aktif Cuti</label>
                            <input type="date" class="form-control" id="aktif_cuti" name="aktif_cuti" value="<?= old('aktif_cuti', $karyawan['aktif_cuti'] ?? ''); ?>">
                        </div>

                        <!-- Jatuh Tempo Cuti (Date) -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="jatuh_tempo_cuti" class="form-label">Jatuh Tempo Cuti</label>
                            <input type="date" class="form-control" id="jatuh_tempo_cuti" name="jatuh_tempo_cuti" value="<?= old('jatuh_tempo_cuti', $karyawan['jatuh_tempo_cuti'] ?? ''); ?>">
                        </div>

                        <!-- Departement -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="departement" class="form-label">Departement</label>
                            <select class="form-select" id="departement" name="id_departement">
                            <?php if (!$karyawan) : ?>
                                    <option value="">Pilih Departement</option>
                                <?php endif; ?>
                                <?php foreach ($list_departement as $departement): ?>
                                    <option value="<?= $departement['id_departement']; ?>" <?= $karyawan && $karyawan['id_departement'] == $departement['id_departement'] ? 'selected' : ''; ?>>
                                        <?= $departement['departement_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-lg-3">
                            <label for="user" class="form-label">User / Akun Karyawan</label>
                            <select class="form-select" id="user" name="id_user">
                                <?php if (!$karyawan) : ?>
                                    <option value="">Pilih User</option>
                                <?php endif; ?>
                                <?php foreach ($list_user as $user): ?>
                                    <option value="<?= $user['id_user']; ?>" <?= $karyawan && $karyawan['id_user'] == $user['id_user'] ? 'selected' : ''; ?>>
                                        <?= $user['username']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary"><?= $karyawan ? 'Edit' : 'Tambah'; ?></button>
                        <a href="<?= base_url('/admin/user'); ?>" class="btn btn-secondary ms-auto">Kembali</a>
                    </div>

                </form>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>