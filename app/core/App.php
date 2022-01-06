<?php 
// 3. class App di init
class App {
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    // 4. Construct untuk langsung panggil method saat kelas di init
    public function __construct()
    {
        // 5. Jalankan method parseURL dicari apakah ada controller dan method yang ada
        // 11. Jika browser tertulis localhost/phpmvc/public maka public adalah website kita
        // 12. Browser akan langsung membuka file default yaitu index. index akan menginit semua file yang ada di init.php
        // 13. Init.php menjalankan semua file yang dibutuhkan
        // 14. public/[controller]home/[method yang ada di home atau [controller]]index
        // 15. lalu index tersebut akan mengeluarkan function yang sudah kita tuliskan
        $url = $this->parseURL();
        if ($url === NULL) {
            $url = [$this->controller];
        }
        // 16. public/home/index
        // 17. setiap address diganti maka akan menajalankan fungsi class App ini
        // 18. jika public/about/page/param1/param2 maka fungsi di bawah ini akan mengecek
        // 19. apakah ada file controller di public/[controller][sesuai url disini]
        // 20. jika ada maka ganti controller ya dengan controller baru yang ada difile tersebut
        if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];
            // 21. lalu hapus array controller ya
            unset($url[0]);
        }
        // 22. lalu kita ganti controller ya dengan controller baru yang diatas
        require_once "../app/controllers/" . $this->controller . ".php";
        // 23. lalu kita init controller ya agar menjadi controller yang baru;
        $this->controller = new $this->controller;

        // 24. public/home/index
        // 25. method adalah url sehabis controller yaitu index;
        // 26. apakah ada method di kelas controller [public/[controller]/[method]]
        // 27. jika ada maka ganti method ya dengan method yang ada
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);


    }

    // 6. parseURL mengambil URL yang ada di URL Browser
    public function parseUrl() {
        if (isset($_GET["url"])) {
            // 7. Menghapus tanda / di akhir karena nanti gk bisa di satukan dengan .php
            $url = rtrim($_GET["url"], "/");
            // 8. Bersihkan dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // 9. Lalu di split di /
            $url = explode("/", $url);
            // 10. kembalikan array
            return $url;
        }
    }
}