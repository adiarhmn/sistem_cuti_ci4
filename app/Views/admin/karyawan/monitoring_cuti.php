<?= $this->extend('layouts/admin_layout'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Monitoring Cuti Karyawan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Karyawan</a></li>
                <li class="breadcrumb-item active">Monitoring Cuti</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Monitoring Cuti</h5>
                </div>

                <div class="mb-3">
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td class="w-25 text-center">:</td>
                                <td><?= esc($karyawan['nama_karyawan']); ?></td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td class="w-25 text-center">:</td>
                                <td><?= esc($karyawan['no_telp']); ?></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td class="w-25 text-center">:</td>
                                <td><?= esc($karyawan['nik']); ?></td>
                            </tr>
                            <tr>
                                <td>Aktif Cuti</td>
                                <td class="w-25 text-center">:</td>
                                <td><?= esc($karyawan['aktif_cuti']); ?></td>
                            </tr>
                            <tr>
                                <td>Jatuh Tempo Cuti</td>
                                <td class="w-25 text-center">:</td>
                                <td><?= esc($karyawan['jatuh_tempo_cuti']); ?></td>
                            </tr>
                            <tr>
                                <td>Hak Cuti</td>
                                <td class="w-25 text-center">:</td>
                                <td><?= esc($karyawan['hak_cuti']); ?> Hari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <?= $this->include('components/show_notifications') ?>

                <!-- Default Table -->
                <table class="table text-center table-bordered" style="font-size:12px;">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" class="align-middle">No</th>
                            <th rowspan="2" class="align-middle">Tanggal</th>
                            <th colspan="3">Jumlah</th>
                            <th rowspan="2" class="align-middle">Keterangan</th>
                            <th rowspan="2" class="align-middle">KADIV</th>
                            <th rowspan="2" class="align-middle">HRD</th>
                            <th rowspan="2" class="align-middle">ASKEP</th>
                            <th rowspan="2" class="align-middle">MANAGER</th>
                            <!-- <th rowspan="2" class="align-middle">AKSI</th> -->
                        </tr>
                        <tr>
                            <th style="width: 50px;">C</th>
                            <th style="width: 50px;">PC</th>
                            <th style="width: 50px;">SISA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_cuti as $index => $item): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= esc($item['tanggal_mulai']); ?>
                                    -
                                    <?= esc($item['tanggal_selesai']); ?>
                                </td>
                                <td><?= esc(!$item['status_potong_cuti'] ? $item['lama_cuti'] : '0'); ?></td>
                                <td><?= esc($item['status_potong_cuti'] ? $item['lama_cuti'] : '0'); ?></td>
                                <td><?= esc($item['sisa_cuti']); ?></td>
                                <td><?= esc($item['alasan']); ?></td>
                                <td>
                                    <?= get_status_icon($item['status_kadiv']); ?>
                                </td>
                                <td>
                                    <?= get_status_icon($item['status_hrd']); ?>
                                </td>
                                <td>
                                    <?= get_status_icon($item['status_askep']); ?>
                                </td>
                                <td>
                                    <?= get_status_icon($item['status_manager']); ?>
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