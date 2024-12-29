<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="content px-3 py-4">
    <div class="container-fluid">
        <h3 class="fw-bold fs-4 mb-3">Booking Page</h3>

        <?php if ($title == 'Laporan Peminjaman') : ?>
        <div class="filter">
            <form method="post">
                <div class="row">
                    <div class="col fw-bold">Tanggal Awal</div>
                    <input type="date" name="start_date" value="<?= $start_date ?>" id="start_date"
                        class="form-control col">
                </div>
                <div class="row">
                    <div class="col fw-bold">Tanggal Akhir</div>
                    <input type="date" name="end_date" value="<?= $end_date ?>" onchange="filter()" id="end_date"
                        class="form-control col">
                </div>
            </form>
        </div>
        <?php endif; ?>
        <div class="table">
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
                            $start = date_create($book->start_time);
                            $end = date_create($book->end_time);
                            ?>
                        <td><?= date_format($start, 'd M Y H:i') ?> - <?= date_format($end, 'd M Y H:i') ?></td>
                        <td class="text-center">
                            <?php if ($book->status == 'Pending' && $title == 'Peminjaman') : ?>
                            <button class="btn btn-secondary btn-sm" data-bs-tooltip="tooltip"
                                data-bs-placement="bottom" data-bs-title="Pending" data-bs-toggle="modal"
                                data-bs-target="#reviewModal<?= $book->book_id ?>"><i
                                    class="fa-solid fa-circle-info"></i></button>
                            <?php elseif ($book->status == 'Pending' && $title == 'Laporan Peminjaman') : ?>
                            <span class="badge text-bg-secondary">Pending</span>
                            <?php elseif ($book->status == 'Approved') : ?>
                            <span class="badge text-bg-success">Diterima</span>
                            <?php else : ?>
                            <span class="badge text-bg-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <!-- Modal Review -->
                    <div class="modal fade" id="reviewModal<?= $book->book_id ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Peminjaman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">Nama Ruangan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8"><?= $book->room_name ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Nama Pemesan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8"><?= $book->username ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Waktu Peminjaman</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8"><?= date_format($start, 'd M Y H:i') ?> -
                                            <?= date_format($end, 'd M Y H:i') ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Tujuan</div>
                                        <div class="col-1">:</div>
                                        <div class="col-8"><?= $book->purpose ?></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"
                                        onclick="accept(<?= $book->book_id ?>)"><i
                                            class="fa-solid fa-square-check"></i>&nbsp;Setuju</button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="reject(<?= $book->book_id ?>)"><i
                                            class="fa-solid fa-ban"></i>&nbsp;Tolak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>
</div>

<?= $this->endSection(); ?>