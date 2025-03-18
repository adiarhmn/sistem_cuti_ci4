<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <?= $departement ? 'Edit Departement' : 'Tambah Departement'; ?>
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Departement</a></li>
                <li class="breadcrumb-item active">
                    <?= $departement ? 'Edit Departement' : 'Tambah Departement'; ?>
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <?= $departement ? 'Form Edit Departement' : 'Form Tambah Departement'; ?>
                    </h5>
                    <a href="<?= base_url('/admin/departement'); ?>" class="btn btn-primary ms-auto">Kembali</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <form action="<?= $url; ?>" method="POST" enctype="multipart/form-data">

                    <!-- Departement_name -->
                    <div class="mb-3">
                        <label for="departement_name" class="form-label">Nama Departement</label>
                        <input type="text" class="form-control" id="departement_name" name="departement_name" value="<?= old('departement_name', $departement['departement_name'] ?? ''); ?>" required>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary"><?= $departement ? 'Edit' : 'Tambah'; ?></button>
                        <a href="<?= base_url('/admin/departement'); ?>" class="btn btn-secondary ms-auto">Kembali</a>
                    </div>

                </form>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>