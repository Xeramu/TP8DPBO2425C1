<?php
include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/CourseController.php");

$controller = new CourseController();

// Tambah
if (isset($_POST['add'])) {
    $controller->add();

// Edit
} else if (!empty($_GET['id_edit'])) {
    $controller->edit();

// Hapus
} else if (!empty($_GET['id_hapus'])) {
    $controller->delete();

// Tampil data
} else {
    $controller->index();
}