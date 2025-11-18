<?php
include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/CourseController.php");

$controller = new CourseController();

// Tambah
if (isset($_POST['add'])) {
    $controller->add();

// Edit (form dikirim)
} else if (isset($_POST['edit'])) {
    $controller->edit();

// Hapus
} else if (!empty($_GET['id_hapus'])) {
    $controller->delete();

// Tampil data (cek apakah ada id_edit untuk pre-fill form)
} else {
    $editData = null;
    if (!empty($_GET['id_edit'])) {
        $editData = $controller->getCourseById($_GET['id_edit']);
    }
    $controller->index($editData);
}