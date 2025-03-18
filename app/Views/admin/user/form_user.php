<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <?= $user ? 'Edit User' : 'Tambah User'; ?>
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Users</a></li>
                <li class="breadcrumb-item active">
                    <?= $user ? 'Edit User' : 'Tambah User'; ?>
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <?= $user ? 'Form Edit User' : 'Form Tambah User'; ?>
                    </h5>
                    <a href="<?= base_url('/admin/user'); ?>" class="btn btn-primary ms-auto">Kembali</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <form action="<?= $url; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= old('username', $user['username'] ?? ''); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= old('password') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select" id="level" name="level">
                            <option value="admin" <?= $user && $user['level'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                            <option value="karyawan" <?= $user && $user['level'] == 'karyawan' ? 'selected' : ''; ?>>Karyawan</option>
                        </select>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary"><?= $user ? 'Edit' : 'Tambah'; ?></button>
                        <a href="<?= base_url('/admin/user'); ?>" class="btn btn-secondary ms-auto">Kembali</a>
                    </div>

                </form>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?= $this->endSection(); ?>