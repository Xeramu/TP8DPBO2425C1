<?php
class CourseView
{
    public function render($data)
    {
        $no = 1;
        $dataCourse = null;
        $optionLecturer = null;

        // Data table
        foreach ($data['course'] as $val) {
            list($id, $name, $code, $lecturer_id) = $val;

            $dataCourse .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $code . "</td>
                <td>" . $lecturer_id . "</td>
                <td>
                    <a href='course.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='course.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Dropdown lecturer untuk tambah course
        foreach ($data['lecturer'] as $lec) {
            list($lid, $lname, $lemail) = $lec;
            $optionLecturer .= "<option value='" . $lid . "'>" . $lname . "</option>";
        }

        $tpl = new Template("templates/course.html");
        $tpl->replace("JUDUL", "Courses");
        $tpl->replace("OPTION_LECTURER", $optionLecturer);
        $tpl->replace("DATA_TABEL", $dataCourse);
        $tpl->write();
    }
}