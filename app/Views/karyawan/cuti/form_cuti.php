<?= $this->extend('layouts/karyawan_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>
            <?= $cuti ? 'Edit Cuti' : 'Tambah Cuti'; ?>
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Cuti</a></li>
                <li class="breadcrumb-item active">
                    <?= $cuti ? 'Edit Cuti' : 'Tambah Cuti'; ?>
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <?= $cuti ? 'Form Edit Cuti' : 'Form Tambah Cuti'; ?>
                    </h5>
                    <a href="<?= base_url('/admin/cuti'); ?>" class="btn btn-primary ms-auto">Kembali</a>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <form action="<?= $url; ?>" method="POST" enctype="multipart/form-data">

                    <div class="row">



                        <!-- Jenis Cuti -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="departement" class="form-label">Jenis Cuti</label>
                            <select class="form-select" id="departement" name="id_jenis_cuti">
                                <?php foreach ($list_jenis_cuti as $item): ?>
                                    <option value="<?= $item['id_jenis_cuti']; ?>" <?= $cuti && $cuti['id_jenis_cuti'] == $item['id_jenis_cuti'] ? 'selected' : ''; ?>>
                                        <?= $item['jenis_cuti']; ?> -
                                        <?= $item['lama_cuti'] < 1 ? 'Disesuaikan' : $item['lama_cuti'] . ' Hari'; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Potongan Cuti -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="potongan_cuti" class="form-label">Potongan Cuti (Hari)</label>
                            <input type="number" class="form-control" id="potongan_cuti" name="potongan_cuti"
                                value="<?= $cuti ? $cuti['potongan_cuti'] : ''; ?>"
                                placeholder="Masukkan jumlah potongan cuti" min="0">
                        </div>

                        <!-- Alasan -->
                        <div class="col-md-12 mb-lg-3">
                            <label for="alasan" class="form-label">Alasan Melakukan Cuti</label>
                            <textarea class="form-control" id="alasan" name="alasan" rows="3"
                                placeholder="Masukkan alasan cuti"><?= $cuti ? $cuti['alasan'] : ''; ?></textarea>
                        </div>

                        <!-- Tanggal Mulai -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai <i>(Tanggal Selesai + Potongan Hari)</i></label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                value="<?= $cuti ? $cuti['tanggal_mulai'] : ''; ?>" required>
                        </div>

                        <!-- Bukti -->
                        <div class="col-md-6 mb-lg-3">
                            <label for="bukti" class="form-label">Bukti Pendukung Cuti (Opsional)</label>
                            <input type="file" class="form-control" id="bukti" name="bukti">
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('/admin/user'); ?>" class="btn btn-secondary ms-auto">Kembali</a>
                    </div>

                </form>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jenisCutiSelect = document.getElementById('departement');
        const potonganCutiInput = document.getElementById('potongan_cuti');

        function updatePotonganCuti() {
            const selectedOption = jenisCutiSelect.options[jenisCutiSelect.selectedIndex];
            const lamaCutiText = selectedOption.textContent.match(/(\d+)\s+Hari/);
            const lamaCuti = lamaCutiText ? parseInt(lamaCutiText[1]) : 0;

            if (lamaCuti > 0) {
                potonganCutiInput.value = lamaCuti;
                potonganCutiInput.disabled = true;
            } else {
                potonganCutiInput.value = '';
                potonganCutiInput.disabled = false;
            }
        }

        jenisCutiSelect.addEventListener('change', updatePotonganCuti);

        // Initialize on page load
        updatePotonganCuti();
    });
</script>
<?= $this->endSection(); ?>