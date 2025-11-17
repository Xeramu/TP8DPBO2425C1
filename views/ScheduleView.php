<?php

class ScheduleView
{
    public function render($schedules, $courses)
    {
        // Buat option dropdown course
        $course_options = "";
        foreach ($courses as $c) {
            $course_options .= "<option value='{$c['id']}'>{$c['course_name']} ({$c['lecturer_name']})</option>";
        }

        // Buat data tabel
        $rows = "";
        $no = 1;
        foreach ($schedules as $s) {
            $rows .= "
            <tr class='text-center'>
                <td>{$no}</td>
                <td>{$s['course_name']}</td>
                <td>{$s['lecturer_name']}</td>
                <td>{$s['day']}</td>
                <td>{$s['time']}</td>
                <td>{$s['room']}</td>
                <td>
                    <a href='schedule.php?id_hapus={$s['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
            $no++;
        }

        $tpl = new Template("templates/schedule.html");
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->replace("DATA_COURSE_OPTION", $course_options);
        $tpl->write();
    }
}