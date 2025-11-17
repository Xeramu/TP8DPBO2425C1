<?php

class LecturerView
{
    public function render($data)
    {
        $no = 1;
        $rows = "";

        foreach ($data as $d) {
            $rows .= "
            <tr class='text-center'>
                <td>{$no}</td>
                <td>{$d['name']}</td>
                <td>{$d['nidn']}</td>
                <td>{$d['phone']}</td>
                <td>{$d['join_date']}</td>
                <td>
                    <a href='index.php?id_hapus={$d['id']}' class='btn btn-danger btn-sm'>Delete</a>
                    <a href='index.php?id_edit={$d['id']}' class='btn btn-warning btn-sm'>Edit</a>
                </td>
            </tr>";
            $no++;
        }

        $tpl = new Template("templates/lecturer.html");
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}