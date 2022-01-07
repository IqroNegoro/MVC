<?php 
if (!session_id()) session_start();
// 1. bootstrapping. memanggil file yang didalamnya memanggil semua file
require_once "../app/init.php";

$app = new App;