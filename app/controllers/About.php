<?php 

class About extends Controller {
    public function index($nama = "Iqro", $pekerjaan = "Pengangguran", $umur = 16) {
        $data["judul"] = "about me";
        $data["nama"] = $nama;
        $data["pekerjaan"] = $pekerjaan;
        $data["umur"] = $umur;
        $this->views("templates/header", $data);
        $this->views("about/index", $data);
        $this->views("templates/footer");
    }

    public function page() {
        $data["judul"] = "Pages";
        $this->views("templates/header", $data);
        $this->views("about/page");
        $this->views("templates/footer");
    }
}