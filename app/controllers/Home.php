<?php 

class Home extends Controller {
    public function index() {
        $data["judul"] = "home";
        $this->views("templates/header", $data);
        $this->views("home/index");
        $this->views("templates/footer");
    }
}