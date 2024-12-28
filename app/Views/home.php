<?= $this->extend('layout/layout') ?>

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
                                4 Ruangan
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
                                2 Ruangan
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
                                3 Peminjaman
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="fw-bold fs-4 my-3">Peminjaman Hari Ini
            </h3>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr class="highlight">
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td>@twitter</td>
                                <td>hoal</td>
                            </tr>
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