<?php

class Lecturer extends DB
{
    public function __construct($host, $user, $pass, $db)
    {
        parent::__construct($host, $user, $pass, $db);
    }

    public function getLecturer()
    {
        $query = "SELECT * FROM lecturers";
        return $this->execute($query);
    }

    // Menambahkan dosen baru
    public function add($data)
    {
        // Pastikan $data = ['name' => '', 'nidn' => '', 'phone' => '', 'join_date' => 'YYYY-MM-DD']
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'] ?? null;
        $join_date = $data['join_date'] ?? null;

        $query = "INSERT INTO lecturers (name, nidn, phone, join_date) 
                  VALUES ('$name', '$nidn', '$phone', '$join_date')";

        return $this->execute($query);
    }

    // Menghapus dosen berdasarkan ID
    public function delete($id)
    {
        $query = "DELETE FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }

    // Contoh update: ubah tanggal gabung dosen
    public function updateLecturer($id, $name, $nidn, $phone, $join_date) {
        $query = "UPDATE lecturers SET 
                    name = '$name',
                    nidn = '$nidn',
                    phone = '$phone',
                    join_date = '$join_date'
                WHERE id = $id";
        return $this->execute($query);
    }

    public function getLecturerById($id)
    {
        $query = "SELECT * FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }


}