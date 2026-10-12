<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Tambah Data Mahasiswa
            </button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan Nama">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
    </div>
</div>