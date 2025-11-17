<?php
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../model/Course.php");
include_once(__DIR__ . "/../view/CourseView.php");

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

    // READ
    public function index()
    {
        $this->course->open();
        $this->course->getCourses();

        $data = [];
        while ($row = $this->course->getResult()) {
            $data[] = $row;
        }

        $this->course->close();

        $view = new CourseView();
        $view->render($data);
    }

    // CREATE
    public function add()
    {
        if (isset($_POST['add'])) {
            $this->course->open();
            $this->course->add($_POST);
            $this->course->close();

            header("Location: course.php");
            exit;
        }
    }

    // EDIT
    public function edit($id)
    {
        if (isset($_POST['edit'])) {
            $this->course->open();
            $this->course->update($id, $_POST);
            $this->course->close();

            header("Location: course.php");
            exit;
        }
    }

    // DELETE
    public function delete($id)
    {
        $this->course->open();
        $this->course->delete($id);
        $this->course->close();

        header("Location: course.php");
        exit;
    }
}