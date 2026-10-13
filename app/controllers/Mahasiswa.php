<?php
class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }

        $data = [
            'nama' => trim($_POST['nama'] ?? ''),
            'nim' => trim($_POST['nim'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'jurusan' => trim($_POST['jurusan'] ?? '')
        ];

        if (in_array('', $data, true)) {
            throw new InvalidArgumentException('Semua data mahasiswa wajib diisi.');
        }

        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($data) > 0) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }

        throw new RuntimeException('Data mahasiswa gagal disimpan.');
    }
}