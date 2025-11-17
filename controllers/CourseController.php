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
    // INDEX — menampilkan semua course
    // ==========================
    public function index()
    {
        $this->course->open();
        $this->course->getCourse();

        $data = array();
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
        if (isset($_POST['submit'])) {

            $data = [
                'lecturer_id' => $_POST['lecturer_id'],
                'course_name' => $_POST['course_name'],
                'credits'     => $_POST['credits']
            ];

            $this->course->open();
            $this->course->add($data);
            $this->course->close();

            header("Location: index.php?controller=course");
        }
    }

    // ==========================
    // EDIT COURSE
    // ==========================
    public function edit()
    {
        if (isset($_POST['submit'])) {

            $id = $_POST['id'];

            $data = [
                'lecturer_id' => $_POST['lecturer_id'],
                'course_name' => $_POST['course_name'],
                'credits'     => $_POST['credits']
            ];

            $this->course->open();
            $this->course->update($id, $data);
            $this->course->close();

            header("Location: index.php?controller=course");
        }
    }

    // ==========================
    // DELETE COURSE
    // ==========================
    public function delete()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $this->course->open();
            $this->course->delete($id);
            $this->course->close();

            header("Location: index.php?controller=course");
        }
    }
}