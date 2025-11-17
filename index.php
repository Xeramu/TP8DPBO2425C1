<?php
include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/LecturerController.php");

$controller = new LecturerController();

// Tambah lecturer
if (isset($_POST['add'])) {
    $controller->add();

// Hapus
} else if (!empty($_GET['id_hapus'])) {
    $controller->delete();

// Tampil
} else {
    $controller->index();
}