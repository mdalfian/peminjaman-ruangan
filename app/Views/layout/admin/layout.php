<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?= $title ?></title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.8/datatables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="<?= base_url('admin/home') ?>">Peminjaman</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item <?= $title == 'Home' ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/home') ?>" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'User' ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/user') ?>" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span>User</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Ruangan' ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/room') ?>" class="sidebar-link">
                        <i class="fa-solid fa-door-open"></i>
                        <span>Ruangan</span>
                    </a>
                </li>
                <!-- <li class="sidebar-item <?= $title == 'Peminjaman' ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/booking') ?>" class="sidebar-link">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Peminjaman</span>
                    </a>
                </li> -->
                <li class="sidebar-item <?= $title == 'Peminjaman' ? 'active' : '' ?>">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#booking" aria-expanded="false" aria-controls="booking">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Peminjaman&nbsp;<span class="badge text-bg-secondary d-none badge-notif"></span></span>
                    </a>
                    <ul id="booking" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/booking/pending') ?>" class="sidebar-link">Pending&nbsp;<span
                                    class="badge text-bg-secondary d-none badge-notif"></span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/booking/approved') ?>" class="sidebar-link">Diterima</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/booking/rejected') ?>" class="sidebar-link">Ditolak</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/booking/report') ?>" class="sidebar-link">Laporan</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="<?= base_url('logout') ?>" class="sidebar-link">
                    <i class="fa-solid fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="<?= base_url('assets/account.png') ?>" class="avatar img-fluid" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                                <a href="<?= base_url('logout') ?>" class="dropdown-item"><i
                                        class="fa-solid fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <?= $this->renderSection('content') ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.8/datatables.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="<?= base_url('js/script.js') ?>"></script>
            <script>
                new DataTable('#dataTable');
                $(document).ready(function() {
                    $.ajax({
                        method: 'get',
                        url: '<?= base_url('admin/get_notification'); ?>',
                        success: function(result) {
                            var data = JSON.parse(result);

                            $('.badge-notif').html(data.pending);
                            $('.pending-card').html(data.pending);
                            $('.booked-card').html(data.booked);
                            $('.available-card').html(data.available);
                            if (data.pending > 0) {
                                $('.badge-notif').removeClass('d-none');
                            }
                        }
                    })
                })

                // Hapus User
                function hapus_user(id) {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan menghapus user!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= base_url('admin/user/delete/') ?>' + id;
                        }
                    })
                }

                // Hapus Room
                function hapus_room(id) {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan menghapus ruangan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= base_url('admin/room/delete/') ?>' + id;
                        }
                    })
                }

                // Accept Booking
                function accept(id) {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan menerima peminjaman!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#14A44D',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Terima'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= base_url('admin/booking/accept/') ?>' + id;
                        }
                    })
                }

                // Reject Booking
                function reject(id) {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan menolak peminjaman!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Tolak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= base_url('admin/booking/reject/') ?>' + id;
                        }
                    })
                }

                // Filter report
                function filter() {
                    var form = $('#end_date').closest('form');
                    form.submit();
                }

                // Reload setiap menit
                $(document).ready(function() {
                    setInterval(function() {
                        $.ajax({
                            type: "GET",
                            url: "<?= base_url('admin/booking/today') ?>",
                            success: function(result) {
                                $('.todays-book').html(result);
                            }
                        });
                        $.ajax({
                            method: 'get',
                            url: '<?= base_url('admin/get_notification'); ?>',
                            success: function(result) {
                                var data = JSON.parse(result);
                                $('.badge-notif').html(data.pending);
                                $('.pending-card').html(data.pending);
                                $('.booked-card').html(data.booked);
                                $('.available-card').html(data.available);
                                if (data.pending > 0) {
                                    $('.badge-notif').removeClass('d-none');
                                }
                            }
                        })
                    }, 60000);
                });
            </script>

            <!-- Alert success -->
            <?php
            if (session()->has('success')) : ?>
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '<?= session('success') ?>',
                        icon: 'success',
                    })
                </script>
            <?php endif; ?>

            <!-- Alert error -->
            <?php
            if (session()->has('error')) : ?>
                <script>
                    Swal.fire({
                        title: 'Error!',
                        text: '<?= session('error') ?>',
                        icon: 'error',
                    })
                </script>
            <?php endif; ?>
</body>

</html>