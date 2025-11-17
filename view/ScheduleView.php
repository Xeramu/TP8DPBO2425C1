<?php
class ScheduleView
{
    public function render($data)
    {
        $no = 1;
        $dataSchedule = null;
        $optionCourse = null;
        $optionLecturer = null;

        // table
        foreach ($data['schedule'] as $val) {
            list($id, $course_id, $day, $time, $lecturer_id) = $val;

            $dataSchedule .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $course_id . "</td>
                <td>" . $day . "</td>
                <td>" . $time . "</td>
                <td>" . $lecturer_id . "</td>
                <td>
                    <a href='schedule.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='schedule.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // dropdown course
        foreach ($data['course'] as $c) {
            list($cid, $cname, $ccode, $clid) = $c;
            $optionCourse .= "<option value='" . $cid . "'>" . $cname . "</option>";
        }

        // dropdown lecturer
        foreach ($data['lecturer'] as $l) {
            list($lid, $lname, $lemail) = $l;
            $optionLecturer .= "<option value='" . $lid . "'>" . $lname . "</option>";
        }

        $tpl = new Template("templates/schedule.html");
        $tpl->replace("JUDUL", "Schedule");
        $tpl->replace("OPTION_COURSE", $optionCourse);
        $tpl->replace("OPTION_LECTURER", $optionLecturer);
        $tpl->replace("DATA_TABEL", $dataSchedule);
        $tpl->write();
    }
}