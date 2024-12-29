<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="content px-3 py-4">
    <div class="container-fluid">
        <h3 class="fw-bold fs-4 mb-3">Room Page</h3>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i
                class="fa-solid fa-square-plus"></i>&nbsp;Tambah Ruangan</button>

        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Lokasi</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
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
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-bs-tooltip="tooltip" data-bs-placement="top"
                                data-bs-title="Edit" data-bs-toggle="modal"
                                data-bs-target="#editModal<?= $room->room_id ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-danger btn-sm" data-bs-tooltip="tooltip" data-bs-placement="bottom"
                                data-bs-title="Delete" onclick="hapus_room(<?= $room->room_id ?>)"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $room->room_id ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Ruangan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/room/update/' . $room->room_id . '') ?>"
                                        method="post">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Ruangan</label>
                                            <input type="text" name="room_name" class="form-control" id="nama"
                                                placeholder="Masukkan nama ruangan" value="<?= $room->room_name ?>"
                                                required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text" name="location" class="form-control" id="lokasi"
                                                placeholder="Masukkan lokasi" value="<?= $room->location ?>" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="kapasitas">Kapasitas</label>
                                            <input type="number" name="capacity" class="form-control" id="kapasitas"
                                                placeholder="Masukkan kapasitas" value="<?= $room->capacity ?>" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="description" class="form-control" id="deskripsi"
                                                placeholder="Masukkan deskripsi"><?= $room->description ?></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">Edit</button>
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

<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ruangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/room/add') ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="nama">Nama Ruangan</label>
                        <input type="text" name="room_name" class="form-control" id="nama"
                            placeholder="Masukkan nama ruangan" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="location" class="form-control" id="lokasi"
                            placeholder="Masukkan lokasi" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" name="capacity" class="form-control" id="kapasitas"
                            placeholder="Masukkan kapasitas" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="description" class="form-control" id="deskripsi"
                            placeholder="Masukkan deskripsi"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>