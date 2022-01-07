<?php 

class Mahasiswa extends Controller {
    public function index() {
        $data["judul"] = "Daftar Mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->getAllMahasiswa();
        $this->views("templates/header", $data);
        $this->views("mahasiswa/index", $data);
        $this->views("templates/footer");
    }
    
    public function detail($id) {
        $data["judul"] = "Detail mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->getMahasiswaById($id);
        $this->views("templates/header", $data);
        $this->views("mahasiswa/detail", $data);
        $this->views("templates/footer");
    }

    public function tambah() {
        if ($this->model("Mahasiswa_model")->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash("Berhasil!", "Data berhasil ditambahkan", "success");
            header("Location:" . BASEURL . "mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal!", "Data gagal ditambahkan", "danger");
            header("Location:" . BASEURL . "mahasiswa");
            exit;
        }
    }

    public function hapus($id) {
        if ($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash("Berhasil!", "Data berhasil dihapus", "success");
            header("Location:" . BASEURL . "mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal!", "Data gagal dihapus", "danger");
            header("Location:" . BASEURL . "mahasiswa");
            exit;
        }
    }

    public function getUbah() {
        echo JSON_encode($this->model("Mahasiswa_model")->getMahasiswaById($_POST["id"]));
    }

    public function ubah() {
        if ($this->model("Mahasiswa_model")->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash("Berhasil!", "Data berhasil diubah", "success");
            header("Location:" . BASEURL . "mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal!", "Data gagal diubah", "danger");
            header("Location:" . BASEURL . "mahasiswa");
            exit;
        }       
    }

    public function cari() {
        $data["judul"] = "Daftar Mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->cariDataMahasiswa();
        $this->views("templates/header", $data);
        $this->views("mahasiswa/index", $data);
        $this->views("templates/footer");
    }
}