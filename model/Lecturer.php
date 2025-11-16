<?php

class Lecturer extends DB
{
    // Ambil semua lecturer
    function getLecturers()
    {
        $query = "SELECT * FROM lecturers ORDER BY id DESC";
        return $this->execute($query);
    }

    // Ambil 1 lecturer berdasarkan id
    function getLecturerById($id)
    {
        $query = "SELECT * FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }

    // Tambah lecturer baru
    function add($data)
    {
        $name      = $data['name'];
        $nidn      = $data['nidn'];
        $phone     = $data['phone'];
        $join_date = $data['join_date'];

        $query = "INSERT INTO lecturers (name, nidn, phone, join_date)
                  VALUES ('$name', '$nidn', '$phone', '$join_date')";

        return $this->execute($query);
    }

    // Update lecturer
    function update($id, $data)
    {
        $name      = $data['name'];
        $nidn      = $data['nidn'];
        $phone     = $data['phone'];
        $join_date = $data['join_date'];

        $query = "UPDATE lecturers SET
                        name = '$name',
                        nidn = '$nidn',
                        phone = '$phone',
                        join_date = '$join_date'
                  WHERE id = $id";

        return $this->execute($query);
    }

    // Hapus lecturer
    function delete($id)
    {
        $query = "DELETE FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }
}