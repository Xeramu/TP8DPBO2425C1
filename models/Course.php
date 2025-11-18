<?php
// include_once("DB.php");
// include_once("config.php");

class Course extends DB
{
    // ngambil semua course beserta info dosen
    public function getCourse()
    {
        $query = "SELECT c.*, l.name AS lecturer_name 
                  FROM courses c
                  JOIN lecturers l ON c.lecturer_id = l.id";
        return $this->execute($query);
    }

    // nambahin course baru
    public function add($data)
    {
        $lecturer_id = $data['lecturer_id'];
        $course_name = $data['course_name'];
        $credits = $data['credits'] ?? 3; // kreditnya engga boleh lebih dr 6, defaultnya 3

        $query = "INSERT INTO courses (lecturer_id, course_name, credits)
                  VALUES ($lecturer_id, '$course_name', $credits)";

        return $this->execute($query);
    }

    // ngapus course berdasarkan ID
    public function delete($id)
    {
        $query = "DELETE FROM courses WHERE id = $id";
        return $this->execute($query);
    }

    // update course
    public function update($id, $data)
    {
        $course_name = $data['course_name'];
        $credits = $data['credits'] ?? 3;
        $lecturer_id = $data['lecturer_id'];

        $query = "UPDATE courses SET 
                    course_name = '$course_name',
                    credits = $credits,
                    lecturer_id = $lecturer_id
                  WHERE id = $id";

        return $this->execute($query);
    }

    // ngambil course by ID
   public function getCourseById($id)
    {
        $query = "SELECT * FROM courses WHERE id = $id";
        $this->execute($query);       
        return $this->getResult(); 
    }

}