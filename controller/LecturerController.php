<?php
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../model/Lecturer.php");
include_once(__DIR__ . "/../view/LecturerView.php");

class LecturerController
{
    private $lecturer;

    function __construct()
    {
        $this->lecturer = new Lecturer(
            Config::$db_host,
            Config::$db_user,
            Config::$db_pass,
            Config::$db_name
        );
    }

    // READ
    public function index()
    {
        $this->lecturer->open();
        $this->lecturer->getLecturers();

        $data = [];
        while ($row = $this->lecturer->getResult()) {
            $data[] = $row;
        }

        $this->lecturer->close();

        $view = new LecturerView();
        $view->render($data);
    }

    // CREATE
    public function add()
    {
        if (isset($_POST['add'])) {
            $this->lecturer->open();
            $this->lecturer->add($_POST);
            $this->lecturer->close();

            header("Location: lecturer.php");
            exit;
        }
    }

    // EDIT
    public function edit($id)
    {
        if (isset($_POST['edit'])) {
            $this->lecturer->open();
            $this->lecturer->update($id, $_POST);
            $this->lecturer->close();

            header("Location: lecturer.php");
            exit;
        }
    }

    // DELETE
    public function delete($id)
    {
        $this->lecturer->open();
        $this->lecturer->delete($id);
        $this->lecturer->close();

        header("Location: lecturer.php");
        exit;
    }
}