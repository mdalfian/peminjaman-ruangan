<?= $this->extend('layout/user/layout') ?>

<?= $this->section('content') ?>

<main class="content px-3 py-4">
    <div class="container-fluid">
        <h3 class="fw-bold fs-4 mb-3">Room Page</h3>

        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Lokasi</th>
                    <th>Kapasitas</th>
                    <th>Deskripsi</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($rooms as $room) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $room->room_name ?></td>
                    <td><?= $room->location ?></td>
                    <td><?= $room->capacity ?></td>
                    <td><?= $room->description ?></td>
                    <td class="text-center">
                        <button class="btn btn-success btn-sm" data-bs-tooltip="tooltip" data-bs-placement="top"
                            data-bs-title="Pesan" data-bs-toggle="modal"
                            data-bs-target="#pesanModal<?= $room->room_id ?>"><i
                                class="fa-solid fa-calendar-days"></i></button>
                    </td>
                </tr>

                <!-- Modal Pesan -->
                <div class="modal fade" id="pesanModal<?= $room->room_id ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan Ruangan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">Nama Ruangan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-8"><?= $room->room_name ?></div>
                                </div>
                                <div class="row">
                                    <div class="col">Lokasi</div>
                                    <div class="col-1">:</div>
                                    <div class="col-8"><?= $room->location ?></div>
                                </div>
                                <div class="row">
                                    <div class="col">Kapasitas</div>
                                    <div class="col-1">:</div>
                                    <div class="col-8"><?= $room->capacity ?></div>
                                </div>
                                <div class="row">
                                    <div class="col">Deskripsi</div>
                                    <div class="col-1">:</div>
                                    <div class="col-8"><?= $room->description ?></div>
                                </div>

                                <form class="mt-2" action="<?= base_url('user/room/books') ?>" method="post">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="start-time">Waktu Mulai</label>
                                            <input type="datetime-local" class="form-control" name="start_time"
                                                id="start-time">
                                        </div>
                                        <div class="col">
                                            <label for="end-time">Waktu Selesai</label>
                                            <input type="datetime-local" class="form-control" name="end_time"
                                                id="end-time">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="purpose">Tujuan</label>
                                        <textarea name="purpose" class="form-control" id="purpose"
                                            placeholder="Masukkan Tujuan" required></textarea>
                                    </div>

                                    <!-- hidden input -->
                                    <input type="hidden" name="room_id" value="<?= $room->room_id ?>">
                                    <input type="hidden" name="user_id" value="<?= session('id') ?>">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>

<?= $this->endSection(); ?>