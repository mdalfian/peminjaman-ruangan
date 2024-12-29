<?= $this->extend('layout/user/layout') ?>

<?= $this->section('content') ?>

<main class="content px-3 py-4">
    <div class="container-fluid">
        <div class="mb-3">
            <h3 class="fw-bold fs-4 mb-3">User Dashboard</h3>
            <div class="container shadow p-4">
                <span class="fw-semibold fs-3">Welcome, <?= session('nama') ?></span>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<?= $this->endSection(); ?>