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
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $('#dataTable').DataTable();
</script>