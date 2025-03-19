<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <?= $jenis_cuti ? 'Edit Jenis Cuti' : 'Tambah Jenis Cuti'; ?>
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Jenis Cuti</a></li>
                <li class="breadcrumb-item active">
                    <?= $jenis_cuti ? 'Edit Jenis Cuti' : 'Tambah Jenis Cuti'; ?>
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <?= $jenis_cuti ? 'Form Edit Jenis Cuti' : 'Form Tambah Jenis Cuti'; ?>
                    </h5>
                    <a href="<?= base_url('/admin/jenis-cuti'); ?>" class="btn btn-primary ms-auto">Kembali</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <form action="<?= $url; ?>" method="POST" enctype="multipart/form-data">

                    <!-- Jenis Cuti -->
                    <div class="mb-3">
                        <label for="jenis_cuti" class="form-label">Nama Jenis Cuti</label>
                        <input type="text" class="form-control" id="jenis_cuti" name="jenis_cuti" value="<?= old('jenis_cuti', $jenis_cuti['jenis_cuti'] ?? ''); ?>" required>
                    </div>

                    <!-- Lama Cuti -->
                    <div class="mb-3">
                        <label for="lama_cuti" class="form-label">Lama Cuti (hari)</label>
                        <input type="number" class="form-control" id="lama_cuti" name="lama_cuti" value="<?= old('lama_cuti', $jenis_cuti['lama_cuti'] ?? ''); ?>" min="0" required>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary"><?= $jenis_cuti ? 'Edit' : 'Tambah'; ?></button>
                        <a href="<?= base_url('/admin/jenis-cuti'); ?>" class="btn btn-secondary ms-auto">Kembali</a>
                    </div>

                </form>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>