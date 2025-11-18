<?php

class CourseView
{
    public function render($courses, $lecturers, $editData)
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
                        <a href='course.php?id_edit={$c['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    </td>
                </tr>";
            $no++;
        }

        // --- DROPDOWN LECTURER ---
        foreach ($lecturers as $l) {
            $selected = "";
            if ($editData && $editData['lecturer_id'] == $l['id']) {
                $selected = "selected";
            }
            $options .= "<option value='{$l['id']}' $selected>{$l['name']}</option>";
        }

        // --- FORM VALUE (edit atau kosong) ---
        $course_name = $editData['course_name'] ?? '';
        $credits     = $editData['credits'] ?? '';
        $course_id   = $editData['id'] ?? '';

        // Replace EDIT_FORM dengan form yang sudah diisi data
        $formHtml = file_get_contents("templates/course.html");
        $formHtml = str_replace("COURSE_NAME", $course_name, $formHtml);
        $formHtml = str_replace("CREDITS", $credits, $formHtml);
        $formHtml = str_replace("COURSE_ID", $course_id, $formHtml);
        $formHtml = str_replace("DATA_LECTURER_OPTION", $options, $formHtml);

        $tpl = new Template("templates/course.html");
        $tpl->replace("EDIT_FORM", $formHtml);
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();

    }
}