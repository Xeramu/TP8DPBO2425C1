<?php
include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/LecturerController.php");

$controller = new LecturerController();

// Tambah lecturer
if (isset($_POST['add'])) {
    $controller->add();
} 
else if (isset($_POST['edit'])){
    $controller->edit();
}
// hapus
else if (!empty($_GET['id_hapus'])) {
    $controller->delete();
} 
else if (!empty($_GET['id_edit'])) {
    $lecturerToEdit = $controller->getById($_GET['id_edit']);
    $controller->index($lecturerToEdit); // kirim data lecturer yang akan diedit
}
// tampil
else {
    $controller->index();
}