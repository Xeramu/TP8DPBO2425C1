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
    public function index()
    {
        // Membuka koneksi DB
        $this->lecturer->open();

        // Meminta semua data lecturer
        $this->lecturer->getLecturer();

        // Simpan hasil dalam array
        $data = array();
        while ($row = $this->lecturer->getResult()) {
            array_push($data, $row);
        }

        // Tutup koneksi DB
        $this->lecturer->close();

        // Kirim ke view
        $view = new LecturerView();
        $view->render($data);
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

            header("Location: index.php?controller=lecturer");
        }
    }

    // =============================
    // EDIT LECTURER
    // =============================
    public function edit()
    {
        if (isset($_POST['add'])) {

            $id         = $_POST['id'];
            $name       = $_POST['name'];
            $nidn       = $_POST['nidn'];
            $phone      = $_POST['phone'];
            $join_date  = $_POST['join_date'];

            $this->lecturer->open();

            // Karena model Lecturer cuma punya updateJoinDate(),
            // kita update join_date saja (sesuai model).
            $this->lecturer->updateJoinDate($id, $join_date);

            // Jika kamu ingin update name/nidn/phone, tinggal tambahin method baru di model.
            $this->lecturer->close();

            header("Location: index.php?controller=lecturer");
        }
    }

    // =============================
    // DELETE LECTURER
    // =============================
    public function delete()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $this->lecturer->open();
            $this->lecturer->delete($id);
            $this->lecturer->close();

            header("Location: index.php?controller=lecturer");
        }
    }
}