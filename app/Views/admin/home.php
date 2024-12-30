<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="content px-3 py-4">
    <div class="container-fluid">
        <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">Admin Dashboard</h3>
            <div class="row">
                <div class="col-12 col-md-4 ">
                    <div class="card border-0">
                        <div class="card-body bg-primary rounded shadow text-light py-4">
                            <h5 class="mb-2 fw-bold">
                                Ruangan Tersedia
                            </h5>
                            <p class="mb-2 fw-bold">
                                <span class="available-card"></span> Ruangan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="card  border-0">
                        <div class="card-body bg-success rounded shadow text-light py-4">
                            <h5 class="mb-2 fw-bold">
                                Ruangan Dipesan
                            </h5>
                            <p class="mb-2 fw-bold">
                                <span class="booked-card"></span> Ruangan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="card border-0">
                        <div class="card-body bg-secondary rounded shadow text-light py-4">
                            <h5 class="mb-2 fw-bold">
                                Peminjaman Pending
                            </h5>
                            <p class="mb-2 fw-bold">
                                <span class="pending-card"></span> Peminjaman
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="fw-bold fs-4 my-3">Peminjaman Hari Ini
            </h3>
            <div class="row">
                <div class="col-12 todays-book">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ruangan</th>
                                <th>Nama Peminjam</th>
                                <th>Waktu Peminjaman</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($bookings as $book) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $book->room_name ?></td>
                                    <td><?= $book->username ?></td>
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $start = date_create($book->start_time);
                                    $end = date_create($book->end_time);
                                    ?>
                                    <td><?= date_format($start, 'd M Y H:i') ?> - <?= date_format($end, 'd M Y H:i') ?></td>
                                    <td class="text-center">
                                        <?php if (date_format($end, 'Y-m-d H:i:s') < date('Y-m-d H:i:s')) : ?>
                                            <span class="badge text-bg-info">Selesai</span>
                                        <?php else : ?>
                                            <span class="badge text-bg-success">Diterima</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<?= $this->endSection(); ?>