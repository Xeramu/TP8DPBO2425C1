<?php

class CourseView
{
    public function render($courses, $lecturers)
    {
        $no = 1;
        $rows = "";
        $options = "";

        // --- TABEL COURSE ---
        foreach ($courses as $c) {
            $rows .= "
                <tr class='text-center'>
                    <td>$no</td>
                    <td>{$c['course_name']}</td>
                    <td>{$c['credits']}</td>
                    <td>{$c['lecturer_name']}</td>
                    <td>
                        <a href='course.php?id_hapus={$c['id']}' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                </tr>";
            $no++;
        }

        // --- DROPDOWN LECTURER ---
        foreach ($lecturers as $l) {
            $options .= "<option value='{$l['id']}'>{$l['name']}</option>";
        }

        $tpl = new Template("templates/course.html");
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->replace("DATA_LECTURER_OPTION", $options);
        $tpl->write();
    }
}