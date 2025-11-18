<?php

class Lecturer extends DB
{
    // construktro
    public function __construct($host, $user, $pass, $db)
    {
        parent::__construct($host, $user, $pass, $db);
    }

    public function getLecturer()
    {
        $query = "SELECT * FROM lecturers";
        return $this->execute($query);
    }

    // nambah lecturer baru
    public function add($data)
    {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'] ?? null;
        $join_date = $data['join_date'] ?? null;

        $query = "INSERT INTO lecturers (name, nidn, phone, join_date) 
                  VALUES ('$name', '$nidn', '$phone', '$join_date')";

        return $this->execute($query);
    }

    // nhapus lecturer berdasarkan ID
    public function delete($id)
    {
        $query = "DELETE FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }

    // update lecturer
    public function updateLecturer($id, $name, $nidn, $phone, $join_date) {
        $query = "UPDATE lecturers SET 
                    name = '$name',
                    nidn = '$nidn',
                    phone = '$phone',
                    join_date = '$join_date'
                WHERE id = $id";
        return $this->execute($query);
    }

    // ngambil lecturer berdasarkan id
    public function getLecturerById($id)
    {
        $query = "SELECT * FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }


}