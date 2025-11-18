<?php
include_once("config.php");
include_once("models/Course.php");
include_once("models/Lecturer.php");
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
    public function index($editData = null)
    {
        // Ambil semua course
        $this->course->open();
        $this->course->getCourse();

        $courses = [];
        while ($row = $this->course->getResult()) {
            array_push($courses, $row);
        }
        $this->course->close();

        // Ambil semua lecturer
        $lecturer = new Lecturer(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        $lecturer->open();
        $lecturer->getLecturer();

        $lecturers = [];
        while ($l = $lecturer->getResult()) {
            array_push($lecturers, $l);
        }
        $lecturer->close();

        // Kirim ke view
        $view = new CourseView();
        $view->render($courses, $lecturers, $editData); // tambahkan $editData
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

            header("Location: course.php");
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

            header("Location: course.php");
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

            header("Location: course.php");
        }
    }

    // buat ngambil data lewat id yg dupilih
    public function getCourseById($id)
    {
        $this->course->open();
        $this->course->getCourseById($id); // nanti di model buat method ini
        $data = $this->course->getResult();
        $this->course->close();
        return $data;
    }
}