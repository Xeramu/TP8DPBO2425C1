<?php
include_once(__DIR__ . "/../config/config.php");
include_once(__DIR__ . "/../model/Schedule.php");
include_once(__DIR__ . "/../model/Course.php");
include_once(__DIR__ . "/../model/Lecturer.php");
include_once(__DIR__ . "/../view/ScheduleView.php");

class ScheduleController
{
    private $schedule;
    private $course;
    private $lecturer;

    function __construct()
    {
        $this->schedule = new Schedule(
            Config::$db_host,
            Config::$db_user,
            Config::$db_pass,
            Config::$db_name
        );

        $this->course = new Course(
            Config::$db_host,
            Config::$db_user,
            Config::$db_pass,
            Config::$db_name
        );

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
        $this->schedule->open();
        $this->schedule->getSchedules();

        $data = [];
        while ($row = $this->schedule->getResult()) {
            $data[] = $row;
        }
        $this->schedule->close();

        $view = new ScheduleView();
        $view->render($data);
    }

    // CREATE
    public function add()
    {
        if (isset($_POST['add'])) {
            $this->schedule->open();
            $this->schedule->add($_POST);
            $this->schedule->close();

            header("Location: schedule.php");
            exit;
        }
    }

    // UPDATE
    public function edit($id)
    {
        if (isset($_POST['edit'])) {
            $this->schedule->open();
            $this->schedule->update($id, $_POST);
            $this->schedule->close();

            header("Location: schedule.php");
            exit;
        }
    }

    // DELETE
    public function delete($id)
    {
        $this->schedule->open();
        $this->schedule->delete($id);
        $this->schedule->close();

        header("Location: schedule.php");
        exit;
    }
}