<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="content px-3 py-4">
    <div class="container-fluid">
        <h3 class="fw-bold fs-4 mb-3">User Page</h3>

        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($users as $u) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u->username ?></td>
                    <td><?= $u->email ?></td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm" data-bs-tooltip="tooltip" data-bs-placement="top"
                            data-bs-title="Edit" data-bs-toggle="modal" data-bs-target="#editModal<?= $u->user_id ?>"><i
                                class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger btn-sm" data-bs-tooltip="tooltip" data-bs-placement="bottom"
                            data-bs-title="Delete" onclick="hapus_user(<?= $u->user_id ?>)"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?= $u->user_id ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/user/update/' . $u->user_id . '') ?>" method="post">
                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="<?= $u->email ?>"
                                            placeholder="Masukkan email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            value="<?= $u->username ?>" placeholder="Masukkan nama">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password1">Password</label>
                                        <input type="password" name="password" class="form-control" id="password1"
                                            placeholder="Masukkan Password">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

<?= $this->endSection(); ?>