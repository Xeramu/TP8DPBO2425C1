<?php
include_once("config.php");
include_once("models/Schedule.php");
include_once("views/ScheduleView.php");

class ScheduleController
{
    private $schedule;

    function __construct()
    {
        $this->schedule = new Schedule(
            Config::$db_host,
            Config::$db_user,
            Config::$db_pass,
            Config::$db_name
        );
    }

    // ==========================
    // INDEX — tampilkan semua schedule
    // ==========================
    public function index()
    {
        $this->schedule->open();
        $this->schedule->getSchedule();

        $data = [];
        while ($row = $this->schedule->getResult()) {
            $data[] = $row;
        }

        $this->schedule->close();

        $view = new ScheduleView();
        $view->render($data);
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

            header("Location: index-schedule.php");
        }
    }

    // ==========================
    // EDIT SCHEDULE
    // ==========================
    public function edit()
    {
        if (isset($_POST['add'])) {

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

            header("Location: index-schedule.php");
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

            header("Location: index-schedule.php");
        }
    }
}