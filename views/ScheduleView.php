<?php

class ScheduleView
{
    public function render($data)
    {
        $no = 1;
        $rows = "";

        foreach ($data as $d) {

            $rows .= "
            <tr class='text-center'>
                <td>{$no}</td>
                <td>{$d['course_name']}</td>
                <td>{$d['lecturer_name']}</td>
                <td>{$d['day']}</td>
                <td>{$d['time']}</td>
                <td>{$d['room']}</td>
                <td>
                    <a href='index-schedule.php?id_hapus={$d['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";

            $no++;
        }

        $tpl = new Template("templates/schedule.html");
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}