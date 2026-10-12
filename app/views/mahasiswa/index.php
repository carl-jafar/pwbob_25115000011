<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($mhs['nama'], ENT_QUOTES, 'UTF-8'); ?>
                        <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo rawurlencode((string) $mhs['nim']); ?>" class="badge bg-primary text-decoration-none">
                            Detail
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>