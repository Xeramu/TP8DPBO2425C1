<?php
include_once("config.php");
include_once("models/Course.php");
include_once("views/CourseView.php");

class CourseController
{
    private $course;

    function __construct()
    {
        $this->course = new Course(
            Config::$db_host,
            Config::$db_user,
            Config::$db_pass,
            Config::$db_name
        );
    }

    // ==========================
    // INDEX — tampilkan semua course
    // ==========================
    public function index()
    {
        $this->course->open();
        $this->course->getCourse();

        $data = [];
        while ($row = $this->course->getResult()) {
            array_push($data, $row);
        }

        $this->course->close();

        $view = new CourseView();
        $view->render($data);
    }

    // ==========================
    // ADD COURSE
    // ==========================
    public function add()
    {
        if (isset($_POST['add'])) {

            $data = [
                'lecturer_id' => $_POST['lecturer_id'],
                'course_name' => $_POST['course_name'],
                'credits'     => $_POST['credits']
            ];

            $this->course->open();
            $this->course->add($data);
            $this->course->close();

            header("Location: index-course.php");
        }
    }

    // ==========================
    // EDIT COURSE
    // ==========================
    public function edit()
    {
        if (isset($_POST['add'])) {

            $id = $_POST['id'];

            $data = [
                'lecturer_id' => $_POST['lecturer_id'],
                'course_name' => $_POST['course_name'],
                'credits'     => $_POST['credits']
            ];

            $this->course->open();
            $this->course->update($id, $data);
            $this->course->close();

            header("Location: index-course.php");
        }
    }

    // ==========================
    // DELETE COURSE
    // ==========================
    public function delete()
    {
        if (isset($_GET['id_hapus'])) {

            $id = $_GET['id_hapus'];

            $this->course->open();
            $this->course->delete($id);
            $this->course->close();

            header("Location: index-course.php");
        }
    }
}