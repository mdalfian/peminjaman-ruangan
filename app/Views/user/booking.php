<?= $this->extend('layout/user/layout') ?>

<?= $this->section('content') ?>

<main class="content px-3 py-4">
    <div class="container-fluid">
        <h3 class="fw-bold fs-4 mb-3">Booking Page</h3>

        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Lokasi</th>
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
                        <td><?= $book->location ?></td>
                        <?php
                        $start = date_create($book->start_time);
                        $end = date_create($book->end_time);
                        ?>
                        <td><?= date_format($start, 'd M Y H:i') ?> - <?= date_format($end, 'd M Y H:i') ?></td>
                        <td class="text-center">
                            <?php if ($book->status == 'Pending') : ?>
                                <span class="badge text-bg-secondary">Pending</span>
                            <?php elseif ($book->status == 'Approved') : ?>
                                <span class="badge text-bg-success">Diterima</span>
                            <?php else : ?>
                                <span class="badge text-bg-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>

<?= $this->endSection(); ?>