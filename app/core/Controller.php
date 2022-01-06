<?php 

class Controller {
    public function views($view, $data = []) {
        require_once "../app/views/$view.php"; 
    }
}