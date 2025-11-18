<?php

class LecturerView
{
    public function render($data, $editData = null)
    {
        $no = 1;
        $rows = "";

        // --- TABEL ---
        foreach ($data as $d) {
            $rows .= "
            <tr class='text-center'>
                <td>{$no}</td>
                <td>{$d['name']}</td>
                <td>{$d['nidn']}</td>
                <td>{$d['phone']}</td>
                <td>{$d['join_date']}</td>
                <td>
                    <a href='index.php?id_edit={$d['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='index.php?id_hapus={$d['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
            $no++;
        }

        // --- FORM EDIT ---
        $editForm = "";
        if ($editData) {
            $d = $editData;
            $editForm = "
            <div class='card p-4 my-3'>
                <h2>Edit Lecturer</h2>
                <form action='index.php' method='POST'>
                    <input type='hidden' name='id' value='{$d['id']}'>
                    <label>Nama</label>
                    <input type='text' class='form-control mb-2' name='name' value='{$d['name']}' required>
                    <label>NIDN</label>
                    <input type='text' class='form-control mb-2' name='nidn' value='{$d['nidn']}' required>
                    <label>Phone</label>
                    <input type='text' class='form-control mb-2' name='phone' value='{$d['phone']}'>
                    <label>Join Date</label>
                    <input type='date' class='form-control mb-2' name='join_date' value='{$d['join_date']}'>
                    <button type='submit' name='edit' class='btn btn-primary mt-2'>Update</button>
                </form>
            </div>";
        }

        $tpl = new Template("templates/lecturer.html");
        $tpl->replace("EDIT_FORM", $editForm);
        $tpl->replace("DATA_TABEL", $rows);
        $tpl->write();
    }
}