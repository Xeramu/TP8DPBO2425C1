<?php
class LecturerView
{
    public function render($data)
    {
        $no = 1;
        $dataLecturer = null;

        foreach ($data as $val) {
            list($id, $name, $email) = $val;
            $dataLecturer .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>
                    <a href='lecturer.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='lecturer.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        $tpl = new Template("templates/lecturer.html");
        $tpl->replace("JUDUL", "Lecturer");
        $tpl->replace("DATA_TABEL", $dataLecturer);
        $tpl->write();
    }
}