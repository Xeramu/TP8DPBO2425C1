<?php
include_once("config.php");
include_once("models/Schedule.php");
include_once("models/Course.php");
include_once("views/ScheduleView.php");

class ScheduleController
{
    // properti controller
    private $schedule;

    // contructor
    function __construct()
    {
        $this->schedule = new Schedule(
            Config::$db_host,
            Config::$db_user,
            Config::$db_pass,
            Config::$db_name
        );
    }

    // Halaman utama (nampilin smua schedule)
    public function index()
    {
        // Ambil semua schedule
        $this->schedule->open();
        $this->schedule->getSchedule();
        $schedules = [];
        while ($row = $this->schedule->getResult()) {
            $schedules[] = $row;
        }
        $this->schedule->close();

        // Ambil semua course (untuk dropdown)
        $course = new Course(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
        $course->open();
        $course->getCourse();
        $courses = [];
        while ($c = $course->getResult()) {
            $courses[] = $c;
        }
        $course->close();

        // Kirim ke view
        $view = new ScheduleView();
        $view->render($schedules, $courses);
    }

    // ==========================
    // ADD SCHEDULE
    // ==========================
    public function add()
    {
        if (isset($_POST['add'])) {

            $data = [
                'course_id' => $_POST['course_id'],
                'day'       => $_POST['day'],
                'time'      => $_POST['time'],
                'room'      => $_POST['room']
            ];

            $this->schedule->open();
            $this->schedule->add($data);
            $this->schedule->close();

            header("Location: schedule.php"); // refresh page
        }
    }

    // ==========================
    // EDIT SCHEDULE
    // ==========================
    public function edit()
    {
        if (isset($_POST['edit'])) {

            $id = $_POST['id'];
            $data = [
                'course_id' => $_POST['course_id'],
                'day'       => $_POST['day'],
                'time'      => $_POST['time'],
                'room'      => $_POST['room']
            ];

            $this->schedule->open();
            $this->schedule->update($id, $data);
            $this->schedule->close();

            header("Location: schedule.php"); // refresh page
        }
    }

    // ==========================
    // DELETE SCHEDULE
    // ==========================
    public function delete()
    {
        if (isset($_GET['id_hapus'])) {

            $id = $_GET['id_hapus'];

            $this->schedule->open();
            $this->schedule->delete($id);
            $this->schedule->close();

            header("Location: schedule.php"); // refresh page
        }
    }
}