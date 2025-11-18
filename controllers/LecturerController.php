<?php
include_once("config.php");
include_once("models/Lecturer.php");
include_once("views/LecturerView.php");

class LecturerController
{
    // Properti controller
    private $lecturer;

    // Konstruktor Controller Lecturer
    function __construct()
    {
        $this->lecturer = new Lecturer(
            Config::$db_host,
            Config::$db_user,
            Config::$db_pass,
            Config::$db_name
        );
    }

    // Halaman utama (menampilkan semua lecturer)
    public function index($editData = null)
    {
        $this->lecturer->open();
        $this->lecturer->getLecturer();

        $data = [];
        while ($row = $this->lecturer->getResult()) {
            array_push($data, $row);
        }
        $this->lecturer->close();

        $view = new LecturerView();
        $view->render($data, $editData); // kirim juga data edit kalau ada
    }

    // =============================
    // ADD LECTURER
    // =============================
    public function add()
    {
        if (isset($_POST['add'])) {

            $data = [
                'name'      => $_POST['name'],
                'nidn'      => $_POST['nidn'],
                'phone'     => $_POST['phone'],
                'join_date' => $_POST['join_date']
            ];

            $this->lecturer->open();
            $this->lecturer->add($data);
            $this->lecturer->close();

            header("Location: index.php");
        }
    }

    // =============================
    // EDIT LECTURER
    // =============================
    public function edit()
    {
        if (isset($_POST['edit'])) {

            $id         = $_POST['id'];
            $name       = $_POST['name'];
            $nidn       = $_POST['nidn'];
            $phone      = $_POST['phone'];
            $join_date  = $_POST['join_date'];

            $this->lecturer->open();

            // Karena model Lecturer cuma punya updateJoinDate(),
            // kita update join_date saja (sesuai model).
            $this->lecturer->updateLecturer($id, $name, $nidn, $phone, $join_date);

            // Jika kamu ingin update name/nidn/phone, tinggal tambahin method baru di model.
            $this->lecturer->close();

            header("Location: index.php");
        }
    }

    // =============================
    // DELETE LECTURER
    // =============================
    public function delete()
    {
        if (isset($_GET['id_hapus'])) {
            $id = $_GET['id_hapus'];

            $this->lecturer->open();
            $this->lecturer->delete($id);
            $this->lecturer->close();

            header("Location: index.php"); // refresh halaman
            exit();
        }
    }

    public function getById($id)
    {
        $this->lecturer->open();
        $this->lecturer->getLecturerById($id); // nanti di model buat method ini
        $data = $this->lecturer->getResult();
        $this->lecturer->close();
        return $data;
    }


}