<div class="container mt-4">
    <h3>Detail Mahasiswa</h3>

    <?php if ($data['mhs'] === false || $data['mhs'] === null) : ?>
        <p>Data mahasiswa tidak ditemukan.</p>
    <?php else : ?>
        <ul class="list-group">
            <li class="list-group-item">Nama: <?php echo htmlspecialchars($data['mhs']['nama'], ENT_QUOTES, 'UTF-8'); ?></li>
            <li class="list-group-item">NIM: <?php echo htmlspecialchars($data['mhs']['nim'], ENT_QUOTES, 'UTF-8'); ?></li>
            <li class="list-group-item">Email: <?php echo htmlspecialchars($data['mhs']['email'], ENT_QUOTES, 'UTF-8'); ?></li>
            <li class="list-group-item">Jurusan: <?php echo htmlspecialchars($data['mhs']['jurusan'], ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
    <?php endif; ?>

    <a class="btn btn-secondary mt-3" href="<?php echo BASEURL; ?>/mahasiswa">Kembali</a>
</div>
