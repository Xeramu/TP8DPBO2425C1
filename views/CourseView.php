<?php

class CourseView
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
                <td>{$d['credits']}</td>
                <td>{$d['lecturer_name']}</td>
                <td>
                    <a href='index-course.php?id_hapus={$d['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
            $no++;
        }

        $tpl = new Template("templates/course.html");
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}