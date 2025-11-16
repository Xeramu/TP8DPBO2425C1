<?php

class Course extends DB
{
    // Ambil semua course + nama dosennya
    function getCourses()
    {
        $query = "SELECT courses.*, lecturers.name AS lecturer_name 
                  FROM courses
                  JOIN lecturers ON courses.lecturer_id = lecturers.id";
        return $this->execute($query);
    }

    // Ambil 1 course by ID
    function getCourseById($id)
    {
        $query = "SELECT * FROM courses WHERE id = $id";
        return $this->execute($query);
    }

    // Tambah data course
    function add($data)
    {
        $lecturer_id = $data['lecturer_id'];
        $course_name = $data['course_name'];
        $credits     = $data['credits'];

        $query = "INSERT INTO courses (lecturer_id, course_name, credits)
                  VALUES ($lecturer_id, '$course_name', $credits)";
        
        return $this->execute($query);
    }

    // Update course
    function update($id, $data)
    {
        $lecturer_id = $data['lecturer_id'];
        $course_name = $data['course_name'];
        $credits     = $data['credits'];

        $query = "UPDATE courses SET 
                    lecturer_id = $lecturer_id,
                    course_name = '$course_name',
                    credits = $credits
                  WHERE id = $id";

        return $this->execute($query);
    }

    // Hapus course
    function delete($id)
    {
        $query = "DELETE FROM courses WHERE id = $id";
        return $this->execute($query);
    }
}